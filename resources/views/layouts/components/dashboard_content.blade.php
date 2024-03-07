<link href="{{ asset('assets/css/dashboard/dashboard.css') }}" rel="stylesheet" type="text/css" />
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">HRIS</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-alert-outline me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="mdi mdi-alert-outline me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome back! Your dashboard is still under construction.</h5>
                                <h1>{{$employee->first_name}}</h1>
                            </div>
                        </div>
                        {{-- <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img  src="{{ asset('storage/' . $employee->employee_photo) }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ $user->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">125</h5>
                                        <p class="text-muted mb-0">Projects</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">$1245</h5>
                                        <p class="text-muted mb-0">Revenue</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid rounded-5" style="background-image: linear-gradient(to right top, #fcff70, #fff168, #ffe461, #ffd65c, #ffc959);">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="fw-medium">Total Employess</p>
                                    <h4 class="mb-0">{{$employee->count()}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="mdi mdi-account-group font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid rounded-5" style="background-image: linear-gradient(to right top, #a1ffc8, #aaffb8, #b7ffa7, #c6fe95, #d8fc83);">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="fw-medium">Remote</p>
                                    <h4 class="mb-0">0</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="mdi mdi-account-arrow-right font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid rounded-5" style="background-image: linear-gradient(to right top, #ffa1fd, #ffa5c4, #ffbd9f, #fad79e, #dceabb);">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="fw-medium">On leave</p>
                                    <h4 class="mb-0">0/{{$employee->count()}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="mdi mdi-airplane-takeoff font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-8">
                    <div class="card-body">
                        <div class="d-sm-flex flex-wrap">
                            <h4 class="card-title mb-4">Attendance Overview</h4>
                            <div class="ms-auto">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="stacked-column-chart" class="apex-charts" data-colors='["--bs-primary", "--bs-warning", "--bs-success"]' dir="ltr"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">News and Events</h4>
                            <ul class="verti-timeline list-unstyled">
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <h5 class="font-size-14">22 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                Responded to need “Volunteer Activities
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <h5 class="font-size-14">17 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                Everyone realizes why a new common language would be desirable... <a href="javascript: void(0);">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list active">
                                    <div class="event-timeline-dot">
                                        <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <h5 class="font-size-14">15 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                Joined the group “Boardsmanship Forum”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <h5 class="font-size-14">12 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                Responded to need “In-Kind Opportunity”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center mt-4"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
