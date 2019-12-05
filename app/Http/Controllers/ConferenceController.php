<?php

namespace App\Http\Controllers;

use Alert;
use App\Order;
use App\Attendant;
use Carbon\Carbon;
use App\Conference;
use Illuminate\Http\Request;
use App\ConferenceRegistration;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConferenceRegistrationMail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Http\Requests\ConferenceRegistrationRequest;

class ConferenceController extends Controller
{
    public function index()
    {
        return view('public.conference.index');
	}

	public function show(Conference $conference)
	{
		$conference->load('options', 'mealSelections', 'ticketPackages', 'events');
		return view('public.conference.show', compact('conference'));
	}

    public function affiliate()
    {
        $today = Carbon::now()->toDateString();
        $conferences = Conference::where('affiliate', '1')->where('end', '>=', $today)->orderBy('start')->get();

        return view('public.conference.affiliate', compact('conferences'));
    }

    public function order(ConferenceRegistrationRequest $request, Conference $conference)
    {
		// dd($request->all());
        // try {
        //     $this->validate($request, [
        //         'name' => 'required|string',
        //         'email'=>'required|string|email',
        //         'phone'=>'required|string',
        //         'company'=>'string',
        //         'ticket'=>'required|string',
        //         'quantity'=>'required|string',
        //     ]);
        // }
        // catch (ValidationException $exception) {
        //     return response()->json([
        //         'status' => 'error',
        //         'msg' => 'Error',
        //         'erors' => $exception->errors()
        //     ], 422);
        // }

		$ticket_subtotal = 0;
		$memb_t = 0;
		$non_memb_t = 0;
		$new_memb_t = 0;
		$guest_t = 0;


		foreach($request->registrant as $key=>$reg)
		{
			$ticket[$key]['name'] = $reg;
		}
		foreach($request->ticket as $key=>$tic)
		{
			if($tic == "Early Bird Member Ticket")
			{
				$memb_t ++;
				$p = $conference->options->early_bird_member_ticket_price;
			}
			elseif($tic == "Early Bird Non Member Ticket")
			{
				$non_memb_t++;
				$p = $conference->options->early_bird_non_member_ticket_price;
			}
			elseif($tic == "Early Bird New Member Ticket")
			{
				$new_memb_t++;
				$p = $conference->options->early_bird_new_member_ticket_price;
			}
			elseif($tic == "Early Bird Guest Ticket")
			{
				$guest_t++;
				$p = $conference->options->early_bird_guest_ticket_price;
			}
			if($tic == "Member Ticket")
			{
				$memb_t++;
				$p = $conference->options->regular_member_ticket_price;
			}
			elseif($tic == "Non Member Ticket")
			{
				$non_memb_t++;
				$p = $conference->options->regular_non_member_ticket_price;
			}
			elseif($tic == "New Member Ticket")
			{
				$new_memb_t++;
				$p = $conference->options->regular_new_member_ticket_price;
			}
			elseif($tic == "Guest Ticket")
			{
				$guest_t++;

				$p = $conference->options->regular_guest_ticket_price;
			}
			$ticket_subtotal += $p;
			$ticket[$key]['ticket_price'] = $p;
			$ticket[$key]['ticket'] = $tic;
		}
		if($request->has('meal'))
		{
			foreach($request->meal as $key=>$meal)
			{
				$ticket[$key]['meal_selection_id'] = $meal;
			}
		}
		$order = new Order;
		$order->conference_id = $conference->id;
		$order->payment = $request->payment;
		$order->name = $request->name;
		$order->company = $request->company;
		$order->email = $request->email;
		$order->phone = $request->phone;
        $order->subtotal = $ticket_subtotal;
        $order->tax = 0;
        $order->total = $ticket_subtotal;

        $charge_description = "AAPG Annual Conference. " . count($request->ticket) . " tickets. Customer " . $request->name . ". Community " . $request->company;

		$order->description = $charge_description;

        if($request->payment == "cc")
        {

            $charge_meta = array([
                'Name' => $request->name,
                'Email' => $request->email,
                'Phone' => $request->phone,
                'Company' => $request->company
            ]);


            try {
                $token = Stripe::tokens()->create([
                    'card' => [
                        'number'    => $request->cc,
                        'exp_month' => $request->month,
                        'exp_year'  => $request->year,
                        'cvc'       => $request->security,
                    ],
                ]);
            } catch (Cartalyst\Stripe\Exception\BadRequestException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\UnauthorizedException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\InvalidRequestException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\CardErrorException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\ServerErrorException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (\Exception $e) {
                Alert::error($e->getMessage(), 'Uh Oh!')->persistent('OK');
                return back();
            }

            try {
                $charge = Stripe::charges()->create([
                    'source' => $token['id'],
                    'currency' => 'CAD',
                    'amount'   => $ticket_subtotal / 100,
                    'description' => $charge_description,
                    'receipt_email' => $request->email,
                    // 'metadata' => $charge_meta,
				]);

            } catch (Cartalyst\Stripe\Exception\BadRequestException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\UnauthorizedException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\InvalidRequestException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\CardErrorException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\ServerErrorException $e) {
                Alert::error($e->getMessage(), 'Uh Oh!');
                return back();
            } catch (\Exception $e) {
                Alert::error($e->getMessage(), 'Uh Oh!')->persistent('OK');
                return back();
            }

			$order->stripe_id = $charge['id'];

        }
		$order->save();
		$tickets = [];
		foreach($ticket as $t)
		{
			$t['conference_id'] = $conference->id;
			$t['order_id'] = $order->id;
			$tic = ConferenceRegistration::create($t);
			array_push(	$tickets,  $tic);
		}
        Mail::to('admin@aapg.ca')->send(new ConferenceRegistrationMail($order, $tickets));

        Alert::success('Your order has been completed! If you paid via credit card you will receive a credit card invoice shortly. If you requested to pay by cash or cheque we will contact you ASAP.', 'Registration Received')->persistent('Ok');

        return back();

        // try {
        //     $this->validate($request, [
        //         'name' => 'required|string',
        //         'email'=>'required|string|email',
        //         'phone'=>'required|string',
        //         'company'=>'string',
        //         'ticket'=>'required|string',
        //         'quantity'=>'required|string',
        //     ]);

        //     $attendant = Attendant::create([
        //         'name' => $request['name'],
        //         'email' => $request['email'],
        //     ]);

        //     $customer = $attendant->customer->save($customer)

        //     return response()->json([
        //         'status' => 'success',
        //         'msg'    => 'Okay',
        //     ], 201);
        // }
        // catch (ValidationException $exception) {
        //     return response()->json([
        //         'status' => 'error',
        //         'msg' => 'Error',
        //         'erors' => $exception->errors()
        //     ], 422);
        // }
    }
}
