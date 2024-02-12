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
                                <h4 class="mb-sm-0 font-size-18">Employee</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Department Manager</a></li>
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
                                        <h5 class="mb-0 card-title flex-grow-1">List of Employee</h5>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Add New Employee</button>
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
                                    <span class="alert alert-success" id="alert-success" style="display: none;"></span>
                                    <span class="alert alert-danger" id="alert-success" style="display: none;"></span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered align-middle nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Designtion</th>
                                                    <th scope="col">Contact Number</th>
                                                    <th scope="col">Email Address</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <livewire:DepartmentList />
                                        </table>
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

                                            <livewire:EmployeeForm />

                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->

                    </div><!--end row-->


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

    @include('layouts.components.script')
    @livewireScripts
</body>

</html>
