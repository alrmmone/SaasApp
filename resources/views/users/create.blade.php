@extends('layouts.app')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')   }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add Item') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.createdkkk') }}" method="POST"  class="row g-3 needs-validation"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">ItemName :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Description :</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="description" required>
                            </div>
                            <div class="col-md-3">
                                <label for="role" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option selected disabled value="">Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Quantity :</label>
                                <input type="number" class="form-control" id="count" name="count"
                                       placeholder="count" required>
                            </div>
                            <div class="col-md-3">
                                <label for="role" class="form-label">Unit</label>
                                <select class="form-select" id="unit" name="unit">
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Price :</label>
                                <input type="number" class="form-control" id="price" name="price"
                                       placeholder="price" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Active</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="access"
                                           name="access">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Image Of Items :</label>
                                <input type="file" class="form-control" id="image" name="image"
                                       placeholder="image" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true">Add Items</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
