@extends('layouts.app')

@section('content')

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                @include('users.fillters.filters')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><i class="fa fa-list" aria-hidden="true">{{ __('   Items List') }}</i></div>
                            <div class="col col-md-6">
                                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-end">Add Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary btn-sm float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa fa-filter">  Filter</i></button>
                        <br>
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($items) > 0)
                            @foreach($items as $item)
                                    <tr>
                                <td><kbd>{{ $item->id }}</kbd></td>
                                <td><img src="{{ asset('image/' . $item->image) }}" width="75"/></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->totalQty  }}</td>
                                <td>{{ $item->unit->name }}</td>
                                <td>{{ $item->price . ('$') }}</td>
                                <td>
                                    @if($item->access == 1)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" style="background-color: green" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                        </div>
                                    @elseif($item->access == 0)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" style="background-color: orangered" role="switch" id="flexSwitchCheckDisabled" disabled>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('users.show', ['item' => $item['id']]) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">  View</i></button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            @else
                            <tr>
                                <td colspan="7" class="text-center" >No Items Found</td>
                            </tr>
                            @endif
                        </table>
                         {!! $items->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const onSearch = () => {
           const input = document.querySelector("#search");
           const filter = input.value.toUpperCase();

           const list = document.querySelectorAll("#list li");

           list.forEach((el) => {
               const text = el.textContent.toUpperCase();

               el.style.display = text.includes(filter) ? "":"none";
            });
        };
    </script>
@endsection
