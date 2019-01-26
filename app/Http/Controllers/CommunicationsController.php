<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class CommunicationsController extends Controller
{
    public function newsletters()
    {
        $newsletters = Newsletter::all();
        return view('communications.newsletters', compact('newsletters'));
    }
}
