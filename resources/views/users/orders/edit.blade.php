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
                        <div class="wrap" style="justify-content: space-between">
                            {{ __('Add Order') }}
                        </div>
                    </div>


                    <div class="card-body">
                        <form action="{{ route('orders.store') }}" method="POST" class="row g-3 needs-validation"
                              enctype="multipart/form-data">
                            @csrf


                            <div id="inputFormRow">
                                <div class="input-group mb-3">
                                    <div class="col-md-6">
                                        <select class="form-select" id="items" name="items[0][id]" required>
                                            <option selected disabled value="">Items :</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" id="quantity"
                                               name="items[0][quantity]"
                                               placeholder="quantity" required>
                                    </div>
                                    <div class="input-group-append">
                                        <button id="removeRow" type="button" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div id="newRow"></div>
                            <div class="md-4 float-end">
                                <button id="addRow" class="btn btn-success btn-sm " type="button"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                            <div class="col-md-3">
                                <label for="order_amount" class="form-label">Total Order :</label>
                                <input type="number" class="form-control" id="order_amount" name="order_amount"
                                       placeholder="Total Order" required>
                            </div>

                            <div class="col-md-6">
                                <label for="note" class="form-label">Note :</label>
                                <textarea type="file" class="form-control" id="note" name="note"
                                          placeholder="Note" required></textarea>
                            </div>

                            <div class="col-md-3">
                                <label for="order_in" class="form-label">Order In | Out :</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="order_in"
                                           name="order_in">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add Items</button>
                            </div>
                        </form>


                        <script type="text/javascript">
                            // add row
                            let counter = 1;
                            $("#addRow").click(function () {
                                var html = '';
                                html += '<div id="inputFormRow">';
                                html += '<div class="input-group mb-3">';
                                html += '<div class="col-md-6">';
                                html += '<select class="form-select" id="items" name="items[' + counter + '][id]" required>';
                                html += '<option selected disabled value="">Items :</option>';
                                html += '@foreach($items as $item)';
                                html += '<option value="{{ $item->id }}">{{ $item->name }}</option>';
                                html += '@endforeach';
                                html += '</select>';
                                html += '</div>';
                                html += '<div class="col-md-4">';
                                html += '<input type="number" class="form-control" id="quantity" name="items[' + counter + '][quantity]" placeholder="quantity" required>';
                                html += '</div>';
                                html += '<div class="input-group-append">';
                                html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';

                                $('#newRow').append(html);
                                counter++;
                            });

                            // remove row
                            $(document).on('click', '#removeRow', function () {
                                $(this).closest('#inputFormRow').remove();
                            });
                        </script>

@endsection
