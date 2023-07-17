
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
<form method="GET" action="">
    @csrf
    <div class="row pb-3">
        <div class="col-md-3">
            <label>Start Date :</label>
            <input type="date" class="form-control" name="start_date">
        </div>
        <div class="col-md-3">
            <label>End Date :</label>
            <input type="date" class="form-control" name="end_date">
        </div>
        <div class="col-md-3">
            <label>Name :</label>
            <input type="text" class="form-control" placeholder="Item Name" name="name">
        </div>
        <div class="col-md-3">
            <label>Start Quantity :</label>
            <input type="number" class="form-control" placeholder="from" name="start_quantity">
        </div>
        <div class="col-md-3">
            <label>End Quantity :</label>
            <input type="number" class="form-control" placeholder="To" name="end_quantity">
        </div>
        <div class="col-md-3">
            <label>Unit :</label>
            <select class="form-select" id="unit" name="unit">
                <option>Choose</option>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>Actives :</label>
            <select class="form-select" id="category_id" name="category_id">
                <option>Choose</option>
                @foreach($category as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>Category :</label>
            <select class="form-select" id="access" name="access">
                    <option value="">Choose</option>
                    <option value="1">Active</option>
                    <option value="0">Non-Active</option>
            </select>
        </div>


        <div class="col-md-1 pt-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>
</div>
</div>
