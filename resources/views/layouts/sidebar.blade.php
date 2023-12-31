<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Str::upper(Auth::user()->name) }}</span>
                    <span class="text-secondary text-small">{{ Str::upper(Auth::user()->role) }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminDashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daftarMejam') }}">
                <span class="menu-title">Menotoring Meja</span>
                <i class="mdi mdi-monitor-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('createPesanan') }}">
                <span class="menu-title">Tambah Pesanan</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daftarPesanan') }}">
                <span class="menu-title">Monitor Pesanan</span>
                <i class="mdi mdi-food-fork-drink menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-multiple-outline menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftarMenu') }}"> Menu </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftarMeja') }}"> Meja </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Pengeluaran</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftarPembelian') }}">Pembelian Bahan
                            Baku</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daftarPengeluaran') }}">Pengeluaran
                            Resto</a></li>
                </ul>
            </div>
        </li>
        @if (Auth::user()->role == 'employee')
        @else
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui" aria-expanded="false" aria-controls="ui">
                    <span class="menu-title">Settings Resto</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-tune menu-icon"></i>
                </a>
                <div class="collapse" id="ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('daftarUser') }}">Manajemen User</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                role="button" class="nav-link">
                <span class="menu-title">Logout</span>

                <i class="nav-icon fa fa-sign-out menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
