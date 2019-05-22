@extends('layouts.admin')

@section('title', 'Sponsors')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sponsors</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item active">Sponsors</li>
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
                            <h3 class="card-title">All Sponsors</h3>
                            <div class="card-tools">
                                <a href="/admin/sponsors/create" class="btn btn-primary">
                                    Add Sponsor <i class="fa fa-file-text-o fw"></i>
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
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Placement</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($sponsors as $sponsor)
                                    <tr>
                                        <td>{{$sponsor->id}}</td>
                                        <td>{{$sponsor->name}}</td>
                                        <td>{{$sponsor->link}}</td>
                                        <td>@unless(empty($sponsor->file))<a href="{{Storage::url($sponsor->file)}}">Image</a> @endunless</td>
                                        <td>Website: {{b2yn($sponsor->site)}}<br/>
                                            Conference: {{b2yn($sponsor->conference)}}</td>
                                        <td>
                                            <form action="/admin/sponsors/{{$sponsor->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/sponsors/{{$sponsor->id}}/edit" class="btn btn-success btn-sm">Edit</a>
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
