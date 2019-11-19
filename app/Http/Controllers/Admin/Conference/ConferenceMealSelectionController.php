<?php


namespace App\Http\Controllers\Admin\Conference;

use App\Conference;
use Illuminate\Http\Request;
use App\ConferenceMealSelection;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;

class ConferenceMealSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conference $conference)
    {
        return view('admin.conferences.meal.index', compact('conference'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Conference $conference)
    {
		return view('admin.conferences.meal.create', compact('conference'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Conference $conference)
    {
        $conference->meals()->create($request->all());

		SweetAlert::success('Meal option created successfully', 'Option Created');
		return Redirect('admin/conferences/'.$conference->id.'/meal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConferenceMealSelection  $conferenceMealSelection
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceMealSelection $conferenceMealSelection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConferenceMealSelection  $conferenceMealSelection
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference, $id)
    {
		$meal = ConferenceMealSelection::findOrFail($id);
        return view('admin.conferences.meal.edit', compact('conference', $meal));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConferenceMealSelection  $conferenceMealSelection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConferenceMealSelection $conferenceMealSelection)
    {
		$meal = ConferenceMealSelection::findOrFail($id);
		$meal->update($request->all())
        SweetAlert::success('Meal option updated successfully', 'Option Updated');
		return Redirect('admin/conferences/'.$conference->id.'/meal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConferenceMealSelection  $conferenceMealSelection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference, $id)
    {
		$meal = ConferenceMealSelection::findOrFail($id);
		$meal->delete();
		SweetAlert::success('Meal option deleted successfully', 'Option Deleted');
		return back();
    }
}
