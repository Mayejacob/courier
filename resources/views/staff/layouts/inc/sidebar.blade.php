<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard')}}" class="brand-link">
      <img src="{{ adminAsset('dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Courier</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('staff.dashboard')}} " class="nav-link {{ isActive('staff/dashboard') }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ isMenuOpen('staff/profile*')}}">
            <a href="#" class="nav-link {{ isActive('staff/profile*') }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('staff.profile')}} " class="nav-link {{ isActive('staff/profile') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('staff.profile-pic')}} " class="nav-link {{ isActive('staff/profile-pic') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Profile Pic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('staff.profile.password')}} " class="nav-link {{ isActive('staff/profile/change-password') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ isMenuOpen('staff/parcel*')}}">
            <a href="#" class="nav-link {{ isActive('staff/parcel*') }}">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Parcels
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('staff.parcel')}} " class="nav-link {{ isActive('staff/parcel') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Parcels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('staff.parcel.add')}} " class="nav-link {{ isActive('staff/parcel/add') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('staff.parcel.track')}} " class="nav-link {{ isActive('staff/parcel/track') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Track Item</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
