<div class="row px-4 pt-4">
    <p class="card-title-desc">Fill in details below.</p>
</div>

<div class="mb-3 row px-4">
    <label for="date" class="col-md-4 col-form-label">Date</label>
    <div class="col-md-8">
        <input class="form-control" name="date" type="date" id="date" value="<?php echo date('Y-m-d'); ?>" readonly>
        <small id="date_of_birth_error" class="field_errors form-text text-warning"></small>
    </div>
</div>

<div id="time-cont">
</div>

<div class="mb-3 row px-4">
    <label for="remarks" class="col-md-12 col-form-label">Remarks</label>
    <div class="col-md-12">
        <textarea id="time_out_remark" class="form-control" maxlength="225" rows="3" placeholder="Add Remarks" name="time_out_remark"></textarea>
        <small id="date_of_birth_error" class="field_errors form-text text-warning"></small>
    </div>
</div>
<input type="text" value="{{ $user->id }}" name="id" hidden>