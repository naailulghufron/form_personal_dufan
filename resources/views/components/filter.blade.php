<form id="formFilter">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="form-group row">
                <div class="col-3">
                    <label for="date">Date</label>
                </div>
                <input type="text" class="col-9 form-control form-control-sm" id="date" aria-describedby="date"
                    name="date">
            </div>
        </div>
        <div class="col-lg-1 col-md-3 col-sm-3 col-3">
            <div class="form-group form-check">
                <input class="form-check-input" id="status" name="status" checked="checked" type="checkbox">
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-2">
            <button type="submit" id="filter" class="btn btn-sm btn-primary">Filter</button>
        </div>
    </div>
</form>
