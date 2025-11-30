<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <!-- Navbar Brand -->
        <a class="navbar-brand" href="index.php">MyPOS</a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- HOME -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>

                
                <?php if(isset($_SESSION['loggedIn'])): ?>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <?= $_SESSION['loggedInUser']['name']; ?>
                        </a>
                    </li>

                    <!-- LOGOUT -->
                    <li class="nav-item">
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                    </li>

                <?php else: ?>

                    <!-- LOGIN -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>
