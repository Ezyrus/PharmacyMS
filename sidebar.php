<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">Welcome to Pharmacy Management System, <?php echo $adminLogged; ?></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="actions/admin_logout.php" role="button">Logout</a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link text-decoration-none d-flex justify-content-start align-items-center gap-2">
        <i class="ml-3 fas fa-solid fa-syringe fa-xl"></i>
        <span class="brand-text font-weight-light">Pharmacy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="dashboard.php" class="d-flex justify-content-start align-items-center gap-2 nav-link">
                        <i class="fas fa-solid fa-box fa-xl"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="medicine.php" class="d-flex justify-content-start align-items-center gap-2 nav-link">
                        <i class="fas fa-solid fa-tablets fa-xl"></i>
                        <p>Medicines</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="addMedicine.php" class="d-flex justify-content-start align-items-center gap-2 nav-link">
                        <i class="fas fa-solid fa-book-medical fa-xl"></i>
                        <p>Add Medicine</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="expiryDates.php" class="d-flex justify-content-start align-items-center gap-2 nav-link">
                        <i class="fas fa-calendar-times fa-xl"></i>
                        <p>Expiration Dates</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>