<!-- First modal dialog -->
<form id="firstValidation" action="" enctype="multipart/form-data">
    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Step 1: Personal Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-body">
                            @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="mb-3 row">
                                <label for="first_name" class="col-md-4 col-form-label">First Name</label>
                                <div class="col-md-8">
                                    <input name="first_name" class="form-control" type="text" placeholder="Enter First Name" id="first_name">
                                    <small id="first_name_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="middle_name" class="col-md-4 col-form-label">Middle Name</label>
                                <div class="col-md-8">
                                    <input name="middle_name" class="form-control" type="text" placeholder="Enter Middle Name" id="middle_name">
                                    <small id="middle_name_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="last_name" class="col-md-4 col-form-label">Last Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="last_name" type="text" placeholder="Enter Last Name" id="last_name">
                                    <small id="last_name_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="gender" class="form-label col-form-label col-md-4">Gender</label>
                                <div class="col-md-8">
                                    <select name="gender" id="gender" class="form-control select2 status">
                                        <option>Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="non_binary">Non Binary</option>
                                    </select>
                                    <small id="gender_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email_address" class="col-md-4 col-form-label">Email Address</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="email_address" type="email" placeholder="Enter Email Address" id="email_address">
                                    <small id="email_address_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="date_of_birth" class="col-md-4 col-form-label">Date of Birth</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="date_of_birth" type="date" placeholder="Enter Date of Birth" id="date_of_birth">
                                    <small id="date_of_birth_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="permanent_address" class="col-md-4 col-form-label">Permanent Address</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="permanent_address" type="text" placeholder="Enter Permanent Address" id="permanent_address">
                                    <small id="permanent_address_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="current_address" class="col-md-4 col-form-label">Current Address</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="current_address" type="text" placeholder="Enter Current Address" id="current_address">
                                    <small id="current_address_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="contact_number" class="col-md-4 col-form-label">Contact Number</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="contact_number" type="text" placeholder="Enter Contact Number" id="contact_number">
                                    <small id="contact_number_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="status" class="form-label col-form-label col-md-4">Status</label>
                                <div class="col-md-8">
                                    <select name="status" id="employee_status" class="form-control select2 status">
                                        <option>Select</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="on_leave">On Leave</option>
                                    </select>
                                    <small id="status_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="department" class="form-label col-form-label col-md-4">Department</label>
                                <div class="col-md-8">
                                    <select name="department" id="department" class="form-control select2 status">
                                        <option>Select</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="department_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="employee_photo" class="form-label col-form-label col-md-4">Employee Photo</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="file" id="employee_photo" name="employee_photo">

                                </div>
                            </div>
                            <div id="employee_photo_preview" class="text-center d-flex flex-column justify-content-center align-items-center gap-2">
                                <img class="my-3" src="" alt="Upload a Photo" width="200" height="200" id="profile-img" style="border-radius: 50%; border: 2px solid gray;">
                                <button type="button" id="removeImg-btn" class="btn btn-danger btn-sm waves-effect waves-light">Remove</button>
                            </div>

                        </div>
                    </div><!-- /.modal-content -->
                </div>
                <div class="modal-footer">
                    <!-- Toogle to second dialog -->
                    <button class="btn btn-primary" type="submit">Next</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Second modal dialog -->
<form id="secondValidation" action="">
    <div class=" modal fade" id="secondmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Step 2: Employment Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                    <button class="btn btn-primary" type="button" data-bs-target="#firstmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Prev</button>
                    <button class="btn btn-primary" type="submit">Next</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Third modal dialog -->
<form id="thirdValidation" action="" enctype="multipart/form-data">
    <div class="modal fade" id="thirdmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Step 3: Account Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label">Account Username</label>
                                <div class="col-md-8">
                                    <input name="name" class="form-control" type="text" placeholder="Enter Username" id="name">
                                    <small id="name_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label">Account Password</label>
                                <div class="col-md-8">
                                    <input name="password" class="form-control" type="password" placeholder="Enter Password" id="password">
                                    <small id="password_error" class="field_errors form-text text-warning"></small>
                                </div>
                            </div>

                        </div>
                    </div><!-- /.modal-content -->
                </div>
                <div class="modal-footer">
                    <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                    <button class="btn btn-primary" type="button" data-bs-target="#secondmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Prev</button>
                    <button class="btn btn-primary" type="submit">Next</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fourth modal dialog -->
<form id="fourthValidation" action="" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="fourthmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Step 4: Check Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-lg text-center">Personal Information</th>
                                    </tr>
                                    <tr>
                                        <th class="text-lg text-center">Field Name</th>
                                        <th class="text-lg text-center">Data</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td style="vertical-align: middle;">First Name</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="first_name_review" name="first_name"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Middle Name</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="middle_name_review" name="middle_name"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Last Name</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="last_name_review" name="last_name"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Gender</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="gender_review" name="gender"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Email Address</td>
                                        <td><input style="border: none;" class="form-control" type="email" readonly id="email_address_review" name="email_address"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Date of Birth</td>
                                        <td><input style="border: none;" class="form-control" type="date" readonly id="date_of_birth_review" name="date_of_birth"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Permanent Address</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="permanent_address_review" name="permanent_address"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Current Address</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="current_address_review" name="current_address"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Contact Number</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="contact_number_review" name="contact_number"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Status</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="status_review" name="status"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Department</td>
                                        <td><input style="border: none;" class="form-control" type="number" readonly id="department_review" name="department"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Employee Photo</td>
                                        <td class="d-flex justify-content-center align-items-center flex-column">
                                            <img src="" alt="Upload a Photo" width="100" height="100" id="profile-img-two" style="border-radius: 50%; border: 2px solid gray;">
                                            <input class="form-control" type="file" id="employee_photo_two" name="employee_photo_two" hidden>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-lg text-center">Account Information</th>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Username</td>
                                        <td><input style="border: none;" class="form-control" type="text" readonly id="name_review" name="name"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Password</td>
                                        <td><input style="border: none;" class="form-control" type="password" readonly id="password_review" name="password"></td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div><!-- /.modal-content -->
                </div>
                <div class="modal-footer">
                    <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                    <button class="btn btn-primary" type="button" data-bs-target="#thirdmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Prev</button>
                    <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>