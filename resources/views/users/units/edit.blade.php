@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Unit') }}</div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success')   }}
                            </div>
                        @endif
                            <form action="{{ route('users.units.update', ['unit' => $unit]) }}" method="POST" class="row g-3 needs-validation">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Unit Name :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Unit" value="{{ $unit->name }}" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true">Save</i>
                                </button>
                            </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
