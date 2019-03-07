<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $resources = Resource::where('category', 'board')->latest()->get();
        return view('board.portal', compact('resources'));
    }
}
