<!doctype html>
<html lang="en">

@section('title', 'HRIS - ' . $target->last_name)
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
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Employee Profile</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $target->last_name }}</a></li>
                                    <li class="breadcrumb-item active">Employees</li>
                                    <li class="breadcrumb-item active">HRIS</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3">
                        {{-- profile card --}}
                        @include('employee.profile.profile-card')
                    </div>

                    <div class="col-xl-6">
                        {{-- profile role card --}}
                        <div class="card">
                            @include('employee.profile.role-card')
                        </div>

                        {{-- calendar --}}
                        @include('employee.profile.calendar')
                    </div>

                    <div class="col-xl-3">
                        @include('employee.profile.profile-activiy')
                    </div>
                    <!-- end page title -->
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
        @include('layouts.components.right-sidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        @include('layouts.components.script')

        {{-- calendar --}}
        <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.min.js"></script>
        <script src="{{ asset('assets/libs/tui-dom/tui-dom.min.js') }}"></script>

        <script src="{{ asset('assets/libs/tui-time-picker/tui-time-picker.min.js') }}"></script>
        <script src="{{ asset('assets/libs/tui-date-picker/tui-date-picker.min.js') }}"></script>

        <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/libs/chance/chance.min.js') }}"></script>

        <script src="{{ asset('assets/libs/tui-calendar/tui-calendar.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/calendars.js') }}"></script>
        <script src="{{ asset('assets/js/pages/schedules.js') }}"></script>
        <script src="{{ asset('assets/js/pages/calendar.init.js') }}"></script>

        <!-- App js -->

</body>

</html>