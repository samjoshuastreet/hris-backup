<div class="col-sm-4 mb-3 mb-sm-2" style="text-align: center;">
    <p class="text-muted">Last Check In</p>
    @if($has_checked_in == true)
    <h3>{{ $check_in }}</h3>
    @else
    @if(isset($last_check_in))
    <h3>{{ $last_check_in }}</h3>
    @else
    <h3>00:00</h3>
    @endif
    @endif
    @if($has_checked_in)
    <p class="text-muted">{{ $check_in_expanded }}</p>
    @elseif(isset($last_check_in))
    <p class="text-muted">{{ $check_in_expanded }}</p>
    @else
    @endif
    @if(isset($record))
    @if($record->status == "Late")
    <h5 class="text-danger bold">Late</h5>
    @elseif($record->status == "On Time")
    <h5 class="text-success bold">On Time</h5>
    @endif
    @endif
    <div class="mt-4">
        @if($has_checked_in == true)
        <button class="btn btn-primary waves-effect waves-light btn-sm disabled">Check In <i class="bx bx-time"></i></button>
        @else
        <button onclick="configure('time_in')" id="check_out_btn" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target="#checkinform">Check In <i class="bx bx-time"></i></button>
        @endif
    </div>
</div>