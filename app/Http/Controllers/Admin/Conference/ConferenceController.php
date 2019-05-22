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
        $conference = Conference::create($request->all());
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
        if($conference->update($request->all()))
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
