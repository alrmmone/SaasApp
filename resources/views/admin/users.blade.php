@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6">{{ __('Users List') }}</div>
                            <div class="col col-md-6">
                                <a href="{{ route('admin.adduser') }}" class="btn btn-success btn-sm float-end"><i class="fa fa-user-plus"></i> Add User</a>
                            </div>
                        </div>
                    </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Phone</th>
                                <th>Permission</th>
                                <th>Access</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><kbd>{{ $user->id }}</kbd></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        @if($user->access == 1)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" style="background-color: green" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                            </div>
                                        @elseif($user->access == 0)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" style="background-color: orangered" role="switch" id="flexSwitchCheckDisabled" disabled>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.show', ['user' => $user['id']]) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                        <form method="POST" action="{{ route('admin.destroy',['user'=>$user->id]) }}" accept-charset="UTF-8" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete Student"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
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
    </div>
    </div>
@endsection
