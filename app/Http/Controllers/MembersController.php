<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }
}
