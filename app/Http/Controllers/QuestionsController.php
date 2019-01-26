<?php

namespace App\Http\Controllers;

use Alert;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function questions()
    {
        $questions = Question::where('active', true)->get();
        return view('communications.questions', compact('questions'));
    }

    public function submit(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'question'=>    'required',
            'name'=>        'required',
            'email'=>       'required|email',
        ]);

        if($validated->fails())
        {
            $errors = collect($validated->errors()->all());
            Alert::error($errors->flatten()->implode("<br/>"), 'Whoops')->html()->persistent('Got It');
        }
        else {
            $question = new Question;
            $question->fill($request->except(['_token']));
            $question->save();
            Alert::success("We received your question!", 'Great!')->persistent('Got It');
        }

        return back();
    }
}
