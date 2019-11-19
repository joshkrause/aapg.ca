<?php


namespace App\Http\Controllers\Admin\Conference;


use App\Conference;
use App\ConferenceSchedule;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;

class ConferenceScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conference $conference)
    {
        return view('admin.conferences.schedule.index', compact('conference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Conference $conference)
    {
        return view('admin.conferences.schedule.create', compact('conference'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Conference $conference, ConferenceSchedule $event)
    {
		$conference->events()->create($request->all());

		SweetAlert::success('Event created successfully', 'Event Created');
		return Redirect('admin/conferences/'.$conference->id.'/schedule');
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
    public function edit(Conference $conference, $id)
    {
		$event = ConferenceSchedule::findOrFail($id);
        return view('admin.conferences.schedule.edit', compact('conference', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference, $id)
    {
		$event = ConferenceSchedule::findOrFail($id);
		$event->update($request->all());
		SweetAlert::success('Event updated successfully', 'Event Updated');
		return Redirect('admin/conferences/'.$conference->id.'/schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference, $id)
    {
		$event = ConferenceSchedule::findOrFail($id);
		$event->delete();
		SweetAlert::success('Event deleted successfully', 'Event Deleted');
		return back();
    }
}
