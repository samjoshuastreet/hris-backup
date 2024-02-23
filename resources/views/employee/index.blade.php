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

    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#upload-cont">Open First Modal</button>

    <!-- First modal dialog -->
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
