<?php
session_start();
if (isset($_SESSION['login'])) {
  header("Location: admin/dashboard/index.php");
  exit;
}
include('connection/koneksi.php');
//mengambil parameter atau data dari url
$slug = $_GET['q'];

//melakukan cek parameter q
if (!isset($slug)) {
  header('Location: index.php');
}
;
$blog = query("SELECT * FROM tb_blog WHERE slug='$slug'")[0];
$categories = query("SELECT * FROM tb_kategori")
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

  <!-- Style -->
  <link rel="stylesheet" href="style2.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Belanosima:regular,600,700" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
    rel="stylesheet" />

  <!-- FAVICON -->
  <link rel="icon" href="img/justkenzie-whit.png" type="image/x-icon" />

  <title>blog website</title>
</head>

<body>
  <header>
    <!--Navbar-->
    <nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
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
            <?php foreach ($categories as $data): ?>
              <li class="nav-item mx-2">
                <a class="nav-link" href="blogs.php?category=<?php echo $data['slug']; ?>"><?php echo $data['name']; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <div>
            <a href="register/register.php" class="button-primary text-decoration-none me-4">Sign Up</a>
            <a href="login/login.php" class="button-secondary px-3 py-2 text-decoration-none me-4">Log In</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section class="post-header">
    <div class="header-content post-container">
      <!-- Title -->
      <h1 class="header-title">
        <?php echo $blog['title']; ?>
      </h1>
      <!-- Post Image -->
      <img src="img/blogs/<?php echo $blog['image']; ?>" alt="" class="img-fluid header-img">
    </div>
  </section>

  <section class="post-content post-container">
    <h2 class="sub-heading">
      <?php echo date('D, d F Y', strtotime($blog['publish_at'])); ?>
    </h2>
    <p class="post-text">
      <?php echo $blog['content']; ?>
    </p>
  </section>

  <!--share button-->
  <div class="share post-container">
    <span class="share-title">Share this article</span>
    <div class="social mb-4 mt-2">
      <a href="https://id-id.facebook.com/"><svg role="img" width="25px" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <title>Facebook</title>
          <path
            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
        </svg></a>
      <a href="https://www.instagram.com/"><svg role="img" width="25px" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <title>Instagram</title>
          <path
            d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
        </svg></a>
      <a href="https://twitter.com/"><svg role="img" width="25px" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <title>Twitter</title>
          <path
            d="M21.543 7.104c.015.211.015.423.015.636 0 6.507-4.954 14.01-14.01 14.01v-.003A13.94 13.94 0 0 1 0 19.539a9.88 9.88 0 0 0 7.287-2.041 4.93 4.93 0 0 1-4.6-3.42 4.916 4.916 0 0 0 2.223-.084A4.926 4.926 0 0 1 .96 9.167v-.062a4.887 4.887 0 0 0 2.235.616A4.928 4.928 0 0 1 1.67 3.148 13.98 13.98 0 0 0 11.82 8.292a4.929 4.929 0 0 1 8.39-4.49 9.868 9.868 0 0 0 3.128-1.196 4.941 4.941 0 0 1-2.165 2.724A9.828 9.828 0 0 0 24 4.555a10.019 10.019 0 0 1-2.457 2.549z" />
        </svg></a>
      <a href="https://web.whatsapp.com/"><svg role="img" width="25px" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <title>WhatsApp</title>
          <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
        </svg></a>
    </div>
  </div>

  <section class="footer">
    <footer class="bg-dark text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i
              class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a class="btn text-white btn-floating m-1" style="background-color: #55acee;"
            href="https://twitter.com/kenziecmbrbatch" role="button"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i
              class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
            href="https://www.instagram.com/aqilasyaimafadel/" role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i
              class="fab fa-linkedin-in"></i></a>
          <!-- Github -->
          <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i
              class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Copyright © 2023
        <a class="text-white text-decoration-none" href="https://aqilahsf.com">Aqilah Syaima' Fadel</a>
      </div>
      <!-- Copyright -->
    </footer>
  </section>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>