@extends('layouts.admin')

@section('title', 'Conferences')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Conferences</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Conferences</li>
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
                            <h3 class="card-title">All Conferences</h3>
                            <div class="card-tools">
                                <a href="/admin/conferences/create" class="btn btn-primary">
                                    Add Conference <i class="fa fa-file-user-plus fw"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Afilliate</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($conferences as $conference)
                                    <tr>
                                        <td>{{$conference->id}}</td>
                                        <td>{{$conference->title}}</td>
                                        <td>{{$conference->date}}</td>
                                        <td>{{$conference->affiliate}}</td>
                                        <td>
                                            <form action="/admin/conferences/{{$conference->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/conferences/{{$conference->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                                @if(!$conference->affiliate)<a href="/admin/conferences/{{$conference->id}}/builder" class="btn btn-success btn-sm">Page Builder</a>@endif
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
