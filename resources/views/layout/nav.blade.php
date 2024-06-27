<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{url('')}}" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-book"></i>
                </div>
                <span class="b-title">Library</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Home</label>
                </li>
                <li data-username="message" class="nav-item ">
                    <a href="{{url('/')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li data-username="message" class="nav-item ">
                    <a href="{{route('b.name')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-book"></i>
                        </span>
                        <span class="pcoded-mtext">Library</span>
                    </a>
                </li>

{{--                <li data-username="message" class="nav-item">--}}
{{--                    <a href="data-analysis.php" class="nav-link">--}}
{{--                        <span class="pcoded-micon">--}}
{{--                            <i class="feather icon-pie-chart"></i>--}}
{{--                        </span><span class="pcoded-mtext">Data Analysis</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item pcoded-menu-caption">
                    <label>Borrow Management</label>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('bb.index')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-book"></i>
                        </span><span class="pcoded-mtext">Borrow Book</span>
                    </a>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('bb.return')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-inbox"></i>
                        </span><span class="pcoded-mtext">Return Book</span>
                    </a>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('bb.info')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-bookmark"></i>
                        </span><span class="pcoded-mtext">Borrow List</span>
                    </a>
                </li>

                <li data-username="message" class="nav-item">
                    <a href="{{route('bb.expired')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-upload"></i>
                        </span>
                        <span class="pcoded-mtext">Expired List</span>
                        <span class="pcoded-badge label label-danger">
                            {{$expiredCount}}
                        </span>
                    </a>
                </li>

                <li data-username="message" class="nav-item">
                    <a href="{{route('bb.fineList')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-bookmark"></i>
                        </span><span class="pcoded-mtext">Fine List</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>User Card Management</label>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('user_add')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-user-plus"></i>
                        </span><span class="pcoded-mtext">Add User Card</span>
                    </a>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('c.name')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span><span class="pcoded-mtext">All User List</span>
                    </a>
                </li>
{{--                <li data-username="message" class="nav-item">--}}
{{--                    <a href="user-request.php" class="nav-link">--}}
{{--                        <span class="pcoded-micon">--}}
{{--                            <i class="feather icon-user-check"></i>--}}
{{--                        </span><span class="pcoded-mtext">Requests User</span>--}}
{{--                        <span class="pcoded-badge label label-primary">--}}
{{--                            0                        </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"--}}
{{--                    class="nav-item pcoded-hasmenu">--}}
{{--                    <a href="#!" class="nav-link">--}}
{{--                        <span class="pcoded-micon">--}}
{{--                            <i class="feather icon-users"></i>--}}
{{--                        </span>--}}
{{--                        <span class="pcoded-mtext">User Manager</span>--}}
{{--                    </a>--}}
{{--                    <ul class="pcoded-submenu">--}}
{{--                        <li class="#"><a href="user-list.php" class="">User Lists</a></li>--}}
{{--                        <li class="#"><a href="user-active.php" class="">Active Users</a></li>--}}
{{--                        <li class="#"><a href="user-terminate.php" class="">Terminate Users</a></li>--}}
{{--                        <li class="#"><a href="user-delete.php" class="">Delete Users</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}



                <li class="nav-item pcoded-menu-caption">
                    <label>Book Management</label>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('add')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-plus-circle"></i>
                        </span><span class="pcoded-mtext">Add New Book</span>
                    </a>
                </li>
                <li data-username="message" class="nav-item">
                    <a href="{{route('b.name')}}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-bookmark"></i>
                        </span><span class="pcoded-mtext">All Book List</span>
                    </a>
                </li>

{{--                <li data-username="message" class="nav-item">--}}
{{--                    <a href="{{route('bb.index')}}" class="nav-link">--}}
{{--                        <span class="pcoded-micon">--}}
{{--                            <i class="feather icon-upload"></i>--}}
{{--                        </span>--}}
{{--                        <span class="pcoded-mtext">Borrow Book</span>--}}
{{--                        <span class="pcoded-badge label label-primary">--}}
{{--                            0                        </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item pcoded-hasmenu">--}}
{{--                    <a href="#!" class="nav-link">--}}
{{--                        <span class="pcoded-micon">--}}
{{--                            <i class="feather icon-server"></i>--}}
{{--                        </span>--}}
{{--                        <span class="pcoded-mtext">Book Manager</span>--}}
{{--                    </a>--}}
{{--                    <ul class="pcoded-submenu">--}}
{{--                        <li class="#"><a href="book-list.php" class="">Book List</a></li>--}}
{{--                        <li class="#"><a href="book-banned.php" class="">Banded Book</a></li>--}}
{{--                        <li class="#"><a href="book-deleted.php" class="">Deleted Book</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}


                <li class="nav-item p-2">
                    <form action="{{route("logout")}}" method="post">
                        @csrf
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="feather icon-log-out"></i> Logout
                        </button>
                    </form>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
