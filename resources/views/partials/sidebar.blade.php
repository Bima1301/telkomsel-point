<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <img class="logo-img" src="/img/logo.png" alt="">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $active === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ $active === 'merchandise' ? 'active' : '' }}">
                <a class="nav-link" href="/merchandise">
                    <i class="fas fa-fw fa-gift"></i>
                    <span>Merchandise</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $active === 'store' ? 'active' : '' }}">
                @if ((auth()->user()->id_store_position !== null) && (auth()->user()->role !== 'superUser'))
                    @if (auth()->user()->role == 'PIC' || auth()->user()->role == 'CS')
                        <a class="nav-link" href="/store/{{ auth()->user()->id_store_position }}">
                            <i class="fas fa-fw fa-store"></i>
                            <span>Store Stock</span></a>
                    @else
                        <a class="nav-link" href="/store">
                            <i class="fas fa-fw fa-store"></i>
                            <span>Store List</span></a>
                    @endif
                @else
                @if (auth()->user()->role == 'superUser')
                <a class="nav-link" href="/store">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Store List</span></a>
                    
                @endif
                @endif
                
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $active === 'transaction' ? 'active' : '' }}">
                @if ((auth()->user()->id_store_position !== null) && (auth()->user()->role !== 'superUser'))
                    @if (auth()->user()->role == 'PIC' || auth()->user()->role == 'CS')
                        <a class="nav-link" href="/transaction/store-id/{{ auth()->user()->id_store_position }}">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Transaction</span></a>
                    @else
                        <a class="nav-link" href="/transaction">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Transaction</span></a>
                    @endif
                @else
                @if (auth()->user()->role == 'superUser')
                <a class="nav-link" href="/transaction">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaction</span></a>
                    
                @endif
                @endif
                
            </li>

            {{-- <!-- Nav Item - Charts -->
            <li class="nav-item {{ $active === 'transaction' ? 'active' : '' }}">
                <a class="nav-link" href="/transaction">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaction</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->
