@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
                <li class="breadcrumb-item active">Create User</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/users" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name')}}">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Password Again">
                                    </div>
                                    <div class="form-group">
                                        <select name="board" class="form-control" >
                                            <option @if(old('board')=="0") selected="selected" @endif value="0">No Board Access</option>
                                            <option @if(old('board')=="1") selected="selected" @endif value="1">Board Access</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="admin" class="form-control" >
                                            <option @if(old('admin')=="0") selected="selected" @endif value="0">No Admin Access</option>
                                            <option @if(old('admin')=="1") selected="selected" @endif value="1">Admin Access</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/users" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create User</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@stop
