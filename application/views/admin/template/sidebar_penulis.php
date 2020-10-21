  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Dashboard_Penulis') ?>">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Penulis</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="<?= site_url('Dashboard_Penulis') ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Menu
      </div>

      <!-- Nav Item -->
      <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Kelola_Post') ?>">
              <i class="fas fa-paper-plane"></i>
              <span>Post</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Profile
      </div>

      <!-- Nav Item -->
      <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Kelola_Profile_Penulis') ?>">
              <i class="fas fa-user"></i>
              <span>My Profile</span></a>
      </li>
      <!-- Nav Item -->
      <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Kelola_Profile_Penulis/edit_profile') ?>">
              <i class="fas fa-user-edit"></i>
              <span>Edit Profile</span></a>
      </li>
      <!-- Nav Item -->
      <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Kelola_Profile_Penulis/edit_password') ?>">
              <i class="fas fa-key"></i>
              <span>Change Password</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->