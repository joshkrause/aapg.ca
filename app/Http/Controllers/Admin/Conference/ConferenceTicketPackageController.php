<?php

namespace App\Http\Controllers\Admin\Conference;

use Redirect;
use App\Conference;
use Illuminate\Http\Request;
use App\ConferenceTicketPackage;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;

class ConferenceTicketPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conference $conference)
    {
		$conference->load('ticketPackages');
		return view('admin.conferences.ticket-packages.index', compact('conference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Conference $conference)
    {
        $conference->load('ticketPackages');
		return view('admin.conferences.ticket-packages.create', compact('conference'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Conference $conference, Request $request)
    {
		$data = $request->all();
		$data['price'] = $request->price*100;
		$data['early_bird_price'] = $request->early_bird_price * 100;

		$conference->ticketPackages()->create($data);
		return Redirect('admin/conferences/' . $conference->id . '/ticket-packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConferenceTicketPackage  $conferenceTicketPackage
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceTicketPackage $conferenceTicketPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConferenceTicketPackage  $conferenceTicketPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference, $conferenceTicketPackage)
    {
		$package = ConferenceTicketPackage::find($conferenceTicketPackage);
		return view('admin.conferences.ticket-packages.edit', compact('conference', 'package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConferenceTicketPackage  $conferenceTicketPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference, $conferenceTicketPackage)
    {
		$package = ConferenceTicketPackage::findOrFail($conferenceTicketPackage);

        $data = $request->all();
		$data['price'] = $request->price*100;
		$data['early_bird_price'] = $request->early_bird_price * 100;
		$package->update($data);
		SweetAlert::success('Package updated successfully', 'Package Updated');
		return Redirect('admin/conferences/'.$conference->id.'/ticket-packages');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConferenceTicketPackage  $conferenceTicketPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($conferenceTicketPackage)
    {
        $package = ConferenceTicketPackage::find($conferenceTicketPackage);
		$package->delete();
    }
}
