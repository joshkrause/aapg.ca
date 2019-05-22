@extends('layouts.admin')

@section('title', 'Pages')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"><a href="/admin">Admin"</a></li>
                <li class="breadcrumb-item active">Pages</li>
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
                            <h3 class="card-title">All Pages</h3>
                            <div class="card-tools">
                                <a href="/admin/pages/create" class="btn btn-primary">
                                    Add Page <i class="fa fa-file-text-o fw"></i>
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
                                        <th>Slug</th>
                                        <th>Published</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>{{$page->name}}</td>
                                        <td>{{$page->slug}}</td>
                                        <td>{{b2yn($page->active)}}</td>
                                        <td>
                                            <form action="/admin/pages/{{$page->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/pages/{{$page->id}}/edit" class="btn btn-success btn-sm">Edit Details</a>
                                                <a href="/admin/pages/{{$page->id}}/builder" class="btn btn-success btn-sm">Page Builder</a>
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
