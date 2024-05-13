<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h4 class="logo-text">{{Auth::user()->name}}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{url('admin/dashboard')}}">
                <div class="parent-icon  @if(Request::segment(2)=='dashboard')active @endif "><i
                        class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @if(Auth::user()->can('job.menu'))
        <li class="menu-label">Job Manage</li>
        @if(Auth::user()->can('job.all'))

        <li>
            <a href="{{route('all.job')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title"> All Job</div>
            </a>
        </li>
        @endif
        @if(Auth::user()->can('job.add'))

        <li>
            <a href="{{route('add.job')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title"> Add Job</div>
            </a>
        </li>
        @endif
        @endif

        @if(Auth::user()->can('role.menu'))
        <li class="menu-label">Role & Permission </li>
        <li>
            <ul>
                @if(Auth::user()->can('permission.all'))

                <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission </a>
                </li>
                @endif
                @if(Auth::user()->can('role.all'))

                <li> <a href="{{ route('all.roles') }}"><i class='bx bx-radio-circle'></i>All Roles </a>
                </li>
                @endif
                @if(Auth::user()->can('roleinpermission.all'))

                <li> <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>All Role In
                        Permission </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if(Auth::user()->can('user.menu'))

        <li class="menu-label">Manage User and Super User </li>
        @if(Auth::user()->can('user.all'))

        <li> <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin User </a>
        </li>
        @endif
        @if(Auth::user()->can('user.add'))

        <li> <a href="{{ route('add.admin') }}"><i class='bx bx-radio-circle'></i>Add Admin User</a>
        </li>
        @endif
        @endif

        <li class="menu-label">Apply </li>

<li> <a href="{{ route('admin.apply') }}"><i class='bx bx-radio-circle'></i>All Job Apply </a>
</li>



    </ul>
    <!--end navigation-->
</div>