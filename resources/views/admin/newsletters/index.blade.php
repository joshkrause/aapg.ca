@extends('layouts.admin')

@section('title', 'Newsletters')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Newsletters</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item active">Newsletters</li>
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
                            <h3 class="card-title">All Newsletters</h3>
                            <div class="card-tools">
                                <a href="/admin/newsletters/create" class="btn btn-primary">
                                    Add Newsletter <i class="fa fa-file-text-o fw"></i>
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
                                        <th>Date</th>
                                        <th>File</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($newsletters as $newsletter)
                                    <tr>
                                        <td>{{$newsletter->id}}</td>
                                        <td>{{$newsletter->name}}</td>
                                        <td>{{$newsletter->date}}</td>
                                        <td>{{$newsletter->file}}</td>
                                        <td>
                                            <form action="/admin/newsletters/{{$newsletter->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/newsletters/{{$newsletter->id}}/edit" class="btn btn-success btn-sm">Edit</a>
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
