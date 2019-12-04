<?php

namespace App\Http\Controllers\Admin\Conference;

use Alert;
use App\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageBuilderFormRequest;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::all();
        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conferences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
			'title' => $request->title,
			'active' => $request->active,
			'affiliate' => $request->affiliate,
			'link' => $request->link,
			'live' => $request->live,
			'start' => $request->start,
			'end' => $request->end,
			'meal_selection_required' => $request->meal_selection_required,
		];

		$options = [
			'registration_start' => $request->registration_start,
			'registration_end' => $request->registration_end,
			'early_bird_registration_start' => $request->early_bird_registration_start,
			'early_bird_registration_end' => $request->early_bird_registration_end,
			'early_bird_member_ticket_price' => $request->early_bird_member_ticket_price * 100,
			'early_bird_non_member_ticket_price' => $request->early_bird_non_member_ticket_price * 100,
			'early_bird_new_member_ticket_price' => $request->early_bird_new_member_ticket_price * 100,
			'early_bird_guest_ticket_price' => $request->early_bird_guest_ticket_price * 100,
			'regular_member_ticket_price' => $request->regular_member_ticket_price * 100,
			'regular_non_member_ticket_price' => $request->regular_non_member_ticket_price * 100,
			'regular_new_member_ticket_price' => $request->regular_new_member_ticket_price * 100,
			'regular_guest_ticket_price' => $request->regular_guest_ticket_price * 100,
		];
		$conference = Conference::create($data);
		$conference->options()->updateOrCreate($options);

        Alert::success('Conference was created successfully.', 'Conference Created');
        return redirect('admin/conferences');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference)
    {
		$conference->load('options', 'mealSelections', 'ticketPackages');

        return view('admin.conferences.edit', compact('conference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference)
    {
		$data = [
			'title' => $request->title,
			'active' => $request->active,
			'affiliate' => $request->affiliate,
			'link' => $request->link,
			'live' => $request->live,
			'start' => $request->start,
			'end' => $request->end,
			'meal_selection_required' => $request->meal_selection_required,
		];

		$options = [
			'registration_start' => $request->registration_start,
			'registration_end' => $request->registration_end,
			'early_bird_registration_start' => $request->early_bird_registration_start,
			'early_bird_registration_end' => $request->early_bird_registration_end,
			'early_bird_member_ticket_price' => $request->early_bird_member_ticket_price * 100,
			'early_bird_non_member_ticket_price' => $request->early_bird_non_member_ticket_price * 100,
			'early_bird_new_member_ticket_price' => $request->early_bird_new_member_ticket_price * 100,
			'early_bird_guest_ticket_price' => $request->early_bird_guest_ticket_price * 100,
			'regular_member_ticket_price' => $request->regular_member_ticket_price * 100,
			'regular_non_member_ticket_price' => $request->regular_non_member_ticket_price * 100,
			'regular_new_member_ticket_price' => $request->regular_new_member_ticket_price * 100,
			'regular_guest_ticket_price' => $request->regular_guest_ticket_price * 100,
		];

        if($conference->update($data) && $conference->options()->updateOrCreate($options))
        {
            Alert::success('Conference was updated successfully.', 'Conference Updated');
            return redirect('admin/conferences');
        }
        else {
            Alert::error('Conference was not updated. Please correct your errors.', 'Error');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference)
    {
        $conference->delete();
        Alert::success('Conference was updated successfully.', 'Conference Updated');
            return redirect('admin/conferences');
    }

    public function builder(Conference $conference)
    {
        return view('admin.conferences.builder', compact('conference'));
    }

    public function saveHtml(PageBuilderFormRequest $request, Conference $conference)
    {
        $conference->description = $request->input('inpHtml');
        $conference->save();
        Alert::success('This content for this conference was successfully updated.', 'Updated!');
        return redirect('/admin/conferences');
    }
}
