@if(isset($target) && isset($employee))
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">{{ $employee->first_name }}'s Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="modal_name"><span class="text-primary">{{ $employee->first_name }}</span> has checked in at <span class="text-primary">{{ \Carbon\Carbon::parse($target->time_in)->format("g:i:s A") }}</span></h6>
                <div class="text-center">
                    @if($target->time_in_photo == "")
                    <img src="{{ asset('assets/images/no-photo-found.png') }}" alt="No photo found" class="avatar-xl rounded" />
                    @else
                    <img src="{{ asset('storage/Attendance/' . $target->time_in_photo) }}" alt="Photo" class="avatar-xl rounded" />
                    @endif
                </div>
                <h6 class="mt-4">Status: @if($target->status == 'On Time')
                    <span class="text-success">
                        @else
                        <span class="text-danger">
                            @endif
                            {{ $target->status }}</span>
                </h6>
                <h6 class="mt-2">Remarks: {{ $target->time_in_remark }}</h6>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif