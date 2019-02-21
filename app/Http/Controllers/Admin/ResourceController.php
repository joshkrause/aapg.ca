<?php

namespace App\Http\Controllers\Admin;

use App\Resource;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Resources\ResourceCreateRequest;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('admin.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceCreateRequest $request)
    {
        if($resource = Resource::create($request->all()))
        {
            if ($request->hasFile('document')) {
                $file = $request->document;
                $path = Storage::putFile('files/resources', $file);
                $resource->file = $path;
                $resource->save();
            }
            SweetAlert::success('Resource created successfully', 'Resource Created');
        }
        else
        {
            SweetAlert::error('Resource was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/resources');
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
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceCreateRequest $request, Resource $resource)
    {
        if($resource->update($request->all()))
        {
            if ($request->hasFile('document')) {
                if(!empty($resource->document))
                {
                    Storage::delete($resource->file);
                }
                $file = $request->document;
                $path = Storage::putFile('files/resources', $file);
                $resource->file = $path;
                $resource->save();
            }
            SweetAlert::success('Resource updated successfully', 'Resource Updated');
        }
        else
        {
            SweetAlert::error('Resource was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/resources');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        if(!empty($resource->file))
        {
            Storage::delete($resource->file);
        }
        $resource->delete();
        SweetAlert::success('Resource deleted successfully', 'Resource Deleted');
        return redirect('admin/resources');
    }
}
