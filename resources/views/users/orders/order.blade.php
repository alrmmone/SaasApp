@extends('layouts.app')

@section('content')

    @if($message = Session::get('success'))
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                @include('users.fillters.order_f')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><i class="fa fa-list" aria-hidden="true">{{ __('   Order List') }}</i></div>
                            <div class="col col-md-6">
                                <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm float-end">Add Order</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary btn-sm float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa fa-filter">  Filter</i></button>
                        <br>
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Items</th>
                                <th>Note</th>
                                <th>Order_total</th>
                                <th>Status</th>
                                <th>In | Out</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                    <tr>
                                        <td><kbd><a href="{{ route('orders.show', ['order' => $order->id]) }}" style="color: #f7fafc" title="View User">{{ __('#') . $order->id }}</a></kbd></td>
                                        <td>{{ $order->items->count() }}</td>
                                        <td>{{ $order->note }}</td>
                                        <td>{{ $order->order_amount }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            @if($order->type == 1)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" style="background-color: green" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                                </div>
                                            @elseif($order->type == 0)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" style="background-color: orangered" role="switch" id="flexSwitchCheckDisabled" disabled>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.show', ['order' => $order->id]) }}" title="View order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">  View</i></button></a>
                                            <a href="{{ route('orders.edit', ['order' => $order->id]) }}" title="Invoice order"><button class="btn btn-success btn-sm"><i class="fa fa-receipt">  Invoice</i></button></a>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
