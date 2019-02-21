@extends('layouts.admin')

@section('title', 'Edit Board Members')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Board Member</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/board">Board</a></li>
                <li class="breadcrumb-item active">Edit Member</li>
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
                            <h3 class="card-title">Edit {{$board->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/board/{{$board->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('Patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name', $board->name)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                </div>
                                                <input name="community" type="text" class="form-control" placeholder="Community" value="{{old('community', $board->community)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                                </div>
                                                <input name="position" type="text" class="form-control" placeholder="Position" value="{{old('position', $board->position)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-sort"></i></span>
                                                </div>
                                                <input name="sort" type="text" class="form-control" placeholder="Sort Order" value="{{old('sort', $board->sort)}}" aria-describedby="sortHelp">
                                            </div>
                                            <small id="sortHelp" class="form-text text-muted">Lower numbers are shown first.</small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="bio" class="form-control" placeholder="Bio">{{old('bio', $board->bio)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-camera"></i></span>
                                                </div>
                                                <input name="image" type="file" class="form-control" placeholder="Profile Picture">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/board" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Update Member</button>
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
