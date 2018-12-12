<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item ">
            <router-link to="/admin" class="nav-link">
                <i class="nav-icon fa fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </router-link>
        </li>
        <li class="nav-item">
            <a href="/admin/navigation" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Navigation</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-pie-chart"></i>
                <p>About Us<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/board" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Board Members</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/documents" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Documents</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/goals" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Goals & Business Plan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/members" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Membership</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-tree"></i>
                <p>Communications<i class="fa fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/topics" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Hot Topics</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/newsletters" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Newsletters</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/admin/askmembers" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Ask The Members</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                Resources
                <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/resources" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Documents</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/links" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Links</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item ">
            <a href="/admin/sponsors" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>Sponsors</p>
            </a>
        </li>
        <li class="nav-header">CONFERENCES</li>
        <li class="nav-item">
            <router-link to="/admin/conferences" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Conferences</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/admin/conferences/schedules" class="nav-link">
                <i class="nav-icon fas fa-calendar-week"></i>
                <p>Schedules</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/admin/conferences/registration" class="nav-link">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>Registration</p>
            </router-link>
        </li>
        <li class="nav-header">Administration</li>
        <li class="nav-item">
            <router-link to="/admin/users" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Users</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/admin/developers" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Developer</p>
            </router-link>
        </li>

        <li class="nav-header">My Account</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                <p>{{ __('Logout') }}</p>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </li>
    </ul>
</nav>
