@extends('layouts.admin')

@section('title', 'Edit Sponsor')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Sponsor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/sponsors">Sponsors</a></li>
                <li class="breadcrumb-item active">Edit Sponsor</li>
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
                            <h3 class="card-title">Edit Sponsor</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/sponsors/{{$sponsor->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name', $sponsor->name)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="document" type="file" class="form-control" placeholder="Picture">
                                                @unless(empty($sponsor->file)) <small><a href="{{Storage::url($sponsor->file)}}">Image</a></small> @endunless
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="link" type="text" class="form-control" placeholder="Link" value="{{old('link', $sponsor->link)}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="site" class="form-control" >
                                                    <option @if(old('site', $sponsor->site)=="0") selected="selected" @endif value="0">Not On Website</option>
                                                    <option @if(old('site', $sponsor->site)=="1") selected="selected" @endif value="1">On Website</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="conference" class="form-control" >
                                                    <option @if(old('conference', $sponsor->conference)=="0") selected="selected" @endif value="0">Not On Conference</option>
                                                    <option @if(old('conference', $sponsor->conference)=="1") selected="selected" @endif value="1">On Conference</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/sponsors" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Edit Sponsor</button>
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

@section('js')
    <script>
        $('.select2').select2();
    </script>
@stop
