<div>
    <div class="modal-body">
        <form id="createDepartmentForm" action="" enctype="multipart/form-data">
            @csrf
            @if(!isset($step))
            <div class="modal-content">
                <div class="modal-body">
                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <p class="card-title-desc">Step 1: Personal Information</p>

                    <div class="mb-3 row">
                        <label for="first_name" class="col-md-4 col-form-label">First Name</label>
                        <div class="col-md-8">
                            <input wire:model="first_name" class="form-control" type="text" placeholder="Enter First Name" id="first_name">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="middle_name" class="col-md-4 col-form-label">Middle Name</label>
                        <div class="col-md-8">
                            <input wire:model="middle_name" class="form-control" type="text" placeholder="Enter Middle Name" id="middle_name">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="last_name" class="col-md-4 col-form-label">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="last_name" type="text" placeholder="Enter Last Name" id="last_name">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="gender" class="form-label col-form-label col-md-4">Gender</label>
                        <div class="col-md-8">
                            <select wire:model="gender" class="form-control select2 status">
                                <option>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="non_binary">Non Binary</option>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email_address" class="col-md-4 col-form-label">Email Address</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="email_address" type="email" placeholder="Enter Email Address" id="email_address">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date_of_birth" class="col-md-4 col-form-label">Date of Birth</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="date_of_birth" type="date" placeholder="Enter Date of Birth" id="date_of_birth">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="permanent_address" class="col-md-4 col-form-label">Permanent Address</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="permanent_address" type="text" placeholder="Enter Permanent Address" id="permanent_address">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="current_address" class="col-md-4 col-form-label">Current Address</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="current_address" type="text" placeholder="Enter Current Address" id="current_address">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contact_number" class="col-md-4 col-form-label">Contact Number</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="contact_number" type="text" placeholder="Enter Contact Number" id="contact_number">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="form-label col-form-label col-md-4">Status</label>
                        <div class="col-md-8">
                            <select wire:model="status" class="form-control select2 status">
                                <option>Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="on_leave">On Leave</option>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="department_id" class="form-label col-form-label col-md-4">Department</label>
                        <div class="col-md-8">
                            <select wire:model="department_id" class="form-control select2 status">
                                <option>Select</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="employee_photo" class="form-label col-form-label col-md-4">Employee Photo</label>
                        <div class="col-md-8">
                            <input class="form-control" wire:model="employee_photo" type="file" id="employee_photo">

                        </div>
                    </div>
                    <div class="text-center d-flex flex-column justify-content-center align-items-center gap-2">
                        <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200" src="" data-holder-rendered="true">
                        <div><button wire:click="removeImg()" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Remove</button></div>
                    </div>


                </div>
            </div><!-- /.modal-content -->
            @endif
            @if(isset($step))
            @if($step == 1)
            <div class="modal-content">
                <div class="modal-body">

                    <p class="card-title-desc">Step 2: Employment Information</p>

                    <div class="mb-3 row">
                        <label for="salary" class="col-md-4 col-form-label">Salary</label>
                        <div class="col-md-8">
                            <input wire:model="salary" class="form-control" type="number" step="0.01" placeholder="Enter Salary" id="salary">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="employment_type" class="form-label col-form-label col-md-4">Employment Type</label>
                        <div class="col-md-8">
                            <select wire:model="employment_type" class="form-control select2 status">
                                <option>Select</option>
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                                <option value="3">No Time</option>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="position" class="form-label col-form-label col-md-4">Position</label>
                        <div class="col-md-8">
                            <select wire:model="position" class="form-control select2 status">
                                <option>Select</option>
                                <option value="1">Full Stack Engineer</option>
                                <option value="2">Front-End Engineer</option>
                                <option value="3">Back-End Engineer</option>
                                <option value="4">UI/UX Designer</option>
                                <option value="5">Project Manager</option>
                            </select>

                        </div>
                    </div>

                </div>
            </div><!-- /.modal-content -->
            @endif
            @endif
            @if(isset($step))
            @if($step == 2)
            <div class="modal-content">
                <div class="modal-body">

                    <p class="card-title-desc">Step 3: Account Information</p>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label">Account Username</label>
                        <div class="col-md-8">
                            <input wire:model="name" class="form-control" type="text" placeholder="Enter Username" id="username">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label">Account Password</label>
                        <div class="col-md-8">
                            <input wire:model="password" class="form-control" type="password" placeholder="Enter Password" id="password">

                        </div>
                    </div>

                </div>
            </div><!-- /.modal-content -->
            @endif
            @endif
            @if(isset($step))
            @if($step == 3)
            <div class="modal-content">
                <div class="modal-body">

                    <p class="card-title-desc">Step 4: Check Information</p>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Field Name</th>
                                <th>Data</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>First Name</td>
                                <td>{{ $first_name }}</td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td>{{ $middle_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $last_name }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $gender }}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{ $email_address }}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ $date_of_birth }}</td>
                            </tr>
                            <tr>
                                <td>Permanent Address</td>
                                <td>{{ $permanent_address }}</td>
                            </tr>
                            <tr>
                                <td>Current Address</td>
                                <td>{{ $current_address }}</td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td>{{ $contact_number }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $status }}</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>{{ $target->department_name }}</td>
                            </tr>
                            <tr>
                                <td>Employee Photo</td>
                                <td>
                                    <div class="text-center d-flex flex-column justify-content-center align-items-center gap-2">
                                        <img class="img-thumbnail" alt="200x200" width="200" src="" data-holder-rendered="true">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div><!-- /.modal-content -->
            @endif
            @endif
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        @if(isset($step))
        @if($step > 1)
        <button type="button" class="btn btn-primary waves-effect waves-light">Prev</button>
        @endif
        @endif
        @if(!isset($step))
        <button type="button" class="nextBtn btn btn-primary waves-effect waves-light">Next</button>
        @endif
        @if(isset($step))
        @if($step < 3) <button type="button" class="nextBtn btn btn-primary waves-effect waves-light">Next</button>
            @endif
            @endif
            @if(isset($step))
            @if($step == 3)
            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            @endif
            @endif
    </div>
</div>