<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Activity</h4>
        <ul class="verti-timeline list-unstyled">
            @if($attendance_data !== "")
            @forelse($attendance_data as $key => $data)
            <li class="event-list active">
                <div class="event-timeline-dot">
                    <i class="bx bxs-right-arrow-circle font-size-18  bx-fade-right"></i>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <h5 class="font-size-14">
                            @if(\Carbon\Carbon::parse($data->date)->toDateString() == \Carbon\Carbon::today()->toDateString())
                            Today
                            @else
                            {{ \Carbon\Carbon::parse($data->date)->format('M j') }}
                            @endif
                            <a onclick="renderActivity({{ $data->id }}, 'Test')" style="cursor: pointer;"><i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></a>
                        </h5>
                    </div>
                </div>
            </li>
            @empty
            <li class="event-list active">
                <div class="event-timeline-dot">
                    <i class="bx bxs-right-arrow-circle bx-fade-right"></i>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <h5 class="text-truncate">No record.</h5>
                    </div>
                </div>
            </li>
            @endforelse
        </ul>
        @else
        </ul>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <p class="text-truncate">No records found.</p>
            </div>
        </div>
        @endif
        <div class="text-center mt-4"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
    </div>
</div>