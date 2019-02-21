<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberCreateRequest;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('joined', 'ASC')->get();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        if($member = Member::create($request->all()))
        {
            SweetAlert::success('Member created successfully', 'Member Created');
        }
        else
        {
            SweetAlert::error('Member was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/members');
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
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberCreateRequest $request, Member $member)
    {
        if($member->update($request->all()))
        {
            SweetAlert::success('Member updated successfully', 'Member Updated');
        }
        else
        {
            SweetAlert::error('Member was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        SweetAlert::success('Member deleted successfully', 'Member Deleted');
        return back();
    }
}
