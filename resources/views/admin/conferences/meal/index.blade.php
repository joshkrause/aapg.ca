@extends('layouts.admin')

@section('title', 'Meal Selections')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Meal Selections</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
                    <li class="breadcrumb-item active">Meal Selections</li>
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
                            <h3 class="card-title">All Selections</h3>
                            <div class="card-tools">
                                <a href="/admin/conferences/{{$conference->id}}/meal/create" class="btn btn-primary">
                                    Add Meal Selection <i class="fa fa-file-user-plus fw"></i>
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
										<th>Option</th>
										<th>Course</th>
                                        <th>Modify</th>
                                    </tr>
									@foreach($conference->meals as $meal)
                                    <tr>
                                        <td>{{$meal->id}}</td>
                                        <td>{{$conference->title}}</td>
										<td>{{$meal->option}}</td>
										<td>
											@if($meal->appetizer)
												Appetizer
											@endif

											@if($meal->main_course)
												Main Course
											@endif

											@if($meal->dessert)
												Dessert
											@endif

											@if($meal->drink)
												Drink
											@endif

											@if($meal->other)
											Other
											@endif
										</td>
                                        <td>
                                            <form action="/admin/conferences/{{$conference->id}}/meal/{{$meal->id}}" method="POST">
                                                @csrf
                                                @method('delete')
												<a href="/admin/conferences/{{$conference->id}}/meal/{{$meal->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
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
