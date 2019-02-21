@extends('layouts.admin')

@section('title', 'Conference Registrations')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Attendants</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/conferences">Conference</a></li>
                    <li class="breadcrumb-item active">Attendants</li>
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
                            <h3 class="card-title">All Attendants</h3>
                            <div class="card-tools">
                                <a href="/admin/conferences/registration/create" class="btn btn-primary">
                                    Add Attendants <i class="fa fa-file-user-plus fw"></i>
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
                                        <th>Cost</th>
                                        <th>Details</th>
                                        <th>Modify</th>
                                    </tr>
                                    @foreach($registrants as $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->ticket_type}}</td>
                                        <td>${{number_format($member->total/100, 2)}} @if(!empty($member->stripe_id))<br/> Paid Online @endif </td>
                                        <td>{{$member->description}}</td>
                                        <td>
                                            <form action="/admin/conferences/registration/{{$member->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/admin/conferences/registration/{{$member->id}}/edit" class="btn btn-success btn-sm">Edit</a>
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
