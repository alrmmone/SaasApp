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
                                {{ __('Place ID : ') . $place->id }}
                                <h5 class="col">{{ __('Place Page') }}</h5>
                            </div>
                        </div>
                    </div>

                    <!--  Card Body  -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Place Name :') }}</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $place->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category :') }}</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{ $place->category->name }}</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Country :') }}</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{ $place->country }}</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Admin Place :') }}</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{ $place->user->name}}</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Create_at :') }}</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{  $place->created_at}}</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Update_at :') }}</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{ $place->updated_at}}</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Access :') }}</label>
                            <div class="col-md-6">
                                @if($place->statue == 1)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                    </div>
                                @elseif($place->statue == 0)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <a href="{{ route('admin.places.edit', ['place' => $place->id])  }}" title="Edit Place"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
