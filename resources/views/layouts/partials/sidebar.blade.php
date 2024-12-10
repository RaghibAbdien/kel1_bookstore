<aside class="main-sidebar hidden-print">
    <section class="sidebar" id="sidebar-scroll">
        <ul class="sidebar-menu">
            {{-- <li class="nav-level">--- Customer</li> --}}
            {{-- <li class="treeview {{ request()->is('landing-page') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/landing-page">
                    <i class="icofont icofont-book"></i><span> Landing Page</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('bookstore') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="{{ route('show-bookstore') }}">
                    <i class="icofont icofont-book"></i><span> Bookstore</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('order-history') ? 'active' : '' }}">
                <a class="waves-effect waves-dark" href="/order-history">
                    <i class="icofont icofont-book"></i><span> Order History</span>
                </a>
            </li> --}}
        </ul>
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
                    'manage-direct-sala' => 'icofont icofont-money',
                    'manage-virtual-sale' => 'icofont icofont-wallet',
                    'manage-report' => 'icofont icofont-pie-chart',
                ];
            @endphp
            @foreach ($menus as $menu)
                @if (auth()->user()->role->menus->contains($menu->id))
                    <li class="treeview {{ request()->routeIs($menu->slug) ? 'active' : '' }}">
                        <a class="waves-effect waves-dark" href="{{ route($menu->slug) }}">
                            <i class="{{ $menuIconMap[$menu->slug] ?? '' }}"></i><span> {{ $menu->menu_name }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
</aside>
