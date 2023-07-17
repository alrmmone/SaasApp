@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Unit') }}</div>

                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success')   }}
                            </div>
                        @endif
                        <form action="#" method="POST" class="row g-3 needs-validation">
                            @csrf
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Unit Name :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="New Unit" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true">Add Unit</i>
                                </button>
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
