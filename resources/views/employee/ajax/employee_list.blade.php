<div class="text-center">
    <button type="button" class="btn btn-success waves-effect btn-label waves-light mb-4" data-bs-toggle="modal" data-bs-target="#firstmodal"><i class="bx bx-smile label-icon"></i>Add Employee</button>
</div>
<div>
    <div class="row">
        @foreach($employees as $key => $employee)
        <div class="col-xl-4 col-sm-6">
            <div class="card" id="employee-card">
                <div class="card-body">
                    <div class="d-flex align-start mb-3">
                        <div class="flex-grow-1">
                            <span class="badge badge-soft-success">Active</span>
                        </div>
                        <button type="button" class="btn btn-light btn-sm like-btn" data-bs-toggle="button"><i class="bx bx-heart"></i></button>
                    </div>
                    <div class="text-center mb-3">
                        @if($employee->employee_photo == "")
                        <img src="{{ asset('assets/images/default.png')}}" alt="" class="avatar-sm rounded-circle" />
                        @else
                        <img src="{{ asset('storage/' . $employee->employee_photo) }}" alt="" class="avatar-sm rounded-circle" />
                        @endif
                        <h6 class="font-size-15 mt-3 mb-1">{{ $employee->first_name }} {{ $employee->last_name }}</h6>
                        <p class="mb-0 text-muted">UI/UX Designecr</p>
                    </div>


                    <div class="d-flex mb-3 justify-content-between gap-2 text-muted">
                        <div>
                            <h6><span <i class="bx bx-buildings me-1"></i></span>Department</h6>
                            <h4>{{ $employee->department_id }}</h4>
                        </div>
                        <div>
                            <h6><span class="bx bxs-id-card me-1"></span>ID No.</h6>
                            <h4>{{ $employee->id }}</h4>
                        </div>
                    </div>
                    <div class="hstack gap-2">
                        <p class="h6 text-nowrap">
                            <i class="bx bx-mail-send me-1"></i>
                            <span class="text-muted">{{ $employee->email_address }}</span>
                        </p>
                    </div>
                    <div class="hstack gap-2r">
                        <p class="h6 text-nowrap">
                            <i class="bx bx-phone-call me-1"></i>
                            <span class="text-muted">{{ $employee->contact_number }}</span>
                        </p>
                    </div>
                    <div class="mt-4 pt-1">
                        <a href="{{route('view', ['id' => $employee->id])}}" class="btn btn-soft-primary d-block">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end row -->
</div>
