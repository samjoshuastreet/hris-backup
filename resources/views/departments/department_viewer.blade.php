<!doctype html>
<html lang="en">

@section('title', 'HRIS - ' . $department->department_name)
@include('layouts.components.head')

<body data-sidebar="dark">
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
                    <livewire:Sidebar />
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
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Department Details</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $department->department_name }}</a></li>
                                    <li class="breadcrumb-item active">Department List</li>
                                    <li class="breadcrumb-item active">HRIS</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fw-semibold">Overview</h5>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="col">Department Name</th>
                                                <td scope="col">{{ $department->department_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Location</th>
                                                <td>{{ $department->location }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Number of Active Employees</th>
                                                <td>{{ $department->number_of_employees }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Contact Number</th>
                                                <td>{{ $department->contact_number }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email Address</th>
                                                <td>{{ $department->email_address }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>
                                                    @if($department->status == 'Active')
                                                    <span class="badge badge-soft-success">{{ $department->status }}</span>
                                                    @elseif($department->status == 'Inactive')
                                                    <span class="badge badge-soft-danger">{{ $department->status }}</span>
                                                    @else
                                                    <span class="badge badge-soft-warning">{{ $department->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="hstack gap-2">
                                    <button class="btn btn-soft-primary w-100">Apply Now</button>
                                    <button class="btn btn-soft-danger w-100">Contact Us</button>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="d-flex">
                                    <img src="assets/images/companies/wechat.svg" alt="" height="50">
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-semibold">{{ $department->department_name }} Department</h5>
                                        <ul class="list-unstyled hstack gap-2 mb-0">
                                            <li>
                                                <i class="bx bx-building-house"></i> <span class="text-muted">{{ $department->location }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="fw-semibold mb-3">Description</h5>
                                <p class="text-muted">{{ $department->description }}</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!-- End Page-content -->

            <!-- start of footer-->
            @include('layouts.components.footer')
            <!-- end of footer-->
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
</body>

</html>