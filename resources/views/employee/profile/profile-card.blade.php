<div class="card">
    <div class="card-body">
        <h4 class="mb-4 text-center">Personal Profile</h4>
        <div class="d-flex justify-content-center">
            <div>
                @if($target->employee_photo == "")
                <img src="{{ asset('assets/images/default.png') }}" width="125" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);" class="rounded-circle img-cover" id="img-profile" alt="...">
                @else
                <img src="{{ asset('storage/' . $target->employee_photo) }}" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);" width="125" class="rounded-circle img-cover" id="img-profile" alt="...">
                @endif
            </div>
        </div>
        <h4 class="text-center mt-3">{{ $target->first_name}}</h4>
        <div class="text-center">
            @if($target->status == "active")
            <span class="badge badge-pill badge-soft-success mb-2">{{ $target->status }}</span>
            @elseif($target->status == "inactive")
            <span class="badge badge-pill badge-soft-danger mb-2">{{ $target->status }}</span>
            @elseif($target->status == "on_leave")
            <span class="badge badge-pill badge-soft-warning mb-2">{{ $target->status }}</span>
            @endif
        </div>
        <div>
            <div class="table-responsive">
                <table class="table table-sm m-0">
                    <tbody>
                        <tr>
                            <th scope="row" class="py-3" style="font-size: 0.75rem;">Full Name</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->first_name }} @if(isset($target->middle_name)){{ $target->middle_name }}@endif {{ $target->last_name }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Department</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->department_id }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Gender</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->gender }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Contact Number</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->contact_number }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Email Address</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->email_address }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Date of Birth</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Permanent Address</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->permanent_address }}</td>
                        </tr>
                        <tr>
                            <th class="py-3" scope="row" style="font-size: 0.75rem;">Current Address</th>
                            <td class="py-3" style="font-size: 0.75rem;">{{ $target->current_address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>