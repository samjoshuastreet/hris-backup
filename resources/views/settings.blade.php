<!doctype html>
<html lang="en">
<!-- start of head -->
@section('title', 'HRIS - Settings')
@include('layouts.components.head')
<!-- end of head -->

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
                Settings
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- end modal -->
            <!-- end modal -->
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
</body>

</html>