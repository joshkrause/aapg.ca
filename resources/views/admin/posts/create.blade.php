@extends('layouts.admin')

@section('title', 'Create Posts')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/posts">Posts</a></li>
                <li class="breadcrumb-item active">Create Post</li>
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
                            <h3 class="card-title">Create Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="{{old('title')}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="section" class="form-control" >
                                                    <option @if(old('section')=="") selected="selected" @endif value="">Choose A Section</option>
                                                    <option @if(old('section')=="hottopics") selected="selected" @endif value="hottopics">Hot Topics</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="content" class="form-control redactor-textarea" placeholder="Content">{{old('content')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="image">Feature Image</label>
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-camera"></i></span>
                                                </div>
                                                <input name="image" type="file" class="form-control" placeholder="Feature Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="featured" class="form-control" >
                                                    <option @if(old('featured')=="0") selected="selected" @endif value="0">Not Featured</option>
                                                    <option @if(old('featured')=="1") selected="selected" @endif value="1">Featured</option>
                                                </select>
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
                                    <a href="/admin/posts" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create Post</button>
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
    @include('admin.partials.forms.redactor-scripts')
@stop
