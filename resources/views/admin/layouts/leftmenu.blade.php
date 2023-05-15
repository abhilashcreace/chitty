<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin-dashboard') }}"
                        class="waves-effect waves-light {{ request()->is('admin-dashboard') ? 'active' : '' }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('branch-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-monitor"></i>
                        <span> Branches </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('branch-manage') }}">Manage Branch</a></li>
                        <li><a href="{{ route('branch-create') }}">Create Branch</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('scheme-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-monitor"></i>
                        <span> Schemes </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('scheme-manage') }}">Manage Scheme</a></li>
                        <li><a href="{{ route('scheme-create') }}">Create Scheme</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="{{ route('user-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-monitor"></i>
                        <span> Users </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('user-manage') }}">Manage User</a></li>
                        <li><a href="{{ route('user-create') }}">Create User</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('category-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-segment"></i>
                        <span> Category </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('category-manage') }}">Manage Category</a></li>
                        <li><a href="{{ route('category-create') }}">Create Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('tag-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-tag"></i>
                        <span> Tags </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('tag-manage') }}">Manage Tag</a></li>
                        <li><a href="{{ route('tag-create') }}">Create Tag</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('post-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-segment"></i>
                        <span> Post </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('post-manage') }}">Manage Post</a></li>
                        <li><a href="{{ route('post-pending') }}">Pending Post</a></li>
                        <li><a href="{{ route('post-create') }}">Create Post</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('video-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-youtube"></i>
                        <span> Video </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('video-manage') }}">Manage Video</a></li>
                        <li><a href="{{ route('video-create') }}">Create Video</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('ads-manage') }}" class="waves-effect waves-light">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Ads </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('ads-manage') }}">Manage Ads</a></li>
                        <li><a href="{{ route('ads-create') }}">Create Ad</a></li>
                    </ul>
                </li> --}}
            </ul>

        </div>
        <!-- End Sidebar -->





    </div>
    <!-- Sidebar -left -->

</div>