<?php

namespace App\Http\Controllers;

use Alert;
use App\Order;
use App\Attendant;
use Carbon\Carbon;
use App\Conference;
use Illuminate\Http\Request;
use App\Mail\ConferenceRegistration;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

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

    public function order(Request $request)
    {
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
        $guest_subtotal = 0;
        $ticket_subtotal = $request->quantity * $request->ticket * 100;
        $guest_subtotal = $request->guest * 7500;
        if($request->quantity > 3 && $request->quantity < 8 && $request->ticket=="275")
        {
            $ticket_subtotal = $ticket_subtotal - 10000;
        }
        elseif($request->quantity > 7 && $request->quantity < 12  && $request->ticket=="275")
        {
            $ticket_subtotal = $ticket_subtotal - 20000;
        }
        elseif($request->quantity > 11 && $request->quantity < 16  && $request->ticket=="275")
        {
            $ticket_subtotal = $ticket_subtotal - 30000;
        }
        $subtotal = $ticket_subtotal + $guest_subtotal;
        $total = $subtotal;

        if($request->ticket == 275)
        {
            $ticket_type = "Member";
        }
        else {
            $ticket_type = "Non Member";
        }
        $charge_description = "AAPG Annual Conference. " . $request->quantity . " tickets and " . $request->guest . " guest tickets. Customer " . $request->name . ". Community " . $request->company;
        $notes = "Member Names: " . $request->member_names . ". Guest Names: " . $request->guest_names;
        $order = new Order([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'ticket_type' => $ticket_type,
            'quantity' => $request->quantity,
            'subtotal' => $subtotal,
            'tax' => '0',
            'total' => $total,
            'description' => $charge_description,
            'notes' => $notes,
            'guests' => $request->guest,
        ]);

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
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\UnauthorizedException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\InvalidRequestException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\CardErrorException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\ServerErrorException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (\Exception $e) {
                Alert::error($e->getMessage(), 'Uh Oh!')->persistent('OK');
                return back();
            }

            try {
                $charge = Stripe::charges()->create([
                    'source' => $token['id'],
                    'currency' => 'CAD',
                    'amount'   => $total / 100,
                    'description' => $charge_description,
                    'receipt_email' => $request->email,
                    // 'metadata' => $charge_meta,
                ]);

            } catch (Cartalyst\Stripe\Exception\BadRequestException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\UnauthorizedException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\InvalidRequestException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\NotFoundException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (Cartalyst\Stripe\Exception\ServerErrorException $e) {
                Alert::error($e, 'Uh Oh!');
                return back();
            } catch (\Exception $e) {
                Alert::error($e->getMessage(), 'Uh Oh!')->persistent('OK');
                return back();
            }


            $order['stripe_id'] = $charge['id'];

        }

        $order->save();
        Mail::to('admin@aapg.ca')->send(new ConferenceRegistration($order));

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
