
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <form method="GET" action="">
            @csrf
            <div class="row pb-3">
                <div class="col-md-6">
                    <label>Start Date :</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="col-md-6">
                    <label>End Date :</label>
                    <input type="date" class="form-control" name="end_date">
                </div>

                <div class="col-md-6">
                    <label>In | Out :</label>
                    <select class="form-select" id="type" name="type">
                        <option value="">Choose</option>
                        <option value="1">In</option>
                        <option value="0">Out</option>
                    </select>
                </div>


                <div class="col-md-4 pt-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>
