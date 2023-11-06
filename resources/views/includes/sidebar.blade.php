@section('sidebar')
    <div class="leftside-menu">

        <!-- Brand Logo Light -->
        <a href="/" class="logo logo-light">
            <img src="/favicon.png" alt="small logo">
            <span class="logo-sm">
                <img src="/favicon.png" alt="small logo">
            </span>
        </a>

        <!-- Brand Logo Dark -->
        <a href="/" class="logo logo-dark">
            <span class="logo-lg">
                <img src="/favicon.png"  alt="dark logo">
            </span>
            <span class="logo-sm">
                <img src="/favicon.png" alt="small logo">
            </span>
        </a>

        <!-- Sidebar Hover Menu Toggle Button -->
        <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
            <i class="ri-checkbox-blank-circle-line align-middle"></i>
        </div>

        <!-- Full Sidebar Menu Close Button -->
        <div class="button-close-fullsidebar">
            <i class="ri-close-fill align-middle"></i>
        </div>

        <!-- Sidebar -left -->
        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <!-- Leftbar User -->
            <div class="leftbar-user">
                <a href="pages-profile.html">
                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                        class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name mt-2">{{Auth::user()->name}}</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="side-nav">
                <li class="side-nav-item">
                    <a href="/" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                    </a>
                    <a href="/bookings" class="side-nav-link">
                        <i class="uil-invoice"></i>
                        <span> Bookings </span>
                    </a>
                    <a href="/transactions" class="side-nav-link">
                        <i class="uil-dollar-alt"></i>
                        <span> Transactions </span>
                    </a>
                    <a href="/services" class="side-nav-link">
                        <i class="uil-server"></i>
                        <span> Services </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="dashboard-analytics.html">Analytics</a>
                            </li>
                            <li>
                                <a href="index.html">Ecommerce</a>
                            </li>
                            <li>
                                <a href="dashboard-projects.html">Projects</a>
                            </li>
                            <li>
                                <a href="dashboard-crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="dashboard-wallet.html">E-Wallet</a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
            <!--- End Sidemenu -->

            <div class="clearfix"></div>
        </div>
    </div>
@show
