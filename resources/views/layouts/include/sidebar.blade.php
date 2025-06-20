<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
      <img src="{{ asset('backend/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
               <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="" data-toggle="dropdown">
            <img src="{{ asset('backend/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                  alt="User Image">
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
              <li>
              <a href="{{ route('user.logout') }}"><i class="fa fa-circle text-success"></i> Logout</a>
              </li>
            </a>
          </li>
        </ul>
          </div>
         
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                  aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                  </button>
              </div>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
              
              <li class="nav-item {{ Request::segment(1) == 'booking' ? 'menu-is-opening menu-open' : '' }}">
                  <a href="#" class="nav-link">
                      <i class="fa-solid fa-person-walking-luggage"></i>
                      <p>
                          Tour đã đặt
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="{{ route('booking.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Tất cả tour</p>
                          </a>
                      </li>

                  </ul>
              </li>
              {{-- Menu quản lý danh mục --}}
                @if(in_array($role, ['admin', 'editor', 'categoryMng']))
              <li class="nav-item  {{ Request::segment(1) == 'categories' ? 'menu-is-opening menu-open' : '' }} ">
                  <a href="{{ route('categories.index') }}" class="nav-link">
                      <i class="fa-solid fa-plane"></i>
                      <p>
                          Danh mục tours
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="{{ route('categories.create') }}" class="nav-link">
                              <i class="fa-solid fa-gears"></i>
                              <p>Tạo danh mục</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('categories.index') }}" class="nav-link">
                              <i class="fa-solid fa-gears"></i>
                              <p>Danh sách danh mục</p>
                          </a>
                      </li>
                  </ul>
                  
              </li>
              @endif
              {{-- Menu quản lý tour --}}
            @if(in_array($role, ['admin', 'editor', 'tourMng']))
              <li class="nav-item  {{ Request::segment(1) == 'tours' ? 'menu-is-opening menu-open' : '' }} ">
                  <a href="{{ route('tours.index') }}" class="nav-link">
                      <i class="fa-solid fa-plane-up"></i>
                      <p>
                          Tours
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="{{ route('tours.create') }}" class="nav-link">
                              <i class="fa-solid fa-gears"></i>
                              <p>Thêm tour</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('tours.index') }}" class="nav-link">
                              <i class="fa-solid fa-gears"></i>
                              <p>Danh sách tour</p>
                          </a>
                      </li>
                      
                  </ul>
              </li>
              @endif
              {{-- User --}}
                @php
                    $role = auth()->user()->role;
                @endphp

                {{-- Menu quản lý User: chỉ admin --}}
                @if($role === 'admin')
               <li class="nav-item {{ Request::segment(1) == 'users' ? 'menu-is-opening menu-open' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fa-solid fa-plane-up"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">

                       <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="fa-solid fa-gears"></i>
                            <p>Danh sách user</p>
                        </a>
                    </li>   
                    
                    </ul>
                    
                </li>
                @endif


          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
