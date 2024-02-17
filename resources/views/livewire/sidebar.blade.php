<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title" key="t-menu">Menu</li>
    <li>
        <a href="/home">
            <i class="bx bx-home-circle"></i>
            <span key="t-dashboards">Dashboard</span>
        </a>
    </li>
    <li>
        <a href="/employee">
            <i class="bx bxs-user-detail"></i>
            <span key="t-contacts">Employees</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="bx bx-timer"></i>
            <span key="t-contacts">Attendance</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="bx bx-user-plus"></i>
            <span key="t-contacts">Recruiting</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="bx bx-money"></i>
            <span key="t-contacts">Payroll</span>
        </a>
    </li>
    <li class="menu-title" key="t-menu">Organization</li>
    <li>
        <a href="#">
            <i class="bx bx-money"></i>
            <span key="t-contacts">Company</span>
        </a>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-share-alt"></i>
            <span key="t-multi-level">Departments</span>
        </a>
        <ul class="sub-menu" aria-expanded="true">
            <li><a href="/departments_manager" key="t-level-1-1">Department Manager</a></li>
            <li>
                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Department List</a>
                <ul class="sub-menu" aria-expanded="true">
                    @foreach($departments as $key => $department)
                    <li><a href="{{ route('view_department', ['id' => $department->id]) }}" key="t-level-2-{{ $key }}">{{ $department->department_name }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="bx bxs-book"></i>
            <span key="t-contacts">Policies</span>
        </a>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-calendar-check"></i>
            <span key="t-multi-level">Attendance</span>
        </a>
        <ul class="sub-menu" aria-expanded="true">
            <li><a href="/attendance" key="t-level-1-1">Check In/Out</a></li>
            <li>
                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Attendance Record</a>
                <ul class="sub-menu" aria-expanded="true">
                    {{-- @foreach($departments as $key => $department)
                    <li><a href="{{ route('view_department', ['id' => $department->id]) }}" key="t-level-2-{{ $key }}">{{ $department->department_name }}</a></li>
                    @endforeach --}}
                </ul>
            </li>
        </ul>
    </li>
</ul>
