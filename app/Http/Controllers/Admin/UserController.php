<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserEditRequest;
use App\Http\Requests\Admin\Users\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create( $request->all());
        if( $user)
        {
            $user->password = bcrypt($request->password);
            $user->save();
            SweetAlert::success('User created successfully', 'User Created');
        }
        else
        {
            SweetAlert::error('User was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $user->update($request->all());
        if(!empty($request->password))
        {
            $user->password=bcrypt($request->password);
            $user->save();
        }
        SweetAlert::success('User was updated.', 'User Updated');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        SweetAlert::success('User was deleted.', 'User Deleted');
        return redirect('/admin/users');
    }

    public function profile()
    {
        return Auth::user();
    }
}
