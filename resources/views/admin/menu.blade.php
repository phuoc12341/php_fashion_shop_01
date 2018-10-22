<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> {{ trans('text.dashboard') }}</a>
            </li>
            <li>
                <a href="admin/category/list"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('text.category') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/category/list">{{ trans('text.list') }}</a>
                    </li>
                    <li>
                        <a href="admin/category/add">{{ trans('text.add') }}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="admin/manufacturer/list"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('text.manufacturer') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/manufacturer/list">{{ trans('text.list') }}</a>
                    </li>
                    <li>
                        <a href="admin/manufacturer/add">{{ trans('text.add') }}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('text.product') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/product/list">{{ trans('text.list') }}</a>
                    </li>
                    <li>
                        <a href="admin/product/add">{{ trans('text.add') }}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ route('list_slide') }}"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('text.slide') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('list_slide') }}">{{ trans('text.list') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('add_slide') }}">{{ trans('text.add') }}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> {{ trans('text.user') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/user/list">{{ trans('text.list') }}</a>
                    </li>
                    <li>
                        <a href="admin/user/add">{{ trans('text.add') }}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
