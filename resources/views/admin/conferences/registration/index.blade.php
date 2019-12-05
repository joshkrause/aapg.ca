@extends('layouts.admin')

@section('title', 'Conference Registrations')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Attendants</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/conferences">Conference</a></li>
                    <li class="breadcrumb-item active">Attendants</li>
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
                            <h3 class="card-title">{{$conference->title}} Attendants</h3>
                            {{-- <div class="card-tools">
                                <a href="/admin/conferences/registration/create" class="btn btn-primary">
                                    Add Attendants <i class="fa fa-file-user-plus fw"></i>
                                </a>
                            </div> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
										<th>Order ID</th>
                                        <th>Name</th>
                                        <th>Tickets</th>
                                        <th>Cost</th>
                                    </tr>
                                    @foreach($conference->orders->reverse() as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>@foreach($order->tickets as $ticket)
											{{$ticket->ticket}} - {{$ticket->name}}<br />
											@if( !empty($ticket->meal)) Meal Choice: {{$ticket->meal->option}}<br /> @endif
											@endforeach
										</td>
                                        <td>${{number_format($order->total/100, 2)}} @if(!empty($order->stripe_id))<br/> Paid Online @endif </td>

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
