@extends('layouts.admin')

@section('title', 'Create Resource')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Resource</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/resources">Resources</a></li>
                <li class="breadcrumb-item active">Create Resource</li>
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
                            <h3 class="card-title">Create Resource</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/resources" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="link" type="text" class="form-control" placeholder="Link" value="{{old('link')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="document" type="file" class="form-control" placeholder="Document">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="category" class="form-control select2" >
                                                        <option @if(old('category')=="") selected="selected" @endif value="">Choose A Category</option>
                                                        <option @if(old('category')=="samples") selected="selected" @endif value="samples">Samples</option>
                                                        <option @if(old('category')=="information") selected="selected" @endif value="information">Information</option>
                                                        <option @if(old('category')=="policy") selected="selected" @endif value="policy">Policy</option>
                                                        <option @if(old('category')=="policymanual") selected="selected" @endif value="policymanual">Policy Manual</option>
                                                        <option @if(old('category')=="policeact") selected="selected" @endif value="policeact">Police Act</option>
                                                        <option @if(old('category')=="link") selected="selected" @endif value="link">Stakeholder Links</option>
                                                        <option @if(old('category')=="powerpoint") selected="selected" @endif value="powerpoint">Educational PowerPoint</option>
                                                        <option @if(old('category')=="goals") selected="selected" @endif value="goals">AAPG Strategic Goals</option>
                                                        <option @if(old('category')=="bylaws") selected="selected" @endif value="bylaws">AAPG Bylaws</option>
                                                        <option @if(old('category')=="minutes") selected="selected" @endif value="minutes">Meeting Minutes</option>
                                                        <option @if(old('category')=="board") selected="selected" @endif value="board">Board Member Portal</option>                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="description" class="form-control" placeholder="Description">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/resources" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create Resource</button>
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
