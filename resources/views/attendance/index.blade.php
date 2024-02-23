<!doctype html>
<html lang="en">

@section('title', 'HRIS - Attendance')
@section('moreLinks')
<link href="{{ asset('assets/css/analog-clock.css') }}" rel="stylesheet" type="text/css" />
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
                                <h1>Attendance</h1>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Attendance</a></li>
                                        <li class="breadcrumb-item active">HRIS</li>
                                    </ol>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Check In/Out</h4>
                            <div class="row">
                                <div id="reload-data-a" class="col-sm-4 d-flex justify-content-center">
                                    @include('attendance.ajax.reload_data_a')
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-2">
                                    <div class="analog-clock">
                                        <div class="hand hour"></div>
                                        <div class="hand minute"></div>
                                        <div class="hand second"></div>
                                        <div class="point"></div>
                                        <div class="hour h12">12</div>
                                        <div class="hour h3">3</div>
                                        <div class="hour h6">6</div>
                                        <div class="hour h9">9</div>
                                        <div class="hour time">00:00:--</div>
                                    </div>
                                </div>
                                <div id="reload-data-b" class="col-sm-4 d-flex justify-content-center">
                                    @include('attendance.ajax.reload_data_b')
                                </div>
                            </div>
                            <p class="text-muted mt-5 mb-0">"Time is the most valuable thing a man can spend." - Theophrastus</p>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->

            <!-- Modal -->
            {{-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

            </div> --}}
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Check In</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div>
                                    <h1>19</h2>
                                        <h4>FEB</h4>
                                </div>
                                <div>
                                    <h2>9:08 AM</h2>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- check in modal content -->
            <div id="checkinform" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalFullscreenLabel">Check In</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="check_in_form" action="">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            @if(isset($record))
                                            <input type="text" id="record_id" value="{{ $record->id }}" hidden>
                                            @endif
                                            @include('attendance.forms.check_in')

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
                                <button type="submit" id="check-in-btn" class="btn btn-primary waves-effect waves-light">Check In</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- check out modal content -->
            <div id="checkoutform" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalFullscreenLabel">Check Out</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="check_out_form" action="">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">

                                            @include('attendance.forms.check_out')

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
                                <button type="submit" id="check-in-btn" class="btn btn-primary waves-effect waves-light">Check Out</button>
                            </div>
                        </form>
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
    <script type="text/javascript" src="{{ asset('assets/js/analog-clock.js') }}" defer></script>
    <script src="{{ asset('assets/webcam/webcam.min.js') }}"></script>
    <script>
        function configure(mode) {
            Webcam.set({
                width: 200,
                height: 150,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            if (mode == "time_in") {
                Webcam.attach('#myCameraIn');
            } else {
                Webcam.attach('#myCameraOut');
            }
        }

        function captureAndSave(mode, id) {
            Webcam.snap(function(data_uri) {
                saveImage(data_uri, mode, id);
            });
            Webcam.reset();
        }

        function saveImage(imageData, mode) {
            $.ajax({
                url: '{{ route("save_image") }}',
                data: {
                    imageData: imageData,
                    mode: mode
                },
                success: function(response) {
                    console.log('Photo Success!');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            function reload_a() {
                $.ajax({
                    url: '{{ route("reload_a") }}',
                    data: '',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#reload-data-a').html(data);
                    }
                });
            }

            function reload_b() {
                $.ajax({
                    url: '{{ route("reload_b") }}',
                    data: '',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#reload-data-b').html(data);
                    }
                });
            }

            function load_time() {
                $.ajax({
                    url: '{{ route("load_time") }}',
                    data: '',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#time-cont').html(data);
                    }
                });
            }

            $('#check_in_btn').click(function() {
                load_time();
            });

            $('#check_out_btn').click(function() {
                load_time();
            });

            $('#check_in_form').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("check_in") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#checkinform').modal('toggle');
                        reload_a();
                        reload_b();
                        captureAndSave("time_in");
                    },
                    error: function(error) {
                        console.error("Error:", error);
                    }
                });
            });

            $('#check_out_form').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("check_out") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#checkoutform').modal('toggle');
                        reload_a();
                        reload_b();
                        captureAndSave("time_out");
                    },
                    error: function(error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
    @endsection
    @include('layouts.components.script')


</body>

</html>