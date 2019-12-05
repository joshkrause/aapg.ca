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
							return [
								'date' => $item->start,
								'string' => "<strong>" . $item->start->format('l') . "</strong> <span> - " . $item->start->format('F j') . "</span>",
								'day' => $item->start->format('z'),
								'begin' => $item->start->format('Y-m-d') . ' 00:00:00',
								'end' => $item->start->format('Y-m-d') . ' 23:59:59',
							];
						});
					@endphp
					@foreach($days->unique('day') as $day)
					<li class=""><i class="far fa-calendar-alt"></i> {!!$day['string']!!} </li>
					@endforeach
				</ul>

			</div>
			<div class="col-sm-8 ">
				<ul class="block-tab">
					@foreach($days->unique('day') as $day)
					@php
						$events = $conference->events->where('start', '>=', $day['begin'])->where('start', '<=', $day['end'])->sortBy('start');
					@endphp
					<li @if($loop->first) class="active" @endif>
						@foreach($events as $event)

						@if($loop->first)
						<div class="block-date">
							<i class="far fa-calendar-alt"></i> <strong>{{$event->start->format('l')}}</strong> <span>-	{{$event->start->format('F d, Y')}}</span>
						</div>
						@endif
						<div class="block-detail">
							<span class="time">{{$event->start->format('g:i a')}} - {{$event->end->format('g:i a')}}</span>
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
				</h3>
				<div class="review-slider flexslider">
					<ul class="slides">

						<li>
							<blockquote>{{$package->description}}</blockquote>
							Discount Applied Automatically.
						</li>
					</ul>
				</div>
				@endforeach
			</div>
			@endif
			<div class="col-sm-8 ">
				@if(!empty($conference->options->regular_member_ticket_price))
				<div class="col-sm-12 col-md-6 col-lg-4">
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
				@endif
				@if(!empty($conference->options->regular_new_member_ticket_price))
				<div class="col-sm-12 col-md-6 col-lg-4">
					<ul class="block-tickets ">
						<li>
							<ul class="block-ticket">
								<li class="block-price"><span class="price"><span class="cur">$</span>
										@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now()
											&& $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
											@php
											$price = explode('.',
											number_format($conference->options->early_bird_new_member_ticket_price/100, 2));
											@endphp
											{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() &&
												$conference->options->registration_end >=Carbon\Carbon::now())
												@php
												$price = explode('.',
												number_format($conference->options->regular_new_member_ticket_price/100,
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
				@endif
				@if(!empty($conference->options->regular_non_member_ticket_price))
				<div class="col-sm-12 col-md-6 col-lg-4">
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
				@endif
			</div>
		</div>
		<!--End row-->
	</div>
	<!--End container-->
</section>
<!--End tickets section-->

@endsection

@section('registration')
<form class="registry-form form" id="checkout-form" method="post" action="/conferences/{{$conference->id}}/register" autocomplete="off"
	{{-- onSubmit="process(event);" --}}>
	@csrf
	<h2 class="sub-title-1 mb-30">Register For The AAPG Annual Conference 2019</h2>
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-3">
			<input placeholder="Contact Name" value="{{old('name')}}" id="name" name="name" type="text" required>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-3">
			<input placeholder="Contact Email" value="{{old('email')}}" id="email" name="email" type="text" required>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-3">
			<input placeholder="Contact Phone number" value="{{old('phone')}}" id="phone" name="phone" type="text">
		</div>
		<div class="col-sm-12 col-md-6 col-lg-3">
			<input placeholder="Community" value="{{old('company')}}" id="company" name="company" type="text">
		</div>
	</div>
	<hr>
	<div class="row" id="registration_row">
		<div class="col-sm-12 col-lg-4">
			<input placeholder="Name On Ticket" value="{{old('registrant[0]')}}" name="registrant[]" type="text">
		</div>
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="block-select">
				<select required name="ticket[]">
					<option value="">Choose Ticket Type</option>
					@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now() && $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
						@if(!empty($conference->options->early_bird_member_ticket_price))
							<option @if(old('ticket[0]') == "Early Bird Member Ticket") selected="selected" @endif
							value="Early Bird Member Ticket">Early Bird Member Ticket ( ${{c2d($conference->options->early_bird_member_ticket_price)}} )</option>
						@endif
						@if(!empty($conference->options->early_bird_non_member_ticket_price))
						<option @if(old('ticket[0]')=="Early Bird Non Member Ticket" ) selected="selected" @endif
							value="Early Bird Non Member Ticket">Early Bird Non Member Ticket ( ${{c2d($conference->options->early_bird_non_member_ticket_price)}} )</option>
						@endif
						@if(!empty($conference->options->early_bird_new_member_ticket_price))
						<option @if(old('ticket[0]')=="Early Bird New Member Ticket" ) selected="selected" @endif
							value="Early Bird New Member Ticket">Early Bird New Member Ticket ( ${{c2d($conference->options->early_bird_new_member_ticket_price)}} )</option>
						@endif
						@if(!empty($conference->options->early_bird_guest_ticket_price))
						<option @if(old('ticket[0]')=="Early Bird Guest Ticket" ) selected="selected" @endif
							value="Early Bird Guest Ticket">Early Bird Guest Ticket ( ${{c2d($conference->options->early_bird_guest_ticket_price)}} )</option>
						@endif
					@elseif($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=Carbon\Carbon::now())
						@if(!empty($conference->options->regular_member_ticket_price))
						<option @if(old('ticket[0]')=="Member Ticket" ) selected="selected" @endif
							value="Member Ticket">Member Ticket ( ${{c2d($conference->options->regular_member_ticket_price)}} )</option>
						@endif
						@if(!empty($conference->options->regular_non_member_ticket_price))
						<option @if(old('ticket[0]')=="Non Member Ticket" ) selected="selected" @endif
							value="Non Member Ticket">Non Member Ticket ( ${{c2d($conference->options->regular_non_member_ticket_price)}} )</option>
						@endif
						@if(!empty($conference->options->regular_new_member_ticket_price))
						<option @if(old('ticket[0]')=="New Member Ticket" ) selected="selected" @endif
							value="New Member Ticket">New Member Ticket ( ${{c2d($conference->options->regular_new_member_ticket_price)}} )</option>
						@endif
						@if(!empty($conference->options->regular_guest_ticket_price))
						<option @if(old('ticket[0]')=="Guest Ticket" ) selected="selected" @endif
							value="Guest Ticket">Guest Ticket ( ${{c2d($conference->options->regular_guest_ticket_price)}} )</option>
						@endif
					@endif
				</select>
			</div>
		</div>
		@if($conference->meal_selection_required)
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="block-select">
				<select required name="meal[]">
					<option value="">Meal Selection</option>
					@foreach($conference->meals as $meal)
					<option @if(old('meal[0]')== $meal->id ) selected="selected" @endif
						value="{{$meal->id}}">{{$meal->option}}</option>
					@endforeach
				</select>
			</div>
		</div>
		@endif
	</div>
	<div class="row" id="added_registrants">

	</div>
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-4">
			<button type="button" id="add_registrant" class="but submit">Add Another Registrant</button>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<div class="block-select">
				<select required name="payment">
					<option value="cc">Pay Now Via Credit Card</option>
					<option value="cheque">Pay Via Invoice</option>
				</select>
			</div>
		</div>

		<div class="col-sm-12 col-md-6">
			<input placeholder="Credit Card Number" value="" id="cc" name="cc" type="text">
		</div>
		<div class="col-sm-12 col-md-4">
			<input placeholder="Expiry Month MM" value="" id="month" name="month" type="text">
		</div>
		<div class="col-sm-6 col-md-4">
			<input placeholder="Expiry Year YY" value="" id="year" name="year" type="text">
		</div>
		<div class="col-sm-6 col-md-4">
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
		var regrow = $("#registration_row").html();

		$(document).on("click", '#add_registrant', function() {
			// console.log(htmStr);
			$("form #added_registrants").append(regrow);
		});
	</script>
@endsection
