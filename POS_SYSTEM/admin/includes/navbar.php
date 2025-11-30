<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">test</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search (empty)-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

        <?php if(isset($_SESSION['LoggedIn'])): ?>
             <li class="nav-item">
                <a class="nav-link" href="#"><?= $_SESSION ['loggedInUser']['name']; ?></a>
             </li>

            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>

        <?php else: ?>

            
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>

        <?php endif; ?>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>

                <?php if(isset($_SESSION['auth'])): ?>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a class="dropdown-item" href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
</nav>
