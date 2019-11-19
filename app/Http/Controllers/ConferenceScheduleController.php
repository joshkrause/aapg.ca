<?php

namespace App\Http\Controllers;

use App\ConferenceSchedule;
use Illuminate\Http\Request;

class ConferenceScheduleController extends Controller
{
	protected $guarded = [''];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceSchedule $conferenceSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ConferenceSchedule $conferenceSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConferenceSchedule $conferenceSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConferenceSchedule $conferenceSchedule)
    {
        //
    }
}
