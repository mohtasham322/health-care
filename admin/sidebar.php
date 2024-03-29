        <?php
        session_start();
        if(!isset($_SESSION['admin_user'])){
            header('location:login.php');
        }
        ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Care Admin</div>
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>




            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->

                    <img src="images/Doctor-Icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>Doctors</span>

                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php">Registered doctors</a>
                        <a class="collapse-item" href="doctor_request.php">Registration Request</a>
                        <a class="collapse-item" href="declined_doctors.php">Declined Request</a>
                    </div>
                </div>
            </li>
           

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <img src="images/patient-icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>User</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="view_users.php">View Users</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <img src="images/city-icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>City</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="viewcities.php">View cities</a>
                        <a class="collapse-item" href="addcity.php">Add city</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages6"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <img src="images/Qualification-icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>Qualification</span>
                </a>
                <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="view_qualification.php">View qualifications</a>
                        <a class="collapse-item" href="add_qualification.php">Add qualification</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <img src="images/category-icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>Doctor specialization</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="viewspecialization.php">View specialization</a>
                        <a class="collapse-item" href="add_specialization.php">Add specialization</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages9"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <img src="images/category-icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>Services</span>
                </a>
                <div id="collapsePages9" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="view_services.php">View Services</a>
                        <a class="collapse-item" href="add_service.php">Add Service</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <img src="images/content-icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>Contents</span>
                </a>
                <div id="collapsePages3" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="medical_news.php">Latest Medical News</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_appointments.php">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->

                    <img src="images/Doctor-Icon.png" alt="" width="25" class="pb-2 me-2">
                    <span>Appointments</span>

                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->