<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend_assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ request()->is('home') ? 'menu-open' : '' }}">
            <a href="{{route('home')}}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
            </ul> --}}
          </li>
          @if (auth()->user()->role == 'admin')

            <li class="nav-item {{ request()->is('teacher') ? 'menu-open' : '' }}">
              <a href="{{route('teacher.index')}}" class="nav-link {{ request()->is('teacher') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>
                  Teacher
                  {{-- <i class="right fas fa-angle-left"></i> --}}
                </p>
              </a>
              {{-- <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{route('teacher.index')}}" class="nav-link {{ request()->is('teacher') ? 'active' : '' }}">
                    <i class="far fa-eye nav-icon"></i>
                    <p>view</p>
                  </a>
                </li>
              </ul> --}}
            </li>
          
              
          @endif
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa-gear"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <p>
                  <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                  logout</p>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
              </li>
            </ul>
          </li>
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>