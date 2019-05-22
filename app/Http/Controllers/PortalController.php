<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $next = Resource::select('meeting')->where('category', 'board')->orderBy('meeting', 'desc')->first();
        $archive = Resource::where('category', 'board')->where('meeting', '!=', $next->meeting)->latest()->get();
        $resources = Resource::where('category', 'board')->where('meeting', $next->meeting)->latest()->get();
        return view('board.portal', compact('resources', 'archive'));
    }
}
