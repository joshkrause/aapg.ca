@extends('layouts.admin')

@section('title', 'Navigation')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Navigation</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
            <li class="breadcrumb-item active">Navigation</li>
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
                        <h3 class="card-title">Navigation Buttons</h3>
                        <div class="card-tools">
                            <a href="/admin/nav-buttons/create" class="btn btn-primary">
                                Add Navigation <i class="fa fa-file-text-o fw"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Parent</th>
                                    <th>Active</th>
                                    <th>Modify</th>
                                </tr>
                                @foreach($nav_buttons as $nav_button)
                                <tr>
                                    <td>{{ $nav_button->name }}</td>
                                    <td>{{ $nav_button->link }}</td>
                                    <td>{{ $nav_button->parent->name or 'NONE' }}</td>
                                    <td>{!! ynLabel($nav_button->active) !!}</td>
                                    <td>
                                        <form action="/admin/nav-buttons/{{$nav_button->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="/admin/nav-buttons/{{$nav_button->id}}/edit" class="btn btn-success btn-sm">Edit</a>
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

@section('css')
@stop

@section('scripts')
<script src="/assets/admin/js/lib/nestable/jquery.nestable.js"></script>
@stop

@section('js')

<script type="text/javascript">
	$(document).ready(function() {

		$('#nestable4').nestable({
			group: 2
		});

		$('.dd').on('change', function() {
			var order = $('.dd').nestable('serialize');
			// $.post( "/admin/nav-buttons/reorder", { order: order } );
			$.post( "/admin/nav-reorder", { _token: '{{csrf_token()}}', order: order } );
		});


	});
</script>

@stop