<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class CommunicationsController extends Controller
{
    public function newsletters()
    {
        $newsletters = Newsletter::orderBy('Date', 'desc')->get();
        return view('communications.newsletters', compact('newsletters'));
    }
}
