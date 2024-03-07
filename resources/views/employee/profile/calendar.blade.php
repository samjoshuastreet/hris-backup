<div class="card">
    <div class="card-body">
        <h5 class="mb-4">{{ $target->first_name}}'s calendar</h5>
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

               <div class="lnb-calendars-item"><label><input type="checkbox" class="tui-full-calendar-checkbox-round" value="1" checked=""><span style="border-color: #556ee6; background-color: #556ee6;"></span><span>My Calendar</span></label></div>
                <div class="lnb-calendars-item"><label><input type="checkbox" class="tui-full-calendar-checkbox-round" value="3" checked=""><span style="border-color: #f46a6a; background-color: #f46a6a;"></span><span>Company</span></label></div>

            <div class="lnb-new-schedule float-sm-end ms-sm-3 mt-4 mt-sm-0">
            </div>
            <!-- <div id="calendarList" class="lnb-calendars-d1 mt-4 mt-sm-0 me-sm-0 mb-4"></div> -->

            <div id="calendar" style="height: 800px;"></div>

        </div>
        {{-- attendance card --}}
    </div>
</div>
