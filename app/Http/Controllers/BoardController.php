<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $board = Board::orderBy('sort')->get();
        return view('board.index', compact('board'));
    }
}
