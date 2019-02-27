<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            @if(!empty(Session::get('role') == 1))
                <li class="nav-item"><a href="javascript::void(0);"><i class="ft-square"></i><span data-i18n="" class="menu-title">Products</span></a>
                    <ul class="menu-content">
                        <li><a href="javascript::void(0);" class="menu-item">Categories</a>
                            <ul class="menu-content">
                                <li><a href="{{ route('manage_categories') }}" class="menu-item">Manage Categories</a><li>
                                <li><a href="{{ route('add_categories') }}" class="menu-item">Add Categories</a><li>
                            </ul>
                        </li>
                       
                       
                        <li><a href="javascript::void(0);" class="menu-item">Products</a>
                            <ul class="menu-content">
                                <li><a href="{{ route('manage_products') }}" class="menu-item">Manage Products</a><li>
                                <li><a href="{{ route('add_products') }}" class="menu-item">Add Products</a><li>
                            </ul>
                        </li>
                    </ul>
                    <li class="nav-item">
                        <a href="javascript::void(0);"><i class="fa fa-send-o fa-fw"></i><span data-i18n="" class="menu-title">Orders</span></a>
                        <ul class="menu-content">
                            <li>
                                <a href="{{ route('manage_seller_orders') }}"><span data-i18n="" class="menu-title">Manage Orders</span></a>
                            </li>
                        </ul>
                    </li>
                
                    <li class="nav-item">
                        <a href="javascript::void(0);"><i class="fa fa-money fa-fw"></i><span data-i18n="" class="menu-title">Payments</span></a>
                        <ul class="menu-content">
                            <li><a href="{{ route('manage_admin_invoices') }}" class="menu-item">Manage Invoices</a><li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript::void(0);"><i class="ft-settings"></i><span data-i18n="" class="menu-title">Settings</span></a>
                        <ul class="menu-content">
                            <li>
                                <a href="{{ route('edit_store_setting') }}"><span data-i18n="" class="menu-title">Store Settings</span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin_profile_settings') }}"><span data-i18n="" class="menu-title">Profile Settings</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript::void(0);"><i class="fa fa-users fa-fw"></i><span data-i18n="" class="menu-title">Users</span></a>
                        <ul class="menu-content">
                            <li>
                                <a href="{{ ('manage_users') }}"><span data-i18n="" class="menu-title">Manage Users</span></a>
                            </li>
                        </ul>
                    </li>
                </li>
            @endif
        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">