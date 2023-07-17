@extends('layouts.app')

@section('content')

    @if( $message = Session::has('place_success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6">{{ __('Add Place') }}</div>
                            <div class="col col-md-6">
                                <a href="{{ route('admin.places.create') }}" class="btn btn-success btn-sm float-end">Add Place</a>
                            </div>
                        </div>
                    </div>
                        <br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Country</th>
                                <th>Admin</th>
                                <th>Access</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($places as $place)
                            <tr>
                                <td><kbd>{{ $place->id }}</kbd></td>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->category->name }}</td>
                                <td>{{ $place->country }}</td>
                                <td>{{ $place->user->name }}</td>
                                <td>
                                    @if($place->statue == 1)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" style="background-color: green" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                        </div>
                                    @elseif($place->statue == 0)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" style="background-color: red" role="switch" id="flexSwitchCheckDisabled" disabled>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.places.show', ['place' => $place['id']]) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">View</i></button></a>
                                    <a href="{{ route('admin.places.edit', ['place' => $place->id])  }}" title="Edit Place"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
