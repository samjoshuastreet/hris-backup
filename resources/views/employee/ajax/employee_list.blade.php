<div class="col-lg-12">
    <div class="">
        <div class="table-responsive">
            <table class="table project-list-table table-nowrap align-middle table-borderless">
                <thead>
                    <tr>
                        <th scope="col" style="width: 100px">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Position</th>
                        <th scope="col">Status</th>
                        <th scope="col">Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $key => $employee)
                    <tr>
                        <td>
                            @if($employee->employee_photo == "")
                            <img src="{{ asset('assets/images/default.png')}}" alt="" class="avatar-sm">
                            @else
                            <img src="{{ asset('storage/' . $employee->employee_photo) }}" alt="" class="avatar-sm rounded-circle" />
                            @endif
                        </td>
                        <td>
                            <h5 class="text-truncate font-size-14"><a href="{{route('view', ['id' => $employee->id])}}" class="text-dark">{{ $employee->first_name }} {{ $employee->last_name }}</a></h5>
                            <p class="text-muted mb-0">{{ $employee->email_address }}</p>
                        </td>
                        <td>{{ $employee->getDepartmentNameAttribute() }}</td>
                        <td>UI/UX Designer</td>
                        <td>
                            @if($employee->status == "active")
                            <span class="badge badge-pill bg-success mb-2">{{ ucfirst($employee->status) }}</span>
                            @elseif($employee->status == "inactive")
                            <span class="badge badge-pill bg-danger mb-2">{{ ucfirst($employee->status) }}</span>
                            @elseif($employee->status == "on_leave")
                            <span class="badge badge-pill bg-warning mb-2">On Leave</span>
                            @endif
                        </td>
                        <td>
                            {{ $employee->contact_number }}
                        </td>
                        <td>
                            <a href="{{route('view', ['id' => $employee->id])}}" class="btn btn-sm btn-primary waves-effect waves-light">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>
                            <h4>No Records Found</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>