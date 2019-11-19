@extends('layouts.admin')

@section('title', 'Create Schedule')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Create Schedule</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
					<li class="breadcrumb-item active">Create Schedule</li>
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
						<h3 class="card-title">Create Schedule</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						@include('admin.partials.forms.errors')
						<form action="/admin/conferences/{{$conference->id}}/schedule" method="post"
							enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event Title</label>
											<input name="title" type="text" class="form-control"
												placeholder="Event Title"
												value="{{old('title')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event Description</label>
											<textarea name="description" class="form-control" placeholder="Description">{{old('description')}}</textarea>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event Speaker</label>
											<input name="speaker" type="text" class="form-control" placeholder="Event Speaker" value="{{old('speaker')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event Location</label>
											<input name="location" type="text" class="form-control" placeholder="Event Location" value="{{old('location')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event Sponsor</label>
											<input name="sponsor" type="text" class="form-control" placeholder="Event Sponsor"
												value="{{old('sponsor')}}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event Start</label>
											<input name="start" type="text" class="form-control datetimepick"
												placeholder="Select Date and Time" value="{{old('start')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Event End</label>
											<input name="end" type="text" class="form-control datetimepick" placeholder="Select Date and Time"
												value="{{old('end')}}">
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<a href="/admin/conferences/{{$conference->id}}/schedule" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-success">Create Event</button>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>

@stop

@section('js')
<script>
	$('.select2').select2();
		$('.datetimepick').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			timePicker: true,
			minYear: 2019,
			maxYear: parseInt(moment().format('YYYY'),10),
			autoUpdateInput: false,
			"showDropdowns": true,
			"linkedCalendars": false,
			"buttonClasses": "btn btn-sm ",
			"applyButtonClasses": "btn-primary ",
			"cancelClass": "btn-default ",
			"locale": {
				"format": "YYYY-MM-DD HH:mm:ss",
				"separator": " - ",
			}
		});

		$('.datepick').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 2019,
			maxYear: parseInt(moment().format('YYYY'),10),
			autoUpdateInput: false,
			"showDropdowns": true,
			"linkedCalendars": false,
			"buttonClasses": "btn btn-sm ",
			"applyButtonClasses": "btn-primary ",
			"cancelClass": "btn-default ",
			"locale": {
				"format": "YYYY-MM-DD",
				"separator": " - ",
			}
		});
		$('.datepick').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('YYYY-MM-DD'));
		});
		$('.datetimepick').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
		});
</script>
@stop