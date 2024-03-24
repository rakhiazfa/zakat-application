<aside class="sidebar">
    <div class="sidebar-header">
        <h4 class="text-2xl text-blue-500 text-center font-bold">
            <div class="flex items-center gap-2 select-none">
                <span>
                    Merdekalio
                </span>
            </div>
        </h4>
    </div>
    <nav class="navigations">
        <ul class="sidebar-menu">

            <li class="menu-title">Navigations</li>

            <li>
                <a class="sidebar-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="uil uil-apps"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="menu-title">Applications</li>

            <li>
                <a class="sidebar-link {{ request()->routeIs('pembayaran*') ? 'active' : '' }}"
                    href="{{ route('pembayaran') }}">
                    <i class="uil uil-credit-card"></i>
                    <span> Pembayaran </span>
                </a>
            </li>

            <li>
                <a class="sidebar-link {{ request()->routeIs('zakat_fitrah*') ? 'active' : '' }}"
                    href="{{ route('zakat_fitrah') }}">
                    <i class="uil uil-invoice"></i>
                    <span> Zakat Fitrah </span>
                </a>
            </li>

            <li>
                <a class="sidebar-link {{ request()->routeIs('zakat_maal*') ? 'active' : '' }}"
                    href="{{ route('zakat_maal') }}">
                    <i class="uil uil-invoice"></i>
                    <span> Zakat Maal </span>
                </a>
            </li>

            @role('Super Admin')
                <li>
                    <a class="sidebar-link {{ request()->routeIs('pembagian*') ? 'active' : '' }}"
                        href="{{ route('pembagian') }}">
                        <i class="uil uil-share"></i>
                        <span> Pembagian </span>
                    </a>
                </li>

                <li>
                    <a class="sidebar-link {{ request()->routeIs('pengeluaran*') ? 'active' : '' }}"
                        href="{{ route('pengeluaran') }}">
                        <i class="uil uil-share"></i>
                        <span> Pengeluaran </span>
                    </a>
                </li>

                <li>
                    <a class="sidebar-link {{ request()->routeIs('users*') ? 'active' : '' }}"
                        href="{{ route('users') }}">
                        <i class="uil uil-user"></i>
                        <span> Users </span>
                    </a>
                </li>

                <li class="menu-title">Preferences</li>

                <li>
                    <a class="sidebar-link {{ request()->routeIs('settings*') ? 'active' : '' }}"
                        href="{{ route('settings') }}">
                        <i class="uil uil-setting"></i>
                        <span> Settings </span>
                    </a>
                </li>
            @endrole

        </ul>
    </nav>
</aside>

<div class="sidebar-overlay"></div>
