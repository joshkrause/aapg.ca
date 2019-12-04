@extends('layouts.admin')

@section('title', 'Edit Conference')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Conference</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/conferences">Conferences</a></li>
					<li class="breadcrumb-item active">Edit Conference</li>
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
						<h3 class="card-title">Edit Conference</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						@include('admin.partials.forms.errors')
						<form action="/admin/conferences/{{$conference->id}}" method="post"
							enctype="multipart/form-data">
							@csrf
							@method('patch')
							<div class="card-body">
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Conference Title</label>
											<input name="title" type="text" class="form-control"
												placeholder="Conference Title"
												value="{{old('title', $conference->title)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Conference Type</label>
											<select name="affiliate" class="form-control">
												<option @if(old('affiliate')=="0" ) selected="selected" @endif
													value="0">
													AAPG Conference</option>
												<option @if(old('affiliate')=="1" ) selected="selected" @endif
													value="1">
													Affiliate Conference</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-12">
										<hr>
										<h5 class="text-center">If Affiliate Conference</h5>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Affiliate Conference Link</label>
											<input name="link" type="text" class="form-control"
												placeholder="Link To Affiliate Conference"
												value="{{old('link', $conference->link)}}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-12">
										<hr>
										<h5 class="text-center">Or If AAPG Conference</h5>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Header image</label>
											<input name="header_image" type="file" class="form-control"
												placeholder="Header Image" value="{{old('header_image')}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Live on Website</label>
											<input name="live" type="text" class="form-control datepick"
												placeholder="Choose Date"
												value="{{old('live', $conference->live->format('Y-m-d'))}}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Conference Start Date</label>
											<input name="start" type="text" class="form-control datepick"
												placeholder="Start Date"
												value="{{old('start', $conference->start->format('Y-m-d'))}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Conference End Date</label>
											<input name="end" type="text" class="form-control datepick"
												placeholder="End Date"
												value="{{old('end', $conference->end->format('Y-m-d'))}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Registration Start</label>
											<input name="registration_start" type="text"
												class="form-control datetimepick" placeholder="Select Date and Time"
												value="{{ old('registration_start', setFormattedDateOrNull($conference->options->registration_start, 'Y-m-d H:i:s')) }}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Registration End</label>
											<input name="registration_end" type="text" class="form-control datetimepick"
												placeholder="Select Date and Time"
												value="{{old('registration_end', setFormattedDateOrNull($conference->options->registration_end, 'Y-m-d H:i:s'))}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Early Bird Registration Start</label>
											<input name="early_bird_registration_start" type="text"
												class="form-control datetimepick" placeholder="Select Date and Time"
												value="{{old('early_bird_registration_start', setFormattedDateOrNull($conference->options->early_bird_registration_start, 'Y-m-d H:i:s'))}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Early Bird Registration End</label>
											<input name="early_bird_registration_end" type="text"
												class="form-control datetimepick" placeholder="Select Date and Time"
												value="{{old('early_bird_registration_end', setFormattedDateOrNull($conference->options->early_bird_registration_end, 'Y-m-d H:i:s'))}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Member Ticket Early Bird Price</label>
											<input name="early_bird_member_ticket_price" type="text"
												class="form-control" placeholder="0.00"
												value="{{old('early_bird_member_ticket_price', $conference->options->early_bird_member_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Member Ticket Regular Price</label>
											<input name="regular_member_ticket_price" type="text" class="form-control"
												placeholder="0.00"
												value="{{old('regular_member_ticket_price', $conference->options->regular_member_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Non-Member Early Bird Ticket Price</label>
											<input name="early_bird_non_member_ticket_price" type="text"
												class="form-control" placeholder="0.00"
												value="{{old('early_bird_non_member_ticket_price', $conference->options->early_bird_non_member_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Non-Member Ticket Regular Price</label>
											<input name="regular_non_member_ticket_price" type="text"
												class="form-control" placeholder="0.00"
												value="{{old('regular_non_member_ticket_price', $conference->options->regular_non_member_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>New Member Early Bird Ticket Price</label>
											<input name="early_bird_new_member_ticket_price" type="text" class="form-control" placeholder="0.00"
												value="{{old('early_bird_new_member_ticket_price', $conference->options->early_bird_new_member_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>New Member Ticket Regular Price</label>
											<input name="regular_new_member_ticket_price" type="text" class="form-control" placeholder="0.00"
												value="{{old('regular_new_member_ticket_price', $conference->options->regular_new_member_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Guest Ticket Early Bird Price</label>
											<input name="early_bird_guest_ticket_price" type="text" class="form-control"
												placeholder="0.00"
												value="{{old('early_bird_guest_ticket_price', $conference->options->early_bird_guest_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Guest Ticket Regular Price</label>
											<input name="regular_guest_ticket_price" type="text" class="form-control"
												placeholder="0.00"
												value="{{old('regular_guest_ticket_price', $conference->options->regular_guest_ticket_price/100)}}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Meal Selection Required</label>
											<select name="meal_selection_required" class="form-control">
												<option @if(old('meal_selection_required', $conference->
													meal_selection_required)=="1") selected="selected"
													@endif value="1">Meal Selection Required</option>
												<option @if(old('meal_selection_required', $conference->
													meal_selection_required)=="0") selected="selected"
													@endif value="0">No Meal Selection Required</option>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="form-row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Conference Status</label>
											<select name="active" class="form-control">
												<option @if(old('active', $conference->active)=="0") selected="selected"
													@endif value="0">Draft</option>
												<option @if(old('active', $conference->active)=="1") selected="selected"
													@endif value="1">Published</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<a href="/admin/conferences" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-success">Save Changes</button>
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