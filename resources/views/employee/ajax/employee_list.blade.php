<div class="text-center">
    <button type="button" class="btn btn-success waves-effect btn-label waves-light mb-4" data-bs-toggle="modal" data-bs-target="#firstmodal"><i class="bx bx-smile label-icon"></i>Add Employee</button>
</div>
<div>
    <div class="row">
        @foreach($employees as $key => $employee)
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-4">
                            <div class="avatar-md">
                                @if($employee->employee_photo == "")
                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                    <img src="{{ asset('assets/images/default.png') }}" alt="" height="100%" style="object-fit: cover; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                                </span>
                                @else
                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                    <img src="{{ asset('storage/' . $employee->employee_photo) }}" alt="" height="100%" style="object-fit: cover; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15"><a href="{{ route('view', ['id' => $employee->id]) }}" class="text-dark">{{ $employee->first_name }}</a></h5>
                            <h5 class="text-truncate font-size-15"><a href="{{ route('view', ['id' => $employee->id]) }}" class="text-dark">{{ $employee->last_name }}</a></h5>
                            <br>
                            <p class="h6 text-nowrap">
                                <i class="bx bx-phone-call me-1"></i>
                                <span class="text-muted">{{ $employee->contact_number }}</span>
                            </p>
                            <p class="h6 text-nowrap">
                                <i class="bx bx-mail-send me-1"></i>
                                <span class="text-muted">{{ $employee->email_address }}</span>
                            </p>
                            <p class="h6 text-nowrap">
                                <i class="bx bx-buildings me-1"></i>
                                <span class="text-muted">{{ $employee->department_id }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 border-top">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-3">
                            <span class="badge bg-success">Completed</span>
                        </li>
                        <li class="list-inline-item me-3">
                            <i class="bx bx-hash"></i>{{ $employee->id }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end row -->
</div>