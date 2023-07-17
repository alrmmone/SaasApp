@extends('layouts.app')

@section('content')

    @if($message = Session::get('category_success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @elseif($editing = Session::get('update_success'))
        <div class="alert alert-success">
            {{ $editing }}
        </div>

    @endif

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6">{{ __('Permission List') }}</div>
                            <div class="col col-md-6">
                                <a href="{{ route('admin.role.create') }}"
                                   class="btn btn-success btn-sm float-end">Add Permission</a>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td><kbd>{{ $role->id }}</kbd></td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('admin.role.edit', ['role' => $role]) }}"
                                       title="Edit User">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true">Edit</i></button>
                                    </a>

                                    <form method="POST" action="#" accept-charset="UTF-8" style="display: inline">
                                        @csrf

                                        <button class="btn btn-danger btn-sm" title="Delete Student"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true">Publish</i></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
