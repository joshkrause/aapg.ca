@extends('layouts.admin')

@section('title', 'Board Portal')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Board Portal Documents</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item active">Board Portal</li>
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
                            <h3 class="card-title">All Documents</h3>
                            <div class="card-tools">
                                <a href="/admin/portal/create" class="btn btn-primary">
                                    Add Document <i class="fa fa-file-text-o fw"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Meeting</th>
                                        <th>File</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($resources as $resource)
                                    <tr>
                                        <td>{{$resource->id}}</td>
                                        <td>{{$resource->name}}</td>
                                        <td>{{$resource->meeting}}</td>
                                        <td>@unless(empty($resource->file))<a href="{{Storage::url($resource->file)}}">{{$resource->name}}</a> @endunless</td>
                                        <td>
                                            <form action="/admin/portal/{{$resource->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/portal/{{$resource->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
