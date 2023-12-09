<?php
session_start();
// memanggil file koneksi
include('../connection/koneksi.php');

// apakah udah login
if (isset($_SESSION["login"])) {
  header("Location: ../admin/dashboard/index.php");
  exit;
}

// check login
if (isset($_POST["login"])) {

  $username = $_POST["user"];
  $password = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["username"] = $row["username"];

      // cek session admin
      if ($row["is_admin"] == 1) {
        $_SESSION["admin"] = true;
      }
      header("Location: ../admin/dashboard/index.php");
      exit;
    }
  }

  $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>login</title>
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
        background-image: url(../img/1564216.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #faab40 !important;
      }

      .bg-login {
        background-color: rgba(255, 255, 255, 0.1);
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);

      }

      .error-message {
        color: #ff4e4e;
        text-align: center;
        margin-bottom: 40px;
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
              <a class="nav-link" href="../register/register.php" rel="nofollow" target="_blank">Sign Up</a>
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
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-xl-5 col-md-8">
              <form method="post" class="bg-login rounded-3 shadow-3-strong p-5">
                <?php if (isset($error)): ?>
                  <p class="error-message">Username atau Password Anda Salah</p>
                <?php endif; ?>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example1" name="user" class="form-control text-white" required />
                  <label class="form-label text-white" for="form1Example1">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form1Example2" name="password" class="form-control text-white" required />
                  <label class="form-label text-white" for="form1Example2">Password</label>
                </div>


                <!-- Submit button -->
                <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
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