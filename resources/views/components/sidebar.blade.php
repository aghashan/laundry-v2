    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <hr class="sidebar-divider my-0">

        <x-nav_item :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </x-nav_item>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            MASTER
        </div>

        <x-nav_item :active="request()->routeIs('users*')" href="users.index">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span>
            </a>
        </x-nav_item>

        <x-nav_item :active="request()->routeIs('members*')" href="members.index">
            <a class="nav-link" href="{{ route('members.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Members</span>
            </a>
        </x-nav_item>

        <x-nav_item :active="request()->routeIs('outlets*')" href="outlets.index">
            <a class="nav-link" href="{{ route('outlets.index') }}">
                <i class="fa-solid fa-shop"></i>
                <span>Outlets</span>
            </a>
        </x-nav_item>

        <x-nav_item :active="request()->routeIs('statuses*')" href="statuses.index">
            <a class="nav-link" href="{{ route('statuses.index') }}">
                <i class="fa-solid fa-certificate"></i>
                <span>Statuses</span>
            </a>
        </x-nav_item>

        <x-nav_item :active="request()->routeIs('categories*')" href="categories.index">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="fa-solid fa-list"></i>
                <span>Categories</span>
            </a>
        </x-nav_item>

        <x-nav_item :active="request()->routeIs('packages*')" href="packages.index">
            <a class="nav-link" href="{{ route('packages.index') }}">
                <i class="fa-solid fa-box"></i>
                <span>Packages</span>
            </a>
        </x-nav_item>

        <x-nav_item :active="request()->routeIs('transactions*')" href="transactions.index">
            <a class="nav-link" href="{{ route('packages.index') }}">
                <i class="fa-solid fa-money-check"></i>
                <span>Transactions</span>
            </a>
        </x-nav_item>





        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
