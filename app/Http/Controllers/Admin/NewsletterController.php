<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('admin.newsletters.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($newsletter = Newsletter::create($request->all()))
        {
            if ($request->hasFile('file')) {
                $file = $request->file;
                $path = Storage::putFile('files/newsletters', $file);
                $newsletter->file = $path;
                $newsletter->save();
            }
            Alert::success('Newsletter created successfully', 'Newsletter Created');
        }
        else
        {
            Alert::error('Newsletter was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/newsletters');
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
    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletters.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        if($newsletter->update($request->all()))
        {
            if ($request->hasFile('file')) {
                $file = $request->file;
                $path = Storage::putFile('files/newsletters', $file);
                $newsletter->file = $path;
                $newsletter->save();
            }
            Alert::success('Newsletter updated successfully', 'Newsletter Updated');
        }
        else
        {
            Alert::error('Newsletter was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/newsletters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        if( !empty($newsletter->file) )
        {
            Storage::delete($newsletter->file);
        }
        $newsletter->delete();
        Alert::success('Newsletter deleted successfully', 'Newsletter Deleted');
        return redirect('admin/newsletters');
    }
}
