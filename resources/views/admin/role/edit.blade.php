@extends('layouts.app')

@section('content')

    @if($message = Session::get('update_success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Permission') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.role.update', ['role' => $role]) }}" method="POST" class="row g-3 needs-validation">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">category Name :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Role Permission" value="{{ $role->name }}" required>
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
