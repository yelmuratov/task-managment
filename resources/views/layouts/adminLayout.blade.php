<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 dark:bg-gray-900">

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <!-- Dark Mode CSS -->
  <style>
    .dark .dark\:bg-gray-800 {
      background-color: #2d3748;
    }
    .dark .dark\:text-gray-100 {
      color: #f7fafc;
    }
    .dark .dark\:border-gray-700 {
      border-color: #4a5568;
    }
    .dark .dark\:bg-white {
      background-color: #1a202c;
    }
    .dark .dark\:text-gray-800 {
      color: #a0aec0;
    }
    .dark .dark\:bg-gray-100 {
      background-color: #f7fafc;
    }
    .dark .dark\:text-gray-900 {
      color: #1a202c;
    }
  </style>

  @yield('styles')
</head>

<body id="page-top" class="h-full text-gray-900 dark:text-gray-100 dark:bg-gray-900">

  <!-- Page Wrapper -->
  <div id="wrapper" class="dark:bg-gray-900 dark:text-gray-100">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion dark:bg-gray-800 dark:text-gray-100" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center dark:bg-gray-800 dark:text-gray-100" href="/">
        <div class="sidebar-brand-icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Task management system</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0 dark:border-gray-700">

      <!-- Nav Item - Users -->
      <li class="nav-item">
        <a class="nav-link dark:text-gray-100" href="/users">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
      </li>

      <!-- Nav Item - Areas -->
      <li class="nav-item">
        <a class="nav-link dark:text-gray-100" href="/areas">
          <i class="fas fa-fw fa-map"></i>
          <span>Regions</span>
        </a>
      </li>

      <!-- Nav Item - Categories -->
      <li class="nav-item">
        <a class="nav-link dark:text-gray-100" href="/categories">
          <i class="fas fa-fw fa-list"></i>
          <span>Categories</span>
        </a>
      </li>

      <!-- Nav Item - Tasks -->
      <li class="nav-item">
        <a class="nav-link dark:text-gray-100" href="/tasks">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Tasks</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block dark:border-gray-700">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column dark:bg-gray-900 dark:text-gray-100">

      <!-- Main Content -->
      <div id="content" class="dark:bg-gray-900 dark:text-gray-100">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow dark:bg-gray-800 dark:text-gray-100">

          <!-- Name -->
          <span class="navbar-text mr-auto dark:text-gray-100">
            {{ Auth::user()->name }}
          </span>

          <!-- Dark Mode Toggle -->
          <button id="theme-toggle" class="text-gray-500 dark:text-gray-400 focus:outline-none">
            <i id="theme-toggle-icon" class="fas fa-moon"></i>
          </button>

          <!-- Logout Button -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link dark:text-gray-100" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid main">
          <!-- Statistics Cards -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2 dark:bg-gray-800 dark:text-gray-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 dark:text-gray-100">
                        Total Tasks</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 dark:text-gray-100">{{ $totalTasks }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300 dark:text-gray-100"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2 dark:bg-gray-800 dark:text-gray-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1 dark:text-gray-100">
                        Tasks for 2 Days</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 dark:text-gray-100">{{ $tasksFor2days }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300 dark:text-gray-100"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2 dark:bg-gray-800 dark:text-gray-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 dark:text-gray-100">
                        Tasks Passed Deadline</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 dark:text-gray-100">{{ $tasksPassedDeadline }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle fa-2x text-gray-300 dark:text-gray-100"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2 dark:bg-gray-800 dark:text-gray-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 dark:text-gray-100">
                        Tasks with 1 Day Left</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 dark:text-gray-100">{{ $tasksFor1day }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hourglass-end fa-2x text-gray-300 dark:text-gray-100"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Dark Mode Toggle Script -->
  <script>
    const themeToggle = document.getElementById('theme-toggle');
    const themeToggleIcon = document.getElementById('theme-toggle-icon');
    const mainContainer = document.querySelector('.container-fluid');
    const sidebar = document.getElementById('accordionSidebar');
    const header = document.querySelector('.topbar');
    const navbar = document.querySelector('.navbar');

    // Load theme from localStorage
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
      document.documentElement.classList.add('dark');
      document.body.classList.add('dark');
      mainContainer.classList.add('dark:bg-gray-800');
      sidebar.classList.add('dark:bg-gray-800');
      header.classList.add('dark:bg-gray-800');
      navbar.classList.add('dark:bg-gray-800');
      themeToggleIcon.classList.remove('fa-moon');
      themeToggleIcon.classList.add('fa-sun');
    } else {
      document.documentElement.classList.remove('dark');
      document.body.classList.remove('dark');
      mainContainer.classList.remove('dark:bg-gray-800');
      sidebar.classList.remove('dark:bg-gray-800');
      header.classList.remove('dark:bg-gray-800');
      navbar.classList.remove('dark:bg-gray-800');
      themeToggleIcon.classList.remove('fa-sun');
      themeToggleIcon.classList.add('fa-moon');
    }

    // Toggle theme
    themeToggle.addEventListener('click', () => {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        document.body.classList.remove('dark');
        mainContainer.classList.remove('dark:bg-gray-800');
        sidebar.classList.remove('dark:bg-gray-800');
        header.classList.remove('dark:bg-gray-800');
        navbar.classList.remove('dark:bg-gray-800');
        themeToggleIcon.classList.remove('fa-sun');
        themeToggleIcon.classList.add('fa-moon');
        localStorage.setItem('theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        document.body.classList.add('dark');
        mainContainer.classList.add('dark:bg-gray-800');
        sidebar.classList.add('dark:bg-gray-800');
        header.classList.add('dark:bg-gray-800');
        navbar.classList.add('dark:bg-gray-800');
        themeToggleIcon.classList.remove('fa-moon');
        themeToggleIcon.classList.add('fa-sun');
        localStorage.setItem('theme', 'dark');
      }
    });
  </script>

  @yield('scripts')

</body>

</html>
