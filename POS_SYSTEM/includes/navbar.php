<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<nav class="navbar navbar-expand-lg bg-white shadow">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            POS SYSTEM
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- Home always visible -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>

                <?php if(isset($_SESSION['loggedIn'])) : ?>

                    <!-- If logged in: show username -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <?= $_SESSION['loggedInUser']['name']; ?>
                        </a>
                    </li>

                    <!-- Logout button -->
                    <li class="nav-item">
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                    </li>

                <?php else: ?>

                    <!-- If not logged in: show Login -->
                  <!--  <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li> -->

                <?php endif; ?>

            </ul>
        </div>

    </div>
</nav>
