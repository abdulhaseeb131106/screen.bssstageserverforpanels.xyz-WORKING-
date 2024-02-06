<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://diusapro.brandsoftsolutions.com/" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">DI Screen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('markaz_admin.m_index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('markaz_admin.m_index') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>Prayer Timing</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('markaz_admin.m_create') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>Upload Multiple Timings</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('markaz_admin.AzanTimings') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>Upload Azan Timings</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('markaz_admin.timings') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>View All Timings</span></a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>News</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('slider.index') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>Slider</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logo.index') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>Logos</span></a>
    </li>

    <!-- Nav Item -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Settings
    </div> --}}


    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>General</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Region & County</a>
                <a class="collapse-item" href=""></a>
            </div>
        </div>
    </li> --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
