<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Alert;
use App\Page;
use App\NavButton;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NavButtonFormRequest;

class NavButtonController extends Controller
{
    public function reorder(Request $request)
    {
        $buttons = $request->order;
        $this->recursiveReorder($buttons, null);
        return 'ok';
    }
    public function recursiveReorder($buttons, $parent_id)
    {
        $sort = 1;
        foreach($buttons as $group)
        {
            $btn = NavButton::find($group['id']);
            $btn->update([
                'sort_order' => $sort,
                'parent_id' => $parent_id,
            ]);

            if(!empty($group['children']))
            {
                $this->recursiveReorder($group['children'], $btn->id);
            }
            $sort++;
        }
    }


    public function admin()
    {
        $top_level = NavButton::topLevel()->get();
        $nav_buttons = NavButton::all();
        return view('admin.nav-buttons.admin', compact('nav_buttons', 'top_level'));
    }

    public function index()
    {
        $top_level = NavButton::topLevel()->get();
        $nav_buttons = NavButton::all();
        return view('admin.nav-buttons.index', compact('nav_buttons', 'top_level'));
    }

    public function show(NavButton $nav_button)
    {
        return view('admin.nav-buttons.show', compact('nav_button'));
    }

    public function create()
    {
        return $this->edit(new NavButton);
    }

    public function edit(NavButton $nav_button)
    {
        $nav_buttons = NavButton::topLevel()->get();
        $pages = Page::all();
        return view('admin.nav-buttons.create', compact('nav_button', 'nav_buttons', 'pages'));
    }

    // add a nav_button to the db
    public function store(NavButtonFormRequest $request)
    {
        if(empty($request->sort_order))
        {
            array_forget($request, 'sort_order');
        }
        $nav_button = NavButton::create($request->all());

        Alert::success('New navigation button was successfully added.', 'Added!');
        return redirect('/admin/nav-buttons');
    }

    public function update(NavButtonFormRequest $request, NavButton $nav_button)
    {

        $nav_button->update($request->all());

        Alert::success('This information for this navigation button was successfully updated.', 'Updated!');
        return redirect('/admin/nav-buttons');
    }

    public function destroy(NavButton $nav_button)
    {
        $nav_button->delete();
        Alert::success('This information for this navigation button was successfully deleted.', 'Deleted!');
        return redirect('/admin/nav-buttons');
    }
}
