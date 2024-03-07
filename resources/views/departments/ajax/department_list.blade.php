<div class="table-responsive">
    <table class="table align-middle nowrap">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Department</th>
                <th scope="col">Location</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email Address</th>
                <th scope="col">Total Employees</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
            <tr>
                <th scope="row">{{ $department->id }}</th>
                <td>
                    {{ $department->department_name }}
                </td>
                <td>
                    {{ $department->location }}
                </td>
                <td>
                    {{ $department->contact_number }}
                </td>
                <td>
                    {{ $department->email_address }}
                </td>
                <td>
                    @if($department->number_of_employees == 0)
                    0
                    @else
                    {{ $department->number_of_employees }}
                    @endif
                </td>
                <td>
                    @if($department->status == 'Active')
                    <span class="badge badge-soft-success">{{ $department->status }}</span>
                    @elseif($department->status == 'Inactive')
                    <span class="badge badge-soft-danger">{{ $department->status }}</span>
                    @else
                    <span class="badge badge-soft-warning">{{ $department->status }}</span>
                    @endif
                </td>
                <td>
                    <ul class="list-unstyled hstack gap-1 mb-0">
                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                            <a href="{{ route('view_department', ['id' => $department->id]) }}" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                        </li>
                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                            <button data-id="{{ $department->id }}" data-department_name="{{ $department->department_name }}" data-description="{{ $department->description }}" data-location="{{ $department->location }}" data-contact_number="{{ $department->contact_number }}" data-email_address="{{ $department->email_address }}" data-number_of_employees="{{ $department->number_of_employees }}" data-department_status="{{ $department->status }}" class="btn btn-sm btn-soft-info department_update" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="mdi mdi-pencil-outline"></i></button>
                        </li>
                        <li>
                            <button data-id="{{ $department->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger department_delete"><i class="mdi mdi-delete-outline"></i></button>
                        </li>
                    </ul>
                </td>
            </tr>
            @empty
            <tr>
                No records found
            </tr>
            @endforelse
        </tbody>
    </table>
</div>