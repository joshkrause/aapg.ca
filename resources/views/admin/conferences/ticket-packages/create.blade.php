@extends('layouts.admin')

@section('title', 'Create Ticket Package')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Create Ticket Package</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
					<li class="breadcrumb-item active">Create Ticket Package</li>
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
						<h3 class="card-title">Create Ticket Package</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						@include('admin.partials.forms.errors')
						<form action="/admin/conferences/{{$conference->id}}/ticket-packages" method="post"
							enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Package Name</label>
											<input name="name" type="text" class="form-control"
												placeholder="Package Name"
												value="{{old('name')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Package Description</label>
											<textarea name="description" class="form-control" placeholder="Description">{{old('description')}}</textarea>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Early Bird Price</label>
											<input name="early_bird_price" type="text" class="form-control"
												placeholder="0.00"
												value="{{old('early_bird_price')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Regular Price</label>
											<input name="price" type="text" class="form-control" placeholder="0.00"
												value="{{old('price')}}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Number of Member Tickets</label>
											<input name="member_tickets" type="text" class="form-control"
												placeholder="ie) 4"
												value="{{old('member_tickets')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Number of Non-Member Tickets</label>
											<input name="non_member_tickets" type="text" class="form-control" placeholder="ie) 4"
												value="{{old('non_member_tickets')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Number of New Member Tickets</label>
											<input name="new_member_tickets" type="text" class="form-control" placeholder="ie) 4"
												value="{{old('new_member_tickets')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Number of Guest Tickets</label>
											<input name="guest_tickets" type="text" class="form-control" placeholder="ie) 4"
												value="{{old('guest_tickets')}}">
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<a href="/admin/conferences/{{$conference->id}}/ticket-packages" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-success">Create Package</button>
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