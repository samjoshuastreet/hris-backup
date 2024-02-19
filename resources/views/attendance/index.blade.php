<!doctype html>
<html lang="en">

@section('title', 'HRIS - Departments')
@section('moreLinks')
<link href="{{ asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
@include('layouts.components.head')
{{-- <link href="{{ asset('assets/css/analog-clock.css') }}" rel="stylesheet" type="text/css" /> --}}

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
                    {{-- <div class="row">
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
                    </div> --}}
                    <h1>Attendance</h1>
                    <!-- end page title -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Check In/Out</h4>
                            <div class="row">
                                <div class="col-sm-4  mb-sm-2" style="text-align: center;">
                                    <p class="text-muted">Last Check In</p>
                                    <h3>9:08 am</h3>
                                    <p class="text-muted"> Wednesday, February 14,2024 </p>
                                    <div class="mt-4">
                                        <button class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target="#checkinoutform">Check In <i class="bx bx-time"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm-4  mb-sm-2">
                                    @include('layouts.components.clock')
                                </div>
                                {{-- clock --}}
                                <div class="col-sm-4  mb-sm-2" style="text-align: center;">
                                    <p class="text-muted">Last Check Out</p>
                                    <h3>5:08 pm</h3>
                                    <p class="text-muted">Wednesday, February 14,2024 </p>
                                    <div class="mt-4">
                                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm disabled">Check out <i class="va vaadin-time-backward"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">"Time is the most valuable thing a man can spend." - Theophrastus</p>
                        </div>
                    </div>


                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->

            <!-- Modal -->
            <div class="modal fade" id="jobDelete" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body px-4 py-5 text-center">
                            <button type="button" id="close_button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="avatar-sm mb-4 mx-auto">
                                <div class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </div>
                            </div>
                            <p class="text-muted font-size-16 mb-4">Are you sure you want to permanently erase the job.</p>

                            <div class="hstack gap-2 justify-content-center mb-0">
                                <button type="button" class="btn btn-danger">Delete Now</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sample modal content -->
            <div id="checkinoutform" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalFullscreenLabel">Add an Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">

                                        @include('attendance.forms.checkInOutForm')

                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


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
    @endsection
    @include('layouts.components.script')
    @livewireScripts
    {{-- <script src="{{ asset('assets/js/analog-clock.js') }}"></script> --}}
</body>

</html>