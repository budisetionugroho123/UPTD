<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      
      <li class="nav-heading">Service</li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
            <i class="fa fa-book"></i>
            <span>Pesanan</span>
        </a>
      </li><!-- End Pesanan Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
            <i class="fa fa-microscope"></i>
            <span>Pengujian</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item ">
        <a class="nav-link collapsed" href="users-profile.html">
            <i class="fa fa-flask"></i>
            <span>Hasil Pengujian</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-heading">Settings</li>
      <li class="nav-item " >
        <a class="nav-link  {{Request::route()->getName() == 'layanan.create'  || Request::route()->getName() =='layanan.list'? 'active-sidebar': 'collapsed'}}"  data-bs-target="#layanan-nav" data-bs-toggle="collapse"  href="#">
          <i class="fa fa-wrench" ></i><span>Layanan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="layanan-nav" class="nav-content collapse {{Request::route()->getName() == 'layanan.create' || Request::route()->getName() == 'layanan.list' ? 'show': ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/layanan/create">
              <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'layanan.create' ? 'active-dropdown' : ''}}">Tambah Layanan</span>
            </a>
          </li>
          <li>
            <a href="/layanan/list">
              <i class="bi bi-circle"></i><span class="{{Request::route()->getname() == 'layanan.list' ? 'active-dropdown' : ''}}">Daftar Layanan</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item " >
        <a class="nav-link  {{Request::route()->getName() == 'role.list'  || Request::route()->getName() =='role.create'? 'active-sidebar': 'collapsed'}}"  data-bs-target="#role-nav" data-bs-toggle="collapse"  href="#">
          <i class="fa fa-users"></i><span>Peran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="role-nav" class="nav-content collapse {{Request::route()->getName() == 'role.create' || Request::route()->getName() == 'role.list' ? 'show': ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('role.create')}}">
              <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'role.create' ? 'active-dropdown' : ''}}">Tambah Pengguna</span>
            </a>
          </li>
          <li>
            <a href="{{route('role.list')}}">
              <i class="bi bi-circle"></i><span class="{{Request::route()->getname() == 'role.list' ? 'active-dropdown' : ''}}">Daftar Pengguna</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
            <i class="bi bi-envelope-check"></i>
            <span>SMTP</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->