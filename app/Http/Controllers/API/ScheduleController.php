<?php

namespace App\Http\Controllers\API;

use App\Schedule;
use Carbon\Carbon;
use App\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Schedule::latest()->get();
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
                'description'=>'required|string',
                'speaker' => 'required|string',
                'start' => 'required',
                'end'=> 'required',
                'conference_id' => 'required',
            ]);

            $schedule = Schedule::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'speaker' => $request['speaker'],
                'conference_id' => $request['conference_id'],
                'start' => Carbon::parse($request['start']),
                'end' => Carbon::parse($request['end']),
            ]);

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
        return Schedule::where('conference_id', $id)->latest()->get();
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
        $schedule = Schedule::findOrFail($id);

        $schedule->delete();

        return response()->json([
            'status' => 'success',
            'msg'    => 'Event Deleted',
        ], 201);
    }
}
