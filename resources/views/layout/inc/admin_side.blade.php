@php
    function mAct($page_name)
    {
        $val = '';
        $page = basename($_SERVER['PHP_SELF']);
        if($page_name == $page) {
            $val = 'active';
        }
        return $val;
    }
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('assets/images/icons/icon.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Online Clinic</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}} </a>
            </div>
        </div>

 

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link {{mAct('dashboard')}} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/manage_users" class="nav-link {{mAct('manage_users')}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/today_appointment" class="nav-link {{mAct('today_appointment')}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                           Today's Appointment
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/appointment/all" class="nav-link {{mAct('all')}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            All Appointment
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="/admin/appointment/pending" class="nav-link {{mAct('pending')}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pending Appointment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/contact_message" class="nav-link {{mAct('contact_message')}}">
                        <i class="nav-icon fas fa-phone-alt"></i>
                        <p>
                            Contact Messages
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>