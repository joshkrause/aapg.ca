<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $board = Board::all();
        return view('board.index', compact('board'));
    }
}
