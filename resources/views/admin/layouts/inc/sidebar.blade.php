<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard')}}" class="brand-link">
      <img src="{{ adminAsset('dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
            <a href="{{ route('admin.dashboard')}} " class="nav-link {{ isActive('admin/dashboard') }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Company Management</li>
          <li class="nav-item">
            <a href="{{ route('admin.company.view')}} " class="nav-link {{ isActive('admin/company-master*') }} ">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Company Master
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ isMenuOpen('admin/branch-master*')}}">
            <a href="#" class="nav-link {{ isActive('admin/branch-master*') }}">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>
                Branch Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.branch.view')}} " class="nav-link {{ isActive('admin/branch-master') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.branch.add')}}" class="nav-link {{ isActive('admin/branch-master/add') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new Branch</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ isMenuOpen('admin/members*')}}">
            <a href="#" class="nav-link {{ isActive('admin/members*') }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Members
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.members.view')}} " class="nav-link {{ isActive('admin/members') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.members.add')}} " class="nav-link {{ isActive('admin/members/add') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Member</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ isMenuOpen('admin/profile*')}}">
            <a href="#" class="nav-link {{ isActive('admin/profile*') }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.profile')}} " class="nav-link {{ isActive('admin/profile') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.profile-pic')}} " class="nav-link {{ isActive('admin/profile-pic') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Profile Pic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.profile.password')}} " class="nav-link {{ isActive('admin/profile/change-password') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ isMenuOpen('admin/parcel*')}}">
            <a href="#" class="nav-link {{ isActive('admin/parcel*') }}">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Parcels
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.parcel')}} " class="nav-link {{ isActive('admin/parcel') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Parcels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.parcel.add')}} " class="nav-link {{ isActive('admin/parcel/add') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.parcel.track')}} " class="nav-link {{ isActive('admin/parcel/track') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Track</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.report')}} " class="nav-link {{ isActive('admin/report') }} ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
