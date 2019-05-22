<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $pages = Page::where('slug', '/')->get();
        if($pages->count() > 0)
        {
            $page = $pages->first();
        }
        else {
            $page = null;
        }
        return view('public.pages.home', compact('page'));
    }

    public function page($slug)
    {
        $pages = Page::where('slug', $slug)->get();
        if($pages->count() > 0)
        {
            $page = $pages->first();
        }
        else {
            abort(404);
        }

        return view('public.pages.custom', compact('page'));
    }
}
