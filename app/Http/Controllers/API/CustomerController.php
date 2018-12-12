<?php

namespace App\Http\Controllers\API;

use App\Customer;
use App\Attendant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function index()
    {
        return Customer::latest()->get();
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name'      => 'required|string',
                'company'   => 'string',
                'email'     => 'required|email|unique:customers.email',
                'phone'     => 'string',
                'address'   =>'string',
                'confenrence_id' => 'required|integer',
            ]);

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

            $customer->save();

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
