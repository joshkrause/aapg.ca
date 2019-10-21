@extends('layouts.admin')

@section('title', 'Edit Conference')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Conference</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
                <li class="breadcrumb-item active">Edit Conference</li>
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
                            <h3 class="card-title">Edit Conference</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/conferences/{{$conference->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="title" type="text" class="form-control" placeholder="Conference Title" value="{{old('title', $conference->title)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="live" type="text" class="form-control" placeholder="Registration Start Date" value="{{old('live', $conference->live->format('Y-m-d'))}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="start" type="text" class="form-control" placeholder="Start Date" value="{{old('start', $conference->start->format('Y-m-d'))}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="end" type="text" class="form-control" placeholder="End Date" value="{{old('end', $conference->end->format('Y-m-d'))}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="affiliate" class="form-control" >
                                                    <option @if(old('affiliate')=="0") selected="selected" @endif value="0">AAPG Conference</option>
                                                    <option @if(old('affiliate')=="1") selected="selected" @endif value="1">Affiliate Conference</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="link" type="text" class="form-control" placeholder="Link To Affiliate Conference" value="{{old('link', $conference->link)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="active" class="form-control" >
                                                    <option @if(old('active', $conference->active)=="0") selected="selected" @endif value="0">Draft</option>
                                                    <option @if(old('active', $conference->active)=="1") selected="selected" @endif value="1">Published</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/conferences" class="btn btn-danger">Cancel</a>
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

@section('js')
    <script>
        $('.select2').select2();
    </script>
@stop
