<h1>New {{$order->conference->title}} Registration</h1>

<p>Registration Contact Details:</p>
<p>
    <br/>Name: {{$order->name}}
    <br/>Email: {{$order->email}}
    <br/>Community: {{$order->company}}
	<br/>Phone: {{$order->phone}}
	<br/>@if(!empty($order->stripe_id))Charged with Stripe. @else To be invoiced. @endif
</p>
<p>Ticket Details:</p>
@foreach($tickets as $t)
<p>
    <br/>Ticket Type: {{$t->ticket}}
	<br/>Ticket Price: {{$t->ticket_price / 100}}
	<br/>Ticket Name: {{$t->name}}
	@if(!empty($t->meal_selection_id))
	<br/>Meal Selection: {{$t->meal->option}}
	@endif
</p>
	@endforeach
<p>Description: {{$order->description}}</p>
