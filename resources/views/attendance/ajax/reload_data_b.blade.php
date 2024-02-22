<div class="col-sm-4 mb-3 mb-sm-2" style="text-align: center;">
    <p class="text-muted">Last Check Out</p>
    @if($has_checked_out == true)
    <h3>{{ $check_out }}</h3>
    @else
    @if(isset($latest_record->time_out))
    <h3>{{ $last_check_out }}</h3>
    @else
    <h3>00:00</h3>
    @endif
    @endif
    @if($has_checked_out)
    <p class="text-muted">{{ $check_out_expanded }}</p>
    @elseif(isset($last_check_out))
    <p class="text-muted">{{ $check_out_expanded }}</p>
    @else
    @endif
    @if($has_checked_out)
    <h5 class="text-success bold">Checked Out</h5>
    @endif
    <div class="mt-4">
        @if($has_checked_in == true && $has_checked_out == false)
        <button id="check_out_btn" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target="#checkoutform">Check out <i class="va vaadin-time-backward"></i></button>
        @else
        <button href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm disabled">Check out <i class="va vaadin-time-backward"></i></button>
        @endif
    </div>
</div>