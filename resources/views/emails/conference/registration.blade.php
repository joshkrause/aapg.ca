<h1>New Conference Registration</h1>

<p>Registration Details:
    <br/>Name: {{$order->name}}
    <br/>Email: {{$order->email}}
    <br/>Community: {{$order->company}}
    <br/>Phone: {{$order->phone}}
</p>
<p>Ticket Details:
    <br/>Ticket Type: {{$order->ticket_type}}
    <br/>Quantity: {{$order->quantity}}
    <br/>Guests: {{$order->guests}}
    <br/>Total Charge: {{$order->total / 100}}
    <br/>@if(!empty($order->stripe_id))Charged with stripe. @else To be invoiced. @endif
</p>
<p>Description: {{$order->description}}</p>
<p>Notes: {{$order->notes}}</p>
