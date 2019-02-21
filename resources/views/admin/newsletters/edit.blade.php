@extends('layouts.admin')

@section('title', 'Edit Newsletter')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Newsletter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/resources">Newsletters</a></li>
                <li class="breadcrumb-item active">Edit Newsletter</li>
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
                            <h3 class="card-title">Edit Newsletter</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/newsletters/{{$newsletter->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name', $newsletter->name)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="date" type="text" class="form-control datemask" placeholder="Date" value="{{old('date', $newsletter->date)}}" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="document" type="file" class="form-control" placeholder="Newsletter PDF">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="description" class="form-control" placeholder="Description">{{old('description', $newsletter->description)}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/newsletters" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Edit Newsletter</button>
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
<script src="/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $('.select2').select2();
        $('.datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    </script>
@stop
