<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title'); ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">

  <?php echo $__env->yieldContent('styles'); ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/users">
        <div class="sidebar-brand-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Task managment system</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Users -->
      <li class="nav-item">
        <a class="nav-link" href="/users">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
      </li>

      <!-- Nav Item - Areas -->
      <li class="nav-item">
        <a class="nav-link" href="/areas">
          <i class="fas fa-fw fa-map"></i>
          <span>Areas</span>
        </a>
      </li>

      <!-- Nav Item - Categories -->
      <li class="nav-item">
        <a class="nav-link" href="/categories">
          <i class="fas fa-fw fa-list"></i>
          <span>Categories</span>
        </a>
      </li>

      <!-- Nav Item - Tasks -->
      <li class="nav-item">
        <a class="nav-link" href="/tasks">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Tasks</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- Include your topbar here if needed -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- Include your footer here if needed -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scripts -->
  <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>

  <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
<?php /**PATH C:\Users\acer\Desktop\task-managment\resources\views/layouts/adminLayout.blade.php ENDPATH**/ ?>