<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($sponsor = Sponsor::create($request->except('document')))
        {
            if ($request->hasFile('document')) {
                $file = $request->document;
                $path = Storage::putFile('files/sponsor', $file);
                $sponsor->file = $path;
                $sponsor->save();
            }
            Alert::success('Sponsor created successfully', 'Sponsor Created');
        }
        else
        {
            Alert::error('Sponsor was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/sponsors');
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
    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        if($sponsor->update($request->except('document')))
        {
            if ($request->hasFile('document')) {
                if(!empty($sponsor->document))
                {
                    Storage::delete($sponsor->file);
                }
                $file = $request->document;
                $path = Storage::putFile('files/sponsor', $file);
                $sponsor->file = $path;
                $sponsor->save();
            }
            Alert::success('Sponsor updated successfully', 'Sponsor Updated');
        }
        else
        {
            Alert::error('Sponsor was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/sponsors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        if(!empty($sponsor->file))
        {
            Storage::delete($sponsor->file);
        }
        $sponsor->delete();
        Alert::success('Sponsor deleted successfully', 'Sponsor Deleted');
        return redirect('admin/sponsors');
    }
}
