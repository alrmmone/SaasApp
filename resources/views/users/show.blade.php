@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6">Items Details</div>
                        <div class="col col-md-6">
                            <a href="{{ route('users.items') }}" class="btn btn-primary btn- sm float-end">View All</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Image :') }}</label>
                        <div class="col-md-6">
                            <img src="{{ asset('image/' . $item->image) }}" width="200" class="rounded mx-auto d-block">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Item Name :') }}</label>
                        <div class="col-md-6">
                            <p class="form-control">{{ $item->name }}</p>
                        </div>
                    </div>
                <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Description :') }}</label>
                    <div class="col-md-6">
                        <p class="form-control">{{ $item->description }}</p>
                    </div>
                </div>
                    <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Category :') }}</label>
                        <div class="col-md-6">
                            <p class="form-control">{{ $item->category->name }}</p>
                        </div>
                    </div>
                <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Quantity :') }}</label>
                    <div class="col-md-6">
                        <p class="form-control">{{ $item->count }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Unit :') }}</label>
                    <div class="col-md-6">
                        <p class="form-control">{{ $item->unit->name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Price :') }}</label>
                    <div class="col-md-6">
                        <p class="form-control">{{ $item->price }}</p>
                    </div>

                </div>
                    <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Created_at :') }}</label>
                        <div class="col-md-6">
                            <p class="form-control">{{ $item->created_at }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Updated_at :') }}</label>
                        <div class="col-md-6">
                            <p class="form-control">{{ $item->updated_at }}</p>
                        </div>
                    </div>

                    <a href="{{ route('users.edit', ['item' => $item->id])  }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></button></a>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
