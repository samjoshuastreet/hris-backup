<div id="basic-example">
    <!-- Seller Details -->
    <h3>Personal Information</h3>
    <section>
        <form>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="first_name">First name</label>
                        <input wire:model="first_name" type="text" class="form-control" id="first_name" placeholder="Enter Your First Name">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="middle_name">Middle name</label>
                        <input wire:model="middle_name" type="text" class="form-control" id="middle_name" placeholder="Enter Your Middle Name">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="last_name">Last name</label>
                        <input wire:model="last_name" type="text" class="form-control" id="last_name" placeholder="Enter Your Last Name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label>Gender</label>
                        <select wire:model="gender" class="form-select">
                            <option selected>Select</option>
                            <option value="AE">Male</option>
                            <option value="VI">Female</option>
                            <option value="MC">Non Binary</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="email_address">Email Address</label>
                        <input wire:model="email_address" type="text" class="form-control" id="email_address" placeholder="Enter Email Address">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="date_of_birth">Date of Birth</label>
                        <input wire:model="date_of_birth" class="form-control" type="date" id="date_of_birth">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="permanent_address">Permanent Address</label>
                        <input wire:model="permanent_address" type="text" class="form-control" id="permanent_address" placeholder="Enter Permanent Address">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="contact_number">Contact Number</label>
                        <input wire:model="contact_number" type="text" class="form-control" id="contact_number" placeholder="Enter Contact Number">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="current_address">Current Address</label>
                        <input wire:model="current_address" type="text" class="form-control" id="current_address" placeholder="Enter Current Address">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select wire:model="status" class="form-select" id="status">
                            <option selected>Select</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="on_leave">On Leave</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="department_id">Department</label>
                        <select wire:model="department_id" class="form-select" id="department_id">
                            <option selected>Select</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">

                                <label for="employee_photo">Employee Photo</label>

                                <div>
                                    <div class="dropzone">
                                        <div class="fallback">
                                            <input wire:model="employee_photo" id="employee_photo" name="file" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                            </div>

                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block" src="https://img.themesbrand.com/judia/new-document.png" alt="Dropzone-Image">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="pt-1">
                                                            <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                            <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-3">
                                                        <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Files</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </section>

    <!-- Company Document -->
    <h3>Employment Information</h3>
    <section>
        <form>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Your Title">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="">Date Hired</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Date Hired">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="">Salary</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Salary">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="">Employment Type</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Employment Type">
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- Bank Details -->
    <h3>Account Information</h3>
    <section>
        <div>
            <form>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-namecard-input">Username</label>
                            <input wire:model="username" type="text" class="form-control" id="basicpill-namecard-input" placeholder="Enter Your Name on Card">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-namecard-input">Work Email Address</label>
                            <input wire:model="email_address" type="text" class="form-control" id="basicpill-namecard-input" placeholder="Enter Your Name on Card">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="basicpill-cardno-input">Password</label>
                            <input wire:model="password" type="text" class="form-control" id="basicpill-cardno-input" placeholder="Credit Card Number">
                        </div>
                    </div>

                    <div class="col-lg-4">

                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Confirm Details -->
    <h3>Confirm Detail</h3>
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                    </div>
                    <div>
                        <h5>Confirm Detail</h5>
                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>