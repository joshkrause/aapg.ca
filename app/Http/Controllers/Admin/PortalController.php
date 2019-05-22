<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::where('category', 'board')->orderBy('meeting', 'desc')->latest()->get();
        return view('admin.portal.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($resource = Resource::create($request->all()))
        {
            if ($request->hasFile('document')) {
                $file = $request->document;
                $path = Storage::putFile('files/board', $file);
                $resource->file = $path;
                $resource->save();
            }
            Alert::success('Document created successfully', 'Document Created');
        }
        else
        {
            Alert::error('Document was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/portal');
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
    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        return view('admin.portal.edit', compact('resource'));
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
        $resource = Resource::findOrFail($id);
        if($resource->update($request->all()))
        {
            if ($request->hasFile('document')) {
                if(!empty($resource->document))
                {
                    Storage::delete($resource->file);
                }
                $file = $request->document;
                $path = Storage::putFile('files/board', $file);
                $resource->file = $path;
                $resource->save();
            }
            Alert::success('Document updated successfully', 'Document Updated');
        }
        else
        {
            Alert::error('Document was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/portal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        if(!empty($resource->file))
        {
            Storage::delete($resource->file);
        }
        $resource->delete();
        Alert::success('Document deleted successfully', 'Document Deleted');
        return redirect('admin/portal');
    }
}
