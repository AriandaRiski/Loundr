<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
            <div class="nav_list">
                <a href="/" class="nav_link active">
                    <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
                </a>
                @if(Auth::user()->level == '1')
                <a href="/produk" class="nav_link">
                    <i class='bx bxl-product-hunt nav_icon'>
                    </i> <span class="nav_name">Produk</span>
                </a>
                <a href="/transaksi" class="nav_link">
                    <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Transaksi</span>
                </a>
                <a href="/laporan" class="nav_link">
                    <i class='bx bxs-report nav_icon'></i>
                    <span class="nav_name">Laporan Keuangan</span>
                </a>
                @endif

                @if(Auth::user()->level == '0')
                <a href="/data_user" class="nav_link">
                    <i class='bx bxs-report nav_icon'></i>
                    <span class="nav_name">Data User</span>
                </a>
                @endif
            </div>
        </div> <a href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name"></span>
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </nav>
</div>
