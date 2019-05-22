@extends('layouts.admin')

@section('title', 'Create Conference')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Conference</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
                <li class="breadcrumb-item active">Create Conference</li>
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
                            <h3 class="card-title">Create Conference</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/conferences" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="title" type="text" class="form-control" placeholder="Conference Title" value="{{old('title')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="live" type="text" class="form-control" placeholder="Registration Start Date" value="{{old('live')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="start" type="text" class="form-control" placeholder="Start Date" value="{{old('start')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="end" type="text" class="form-control" placeholder="End Date" value="{{old('end')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="description" class="form-control redactor-textarea" placeholder="Conference Description">{{old('description')}}</textarea>
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
                                                <input name="link" type="text" class="form-control" placeholder="Link To Affiliate Conference" value="{{old('link')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="active" class="form-control" >
                                                    <option @if(old('active')=="0") selected="selected" @endif value="0">Draft</option>
                                                    <option @if(old('active')=="1") selected="selected" @endif value="1">Published</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/conferences" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create Conference</button>
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
