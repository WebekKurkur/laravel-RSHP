<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('home') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin RSHP</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              @php
                $role = session('user_role') ?? (Auth::check() ? (Auth::user()->roleUser[0]->idrole ?? null) : null);
              @endphp

              @switch($role)
                @case(1)
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard-admin') }}" class="nav-link">
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link" aria-expanded="false">
                      <i class="nav-icon bi bi-folder2-open"></i>
                      <p>Data Master <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                          <li class="nav-item"><a href="{{ Route::has('admin.user.index') ? route('admin.user.index') : 'javascript:void(0);' }}" class="nav-link"><p>Data User</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.role-user.index') ? route('admin.role-user.index') : 'javascript:void(0);' }}" class="nav-link"><p>Manajemen Role</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.role.index') ? route('admin.role.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Role</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.pemilik.index') ? route('admin.pemilik.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Pemilik</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.pet.index') ? route('admin.pet.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Pet</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.jenis-hewan.index') ? route('admin.jenis-hewan.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Jenis Hewan</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.ras-hewan.index') ? route('admin.ras-hewan.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Ras Hewan</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.kategori.index') ? route('admin.kategori.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Kategori</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.kategori-klinis.index') ? route('admin.kategori-klinis.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Kategori Klinis</p></a></li>
                          <li class="nav-item"><a href="{{ Route::has('admin.kode-tindakan-terapi.index') ? route('admin.kode-tindakan-terapi.index') : 'javascript:void(0);' }}" class="nav-link"><p>Daftar Kode Tindakan</p></a></li>
                    </ul>
                  </li>
                @break

                @case(2)
                  <li class="nav-item">
                    <a href="{{ route('dokter.dashboard-dokter') }}" class="nav-link">
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item"><a href="{{ Route::has('dokter.rekam-medis.index') ? route('dokter.rekam-medis.index') : 'javascript:void(0);' }}" class="nav-link"><i class="nav-icon bi bi-journal-medical"></i><p>Rekam Medis</p></a></li>
                @break

                @case(3)
                  <li class="nav-item">
                    <a href="{{ route('perawat.dashboard-perawat') }}" class="nav-link">
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item"><a href="{{ Route::has('perawat.rekam-medis.create') ? route('perawat.rekam-medis.create') : 'javascript:void(0);' }}" class="nav-link"><i class="nav-icon bi bi-plus-square"></i><p>Input Rekam Medis</p></a></li>
                @break

                @case(4)
                  <li class="nav-item">
                    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="nav-link">
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item"><a href="{{ Route::has('resepsionis.pemilik.register') ? route('resepsionis.pemilik.register') : (Route::has('resepsionis.pemilik.index') ? route('resepsionis.pemilik.index') : 'javascript:void(0);') }}" class="nav-link"><i class="nav-icon bi bi-people"></i><p>Daftar Pemilik</p></a></li>
                  <li class="nav-item"><a href="{{ Route::has('resepsionis.pet.register') ? route('resepsionis.pet.register') : (Route::has('resepsionis.pet.index') ? route('resepsionis.pet.index') : 'javascript:void(0);') }}" class="nav-link"><i class="nav-icon bi bi-paw"></i><p>Daftar Pet</p></a></li>
                  <li class="nav-item"><a href="{{ Route::has('resepsionis.temu.create') ? route('resepsionis.temu.create') : (Route::has('resepsionis.temu.register') ? route('resepsionis.temu.register') : (Route::has('resepsionis.temu.index') ? route('resepsionis.temu.index') : 'javascript:void(0);')) }}" class="nav-link"><i class="nav-icon bi bi-calendar3"></i><p>Register Temu Dokter</p></a></li>
                @break

                @default
                  <li class="nav-item">
                    <a href="{{ route('pemilik.dashboard-pemilik') }}" class="nav-link">
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item"><a href="{{ Route::has('pemilik.pets') ? route('pemilik.pets') : 'javascript:void(0);' }}" class="nav-link"><i class="nav-icon bi bi-paw"></i><p>Daftar Hewan</p></a></li>
                  <li class="nav-item"><a href="{{ Route::has('pemilik.rekam-medis') ? route('pemilik.rekam-medis') : 'javascript:void(0);' }}" class="nav-link"><i class="nav-icon bi bi-journal-medical"></i><p>Daftar Rekam Medis</p></a></li>
                  <li class="nav-item"><a href="{{ Route::has('pemilik.reservations') ? route('pemilik.reservations') : 'javascript:void(0);' }}" class="nav-link"><i class="nav-icon bi bi-calendar-heart"></i><p>Daftar Reservasi</p></a></li>
              @endswitch
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->