<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Data</div>
                <a class="nav-link {{ $title == 'Produk' ? 'active' : '' }}" href="{{ route('produk') }}">
                    <div class="nav-link-icon"><i data-feather="archive"></i></div>
                    Produk
                </a>
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