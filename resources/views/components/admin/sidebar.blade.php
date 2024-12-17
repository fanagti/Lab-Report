<aside class="sidenav bg navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
        <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Soft UI Lab Report</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">MENU PANEL</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}  " href="/laporan">
            <div class=" icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-rectangle-list {{ Request::is('laporan*') ? 'text-white' : 'text-dark' }} fs-6 "></i>
            </div>
            <span class="nav-link-text ms-1 ">Laporan</span>
          </a>
        </li>
        <li class="nav-item   ">
          <a class="nav-link  {{ Request::is('labs*') ? 'active' : '' }} " href="/labs">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-building {{ Request::is('labs*') ? 'text-white' : 'text-dark' }} fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Lab</span>
          </a>
        </li>
        <li class="nav-item   ">
          <a class="nav-link  {{ Request::is('guru*') ? 'active' : '' }} " href="/guru">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user-tie {{ Request::is('guru*') ? 'text-white' : 'text-dark' }} fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Guru</span>
          </a>
        </li>
        <li class="nav-item   ">
          <a class="nav-link  {{ Request::is('pengguna*') ? 'active' : '' }} " href="/pengguna">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user {{ Request::is('pengguna*') ? 'text-white' : 'text-dark' }} fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Pengguna</span>
          </a>
        </li>
        <li class="nav-item   ">
          <a class="nav-link  {{ Request::is('bersihkan*') ? 'active' : '' }} " href="/bersihkan">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-broom {{ Request::is('bersihkan*') ? 'text-white' : 'text-dark' }} fs-6"></i>
            </div>
            <span class="nav-link-text ms-1">Bersihkan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
    </div>
  </aside>