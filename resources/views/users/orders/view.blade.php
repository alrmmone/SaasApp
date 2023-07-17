@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6">Order Details</div>
                            <div class="col col-md-6">
                                <a href="{{ route('orders.index') }}" class="btn btn-primary btn- sm float-end">View All</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @foreach($order_items as $order_item)
                    <div class="card-body">
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Item Name :') }}</label>
                            <div class="col-md-6">
                                <p>{{ $order_item->item->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Quantity :') }}</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $order_item->quantity }}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Note :') }}</label>
                            <div class="col-md-6">
                                <p>{{ $order->note }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Order_total :') }}</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $order->order_amount }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Status :') }}</label>
                            <div class="col-md-6">
                                <p>{{ $order->status }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Created_at :') }}</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $order->created_at }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Updated_at :') }}</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $order->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection
