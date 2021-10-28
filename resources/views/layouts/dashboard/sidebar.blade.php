<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
{{-- Admin --}}
@if (Auth::user()->role == 'admin')
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        {{-- <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div> --}}
        {{-- <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }} </div> --}}
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ \Setting::getSetting()->app_name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Data Website
    </div>

    <li class="nav-item {{ Request::is('posts*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('posts.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Kamar</span>
        </a>
    </li>

    {{-- <li class="nav-item {{ Request::is('posts/create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('posts.create') }}">
            <i class="fas fa-file-medical"></i>
            <span>Create Kamar</span>
        </a>
    </li> --}}
    
    <li class="nav-item {{ Request::is('penyewa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('penyewa.index') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Data Penyewa</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('transaksi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaksi.index') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Data Transaksi</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('laporan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Laporan</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Setting Website
    </div>

    <li class="nav-item {{ Request::is('setting-website*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('setting-website.index') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Setting Website</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

@endif
{{-- Penyewa --}}
@if (Auth::user()->role == 'penyewa')
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ \Setting::getSetting()->app_name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Data Sewa
    </div>

    <li class="nav-item {{ Request::is('kontrakan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kontrakan.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Kontrakan</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('pembayaran*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pembayaran.index') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Data Transaksi</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('keluhan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('keluhan.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Laporan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endif
</ul>