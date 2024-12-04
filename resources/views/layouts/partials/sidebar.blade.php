<aside class="main-sidebar hidden-print">
    <section class="sidebar" id="sidebar-scroll">
        <ul class="sidebar-menu">
            <li class="nav-level">--- Customer</li>
            <li class="treeview {{ request()->is('landing-page') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/landing-page">
                    <i class="icofont icofont-book"></i><span> Landing Page</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('bookstore') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/bookstore">
                    <i class="icofont icofont-book"></i><span> Bookstore</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('order-history') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/order-history">
                    <i class="icofont icofont-book"></i><span> Order History</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">--- Admin</li>
            <li class="treeview {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/dashboard">
                    <i class="icon-speedometer"></i><span> Dashboard</span>
                </a>
            </li>
            <li
                class="treeview {{ request()->is('manage-user') || request()->is('add-user') || request()->is('edit-user') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-user">
                    <i class="icofont icofont-user"></i><span> Manage User</span>
                </a>
            </li>
            <li
                class="{{ request()->is('manage-role') || request()->is('add-role') || request()->is('edit-role') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="{{ route('manage-role') }}">
                    <i class="icofont icofont-lock"></i><span> Manage Role & Access</span>
                </a>
            </li>
            <li
                class="{{ request()->is('manage-catalog') || request()->is('add-product') || request()->is('edit-product') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-catalog">
                    <i class="icofont icofont-tag"></i><span> Manage Catalog</span>
                </a>
            </li>
            <li
                class="{{ request()->is('manage-stock') || request()->is('add-quantity') || request()->is('edit-quantity') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-stock">
                    <i class="icofont icofont-box"></i><span> Manage Stock</span>
                </a>
            </li>
            <li
                class="{{ request()->is('manage-warehouse') || request()->is('add-warehouse-quantity') || request()->is('edit-warehouse-quantity') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-warehouse">
                    <i class="icofont icofont-building"></i><span> Manage Warehouse</span>
                </a>
            </li>
            <li
                class="{{ request()->is('manage-purchase') || request()->is('add-purchase-quantity') || request()->is('edit-purchase-quantity') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-purchase">
                    <i class="icofont icofont-cart"></i><span> Manage Purchasing</span>
                </a>
            </li>
            <li class="{{ request()->is('manage-delivery') || request()->is('edit-delivery') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-delivery">
                    <i class="icofont icofont-truck"></i><span> Order & Delivery</span>
                </a>
            </li>
            <li class="{{ request()->is('manage-pos') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-pos">
                    <i class="icofont icofont-wallet"></i><span> Sales & Transactions</span>
                </a>
            </li>
            <li
                class="{{ request()->is('manage-report') || request()->is('detail-report') || request()->is('edit-report') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-report">
                    <i class="icofont icofont-pie-chart"></i><span> Reports & Analytics</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
