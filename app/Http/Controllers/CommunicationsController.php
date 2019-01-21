<?php

namespace App\Http\Controllers;

use App\Question;
use App\Newsletter;
use Illuminate\Http\Request;

class CommunicationsController extends Controller
{
    public function newsletters()
    {
        $newsletters = Newsletter::all();
        return view('communications.newsletters', compact('newsletters'));
    }

    public function questions()
    {
        $questions = Question::where('active', true)->get();
        return view('communications.questions', compact('questions'));
    }
}
