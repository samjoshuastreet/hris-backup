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
                        @include('layouts.components.profile.profile-card')
                    </div>

                <div class="col-xl-6">
                        {{-- profile role card --}}
                    <div class="card">
                        <div class="card-body">
                                <h5>Role</h5>
                                <h6 style="text-align: center">Employee</h6>
                                {{-- <h6 class="text-center"><span class="badge badge-pill badge-soft-success font-size-11 mb-2">Full Time </span></h6> --}}
                                <div class="info"></div>
                        </div>
                    </div>

                    {{-- attendance card --}}
                    <div class="card">
                        <div class="card-body">
                            <div id="lnb">

                                <div id="right">
                                    <div id="menu" class="mb-3">

                                        <span id="menu-navi" class="d-sm-flex flex-wrap text-center text-sm-start justify-content-sm-between">
                                            <div class="d-sm-flex flex-wrap gap-1">
                                                <div class="btn-group mb-2" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary move-day" data-action="move-prev">
                                                        <i class="calendar-icon ic-arrow-line-left mdi mdi-chevron-left"
                                                            data-action="move-prev"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary move-day" data-action="move-next">
                                                        <i class="calendar-icon ic-arrow-line-right mdi mdi-chevron-right"
                                                            data-action="move-next"></i>
                                                    </button>
                                                </div>


                                                <button type="button" class="btn btn-primary move-today mb-2"
                                                    data-action="move-today">Today</button>
                                            </div>

                                            <h4 id="renderRange" class="render-range fw-bold pt-1 mx-3"></h4>

                                            <div class="dropdown align-self-start mt-3 mt-sm-0 mb-2">
                                                <button id="dropdownMenu-calendarType" class="btn btn-primary" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i id="calendarTypeIcon" class="calendar-icon ic_view_month" style="margin-right: 4px;"></i>
                                                    <span id="calendarTypeName">Dropdown</span>&nbsp;
                                                    <i class="calendar-icon tui-full-calendar-dropdown-arrow"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" role="menu" aria-labelledby="dropdownMenu-calendarType">
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-daily">
                                                            <i class="calendar-icon ic_view_day"></i>Daily
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-weekly">
                                                            <i class="calendar-icon ic_view_week"></i>Weekly
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-monthly">
                                                            <i class="calendar-icon ic_view_month"></i>Month
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-weeks2">
                                                            <i class="calendar-icon ic_view_week"></i>2 weeks
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-weeks3">
                                                            <i class="calendar-icon ic_view_week"></i>3 weeks
                                                        </a>
                                                    </li>
                                                    <li role="presentation" class="dropdown-divider"></li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-workweek">
                                                            <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-workweek"
                                                                checked>
                                                            <span class="checkbox-title"></span>Show weekends
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-start-day-1">
                                                            <input type="checkbox" class="tui-full-calendar-checkbox-square"
                                                                value="toggle-start-day-1">
                                                            <span class="checkbox-title"></span>Start Week on Monday
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a class="dropdown-item" role="menuitem" data-action="toggle-narrow-weekend">
                                                            <input type="checkbox" class="tui-full-calendar-checkbox-square"
                                                                value="toggle-narrow-weekend">
                                                            <span class="checkbox-title"></span>Narrower than weekdays
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>

                                    </div>
                                </div>

                                <div class="lnb-new-schedule float-sm-end ms-sm-3 mt-4 mt-sm-0">
                                    <button id="btn-new-schedule" type="button" class="btn btn-primary lnb-new-schedule-btn" data-toggle="modal">
                                        New schedule</button>
                                </div>
                                <div id="calendarList" class="lnb-calendars-d1 mt-4 mt-sm-0 me-sm-0 mb-4"></div>

                                <div id="calendar" style="height: 800px;"></div>

                            </div>
                            {{-- attendance card --}}
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    @include('layouts.components.profile.profile-activiy')
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
