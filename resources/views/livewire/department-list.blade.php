<tbody>
    @forelse($departments as $department)
    <tr>
        <th scope="row">{{ $department->id }}</th>
        <td>
            {{ $department->department_name }}
        <td>
            {{ $department->description }}
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
            {{ $department->number_of_employees }}

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
                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                </li>
                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <button wire:click="update({{ $department->id }})" href="#" class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="mdi mdi-pencil-outline"></i></a>
                </li>
                <li>
                    <button wire:click="delete({{ $department->id }})" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
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