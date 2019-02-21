@extends('layouts.admin')

@section('title', 'Create Member')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Member</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/members">Members</a></li>
                <li class="breadcrumb-item active">Create Members</li>
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
                            <h3 class="card-title">Create Members</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            <form action="/admin/members" method="post" enctype="multipart/form-data">
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
                                                <input name="joined" type="text" class="form-control" placeholder="Joined (Year)" value="{{old('joined')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="type" class="form-control select2" >
                                                        <option @if(old('type')=="") selected="selected" @endif value="">Membership Type</option>
                                                        <option @if(old('type')=="Commission") selected="selected" @endif value="Commission">Commission</option>
                                                        <option @if(old('type')=="Committee") selected="selected" @endif value="Committee">Committee</option>
                                                        <option @if(old('type')=="Associate") selected="selected" @endif value="Associate">Associate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/members" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create Member</button>
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
