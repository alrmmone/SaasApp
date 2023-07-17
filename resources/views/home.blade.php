@extends('layouts.app')

@section('content')

    @if($message = Session::get('error'))
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @endif

    @if(Auth::user()->role_id == 1)
    <div class="container">
    <div class="row">
        <div class="col-sm-3 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Items :</h5>
                    <p class="card-text">{{ $sum_item }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Category :</h5>
                    <p class="card-text">{{ $count }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order In :</h5>
                    <p class="card-text">{{ $sum_orderin }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Out :</h5>
                    <p class="card-text">{{ $sum_orderout }}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
<div class="container">
    <div class="container text-center">

    </div>
@endsection

