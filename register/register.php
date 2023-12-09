<?php
//memulai session 
session_start();
if (isset($_SESSION['login'])) {
  header("Location: admin/dashboard/index.php");
  exit;
}

//memanggil file koneksi
include('../connection/koneksi.php');
if (isset($_POST['register'])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
        alert('Akun Berhasil Didaftarkan!');
        </script>";
  } else {
    echo mysqli_error($koneksi);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>register</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- FAVICON -->
  <link rel="icon" href="../img/justkenzie-whit.png" type="image/x-icon" />
</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
      }

      #intro {
        background-image: url(../img/wallpaperflare.com_wallpaper.jpg);
        background-size: cover;
        background-position: center;
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: coral !important;
      }

      .bg-register {
        background-color: rgba(255, 255, 255, 0.1);
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
          <img src="../img/justkenzie-whit.png" alt="Bootstrap" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/login.php" rel="nofollow" target="_blank">Log In</a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/channel/UC3_1epspQtjpOJF-IUc1S4Q" rel="nofollow"
                target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="#" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://twitter.com/kenziecmbrbatch" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="#" rel="nofollow" target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.1);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form method="post" class="bg-register rounded shadow-5-strong p-5">

                <!-- username -->
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example1" name="username" class="form-control text-black" required />
                  <label class="form-label text-white" for="form1Example1">Username</label>
                </div>

                <!-- name -->
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example1" name="name" class="form-control text-black" required />
                  <label class="form-label text-white" for="form1Example1">Name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form1Example1" name="email" class="form-control text-black" required />
                  <label class="form-label text-white" for="form1Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form1Example2" name="password" class="form-control text-black" required />
                  <label class="form-label text-white" for="form1Example2">Password</label>
                </div>

                <!-- repeat password -->
                <div class="form-outline mb-4">
                  <input type="password" id="form1Example2" name="confirm_password" class="form-control text-black"
                    required />
                  <label class="form-label text-white" for="form1Example2">Repeat Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->


                <!-- Submit button -->
                <button type="submit" name="register" class="btn btn-primary btn-block">Sign Up</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->


  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>