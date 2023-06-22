 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-boxes"></i>
                </div>
                <div class="sidebar-brand-text ">Warung Digital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/slider">
                        <i class="bi bi-file-earmark-image-fill"></i>
                        <span>Slider</span
                    ></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            
            <!-- Product-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-tablet-landscape-fill"></i>
                    <span>Product</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Product</h6>
                        <a class="collapse-item" href="/category-product">Category Product</a>
                        <a class="collapse-item" href="/daftar-product">Daftar Product</a>
                    </div>
                </div>
            </li>

            @if (Auth::user()->role_id == 1) 
            {{-- Pengguna --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataPengguna"
                aria-expanded="true" aria-controls="dataPengguna">
                <i class="bi bi-people-fill"></i>
                    <span>Pengguna</span>
                </a>
                <div id="dataPengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengguna</h6>
                        <a class="collapse-item" href="/data-user">User</a>
                        <a class="collapse-item" href="/data-staff">Staff</a>
                    </div>
                </div>
            </li>
            @endif

            {{-- Pengaturan --}}
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan"
                    aria-expanded="true" aria-controls="pengaturan">
                    <i class="bi bi-gear-fill"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="pengaturan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaturan</h6>
                        <a class="collapse-item" href="/change-password">Change Password</a>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->
