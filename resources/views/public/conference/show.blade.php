@extends('layouts.conference')

@section('content')

{!! $conference->description !!}

<!--Schedule section-->
<section id="schedule" class="schedule pt-120 pb-120">
	<!--Container-->
	<div class="container">
		<!--Row-->
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 mb-100 text-center">
				<h1 class="title">Conference Schedule</h1>
				<p class="title-lead mt-10">We are very excited about the program being planned for AAPG Annual
					Conference.</p>
			</div>
		</div>
		<!--End row-->
	</div>
	<!--End container-->
	<!--Container-->
	<div class="container">
		<!--Row-->
		<div class="row">
			<div class="col-sm-12">
				<h3 class="sub-title-0  mb-25"><span class="gradient-text">Conference Days</span></h3>
			</div>
		</div>
		<!--End row-->
	</div>
	<!--End container-->
	<!--Container-->
	<div class="container">
		<!--Row-->
		<div class="row">
			<div class="col-sm-4 ">
				<!--Tabs-->
				<ul class="block-tabs">
					@php
						$days = $conference->events->sortBy('start')->map(function($item, $key) {
							return ['date' => $item->start,'string' => "<strong>" . $item->start->format('l') . "</strong> <span> - " . $item->start->format('F j') . "</span>"];
						})->unique();
					@endphp
					@foreach($days as $day)
					<li class=""><i class="far fa-calendar-alt"></i> {!!$day['string']!!} </li>
					@endforeach
				</ul>
				<a href="{{asset('/storage/conference/2019/2019-aapg-conference-schedule.pdf')}}" class="but mt-30 "
					title="Download Program"> Download Program</a>
				<a href="{{asset('/storage/conference/2019/agm-call-for-nominiations.pdf')}}" class="but mt-30 "
					title="Download Program"> Call For Nominations</a>
				<a href="{{asset('/storage/conference/2019/agm-call-for-resolutions.pdf')}}" class="but mt-30 "
					title="Download Program"> Call For Resolutions</a>
				<a href="{{asset('/storage/conference/2019/rfp-host-conference.pdf')}}" class="but mt-30 "
					title="Download Program"> RFP To Host 2020 Conference</a>
			</div>
			<div class="col-sm-8 ">
				<ul class="block-tab">
					@foreach($days as $day)
					@php
						$events = $conference->events->sortBy('start')->where('start', $day['date']);
					@endphp
					<li @if($loop->first) class="active" @endif>
						@foreach($events as $event)
						<!-- Thursday -->
						<div class="block-date">
							<i class="far fa-calendar-alt"></i> <strong>{{$event->start->format('l')}}</strong> <span>-	{{$event->start->format('F d, Y')}}</span>
						</div>
						<div class="block-detail">
							<span class="time">{{$event->start->format('h:i a')}} - {{$event->start->format('h:i a')}}</span>
							<span class="topic">{{$event->title}}</span>
							<div class="block-text">
								<p>{{$event->description}}</p>
							</div>
						</div>
						@endforeach
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!--End row-->
	</div>
	<!--End container-->
</section>
<!--End schedule section-->

<!--Tickest section-->
<section id="tickets" class="tickets pt-120 pb-120">
	<!--Container-->
	<div class="container">
		<!--Row-->
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 mb-130 text-center">
				<h1 class="title">Conference Tickets</h1>
				@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->
					options->registration_end >= Carbon\Carbon::now())
					@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now() && $conference->
						options->early_bird_registration_end >=
						Carbon\Carbon::now())
						<p class="title-lead mt-10"><strong>Early Bird Tickets</strong> on sale until
							{{$conference->options->early_bird_registration_end->format('F d, Y')}}! <br> Grab them now
							before the price goes up
							@else
							<p class="title-lead mt-10">Tickets on sale until
								{{$conference->options->registration_end->format('F d, Y')}}! <br> Grab them now
								@endif

								@elseif($conference->options->registration_start <= Carbon\Carbon::now()) <p
									class="title-lead mt-10">Tickets go on sale
									{{$conference->options->registration_start->format('F d, Y')}}!
									@else
									<p class="title-lead mt-10">Tickets are no longer available for purchase! <br>
										Thanks for your support!
										@endif
									</p>
			</div>
		</div>
		<!--End row-->
	</div>
	<!--End container-->
	<!--Container-->
	<div class="container">
		<!--Row-->
		<div class="row vertical-align tickets">
			@if($conference->has('ticketPackages'))
			<div class="col-sm-4 ">
				@foreach($conference->ticketPackages as $package)
				<h3 class="sub-title-0  mb-20"><span class="gradient-text">{{$package->name}}
					</span><br><br />
					<span class="gradient-text">Discount Applied automatically.</span>
				</h3>
				<div class="review-slider flexslider">
					<ul class="slides">

						<li>
							<blockquote>{{$package->description}}</blockquote>
						</li>
					</ul>
				</div>
				@endforeach
			</div>
			@endif
			<div class="col-sm-8 ">
				<div class="col-sm-4">
					<ul class="block-tickets ">
						<li>
							<ul class="block-ticket active">
								<li class="block-price"><span class="price"><span class="cur">$</span>
										@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now()
											&& $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
											@php
											$price = explode('.',
											number_format($conference->options->early_bird_member_ticket_price/100, 2));
											@endphp
											{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() &&
												$conference->options->registration_end >=Carbon\Carbon::now())
												@php
												$price = explode('.',
												number_format($conference->options->regular_member_ticket_price/100,
												2));
												@endphp
												{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
												@endif
									</span><span class="block-type">Member Single Ticket</span></li>
								<li>Full Conference Access</li>
								<li>Gala Dinner</li>
								<li>All Sessions</li>
								@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->
									options->registration_end >=
									Carbon\Carbon::now())
									<li><a href="#register-modal" class="but mt-30 register-modal" data-vbtype="inline"
											title="Purchase Tickets"> Buy Ticket Now</a></li>
									@endif
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<ul class="block-tickets ">
						<li>
							<ul class="block-ticket">
								<li class="block-price"><span class="price"><span class="cur">$</span>
										@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now()
											&& $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
											@php
											$price = explode('.',
											number_format($conference->options->early_bird_member_ticket_price/100, 2));
											@endphp
											{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() &&
												$conference->options->registration_end >=Carbon\Carbon::now())
												@php
												$price = explode('.',
												number_format($conference->options->regular_member_ticket_price/100,
												2));
												@endphp
												{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
												@endif

									</span><span class="block-type">New Member Ticket</span></li>
								<li>Full Conference Access</li>
								<li>Gala Dinner</li>
								<li>All Sessions</li>
								@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->
									options->registration_end >=
									Carbon\Carbon::now())
									<li><a href="#register-modal" class="but mt-30 register-modal" data-vbtype="inline"
											title="Purchase Tickets"> Buy Ticket Now</a></li>
									@endif
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<ul class="block-tickets ">
						<li>
							<ul class="block-ticket">
								<li class="block-price"><span class="price"><span class="cur">$</span>
										@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now()
											&& $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
											@php
											$price = explode('.',
											number_format($conference->options->early_bird_non_member_ticket_price/100,
											2));
											@endphp
											{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() &&
												$conference->options->registration_end >=Carbon\Carbon::now())
												@php
												$price = explode('.',
												number_format($conference->options->regular_non_member_ticket_price/100,
												2));
												@endphp
												{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
												@endif

									</span><span class="block-type">Non Member Ticket</span></li>
								<li>Full Conference Access</li>
								<li>Gala Dinner</li>
								<li>All Sessions</li>
								@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->
									options->registration_end >=
									Carbon\Carbon::now())
									<li><a href="#register-modal" class="but mt-30 register-modal" data-vbtype="inline"
											title="Purchase Tickets"> Buy Ticket Now</a></li>
									@endif
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--End row-->
	</div>
	<!--End container-->
