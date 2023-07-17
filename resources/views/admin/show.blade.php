@extends('layouts.app')

@section('content')

    @if(Session::has('update_success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('update_success')   }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">


                    <!--  Card Header  -->
                    <div class="card-header">
                        <div class="row">
                            <div class="d-flex flex-row-reverse">
                        {{ __('User ID : ') . $user->id }}
                            <h5 class="col"><i class="fa fa-address-card"></i>  {{ __(' User Page') }}</h5>
                            </div>
                        </div>
                    </div>

                    <!--  Card Body  -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">{{ __('UserName :') }}</label>
                                <div class="col-md-6">
                                    <p class="form-control">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email :') }}</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $user->email }}</h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Number Phone :') }}</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $user->phone }}</h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Permission :') }}</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $user->role->name }}</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Create_at :') }}</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{  $user->created_at}}</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Update_at :') }}</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $user->updated_at}}</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Access :') }}</label>
                                <div class="col-md-6">
                                    @if($user->access == 1)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                        </div>
                                    @elseif($user->access == 0)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <a href="{{ route('admin.edit', ['user' => $user['id']])  }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></button></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
