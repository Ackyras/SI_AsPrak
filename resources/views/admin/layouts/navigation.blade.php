<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            <!-- -------------------- DASHBOARD -------------------- -->
            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'bg-light' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            
            <div class="dropdown-divider"></div>

            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            <!-- ------------------- DATA MASTER ------------------- -->
            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            <li class="nav-item">
                <a href="#datamasterdropdown"
                    class="nav-link {{ request()->routeIs('admin.data-master.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="datamasterdropdown">
                    <i class="nav-icon fas fa-table nav-icon"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="datamasterdropdown">
                    <li class="nav-item">
                        <a href="{{ route('admin.data-master.period.index') }}"
                            class="nav-link {{ request()->routeIs('admin.data-master.period.*') ? 'bg-white' : 'bg-secondary' }}">
                            <i class="far fa-calendar nav-icon"></i>
                            <p>Periode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.data-master.subject.index') }}"
                            class="nav-link {{ request()->routeIs('admin.data-master.subject.*') ? 'bg-white' : 'bg-secondary' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Mata Kuliah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.data-master.ruangan') }}"
                            class="nav-link {{ request()->routeIs('admin.data-master.ruangan') ? 'bg-white' : 'bg-secondary' }}">
                            <i class="fas fa-building nav-icon"></i>
                            <p>Ruangan</p>
                        </a>
                    </li>
                </ul>
            </li>

            <div class="dropdown-divider"></div>

            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            <!-- -------- AWAL KAWASAN KHUSUS PERIODE AKTIF -------- -->
            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            
            <!-- ------------------- -->
            <!-- DETAIL PERIODE AKTIF -->
            <!-- ------------------- -->
            <li class="nav-item mb-3">
                <a href="#activePeriodDetailDropdown"
                    class="nav-link {{ request()->routeIs('admin.active-period.data.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="activePeriodDetailDropdown">
                    {{-- <i class="nav-icon fas fa-table nav-icon"></i> --}}
                    <i class="fas fa-chart-line nav-icon"></i>
                    <p>
                        Periode Aktif
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="activePeriodDetailDropdown">
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.data.period') }}"
                            class="nav-link {{ request()->routeIs('admin.active-period.data.period') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-file-contract nav-icon"></i>
                            <p>Detail Periode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.data.period-subject') }}"
                            class="nav-link {{ request()->routeIs('admin.active-period.data.period-subject') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Mata Kuliah Periode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.data.period-subject-registrar') }}"
                            class="nav-link {{ request()->routeIs('admin.active-period.data.period-subject-registrar') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-user-edit nav-icon"></i>
                            <p>Pendaftar</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- ---------------------------- -->
            <!-- SELEKSI BERKAS PERIODE AKTIF -->
            <!-- ---------------------------- -->
            <li class="nav-item mb-3">
                <a href="#seleksiberkasdropdown"
                    class="nav-link {{ request()->routeIs('admin.active-period.file-selection.*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="seleksiberkasdropdown">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Seleksi Berkas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="seleksiberkasdropdown">
                    {{-- DRAF-A --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.file-selection.registrar-file') }}"
                            class="nav-link {{ request()->routeIs('admin.active-period.file-selection.registrar-file') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="far fa-file-alt nav-icon"></i>
                            <p>Berkas Pendaftar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.file-selection.pass-selection-registrar') }}"
                            class="nav-link {{ request()->routeIs('admin.active-period.file-selection.pass-selection-registrar') ? 'bg-light' : 'bg-secondary' }}">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Berkas Lolos Seleksi</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- ------------------------- -->
            <!-- SELEKSI TES PERIODE AKTIF -->
            <!-- ------------------------- -->
            <li class="nav-item mb-3">
                <a href="#seleksitesdropdown"
                    class="nav-link {{ request()->routeIs('admin.active-period.exam-selection*') ? 'bg-light' : '' }}"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="seleksitesdropdown">
                    <i class="nav-icon fas fa-pen-square nav-icon"></i>
                    {{-- <i class="fas fa-file-signature nav-icon"></i> --}}
                    <p>
                        Seleksi Tes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="seleksitesdropdown">
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.exam-selection.question') }}"
                            class="nav-link 
                            {{ 
                                request()->routeIs('admin.active-period.exam-selection.question') 
                                || 
                                request()->routeIs('admin.active-period.exam-selection.subject.question.*') 
                                ? 'bg-light' : 'bg-secondary'
                            }}"
                        >
                            <i class="fas fa-list-ol nav-icon"></i>
                            <p>Soal dan Kunci</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.active-period.exam-selection.exam-data') }}"
                            class="nav-link {{ 
                                request()->routeIs('admin.active-period.exam-selection.exam-data') 
                                || 
                                request()->routeIs('admin.active-period.exam-selection.exam-data.*') 
                                ? 'bg-light' : 'bg-secondary'
                            }}"
                        >
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
            
            <!-- ----------------------- -->
            <!-- PRAKTIKUM PERIODE AKTIF -->
            <!-- ----------------------- -->
            <li class="nav-item">
                <a href="#activePeriodPracticumDropdown"
                    {{-- class="nav-link {{ request()->routeIs('admin.data-master.*') ? 'bg-light' : '' }}" --}}
                    class="nav-link"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="activePeriodPracticumDropdown">
                    <i class="nav-icon fas fa-project-diagram nav-icon"></i>
                    {{-- <i class="fas "></i> --}}
                    <p>
                        Praktikum
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav py-2 bg-secondary rounded collapse" id="activePeriodPracticumDropdown">
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
                            <i class="nav-icon fas fa-clock"></i>
                            <p>Jadwal Praktikum</p>
                        </a>
                    </li>
                </ul>
            </li>

            <div class="dropdown-divider"></div>

            <!-- JADWAL -->
            {{-- <li class="nav-item mb-3">
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
                        <a href="{{ route('admin.schedule.recruitment') }}"
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
            </li> --}}

            <!-- INFORMASI -->
            {{-- <li class="nav-item mb-3">
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
            </li> --}}

            <!-- LAPORAN -->
            {{-- <li class="nav-item mb-3">
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
            </li> --}}

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

{{-- DRAF - A --}}
{{-- <li class="nav-item">
    <a href="#"
        class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'bg-light' : 'bg-secondary' }}">
        <i class="fas fa-list-alt nav-icon"></i>
        <p>Form Seleksi</p>
    </a>
</li> --}}