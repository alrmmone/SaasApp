@extends('layouts.app')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('update_success')   }}
        </div>
    @endif

    <div class="card-body">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="d-flex flex-row-reverse">
                                {{ __('User ID : ') . $user->id }}
                                <h5 class="col">{{ __('User Page') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update',['user'=>$user->id]) }}" method="post" class="row g-3 needs-validation">
                            @csrf
                            @method('PUT')


                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">{{ __('UserName :') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $user->name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">{{ __('Email :') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Enter your phone number:</label>
                                <input type="tel" id="phone" class="form-control" name="phone" PLACEHOLDER="07X-XXX-XXXX" value="{{ $user->phone }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label">Admin To Place :</label>
                                <select class="form-select" id="place_id" name="place_id" required>
                                    <option selected disabled value="">Place</option>
                                    @foreach($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-6">
                                <label for="email" class="form-label ">{{ __('Permission :') }}</label>
                                    <select class="form-select" name="role_id" id="role_id" required>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                             </div>
                                <div class="row mb-4">
                                    <label for="email" class="form-label">{{ __('Access :') }}</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="access" name="access">
                                        </div>
                                </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true">Save</i></button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
