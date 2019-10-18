<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
    </button>
    </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="nav">
                <i class="fa fa-pie-chart"></i>
                <a href="#">Dashboard</a>
            </li>

            <li class="nav">
                <i class="fa fa-pie-chart"></i>
                <a href="{{ route('admin.meal_order.index') }}">Meal Orders</a>
            </li>
            @if(Auth::user()->role_type->name == 'general')
                <li class="nav">
                    <i class="fa fa-files-o"></i>
                    <a href="{{ route('admin.meal_report.index') }}">Meal Reports</a>
                </li>
            @endif
            <li class="nav">
                <i class="fa fa-pie-chart"></i>
                <a href="{{ route('admin.meal_payment.index') }}">Meal Payments</a>
            </li>
            <li  class="nav">
                <i class="fa fa-pie-chart"></i>
                <a href="{{ route('admin.bazar_cost.index') }}">Bazar Costs</a>
            </li>
            <li class="nav">
                <i class="fa fa-laptop"></i>
                <a href="{{ route('admin.menu.index') }}">Menus</a>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>