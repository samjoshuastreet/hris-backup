<!doctype html>
<html lang="en">

@section('title', 'HRIS - Departments')
@include('layouts.components.head')

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            @include('layouts.components.header')
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    @include('layouts.components.sidebar')
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Departments Manager</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Departments Manager</a></li>
                                        <li class="breadcrumb-item active">HRIS</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mb-0 card-title flex-grow-1">Departments Manager</h5>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Add New Department</button>
                                            <a href="#!" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
                                            <div class="dropdown d-inline-block">

                                                <button type="menu" class="btn btn-success" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="department_list">

                                        @include('departments.ajax.department_list')

                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto me-auto">
                                            <p class="text-muted mb-0">Showing <b>1</b> to <b>12</b> of <b>45</b> entries</p>
                                        </div>
                                        <div class="col-auto">
                                            <div class="card d-inline-block ms-auto mb-0">
                                                <div class="card-body p-2">
                                                    <nav aria-label="Page navigation example" class="mb-0">
                                                        <ul class="pagination mb-0">
                                                            <li class="page-item">
                                                                <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">...</a></li>
                                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">12</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <!-- Create a new department modal -->
                                    <div id="create_modal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">

                                            <form action="" id="departmentForm">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myMediumModalLabel">Add New Department</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="card-title-desc">Fill in details below.</p>

                                                        <div class="mb-3 row">
                                                            <label for="department_name" class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" placeholder="Add a name" id="department_name" name="department_name">
                                                                <small id="department_name_error" class="field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="description" class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <textarea id="description" class="form-control" maxlength="225" rows="3" placeholder="Add a description" name="description"></textarea>
                                                                <small id="description_error" class="field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="location" class="col-md-4 col-form-label">Location</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" placeholder="Add a location" id="location" name="location">

                                                                <small id="location_error" class="field_errors form-text text-warning"></small>

                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="contact_number" class="col-md-4 col-form-label">Contact Number</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" placeholder="Add a contact number" id="contact_number" name="contact_number">

                                                                <small id="contact_number_error" class="field_errors form-text text-warning"></small>

                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="email_address" class="col-md-4 col-form-label">Email Address</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="email" placeholder="Add an email address" id="email_address" name="email_address">

                                                                <small id="email_address_error" class="field_errors form-text text-warning"></small>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="number_of_employees" class="col-md-4 col-form-label">Number of Employees</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="number" step="1" id="number_of_employees" name="number_of_employees" value="0" disabled>

                                                                <small id="number_of_employees_error" class="field_errors form-text text-warning"></small>

                                                            </div>
                                                        </div>
                                                        <div class="mb-4 row">
                                                            <label for="department_status" class="form-label col-form-label col-md-4">Status</label>
                                                            <div class="col-md-8">
                                                                <select id="department_status" class="form-control select2 status" name="department_status">
                                                                    <option>Select</option>
                                                                    <option value="Active">Active</option>
                                                                    <option value="Inactive">Inactive</option>
                                                                    <option value="Pending Restructuring">Pending Restructuring</option>
                                                                    <option value="Pending Budget Approval">Pending Budget Approval</option>
                                                                    <option value="On Hold">On Hold</option>
                                                                </select>

                                                                <small id="department_status_error" class="field_errors form-text text-warning"></small>

                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary waves-effect btn-label waves-light addBtn">
                                                                <i class="bx bx-smile label-icon"></i>
                                                                Create
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </form>

                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <div id="update_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">

                                            <form id="DepartmentFormUpdate" action="">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myMediumModalLabel">Update Department</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="card-title-desc">Fill in details below.</p>
                                                        <input type="text" id="id" name="id" hidden>

                                                        <div class="mb-3 row">
                                                            <label for="department_name" class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <input wire:model="department_name" class="form-control" type="text" placeholder="Add a name" id="department_name" name="department_name">
                                                                <small id="department_name_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="description" class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <textarea wire:model="description" id="description" class="form-control" maxlength="225" rows="3" placeholder="Add a description" name="description"></textarea>
                                                                <small id="description_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="location" class="col-md-4 col-form-label">Location</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" wire:model="location" type="text" placeholder="Add a location" id="location" name="location">
                                                                <small id="location_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="contact_number" class="col-md-4 col-form-label">Contact Number</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" wire:model="contact_number" type="text" placeholder="Add a contact number" id="contact_number" name="contact_number">
                                                                <small id="contact_number_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="email_address" class="col-md-4 col-form-label">Email Address</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" wire:model="email_address" type="email" placeholder="Add an email address" id="email_address" name="email_address">
                                                                <small id="email_address_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="number_of_employees" class="col-md-4 col-form-label">Number of Employees</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" wire:model="number_of_employees" type="number" step="none" placeholder="Number of employees" id="number_of_employees" name="number_of_employees">
                                                                <small id="number_of_employees_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4 row mt-3">
                                                            <label for="department_status" class="form-label col-form-label col-md-4">Status</label>
                                                            <div class="col-md-8">
                                                                <select id="department_status" class="form-control select2 status" name="department_status">
                                                                    <option>Select</option>
                                                                    <option value="Active">Active</option>
                                                                    <option value="Inactive">Inactive</option>
                                                                    <option value="Pending Restructuring">Pending Restructuring</option>
                                                                    <option value="Pending Budget Approval">Pending Budget Approval</option>
                                                                    <option value="On Hold">On Hold</option>
                                                                </select>
                                                                <small id="department_status_update_error" class="update_field_errors form-text text-warning"></small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary waves-effect btn-label waves-light addBtn">
                                                                <i class="bx bx-smile label-icon"></i>
                                                                Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </form>

                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->

                    </div><!--end row-->


                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->

            @include('layouts.components.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                    <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @section('moreScripts')

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function render_list() {
            $.ajax({
                url: '{{ route("render_list") }}',
                data: '',
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#department_list').html(data);
                }
            });
        }

        function render_sidebar() {
            $.ajax({
                url: '{{ route("render_sidebar") }}',
                data: '',
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#sidebar-menu').html(data);
                }
            });
        }

        $(document).ready(function() {
            $(document).find('#sucMsgCont').hide();
            $('#delete_scs_cont').hide();
            $('#delete_fail_cont').hide();
            $('#departmentForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("create") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.addBtn').prop('disable', true);
                    },
                    complete: function() {
                        $('.addBtn').prop('disable', false);
                    },
                    success: function(data) {
                        if (data.success == true) {
                            document.getElementById('departmentForm').reset();
                            clear_validations();
                            printSuccessMsg(data.msg);
                            render_list();
                            render_sidebar();
                        } else if (data.success == false) {

                        } else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;

                function printSuccessMsg(msg) {
                    Swal.fire({
                        title: "New Department Created!",
                        text: "Do you want to create another one?",
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: "Add New",
                        denyButtonText: `Exit`,
                        icon: 'success'
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            // Nothing
                        } else if (result.isDenied) {
                            $('#create_modal').modal('toggle');
                        }
                    });
                }

                function printValidationErrorMsg(msg) {
                    clear_validations();
                    $.each(msg, function(field_name, error) {
                        $(document).find('#' + field_name + '_error').text(error);
                    });
                }
            });

            function clear_validations() {
                $(document).find('.field_errors').text('');
            }
        });

        $(document).on('click', '.department_delete', function() {
            var target_id = $(this).attr('data-id');
            var url = "{{ route('delete_record', 'target_id') }}";
            url = url.replace('target_id', target_id);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'get',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data.success == true) {
                                $('#delete_scs_cont').show();
                                $('#delete_scs').text(data.delete_scs);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                render_list();
                                render_sidebar();
                            } else if (data.success == false) {
                                Swal.fire({
                                    title: "Deletion Failed!",
                                    text: data.delete_fail,
                                    icon: "error"
                                });
                                $('#delete_fail_cont').show();
                                $('#delete_fail').text(data.delete_fail);
                            }
                        }
                    });
                }
            });

        });

        $(document).on('click', '.department_update', function() {
            $('#DepartmentFormUpdate #id').val($(this).attr('data-id'));
            $('#DepartmentFormUpdate #department_name').val($(this).attr('data-department_name'));
            $('#DepartmentFormUpdate #description').val($(this).attr('data-description'));
            $('#DepartmentFormUpdate #location').val($(this).attr('data-location'));
            $('#DepartmentFormUpdate #contact_number').val($(this).attr('data-contact_number'));
            $('#DepartmentFormUpdate #email_address').val($(this).attr('data-email_address'));
            $('#DepartmentFormUpdate #number_of_employees').val($(this).attr('data-number_of_employees'));
            $('#DepartmentFormUpdate #department_status').val($(this).attr('data-department_status'));
        });

        $(document).ready(function() {
            $('#DepartmentFormUpdate').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("update") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            document.getElementById('DepartmentFormUpdate').reset();
                            clear_validations();
                            render_list();
                            render_sidebar();
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated!',
                                text: 'Your data has been updated.',
                                confirmButtonText: 'OK'
                            });
                        } else if (data.success == false) {} else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
            });

            function printValidationErrorMsg(msg) {
                clear_validations();
                $.each(msg, function(field_name, error) {
                    $(document).find('#' + field_name + '_update_error').text(error[0]);
                });
            }

            function clear_validations() {
                $(document).find('.update_field_errors').text('');
            }
        });
    </script>
    @endsection
    @include('layouts.components.script')
    @livewireScripts
</body>

</html>