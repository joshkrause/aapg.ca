<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    protected $dates = ['start', 'end', 'live'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Conference::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
            ]);


            $conference = new Conference;
            $conference->title = $request['title'];
            if($request->input('active'))
            {
                $conference->active = $request->input('active');
            }
            if($request->input('live'))
            {

                $conference->live = Carbon::parse($request->input('live'));
            }
            if($request->input('start'))
            {

                $conference->start = Carbon::parse($request->input('start'));
            }
            if($request->input('end'))
            {

                $conference->end = Carbon::parse($request->input('end'));
            }
            $conference->save();

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
        $conference = Conference::findOrFail($id);

        try {
            $this->validate($request, [
                'title' => 'required|string',
            ]);

            $conference->title = $request['title'];
            if($request->input('active'))
            {
                $conference->active = $request->input('active');
            }
            if($request->input('live'))
            {

                $conference->live = Carbon::parse($request->input('live'));
            }
            if($request->input('start'))
            {

                $conference->start = Carbon::parse($request->input('start'));
            }
            if($request->input('end'))
            {

                $conference->end = Carbon::parse($request->input('end'));
            }

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);

        $conference->delete();

        return response()->json([
            'status' => 'success',
            'msg'    => 'User Deleted',
        ], 201);
    }
}
