<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <!-- Mobile Hamburger Menu -->
        <div class="d-lg-none d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Main Navbar Content -->
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span>
                        <span class="user-status">{{ Auth::user()->role }}</span>
                    </div>
                    <span class="avatar">
                        @if (Auth::user()->foto_profile == NULL)
                            <img class="round" src="{{ asset('Assets/Backend/images/user.png') }}" alt="avatar" height="40" width="40">
                        @else
                            <img class="round" src="{{ asset('storage/images/profile/' . Auth::user()->foto_profile) }}" alt="avatar" height="40" width="40">
                        @endif
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('profile-settings.index') }}"><i class="mr-50" data-feather="user"></i> Profile</a>
                    @role('Admin')
                    <a class="dropdown-item" href="{{ route('settings') }}"><i class="mr-50" data-feather="settings"></i> Settings</a>
                    @endrole
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mr-50" data-feather="power"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Mobile Menu Area Start -->
<div class="mobile-menu-area d-lg-none collapse" id="mobile-menu" style="margin-top: 120px;">
    {{-- <div class="container"> --}}
        <div class="row" style="margin-left: 10px;">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-list">
                            <li class=" nav-item {{ request()->is('home') ? 'active' : '' }}">
                                <a class="d-flex align-items-center" href="/home"><i data-feather="home"></i>
                                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                                </a>
                            </li>

                            {{-- MENU ADMIN --}}
                            @if (Auth::user()->role == 'Admin')
                                <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="#"><i data-feather="database"></i>
                                        <span class="menu-title text-truncate" data-i18n="Data Sekolah">Data Sekolah</span>
                                    </a>
                                    <ul class="menu-content">
                                        <li class="nav-item {{ request()->is('program-studi') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('program-studi.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Program Studi</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-kegiatan') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-kegiatan.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Kegiatan</span>
                                            </a>
                                        </li>
                                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                                    class="menu-item text-truncate" data-i18n="Second Level">Tentang</span></a>
                                            <ul class="menu-content">
                                                <li class="nav-item {{ request()->is('backend-profile-sekolah') ? 'active' : '' }}">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('backend-profile-sekolah.index') }}"><span
                                                            class="menu-item text-truncate" data-i18n="Third Level">Profile
                                                            Sekolah</span></a>
                                                </li>
                                                <li class="nav-item {{ request()->is('backend-visimisi') ? 'active' : '' }}">
                                                    <a class="d-flex align-items-center"
                                                        href="{{ route('backend-visimisi.index') }}"><span
                                                            class="menu-item text-truncate" data-i18n="Third Level">Visi dan
                                                            Misi</span></a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class=" nav-item">
                                            <a class="d-flex align-items-center" href="/bimbingan-konseling/all"><i
                                                    data-feather="home"></i>
                                                <span class="menu-title text-truncate" data-i18n="Dashboards">Data Konseling</span>
                                            </a>
                                        </li>
                                        <li class=" nav-item">
                                            <a class="d-flex align-items-center" href="/admin/backend-laporanakademik"><i
                                                    data-feather="home"></i>
                                                <span class="menu-title text-truncate" data-i18n="Dashboards">Laporan Akademik</span>
                                            </a>
                                        </li>
                                        <li class=" nav-item">
                                            <a class="d-flex align-items-center" href="/listbukutamu"><i
                                                    data-feather="home"></i>
                                                <span class="menu-title text-truncate" data-i18n="Dashboards">Data Buku Tamu</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i>
                                        <span class="menu-title text-truncate" data-i18n="Card">Berita</span>
                                    </a>
                                    <ul class="menu-content">
                                        <li class="nav-item {{ request()->is('backend-berita') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-berita.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Data Berita</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-kategori-berita') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-kategori-berita.index') }} "><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Kategori Berita</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-event') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-event.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Event</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="#"><i data-feather="globe"></i>
                                        <span class="menu-title text-truncate" data-i18n="Card">Website</span>
                                    </a>
                                    <ul class="menu-content">
                                        <li class="nav-item {{ request()->is('backend-about') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-about.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">About</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-imageslider') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-imageslider.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Gambar Slider</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-video') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-video.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Video</span>
                                            </a>
                                        </li>

                                        <li class="nav-item {{ request()->is('backend-footer') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center" href=" {{ route('backend-footer.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Footer</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="#"><i data-feather="users"></i>
                                        <span class="menu-title text-truncate" data-i18n="Card">Pengguna</span>
                                    </a>
                                    <ul class="menu-content">
                                        <li class="nav-item {{ request()->is('backend-pengguna-pengajar') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-pengguna-pengajar.index') }} "><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Pengajar</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-pengguna-staf') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-pengguna-staf.index') }} "><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Staf</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-pengguna-murid') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-pengguna-murid.index') }} "><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Murid</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-pengguna-ppdb') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-pengguna-ppdb.index') }} "><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">PPDB</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-pengguna-perpus') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-pengguna-perpus.index') }} "><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Perpustakaan</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('backend-pengguna-bendahara') ? 'active' : '' }}">
                                            <a class="d-flex align-items-center"
                                                href=" {{ route('backend-pengguna-bendahara.index') }} "><i
                                                    data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Bendahara</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                {{-- MENU GURU --}}
                            @elseif(Auth::user()->role == 'Guru')
                                <ul class="navigation navigation-main">
                                    <li class=" nav-item">
                                        <a class="d-flex align-items-center" href="/backend-laporanakademik"><i
                                                data-feather="home"></i>
                                            <span class="menu-title text-truncate" data-i18n="Dashboards">Laporan Akademik</span>
                                        </a>
                                    </li>
                                    <li class=" nav-item">
                                        <a class="d-flex align-items-center" href="/bimbingan-konseling/masuk"><i
                                                data-feather="home"></i>
                                            <span class="menu-title text-truncate" data-i18n="Dashboards">Data Konseling</span>
                                        </a>
                                    </li>
                                    <li class=" nav-item">
                                        <a class="d-flex align-items-center" href="/bimbingan-konseling/ditanggapi"><i
                                                data-feather="home"></i>
                                            <span class="menu-title text-truncate" data-i18n="Dashboards">Follow Up Konseling</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- <ul>
                                <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="/bimbingan-konseling/masuk"><i
                                            data-feather="layanan-konseling"></i>
                                        <span class="menu-title text-truncate" data-i18n="layanan-konseling"></span>
                                    </a>
                                </li>
                            </ul> --}}
                                <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i>
                                        <span class="menu-title text-truncate" data-i18n="Card">Data Murid</span>
                                    </a>

                                    <ul class="menu-content">
                                        <li>
                                            <a class="d-flex align-items-center" href=""><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Kelas X</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center" href=""><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Kelas XI</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center" href=""><i data-feather="circle"></i>
                                                <span class="menu-item text-truncate" data-i18n="Basic">Kelas XII</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                {{-- MENU GUEST --}}
                            @elseif(Auth::user()->role == 'Guest')
                                <li class="nav-item {{ request()->is('ppdb/form-pendaftaran') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ route('ppdb.form-pendaftaran') }}"><i
                                            data-feather="book"></i>
                                        <span class="menu-title text-truncate" data-i18n="Pendaftaran">Pendaftaran</span>
                                    </a>
                                </li>

                                {{-- MENU PPDB --}}
                            @elseif(Auth::user()->role == 'PPDB')
                                <li class="nav-item {{ request()->is('ppdb/data-murid') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ route('data-murid.index') }}"><i
                                            data-feather="book"></i>
                                        <span class="menu-title text-truncate" data-i18n="Data Calon Murid">Data Calon Murid</span>
                                    </a>
                                </li>

                                {{-- MENU PERPUSTAKAAN --}}
                            @elseif(Auth::user()->role == 'Perpustakaan')
                                <li class="nav-item {{ request()->is('perpus/books') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('books.index') }} "><i
                                            data-feather="book"></i>
                                        <span class="menu-title text-truncate" data-i18n="Books">Books</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('perpus/kategori') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('kategori.index') }} "><i
                                            data-feather="list"></i>
                                        <span class="menu-title text-truncate" data-i18n="Category">Category</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('perpus/member') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('member.index') }} "><i
                                            data-feather="users"></i>
                                        <span class="menu-title text-truncate" data-i18n="Members">Members</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('perpus/publisher') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ route('publisher.index') }}"><i
                                            data-feather="user"></i>
                                        <span class="menu-title text-truncate" data-i18n="Publisher">Publisher</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('books/author') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ route('author.index') }}"><i
                                            data-feather="user-check"></i>
                                        <span class="menu-title text-truncate" data-i18n="Authors">Authors</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('perpus/peminjam') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ route('peminjam.index') }}"><i
                                            data-feather="briefcase"></i>
                                        <span class="menu-title text-truncate" data-i18n="Members">Peminjam</span>
                                    </a>
                                </li>

                                {{-- MENU MURID --}}
                            @elseif(Auth::user()->role == 'Murid')
                                <li class="nav-item {{ request()->is('murid/konseling') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('backend-laporanakademik.murid') }} "><i
                                            data-feather="book"></i>
                                        <span class="menu-title text-truncate" data-i18n="Books">Laporan Akademik</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('murid/konseling') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('bimbingan.pribadi') }} "><i
                                            data-feather="book"></i>
                                        <span class="menu-title text-truncate" data-i18n="Books">Layanan Konseling</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item {{ request()->is('murid/perpustakaan') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('perpustakaan.index') }} "><i
                                            data-feather="book"></i>
                                        <span class="menu-title text-truncate" data-i18n="Books">Perpustakaan</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item {{ request()->is('murid/pembayaran') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('pembayaran.index') }} "><i
                                            data-feather="dollar-sign"></i>
                                        <span class="menu-title text-truncate" data-i18n="Books">Pembayaran</span>
                                    </a>
                                </li> --}}

                                {{-- MENU BENDAHARA --}}
                            @elseif(Auth::user()->role == 'Bendahara')
                                <li class="nav-item {{ request()->is('spp/murid') ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href=" {{ route('spp.murid.index') }} "><i
                                            data-feather="users"></i>
                                        <span class="menu-title text-truncate" data-i18n="Books">Pembayaran</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
<!-- Mobile Menu Area End -->

<!-- Add this CSS to ensure left alignment -->
<style>
    .mobile-menu-area .mobile-menu #dropdown {
        text-align: left; /* Align text to the left */
    }

    .mobile-menu-area .mobile-menu ul.mobile-menu-list {
        padding: 0; /* Remove extra padding */
        margin: 0; /* Remove extra margin */
        list-style: none; /* Remove bullet points */
    }

    .mobile-menu-area .mobile-menu ul.mobile-menu-list > li {
        padding: 10px 0; /* Add space between items */
    }

    .mobile-menu-area .mobile-menu ul.mobile-menu-list a {
        display: block; /* Ensure links take full width */
        text-decoration: none; /* Remove underline */
        color: #333; /* Set text color */
    }

    .mobile-menu-area .mobile-menu ul ul {
        margin-left: 15px; /* Indent sub-menu */
    }
</style>