</section>
<!--End tickets section-->

@endsection

@section('registration')
<form class="registry-form form" id="checkout-form" method="post" action="/conferences" autocomplete="off"
	{{-- onSubmit="process(event);" --}}>
	@csrf
	<h2 class="sub-title-1 mb-30">Register For The AAPG Annual Conference 2019</h2>
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<input placeholder="Your Name" value="" id="name" name="name" type="text" required>
		</div>
		<div class="col-sm-6 col-md-3">
			<input placeholder="Your Email" value="" id="email" name="email" type="text" required>
		</div>
		<div class="col-sm-6 col-md-3">
			<input placeholder="Phone number" value="" id="phone" name="phone" type="text">
		</div>
		<div class="col-sm-6 col-md-3">
			<input placeholder="Community" value="" id="company" name="company" type="text">
		</div>
	</div>
	<div id="registrant">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="block-select">
				<select required name="ticket[]">
					<option value="">Choose Ticket Type</option>
					<option value="{{$conference->options->regular_member_ticket_price/100}}">Member Ticket ( ${{c2d($conference->options->regular_member_ticket_price)}} )</option>
					<option value="{{$conference->options->regular_non_member_ticket_price/100}}">Non Member Ticket ( ${{c2d($conference->options->regular_non_member_ticket_price)}} )</option>
					<option value="{{$conference->options->regular_guest_ticket_price/100}}">Guest Ticket ( ${{c2d($conference->options->regular_guest_ticket_price)}} )</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<input placeholder="Name On Ticket" value="" name="registrant[]" type="text">
		</div>
		@if($conference->meal_selection_required)
		<div class="col-sm-6 col-md-3">
			<div class="block-select">
				<select required name="meal[]">
					<option value="">Meal Selection</option>
					@foreach($conference->meals as $meal)
					<option value="{{$meal->id}}">{{$meal->option}}</option>
					@endforeach
				</select>
			</div>
		</div>
		@endif
		<div class="col-sm-6 col-md-3">
			<button type="button" id="add_registrant" class="but">Add Registrant</button>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="block-select">
				<select required name="payment">
					<option value="cc">Pay Now Via Credit Card</option>
					<option value="cheque">Pay Via Invoice</option>
				</select>
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<input placeholder="Credit Card Number" value="" id="cc" name="cc" type="text">
		</div>
		<div class="col-sm-6 col-md-2">
			<input placeholder="Expiry Month MM" value="" id="month" name="month" type="text">
		</div>
		<div class="col-sm-6 col-md-2">
			<input placeholder="Expiry Year YY" value="" id="year" name="year" type="text">
		</div>
		<div class="col-sm-6 col-md-2">
			<input placeholder="Security Code" value="" id="security" name="security" type="text">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<button class="but submit" type="submit">Purchase</button>
		</div>
		<div class="col-sm-12">
			<p>* All credit card transactions are encrypted and processed securly through Stripe.com</p>
			<p>* Guest Tickets are for the Gala Dinner only and cost $75. One guest ticket per full conference ticket.
			</p>
		</div>
	</div>
</form>
@endsection

@section('js')
	<script>
	$(document).ready(function() {
		$('#add_registrant').on('click', function() {
			alert('clicked');
		});
	});
	</script>
@endsection
