<!--Navbar-->
<?php $category = query("SELECT * FROM tb_kategori"); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/justkenzie-whit.png" alt="" width="75" class="d-inline-block align-text-top me-3">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="blogs.php">Blogs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <?php foreach ($category as $data): ?>
                            <li><a class="dropdown-item" href="blogs.php?category=<?php echo $data['slug']; ?> "><?php echo $data['name']; ?></a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </li>
            </ul>
            <div>
                <a href="register/register.php" class="button-primary text-decoration-none me-5">Sign Up</a>
                <a href="login/login.php" class="button-secondary px-3 py-2 text-decoration-none me-5">Log In</a>

            </div>
        </div>
    </div>
</nav>