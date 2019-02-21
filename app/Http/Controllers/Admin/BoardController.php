<?php

namespace App\Http\Controllers\Admin;

use App\Board;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Board\BoardEditRequest;
use App\Http\Requests\Admin\Board\BoardCreateRequest;

class BoardController extends Controller
{

    public function index()
    {
        $members = Board::all();
        return view('admin.board.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.board.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardCreateRequest $request)
    {
        if($member = Board::create($request->all()))
        {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $path = Storage::putFile('images/board', $file);
                $member->image = $path;
                $member->save();
            }
            SweetAlert::success('Member created successfully', 'Member Created');
        }
        else
        {
            SweetAlert::error('Member was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/board');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        return view('admin.board.edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoardEditRequest $request, Board $board)
    {
        if($board->update($request->all()))
        {
            if ($request->hasFile('image')) {
                if(!empty($board->image))
                {
                    Storage::delete($board->image);
                }
                $file = $request->image;
                $path = Storage::putFile('images/board', $file);
                $board->image = $path;
                $board->save();
            }
            SweetAlert::success('Member updated successfully', 'Member Updated');
        }
        else
        {
            SweetAlert::error('Member was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/board');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        if(!empty($board->image))
        {
            Storage::delete($board->image);
        }
        $board->delete();
        SweetAlert::success('Member deleted successfully', 'Member Deleted');
        return redirect('admin/board');
    }
}
