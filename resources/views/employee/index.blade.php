<!doctype html>
<html lang="en">

@section('title', 'HRIS - Departments')
@section('moreLinks')
<link href="{{ asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
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
                                <h4 class="mb-sm-0 font-size-18">Employee</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                        <li class="breadcrumb-item active">HRIS</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div id="employee_list">
                        @include('employee.ajax.employee_list')
                    </div>

                </div>


            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->

        <div id="EmployeeForm">
            @include('employee.forms.personal_information')
        </div>

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
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script>
    <script>
        $(document).ready(function() {

            function printValidationErrorMsg(msg) {
                clear_validations();
                $.each(msg, function(field_name, error) {
                    $(document).find('#' + field_name + '_error').text(error);
                });
            }

            function clear_validations() {
                $(document).find('.field_errors').text('');
            }

            function render_employee_list() {
                $.ajax({
                    url: '{{ route("render_employee_list") }}',
                    data: '',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#employee_list').html(data);
                    }
                });
            }

            $('#firstValidation').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("firstValidation") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            $('#firstmodal').modal('toggle');
                            $('#secondmodal').modal('toggle');
                            clear_validations();
                        } else {
                            console.log(data);
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;
            });

            $('#secondValidation').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $('#secondmodal').modal('toggle');
                $('#thirdmodal').modal('toggle');
                return false;
            });

            $('#thirdValidation').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("thirdValidation") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            $('#thirdmodal').modal('toggle');
                            $('#fourthmodal').modal('toggle');
                            $('#first_name_review').val($('#firstValidation #first_name').val());
                            $('#middle_name_review').val($('#firstValidation #middle_name').val());
                            $('#last_name_review').val($('#firstValidation #last_name').val());
                            $('#gender_review').val($('#firstValidation #gender').val());
                            $('#email_address_review').val($('#firstValidation #email_address').val());
                            $('#date_of_birth_review').val($('#firstValidation #date_of_birth').val());
                            $('#permanent_address_review').val($('#firstValidation #permanent_address').val());
                            $('#current_address_review').val($('#firstValidation #current_address').val());
                            $('#contact_number_review').val($('#firstValidation #contact_number').val());
                            $('#status_review').val($('#firstValidation #employee_status').val());
                            $('#department_review').val($('#firstValidation #department').val());
                            $('#name_review').val($('#thirdValidation #name').val());
                            $('#password_review').val($('#thirdValidation #password').val());
                            clear_validations();
                        } else {
                            console.log(data);
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;
            });

            $('#fourthValidation').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("fourthValidation") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            $('#firstValidation')[0].reset();
                            $('#secondValidation')[0].reset();
                            $('#thirdValidation')[0].reset();
                            $('#fourthValidation')[0].reset();
                            clear_validations();
                            render_employee_list();
                        } else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;
            });
        });
    </script>
    @endsection
    @include('layouts.components.script')
    @livewireScripts
</body>

</html>