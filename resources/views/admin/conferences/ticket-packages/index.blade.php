@extends('layouts.admin')

@section('title', 'Ticket Packages')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ticket Packages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
                    <li class="breadcrumb-item active">Ticket Packages</li>
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
                            <h3 class="card-title">All Packages</h3>
                            <div class="card-tools">
                                <a href="/admin/conferences/{{$conference->id}}/ticket-packages/create" class="btn btn-primary">
                                    Add Package <i class="fa fa-file-user-plus fw"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Conference</th>
                                        <th>Packages</th>
                                        <th>Modify</th>
                                    </tr>
									@foreach($conference->ticketPackages as $package)
                                    <tr>
                                        <td>{{$package->id}}</td>
                                        <td>{{$conference->title}}</td>
                                        <td>{{$package->name}}</td>
                                        <td>
                                            <form action="/admin/conferences/{{$conference->id}}/ticket-packages" method="POST">
                                                @csrf
                                                @method('delete')
												<a href="/admin/conferences/{{$conference->id}}/ticket-packages/{{$package->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
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
