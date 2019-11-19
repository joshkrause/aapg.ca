@extends('layouts.admin')

@section('title', 'Create Meal Option ')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Create Meal Option</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
					<li class="breadcrumb-item active">Create Meal</li>
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
						<h3 class="card-title">Create Meal Option</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						@include('admin.partials.forms.errors')
						<form action="/admin/conferences/{{$conference->id}}/meal" method="post"
							enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Food Option</label>
											<input name="option" type="text" class="form-control"
												placeholder="ie) Roast Beef"
												value="{{old('option')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="appetizer" value="1">
												<label class="form-check-label">Appetizer</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="main_course" value="1">
												<label class="form-check-label">Main Course</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="dessert" value="1">
												<label class="form-check-label">Dessert</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="drink" value="1">
												<label class="form-check-label">Drink</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="other" value="1">
												<label class="form-check-label">Other</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<a href="/admin/conferences/{{$conference->id}}/schedule" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-success">Create Meal Option</button>
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