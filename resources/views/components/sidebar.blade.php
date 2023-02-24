<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Groups</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('groups.index')}}">
                        <i class="bi bi-circle"></i><span>View Groups</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#loanofficer" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Loan Officer</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="loanofficer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('loan_officers.index')}}">
                        <i class="bi bi-circle"></i><span>View Loan Officer</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#member" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Members</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="member" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('members.index')}}">
                        <i class="bi bi-circle"></i><span>View Member</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#loan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Loan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="loan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('transactions.index')}}">
                        <i class="bi bi-circle"></i><span>View Loan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#group_transaction" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Manual Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="group_transaction" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('savings.index')}}">
                        <i class="bi bi-circle"></i><span>Savings</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('weekly.index')}}">
                        <i class="bi bi-circle"></i><span>Weekly</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope-dash"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('reports.daily_over_due')}}">
                        <i class="bi bi-circle"></i><span>Daily Over Due</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('weekly.index')}}">
                        <i class="bi bi-circle"></i><span>Reliazable</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Icons Nav -->

{{--        <li class="nav-heading">System Settings</li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="users-profile.html">--}}
{{--                <i class="bi bi-person"></i>--}}
{{--                <span>Profile</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Profile Page Nav -->--}}


    </ul>

</aside><!-- End Sidebar-->
