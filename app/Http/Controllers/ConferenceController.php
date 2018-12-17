<?php

namespace App\Http\Controllers;

use App\Attendant;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        return view('public.conference.index');
    }

    public function order(Request $request)
    {
        return "Whoops! You are so fast, you've tried before our security certificate has updated! Just a little bit longer and you will be able to order successfully. Your credit card has not been charged.";


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
