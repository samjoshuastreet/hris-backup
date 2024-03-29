<!doctype html>
<html lang="en">

@section('title', 'HRIS - Departments')
@section('moreLinks')
<link rel="stylesheet" href="{{ asset('assets/cropperjs/cropper.min.css') }}" />
@endsection
@include('layouts.components.head')
<link rel="stylesheet" href="{{asset('assets/css/employee/list-card.css')}}">

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

                    <div class="card-body mb-4">
                        <form id="filter" action="javascript:void(0);">
                            <div class="row g-3">
                                <input type="text" id="list_mode" name="list_mode" value="{{ $list_mode }}" hidden>
                                <!--end col-->
                                <div class="col-xxl-2 col-lg-4">
                                    <div class="position-relative">
                                        <div id="datepicker1">
                                            <input type="text" class="form-control" placeholder="Search an employee..." data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker" data-date-autoclose="true">
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-2 col-lg-2">
                                    <ul class="nav nav-pills justify-content-center">
                                        <li class="nav-item">
                                            <a id="list_view_btn" class="nav-link active" style="cursor: pointer;">
                                                <i class="mdi mdi-format-list-bulleted"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="grid_view_btn" class="nav-link" style="cursor: pointer;">
                                                <i class="mdi mdi-view-grid-outline"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-xxl-2 col-lg-6">
                                    <div class="position-relative h-100 hstack gap-3">
                                        <button type="submit" class="btn btn-primary h-100 w-100"><i class="bx bx-search-alt align-middle"></i> Find</button>
                                        <a href="#collapseExample" data-bs-toggle="collapse" class="btn btn-secondary h-100 w-100 collapsed" aria-expanded="false"><i class="bx bx-filter-alt align-middle"></i> Advance</a>
                                        <button data-bs-toggle="modal" data-bs-target="#firstmodal" class="btn btn-success h-100 w-100"><i class="bx bx-smile label-icon"></i> Add Employee</button>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="collapse" id="collapseExample" style="">
                                    <div>
                                        <div class="row g-3">
                                            <div class="col-xxl-4 col-lg-6">
                                                <div>
                                                    <label for="experience" class="form-label fw-semibold">Filter by Department</label>
                                                </div>
                                                @foreach($departments as $department)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="{{ $department->department_name }}" name="{{ $department->id }}" value="true">
                                                    <label class="form-check-label" for="{{ $department->department_name }}">{{ $department->department_name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="col-xxl-4 col-lg-6">
                                                <div>
                                                    <label for="experience" class="form-label fw-semibold">Filter by Gender</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="male" name="male_sort" value="true">
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="female" name="female_sort" value="true">
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="non_binary" name="non_binary_sort" value="non_binary">
                                                    <label class="form-check-label" for="non_binary">Non-Binary</label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-lg-6">
                                                <div>
                                                    <label for="experience" class="form-label fw-semibold">Filter by Name</label>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="name_sort" value="off" id="name_sort_off" autocomplete="off" checked="">
                                                    <label class="btn btn-outline-secondary" for="name_sort_off">None</label>

                                                    <input type="radio" class="btn-check" name="name_sort" value="first_name" id="first_name_sort" autocomplete="off">
                                                    <label class="btn btn-outline-secondary" for="first_name_sort">First Name</label>

                                                    <input type="radio" class="btn-check" name="name_sort" value="last_name" id="last_name_sort" autocomplete="off">
                                                    <label class="btn btn-outline-secondary" for="last_name_sort">Last Name</label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-lg-6">
                                                <div>
                                                    <label for="experience" class="form-label fw-semibold">Order By</label>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="order_by" value="asc" id="asc" autocomplete="off" checked="">
                                                    <label class="btn btn-outline-secondary" for="asc">Ascending</label>

                                                    <input type="radio" class="btn-check" name="order_by" value="desc" id="desc" autocomplete="off">
                                                    <label class="btn btn-outline-secondary" for="desc">Descending</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>

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

    <!-- Modals -->
    <div class="modal fade" id="crop-cont" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="upload-demo">
                    <div class="d-flex justify-content-center align-items-center">
                        <img id="photo-cropper" alt="Upload an Image" />
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Toogle to second dialog -->
                    <button id="crop-btn" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    @section('moreScripts')
    <script src="{{ asset('assets/cropperjs/cropper.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#filter").submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('custom_sort') }}",
                    data: formData,
                    success: function(html) {
                        $('#employee_list').html(html);
                    }
                });
            });

            $('#list_view_btn').click(function() {
                $.ajax({
                    url: "{{ route('list_view') }}",
                    data: "",
                    success: function(html) {
                        $('#employee_list').html(html);
                        $('#list_view_btn').addClass('active');
                        $('#grid_view_btn').removeClass('active');
                        $('#list_mode').val(1);
                    }
                });
            });

            $('#grid_view_btn').click(function() {
                $.ajax({
                    url: "{{ route('grid_view') }}",
                    data: "",
                    success: function(html) {
                        $('#employee_list').html(html);
                        $('#grid_view_btn').addClass('active');
                        $('#list_view_btn').removeClass('active');
                        $('#list_mode').val(0);
                    }
                });
            });

        });
    </script>
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
                            const fileInput = document.getElementById('profile-img');
                            const selectedImage = document.getElementById('profile-img-two');
                            console.log(fileInput.src);
                            if (fileInput.src !== 'http://127.0.0.1:8000/employee') {
                                console.log('here');
                                $('#profile-img-two').show();
                                selectedImage.src = fileInput.src;
                            } else {
                                $('#profile-img-two').hide();
                            }
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

                // Create a FormData object
                let formData = new FormData();

                // Append form data using serializeArray
                $.each($(this).serializeArray(), function(i, field) {
                    formData.append(field.name, field.value);
                });

                // Append file inputs
                formData.append('employee_photo_two', $('#employee_photo_two')[0].files[0]);

                console.log(formData);

                // Send AJAX request
                $.ajax({
                    url: '{{ route("fourthValidation") }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            $('#firstValidation')[0].reset();
                            $('#secondValidation')[0].reset();
                            $('#thirdValidation')[0].reset();
                            $('#fourthValidation')[0].reset();

                            $('#profile-img').attr('src', '');
                            $('#employee_photo_two').attr('src', '');
                            $('#profile-img').hide();
                            $('#employee_photo_two').hide();
                            clear_validations();
                            render_employee_list();
                            Swal.fire({
                                title: "Success!",
                                text: "New Employee Created!",
                                icon: 'success'
                            })
                        } else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const imageInput = document.getElementById('employee_photo');
            const croppedImage = document.getElementById('photo-cropper');
            const cropButton = document.getElementById('crop-btn');
            const image_preview = document.getElementById('profile-img');
            const removeButton = document.getElementById('removeImg-btn');
            $('#profile-img').hide();
            $('#removeImg-btn').hide();

            let cropper;

            imageInput.addEventListener('change', (e) => {
                const file = e.target.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        croppedImage.src = e.target.result;

                        // Destroy the previous Cropper instance if it exists
                        if (cropper) {
                            cropper.destroy();
                        }

                        // Initialize a new Cropper instance on the updated image
                        cropper = new Cropper(croppedImage, {
                            aspectRatio: 1,
                            viewMode: 1
                        });
                    };

                    reader.readAsDataURL(file);

                    // Use Bootstrap methods to toggle modal visibility
                    $('#crop-cont').modal('toggle');
                    $('#firstmodal').modal('toggle');
                    $('#removeImg-btn').show();
                }
            });

            removeButton.addEventListener('click', () => {
                $('#profile-img').attr('src', '');
                $('#employee_photo_two').attr('src', '');
                $('#employee_photo').val('');
                $('#employee_photo_two').val('');
                $('#profile-img').hide();
                $('#employee_photo_two').hide();
                $('#removeImg-btn').hide();
            });

            cropButton.addEventListener('click', () => {
                // Get the cropped image data URL
                const croppedDataUrl = cropper.getCroppedCanvas().toDataURL();

                // Create a new Blob from the data URL
                const blob = dataURLtoBlob(croppedDataUrl);

                // Create a new File object from the Blob
                const croppedFile = new File([blob], 'cropped_image.jpg', {
                    type: 'image/jpeg'
                });

                // Create a new DataTransfer object
                const dataTransfer = new DataTransfer();

                // Add the new File object to the DataTransfer object
                dataTransfer.items.add(croppedFile);

                // Set the files property of the employee_photo_two input to the DataTransfer object files
                document.getElementById('employee_photo_two').files = dataTransfer.files;

                // Display the cropped image in the preview
                image_preview.src = croppedDataUrl;

                // Show the profile image
                $('#profile-img').show();

                // Close the modals
                $('#crop-cont').modal('toggle');
                $('#firstmodal').modal('toggle');
            });

            function dataURLtoBlob(dataURL) {
                const parts = dataURL.split(';base64,');
                const contentType = parts[0].split(':')[1];
                const raw = window.atob(parts[1]);
                const rawLength = raw.length;
                const uint8Array = new Uint8Array(rawLength);

                for (let i = 0; i < rawLength; ++i) {
                    uint8Array[i] = raw.charCodeAt(i);
                }

                return new Blob([uint8Array], {
                    type: contentType
                });
            }
        });
    </script>





    @endsection
    @include('layouts.components.script')
    @livewireScripts
</body>

</html>