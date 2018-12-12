<?php

namespace App\Http\Controllers\API;

use App\Customer;
use App\Attendant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendantController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name'      => 'required|string',
                'company'   => 'string',
                'email'     => 'required|email|unique:customers',
                'phone'     => 'string',
                'address'   =>'string',
                'conference_id' => 'required|integer'
            ]);

            $attendant = new Attendant();
            $attendant->conference_id = $request['conference_id'];
            $attendant->user = $request['name'] . " " . $request['company'];
            $attendant->save();

            $exists = Customer::where('email', $request->email)->get()->first();
            if($exists)
            {
                $customer = $exists;
            }
            else
            {
                $customer = new Customer;
                $customer->name = $request['name'];
                $customer->company = $request['company'];
                $customer->email = $request['email'];
                $customer->phone = $request['phone'];
                $customer->address = $request['address'];
            }
            $attendant->customers()->save($customer);

            return response()->json([
                'status' => 'success',
                'msg'    => 'Okay',
            ], 201);
        }
        catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'erors' => $exception->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
