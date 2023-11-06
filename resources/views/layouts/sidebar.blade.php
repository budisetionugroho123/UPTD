    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        

        <li class="nav-heading">Service</li>
        
        @if (auth()->user()->role == "manager_teknis" || auth()->user()->role=="admin_frontoffice")
            {{-- <li class="nav-item">
            <a class="nav-link   {{ Route::currentRouteName() != "order.index" ? 'collapsed' : "" }}" href="{{route('order.index')}}">
                <i class="fa fa-book"></i>
                <span class="">Pesanan</span>
            </a>
            </li><!-- End Pesanan Page Nav --> --}}
            <li class="nav-item " >
                <a class="nav-link  {{Request::route()->getName() == 'order.index' || Request::route()->getName()== 'order.detail'  || Request::route()->getName()== 'order.completed' || Request::route()->getName()== 'order.completed.detail' || Request::route()->getname() == 'order.cancel'   || Request::route()->getName()== 'order.cancel.detail'? 'active-sidebar': 'collapsed'}}"  data-bs-target="#pesanan-nav" data-bs-toggle="collapse"  href="#">
                <i class="fa fa-book" ></i><span>Pesanan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                
                <ul id="pesanan-nav" class="nav-content collapse {{Request::route()->getName() == 'order.index' || Request::route()->getName()== 'order.detail'  || Request::route()->getName()== 'order.completed' || Request::route()->getName()== 'order.completed.detail'  || Request::route()->getname() == 'order.cancel'   || Request::route()->getName()== 'order.cancel.detail' ? 'show': ''}} " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('order.index')}}">
                        <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'order.index'   || Request::route()->getName()== 'order.detail'? 'active-dropdown' : ''}}">Pesanan Diproses</span>
                        </a>
                        <a href="{{route('order.completed')}}">
                        <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'order.completed'   || Request::route()->getName()== 'order.completed.detail'? 'active-dropdown' : ''}}">Pesanan Selesai</span>
                        </a>
                        <a href="{{route('order.cancel')}}">
                        <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'order.cancel'   || Request::route()->getName()== 'order.cancel.detail'? 'active-dropdown' : ''}}">Pesanan Dibatalkan</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (auth()->user()->role == "manager_teknis" || auth()->user()->role == 'analisis_lab' || auth()->user()->role== 'supervisor' )
            <li class="nav-item " >
                <a class="nav-link  {{Request::route()->getName() == 'analisis.index' || Request::route()->getName()== 'analisis.progres' || Request::route()->getName()== 'proses.analisis' || Request::route()->getName() == 'hasil.analisis' ? 'active-sidebar': 'collapsed'}}"  data-bs-target="#pengujian-nav" data-bs-toggle="collapse"  href="#">
                <i class="fa fa-microscope" ></i><span>Pengujian</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                
                <ul id="pengujian-nav" class="nav-content collapse {{Request::route()->getName() == 'analisis.index' || Request::route()->getName()== 'analisis.progres' || Request::route()->getName() == 'hasil.analisis' ||  Request::route()->getName()== 'proses.analisis' ? 'show': ''}} " data-bs-parent="#sidebar-nav">
                <li>
                    @if ( auth()->user()->role == "manager_teknis" || auth()->user()->role == 'supervisor')
                        <a href="{{route('analisis.index')}}">
                        <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'analisis.index'   || Request::route()->getName()== 'analisis.progres'? 'active-dropdown' : ''}}">Penentuan Penguji</span>
                        </a>
                    @endif
                    @if ( auth()->user()->role == "manager_teknis" || auth()->user()->role == 'analisis_lab')
                        <a href="{{route('proses.analisis')}}">
                        <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'proses.analisis' || Request::route()->getname() == 'input.analisis' ? 'active-dropdown' : ''}}">Proses Analisa</span>
                        </a>
                    
                    @endif
                    @if ( auth()->user()->role == "manager_teknis" || auth()->user()->role == 'supervisor')
                        <a href="{{route('hasil.analisis')}}">
                        <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'hasil.analisis' || Request::route()->getName() == 'detail.hasil.analisis' ? 'active-dropdown' : ''}}">Hasil Analisa</span>
                        </a>
                        
                    @endif
                </li>
                </ul>
            </li>
            
        @endif

        @if (auth()->user()->role == "manager_teknis")
        <li class="nav-item " >
            <a class="nav-link  {{Request::route()->getName() == 'list.shu' || Request::route()->getName()== 'shu.valid' ? 'active-sidebar': 'collapsed'}}"  data-bs-target="#shu-nav" data-bs-toggle="collapse"  href="#">
            <i class="fa fa-microscope" ></i><span>SHU</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            
            <ul id="shu-nav" class="nav-content collapse {{Request::route()->getName() == 'list.shu'  ? 'show': ''}} " data-bs-parent="#sidebar-nav">
            <li>
                @if ( auth()->user()->role == "manager_teknis")
                    <a href="{{route('list.shu')}}">
                    <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'list.shu' ? 'active-dropdown' : ''}}">Daftar Shu</span>
                    </a>
                @endif
            </li>
            </ul>
        </li>
        
    @endif

        {{-- <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() != "analisis.index" ? 'collapsed' : "" }}" href="{{route('analisis.index')}}">
                <i class="fa fa-microscope"></i>
                <span>Pengujian</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item ">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="fa fa-flask"></i>
                <span>Hasil Pengujian</span>
            </a>
        </li><!-- End Profile Page Nav --> --}}


        <li class="nav-heading">Settings</li>
        @if (auth()->user()->role == "manager_teknis" )

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
        @endif
        <li class="nav-item " >
            <a class="nav-link  {{Request::route()->getName() == 'role.list'  || Request::route()->getName() =='role.create'? 'active-sidebar': 'collapsed'}}"  data-bs-target="#role-nav" data-bs-toggle="collapse"  href="#">
            <i class="fa fa-users"></i><span>Peran</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            
            <ul id="role-nav" class="nav-content collapse {{Request::route()->getName() == 'role.create' || Request::route()->getName() == 'role.list' ? 'show': ''}} " data-bs-parent="#sidebar-nav">
            @if (auth()->user()->role == "manager_teknis" )

                <li>
                    <a href="{{route('role.create')}}">
                    <i class="bi bi-circle "></i><span class="{{Request::route()->getname() == 'role.create' ? 'active-dropdown' : ''}}">Tambah Pengguna</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{route('role.list')}}">
                <i class="bi bi-circle"></i><span class="{{Request::route()->getname() == 'role.list' ? 'active-dropdown' : ''}}">Pengguna</span>
                </a>
            </li>
            </ul>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-envelope-check"></i>
                <span>SMTP</span>
            </a>
        </li><!-- End Register Page Nav --> --}}

        </ul>

    </aside><!-- End Sidebar-->