<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- DASHBOARD -->
            <li class="nav-item mb-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'bg-light' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <!-- DATA MASTER -->
            <li class="nav-item mb-3">
                <a href="#datamasterdropdown"
                    class="nav-link {{ request()->routeIs('admin.data.master.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="datamasterdropdown">
                    <i class="nav-icon fas fa-table nav-icon"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="datamasterdropdown">
                    <li class="nav-item">
                        <a href="{{ route('admin.data.master.period.index') }}"
                            class="nav-link {{ request()->routeIs('admin.data.master.periods.*') ? 'bg-white' : 'bg-secondary' }}">
                            <i class="far fa-calendar nav-icon"></i>
                            <p>Periode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Mata Kuliah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Asisten Praktikum</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-archive nav-icon"></i>
                            <p>Berkas</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- JADWAL -->
            <li class="nav-item mb-3">
                <a href="#jadwaldropdown"
                    class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="jadwaldropdown">
                    <i class="nav-icon fas fa-clock nav-icon"></i>
                    <p>
                        Jadwal
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="jadwaldropdown">
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-tasks nav-icon"></i>
                            <p>Penerimaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-desktop nav-icon"></i>
                            <p>Praktikum</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- INFORMASI -->
            <li class="nav-item mb-3">
                <a href="#informasidropdown"
                    class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="informasidropdown">
                    <i class="nav-icon fas fa-info-circle nav-icon"></i>
                    <p>
                        Informasi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="informasidropdown">
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-file-image nav-icon"></i>
                            <p>Poster</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-newspaper nav-icon"></i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-bullhorn nav-icon"></i>
                            <p>Pengumuman</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- SELEKSI BERKAS -->
            <li class="nav-item mb-3">
                <a href="#seleksiberkasdropdown"
                    class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="seleksiberkasdropdown">
                    <i class="nav-icon fas fa-file-alt nav-icon"></i>
                    <p>
                        Seleksi Berkas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="seleksiberkasdropdown">
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>Form Seleksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-user-clock nav-icon"></i>
                            <p>Data Calon Asisten</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-user-check nav-icon"></i>
                            <p>Data Lolos Berkas</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- SELESKI TES -->
            <li class="nav-item mb-3">
                <a href="#seleksitesdropdown"
                    class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="seleksitesdropdown">
                    <i class="nav-icon fas fa-pen-square nav-icon"></i>
                    <p>
                        Seleksi Tes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="seleksitesdropdown">
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-list-ol nav-icon"></i>
                            <p>Soal dan Kunci</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-th-list nav-icon"></i>
                            <p>Data Nilai Tes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-clipboard-check nav-icon"></i>
                            <p>Data Lolos Tes</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- LAPORAN -->
            <li class="nav-item mb-3">
                <a href="#laporandropdown"
                    class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="laporandropdown">
                    <i class="nav-icon fas fa-book-open nav-icon"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="laporandropdown">
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-user-friends nav-icon"></i>
                            <p>Asisten Diterima</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Nilai Tes Assiten</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item mb-3">
                <a href="{{ route('admin.about') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : '' }}">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->