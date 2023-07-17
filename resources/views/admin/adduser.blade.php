@extends('layouts.app')

@section('content')


    @if( $message = Session::has('added_success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="card-body">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add User') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.adduser') }}" method="POST" class="row g-3 needs-validation">
                            @csrf
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">UserName :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Password :</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Enter your phone number:</label>
                                <input type="tel" id="phone" class="form-control" name="phone" PLACEHOLDER="07X-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                            </div>
                            <div class="col-md-3">
                                <label for="role" class="form-label">Admin To Place :</label>
                                <select class="form-select" id="place_id" name="place_id" required>
                                    <option selected disabled value="">Place</option>
                                    @foreach($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="role" class="form-label">State</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option selected disabled value="">Permission</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Active</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="access" name="access">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true">Add User</i></button>
                            </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
