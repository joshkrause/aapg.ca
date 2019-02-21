@extends('layouts.admin')

@section('title', 'Edit ' .$user->name)

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit {{$user->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
                <li class="breadcrumb-item active">Edit {{$user->name}}</li>
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
                            <h3 class="card-title">Edit {{$user->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/users/{{$user->id}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{$user->name}}">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input name="password" type="password" class="form-control" placeholder="Change Password">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="New Password Again">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/users" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
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
