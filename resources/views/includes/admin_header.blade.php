<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Baiust</b>Canteen</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#">Balance: {{ Auth::user()->balance }} BDT</a>


                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->

                <li class="dropdown tasks-menu">

                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs">{{ Auth::user()->full_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li class="dropdown" style="text-transform: capitalize;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        c <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
    </div>
</nav>

<!-- Left side column. contains the logo and sidebar -->
{{--<aside class="main-sidebar">--}}
{{--<!-- sidebar: style can be found in sidebar.less -->--}}
{{--<section class="sidebar">--}}
{{--<!-- Sidebar user panel -->--}}
{{--<div class="user-panel">--}}
{{--<div class="pull-left image">--}}
{{--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
{{--</div>--}}
{{--<div class="pull-left info">--}}
{{--<p>{{ Auth::user()->full_name }}</p>--}}
{{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- search form -->--}}
{{--<form action="#" method="get" class="sidebar-form">--}}
{{--<div class="input-group">--}}
{{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
{{--<span class="input-group-btn">--}}
{{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
{{--</button>--}}
{{--</span>--}}
{{--</div>--}}
{{--</form>--}}
{{--<!-- /.search form -->--}}
{{--<!-- sidebar menu: : style can be found in sidebar.less -->--}}
{{--<ul class="sidebar-menu" data-widget="tree">--}}
{{--<li class="header">MAIN NAVIGATION</li>--}}

{{--<li class="nav">--}}
{{--<i class="fa fa-pie-chart"></i>--}}
{{--<a href="#">Dashboard</a>--}}
{{--</li>--}}

{{--<li class="nav">--}}
{{--<i class="fa fa-pie-chart"></i>--}}
{{--<a href="{{ route('admin.meal_order.index') }}">Meal Orders</a>--}}
{{--</li>--}}

{{--@if (Auth::user()->is_admin)--}}
{{--<li class="nav">--}}
{{--<i class="fa fa-files-o"></i>--}}
{{--<a href="{{ route('admin.meal_report.index') }}">Meal Reports</a>--}}
{{--</li>--}}
{{--@endif--}}


{{--<li class="nav">--}}
{{--<i class="fa fa-pie-chart"></i>--}}
{{--<a href="{{ route('admin.meal_payment.index') }}">Meal Payments</a>--}}
{{--</li>--}}

{{--<li  class="nav">--}}
{{--<i class="fa fa-pie-chart"></i>--}}
{{--<a href="{{ route('admin.bazar_cost.index') }}">Bazar Costs</a>--}}
{{--</li>--}}

{{--<li class="nav">--}}
{{--<i class="fa fa-laptop"></i>--}}
{{--<a href="{{ route('admin.menu.index') }}">Menus</a>--}}
{{--</li>--}}

{{--</section>--}}
{{--<!-- /.sidebar -->--}}
{{--</aside>--}}

















{{--<nav class="navbar navbar-inverse">--}}
{{--<div class="container-fluid">--}}

{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
{{--<span class="sr-only">Toggle navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="{{ route('admin.index') }}">Dashboard</a>--}}
{{--</div>--}}

{{--<!-- Collect the nav links, forms, and other content for toggling -->--}}

{{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li class="nav">--}}
{{--<a href="{{ route('admin.meal_order.index') }}">Meal Orders</a>--}}
{{--</li>--}}
{{--@if (Auth::user()->is_admin)--}}
{{--<li class="nav">--}}
{{--<a href="{{ route('admin.meal_report.index') }}">Meal Reports</a>--}}
{{--</li>--}}

{{--<li class="nav">--}}
{{--<a href="{{ route('admin.meal_payment.index') }}">Meal Payments</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--<li class="nav">--}}
{{--<a href="{{ route('admin.bazar_cost.index') }}">Bazar Cost</a>--}}
{{--</li>--}}
{{--<li class="nav">--}}
{{--<a href="{{ route('admin.menu.index') }}">Menus</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li class="nav">--}}
{{--<a href="#">Balance: {{ Auth::user()->balance }} BDT</a>--}}
{{--</li>--}}

{{--<li class="dropdown" style="text-transform: capitalize;">--}}
{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
{{--{{ Auth::user()->full_name }} <span class="caret"></span>--}}
{{--</a>--}}

{{--<ul class="dropdown-menu" role="menu">--}}
{{--<li>--}}
{{--<a href="{{ route('admin.logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--Logout--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">--}}
{{--{{ csrf_field() }}--}}
{{--</form>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}