<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $commission = Member::where('type', 'commission')->orderBy('name')->get();
        $associate = Member::where('type', 'associate')->orderBy('name')->get();
        $committee = Member::where('type', 'committee')->orderBy('name')->get();
        return view('members.index', compact('commission', 'associate', 'committee'));
    }

    public function apply()
    {
        return view('members.apply');
    }
}
