<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Alert;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageBuilderFormRequest;
use App\Http\Requests\Admin\Pages\PageFormEditRequest;
use App\Http\Requests\Admin\Pages\PageFormCreateRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormCreateRequest $request)
    {
        $page = Page::create($request->all());

        Alert::success('New page was successfully added.', 'Added!');

        return $request->builder == 1
            ? redirect('/admin/pages/'.$page->id.'/builder')
            : redirect('/admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormEditRequest $request, Page $page)
    {
        $page->update($request->all());

        if( !empty($request->file('image')) )
        {
            $page->clearMediaCollection('feature');
            $page->addMediaFromRequest('image')->toMediaCollection('feature');
        }

        Alert::success('This information for this page was successfully updated.', 'Updated!');

        return redirect('/admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        Alert::success('This information for this page was successfully deleted.', 'Deleted!');
        return redirect('/admin/pages');
    }

    public function builder(Page $page)
    {
        return view('admin.pages.builder', compact('page'));
    }

    public function saveHtml(PageBuilderFormRequest $request, Page $page)
    {
        $page->html = $request->input('inpHtml');
        $page->save();
        Alert::success('This content for this page was successfully updated.', 'Updated!');
        return redirect('/admin/pages');
    }
}
