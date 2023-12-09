<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../dashboard/index.php" class="brand-link">
    <img src="../../img/justkenzie-whit.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image">
        <i class="fas fa-user-circle" style="font-size: 24px;"></i>
      </div>
      <div class="info">
        <a href="index.php" class="d-block">
          <?php echo $_SESSION["name"] ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">MANAGE</li>
        <li class="nav-item">
          <a href="manage_blog.php" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Blogs

            </p>
          </a>
        </li>
        <?php if (isset($_SESSION["admin"])): ?>
          <li class="nav-item">
            <a href="manage_category.php" class="nav-link">
              <i class="nav-icon far nav-icon fas fa-th"></i>
              <p>
                Category
              </p>
            </a>
          </li>
        <?php endif; ?>
        <li class="nav-header">USER</li>
        </li>
        <?php if (isset($_SESSION["admin"])): ?>
          <li class="nav-item">
            <a href="manage_user.php" class="nav-link">
              <i class="fas fa-users mr-2"></i>
              <p>Accounts</p>
            </a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="../proccess/logout.php" class="nav-link">
            <i class="fas fa-sign-in-alt mr-2"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->