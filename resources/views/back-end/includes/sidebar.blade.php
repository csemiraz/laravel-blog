<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('/') }}">
          <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-rss-square"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Blog</div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        @if(Auth::user()->role_id == 1)
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        @else 
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('author.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        @endif
        
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Admin Panel -->
        @if(Auth::user()->role_id == 1)
        <div class="sidebar-heading">
          Admin
        </div>
        <!-- Nav Item -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('manage-category') }}">
            <i class="fas fa-tasks"></i>
            <span>Manage Category</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('manage-tag') }}">
            <i class="fas fa-database"></i>
            <span>Manage Tag</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('manage-post') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Manage Post</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pending-post') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Manage Pending Post</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('manage-subscriber') }}">
              <i class="fas fa-tasks"></i>
            <span>Manage Subscriber</span></a>
        </li>

        @endif

        <!-- Author Panel -->
        @if(Auth::user()->role_id == 2)
        <div class="sidebar-heading">
          Author
        </div>
        <!-- Nav Item -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('author.manage-post') }}">
            <i class="fas fa-tasks"></i>
            <span>Manage Post</span></a>
        </li>

        @endif
  
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Pages</span>
              </a>
              <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="">Login</a>
                  <a class="collapse-item" href="">Register</a>
                  </div>
              </div>
          </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>