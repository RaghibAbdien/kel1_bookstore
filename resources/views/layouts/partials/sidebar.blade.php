<aside class="main-sidebar hidden-print">
    <section class="sidebar" id="sidebar-scroll">
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
                class="{{ request()->is('manage-role') || request()->is('manage-role') || request()->is('edit-role') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/manage-role">
                    <i class="icofont icofont-lock"></i><span> Manage Role & Access</span>
                </a>
            </li>
            <li class="">
                <a class="waves-effect waves-dark" href="catalog-management.html">
                    <i class="icofont icofont-tag"></i><span> Manage Catalog</span>
                </a>
            </li>
            <li class="">
                <a class="waves-effect waves-dark" href="stock-management.html">
                    <i class="icofont icofont-box"></i><span> Manage Stock</span>
                </a>
            </li>
            <li class="">
                <a class="waves-effect waves-dark" href="order-delivery.html">
                    <i class="icofont icofont-cart"></i><span> Order & Delivery</span>
                </a>
            </li>
            <li class="">
                <a class="waves-effect waves-dark" href="sales-transactions.html">
                    <i class="icofont icofont-wallet"></i><span> Sales & Transactions</span>
                </a>
            </li>
            <li class="">
                <a class="waves-effect waves-dark" href="reports-analytics.html">
                    <i class="icofont icofont-pie-chart"></i><span> Reports & Analytics</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
