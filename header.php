<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="assets/img/logo.png" style="height: 20px; padding-left: 10px;">
        <a class="navbar-brand ps-3" href="dashboard.php">Admin Dashboard</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input name="name" class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button name="find" class="btn btn-primary" id="btnNavbarSearch" ><i class="fas fa-search"></i></button>
            </div>
        </form>
        
       
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#"><?php echo $name; ?></a></li>
                    <li><a class="dropdown-item" href="#"><?php echo $designation; ?></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="report.php">Report</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="index_backend.php?logout=1">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php
                        //add new admin only acces for super 'Admin'
                        if ($designation == 'Admin')
                            echo "
                        <div class='sb-sidenav-menu-heading'>Interface</div>
                        <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseLayouts' aria-expanded='false' aria-controls='collapseLayouts'>
                            <div class='sb-nav-link-icon'><i class='fas fa-columns'></i></div>
                            Admin Section
                            <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                        </a>
                        <div class='collapse' id='collapseLayouts' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                            <nav class='sb-sidenav-menu-nested nav'>
                                <a class='nav-link' href='addNewAdmin.php'>Add New Admin</a>
                                <a class='nav-link' href='listAdmin.php'>List Admin</a>
                                <a class='nav-link' href='addScheme.php'>Scheme</a>
                                <a class='nav-link' href='addProject.php'>Project</a>
                            </nav>
                        </div>
                        
                        ";


                        //add new admin only acces for super 'DSWO'
                        if ($designation == 'DSWO')
                            echo "
                        <div class='sb-sidenav-menu-heading'>Interface</div>
                        <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseLayouts' aria-expanded='false' aria-controls='collapseLayouts'>
                            <div class='sb-nav-link-icon'><i class='fas fa-columns'></i></div>
                            DSWO Section
                            <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                        </a>
                        <div class='collapse' id='collapseLayouts' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                        <nav class='sb-sidenav-menu-nested nav'>
                            <a class='nav-link' href='dsw_admin.php'>Add New Admin</a>
                            <a class='nav-link' href='listAdmin.php'>List Admin</a>
                            <a class='nav-link' href='listScheme.php'>Scheme</a>
                            <a class='nav-link' href='addProject.php'>Project</a>
                        </nav>
                        </div>";


                        //add new admin only acces for super 'CDPO'
                        if ($designation == 'CDPO')
                            echo "
                        <div class='sb-sidenav-menu-heading'>Interface</div>
                        <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseLayouts' aria-expanded='false' aria-controls='collapseLayouts'>
                            <div class='sb-nav-link-icon'><i class='fas fa-columns'></i></div>
                            CDPO Section
                            <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                        </a>
                        <div class='collapse' id='collapseLayouts' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                            <nav class='sb-sidenav-menu-nested nav'>
                                <a class='nav-link' href='addcdpo.php'>Add New Admin</a>
                                <a class='nav-link' href='listcdpo.php'>List Admin</a>
                                <a class='nav-link' href='schemecdpo.php'>Scheme</a>
                                <a class='nav-link' href='project.php'>Project</a>
                            </nav>
                        </div>
                        
                        ";

                        //add new admin only acces for super 'Sector'
                        if ($designation == 'Sector')
                            echo "
                        <div class='sb-sidenav-menu-heading'>Interface</div>
                        <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseLayouts' aria-expanded='false' aria-controls='collapseLayouts'>
                            <div class='sb-nav-link-icon'><i class='fas fa-columns'></i></div>
                            Sector Section
                            <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                        </a>
                        <div class='collapse' id='collapseLayouts' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                            <nav class='sb-sidenav-menu-nested nav'>
                                <a class='nav-link' href='schemecdpo.php'>List Scheme</a>
                                <a class='nav-link' href='plist.php'>List Project</a>
                                <a class='nav-link' href='survey.php'>Survey</a>
                                <a class='nav-link' href='listsurvey.php'>Survey Record</a>
                            </nav>
                        </div>";
                        ?>


                        
                        <div class="sb-sidenav-menu-heading">Utility</div>
                        <a class="nav-link" href="profile.php">
                            <div class="sb-nav-link-icon"><i class="fas solid fa-user"></i></div>
                            Profile
                        </a>
                        <?php
                        if ($designation == 'Admin' || $designation == 'DSWO' || $designation == 'CDPO')
                        echo"
                        <a class='nav-link' href='report.php'>
                            <div class='sb-nav-link-icon'><i class='fas fa-chart-area'></i></div>
                            Report
                        </a>";

                        if ($designation == 'Admin' || $designation == 'DSWO')
                        echo"
                        <a class='nav-link' href='gis.php'>
                            <div class='sb-nav-link-icon'><i class='fa-solid fa-compass-drafting'></i></div>
                            GIS Data
                        </a>";
                        ?>

                        <a class="nav-link" href="index_backend.php?logout=1">
                            <div class="sb-nav-link-icon"><i class="fas solid fa-lock"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <b><?php echo$designation; ?></b></div>

                </div>
            </nav>