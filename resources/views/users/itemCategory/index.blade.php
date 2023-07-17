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
                            <div class="col col-md-6">{{ __('Category List') }}</div>
                            <div class="col col-md-6">
                                <a href="{{ route('users.itemCategory.create') }}" class="btn btn-success btn-sm float-end">Add Category</a>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ItemsCategory as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{route('users.itemCategory.edit',['category'=>$category])}}"
                                       title="Edit User">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true">Edit</i></button>
                                    </a>
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
