<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Data</div>
                <a class="nav-link {{ $title == 'Produk' ? 'active' : '' }}" href="{{ route('produk') }}">
                    <div class="nav-link-icon"><i data-feather="archive"></i></div>
                    Produk
                </a>

                <a class="nav-link {{ $title == 'Pembelian' ? 'active' : '' }}" href="{{ route('pembelian') }}">
                    <div class="nav-link-icon"><i data-feather="credit-card"></i></div>
                    Pembelian
                </a>

                @if (Auth::user()->level == 'Admin' || Auth::user()->level == 'admin')
                <a class="nav-link {{ $title == 'User' ? 'active' : '' }}" href="{{ route('user') }}">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    User
                </a>
                @endif
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Login Sebagai :</div>
                <div class="sidenav-footer-title">{{ Auth::user()->nama }}</div>
            </div>
        </div>
    </nav>
</div>