<aside class="main-sidebar hidden-print">
    <section class="sidebar" id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">--- {{ Auth::user()->role->role_name }}</li>
            @php
                $menuIconMap = [
                    'dashboard' => 'icon-speedometer',
                    'manage-role' => 'icofont icofont-lock',
                    'manage-user' => 'icofont icofont-user',
                    'manage-catalog' => 'icofont icofont-tag',
                    'manage-stock' => 'icofont icofont-box',
                    'manage-warehouse' => 'icofont icofont-building',
                    'manage-purchase' => 'icofont icofont-cart',
                    'manage-global-pricing' => 'icofont icofont-price',
                    'manage-direct-sale' => 'icofont icofont-money',
                    'manage-virtual-sale' => 'icofont icofont-wallet',
                    'manage-report' => 'icofont icofont-pie-chart',
                    'landing-page' => 'icofont icofont-book',
                    'show-bookstore' => 'icofont icofont-tag',
                    'show-order-history' => 'icofont icofont-cart'
                ];
            @endphp
            @foreach ($menus as $menu)
                @php
                    $userRole = auth()->user()->role;
                @endphp

                @if ($userRole && $userRole->menus->contains($menu->id))
                    @if ($userRole->role_name == 'Admin')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Customer')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Customer Service')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Cashier')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Head Manager')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Purchasing Agent')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Logistic Manager')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Store Manager')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    @if ($userRole->role_name == 'Cashier')
                        <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                    @endif
                    <a class="waves-effect waves-dark" href="{{ route($menu->slug) }}">
                        <i class="{{ $menuIconMap[$menu->slug] ?? '' }}"></i><span> {{ $menu->menu_name }}</span>
                    </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
</aside>
