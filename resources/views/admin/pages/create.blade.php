@extends('layouts.admin')

@section('title', 'Create Page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
                <li class="breadcrumb-item active">Create Page</li>
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
                            <h3 class="card-title">Create Page</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/pages" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="hidden" name="builder" value="1">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" id="name-input" placeholder="Name" value="{{old('name')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="slug" type="text" class="form-control" id="slug-input" placeholder="Slug (url)" value="{{old('slug')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="active" class="form-control" >
                                                    <option @if(old('active')=="1") selected="selected" @endif value="1">Publish</option>
                                                    <option @if(old('active')=="0") selected="selected" @endif value="0">Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/pages" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create Page</button>
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
    <script>
            function slug(text)
            {
                return text.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
            }

            $(document).ready(function(){
                $('#name-input').keyup(function(){
                    $('#slug-input').val( slug($(this).val()));
                });

                $('#name-input').blur(function(){
                    $('#slug-input').val( slug($(this).val()));
                });
            });
        </script>
@stop
