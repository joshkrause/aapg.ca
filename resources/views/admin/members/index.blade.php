@extends('layouts.admin')

@section('title', 'Members')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Members</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"><a href="/admin">Admin"</a></li>
                <li class="breadcrumb-item active">Members</li>
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
                            <h3 class="card-title">All Members</h3>
                            <div class="card-tools">
                                <a href="/admin/members/create" class="btn btn-primary">
                                    Add Member <i class="fa fa-file-text-o fw"></i>
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
                                        <th>Type</th>
                                        <th>Joined</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($members as $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->type}}</td>
                                        <td>{{$member->joined}}</td>
                                        <td>
                                            <form action="/admin/members/{{$member->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/members/{{$member->id}}/edit" class="btn btn-success btn-sm">Edit</a>
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
