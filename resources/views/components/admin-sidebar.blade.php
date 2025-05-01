<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header d-flex justify-content-center">
            <a href="{{ route('client_admin.index') }}" class="b-brand text-primary"></a>
            <img src="{{ asset('img/craetive-logo.png') }}" alt="creative media logo" class="img-fluid" width="50%">
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('dashboard.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Pages</label>
                    <i class="ti ti-news"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
                            class="pc-mtext">Beranda</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('client_admin.index') }}">
                                <span class="pc-micon"><i class="ti ti-user"></i></span>
                                <span class="pc-mtext">Tambah Klien</span>
                            </a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('team_admin.index') }}">
                                <span class="pc-micon"><i class="ti ti-users"></i></span>
                                <span class="pc-mtext">Tambah Tim</span>
                            </a>
                        </li>
                    </ul>
                </li>
                </li>
                <li class="pc-item">
                    <a href="{{ route('study_admin.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                        <span class="pc-mtext">Bidang Studi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('service_admin.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-lock"></i></span>
                        <span class="pc-mtext">Layanan Jasa</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('student_work_admin.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                        <span class="pc-mtext">Karya Siswa</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('testimony_admin.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                        <span class="pc-mtext">Testimoni</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('article_admin.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                        <span class="pc-mtext">Artikel</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('contact_admin.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                        <span class="pc-mtext">Hubungi Kami</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Logout</label>
                    <i class="ti ti-brand-chrome"></i>
                </li>
                <li class="pc-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="pc-link" style="border: none; background: none; cursor: pointer;">
                            <div class="logout-menu" id="logout-menu">
                                <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                                <span class="pc-mtext">Logout</span>
                            </div>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>