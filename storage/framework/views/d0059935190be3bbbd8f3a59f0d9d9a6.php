<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title'); ?></title>

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <?php echo $__env->yieldContent('styles'); ?>

</head>
<body class="bg-gray-900 text-white">
<div class="min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="bg-gray-800 p-4 flex justify-between items-center">
    <!-- Left navbar links -->
    <div class="flex items-center space-x-4">
      <button class="text-white focus:outline-none">
        <i class="fas fa-bars"></i>
      </button>
      <a href="/users" class="text-white">Home</a>
    </div>

    <!-- Right navbar links -->
    <div class="flex items-center space-x-4">
      <?php if(auth()->check()): ?>  
        <a href="<?php echo e(route('logout')); ?>" class="text-white">Logout</a>
      <?php else: ?>
        <a href="/" class="text-white">Login</a>
      <?php endif; ?>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="bg-gray-800 w-64 min-h-screen p-4">
    <a href="#" class="flex items-center space-x-2 mb-6">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="w-10 h-10 rounded-full">
      <span class="text-white font-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div>
      <!-- Sidebar user panel (optional) -->
      <div class="flex items-center space-x-2 mb-6">
        <img src="dist/img/user2-160x160.jpg" class="w-10 h-10 rounded-full" alt="User Image">
      </div>

      <!-- Sidebar Menu -->
      <nav>
        <ul class="space-y-2">
          <li>
            <a href="/users" class="flex items-center space-x-2 text-white">
              <i class="fas fa-chart-pie"></i>
              <span>Users</span>
            </a>
          </li>
          <li>
            <a href="/areas" class="flex items-center space-x-2 text-white">
              <i class="fas fa-chart-pie"></i>
              <span>Areas</span>
            </a>
          </li>
          <li>
            <a href="/categories" class="flex items-center space-x-2 text-white">
              <i class="fas fa-chart-pie"></i>
              <span>Categories</span>
            </a>
          </li>
          <li>
            <a href="/tasks" class="flex items-center space-x-2 text-white">
              <i class="fas fa-chart-pie"></i>
              <span>Tasks</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <main class="flex-1 p-4">
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  <!-- Main Footer -->
  <footer class="bg-gray-800 p-4 text-center">
    <strong>&copy; 2014-2021 <a href="https://adminlte.io" class="text-blue-400">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="mt-2">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\Users\acer\Desktop\task-managment\resources\views/layouts/adminLayout.blade.php ENDPATH**/ ?>