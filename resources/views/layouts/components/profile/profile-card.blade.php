<link href="{{ asset('assets/css/view-profile.css') }}" rel="stylesheet" type="text/css" />
    {{-- <div class="card" style="width: 18rem;"> --}}
        <div class="card">
        <div class="card-body">
            <h4 style="text-align: center;" class="mb-4">Personal Profile</h4>
            <div class="profile-container d-flex justify-content-center">
            <div class="img-container mb-4 ratio ratio-1x1 rounded-circle overflow-hidden">
                <img src="{{ asset('storage/' . $target->employee_photo) }}" class="rounded img-cover" id="img-profile" alt="...">
            </div>
            </div>
            <h3 style="text-align: center">{{ $target->first_name}}</h3>
            <h6 class="text-center"><span class="badge badge-pill badge-soft-success font-size-11 mb-2">Active</span></h6>
            <div class="info">
            <table>
                <tbody>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $target->gender }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $target->email_address}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $target->permanent_address}}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>Front End developer</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>IT department</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
