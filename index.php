<?php
session_start();
if (isset($_SESSION['login'])) {
  header("Location: admin/dashboard/index.php");
  exit;
}
include('connection/koneksi.php');
$blog = query("SELECT * FROM tb_blog ORDER BY id DESC");
$categories = query("SELECT * FROM tb_kategori LIMIT 4"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

  <!-- Style -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Belanosima:regular,600,700" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
    rel="stylesheet" />

  <!-- FAVICON -->
  <link rel="icon" href="img/justkenzie-whit.png" type="image/x-icon" />

  <title>justkenzie blog</title>
</head>

<body>
  <header>
    <!--Navbar-->
    <?php include("layout/navbar.php"); ?>

    <!--Header-->
    <div class="intro">
      <div class="head text-center d-flex justify-content-center">
        <div class="d-block title-desc">
          <h1>justkenzie</h1>
          <h6>Astronomy and Entertainment</h6>
          <p class="text-white">Blog released every weekend! Stay tune🔭🍿</p>
          <hr class="w-50 mx-auto">
        </div>
      </div>
    </div>
  </header>

  <!--featured content-->
  <section class="featured container my-5">
    <div class="row pb-3">
      <?php foreach ($categories as $data): ?>
        <div class="one position-relative col-lg-4 col-md-6 col-12 pb-4 mb-3">
          <img class="img-fluid" src="img/categories/<?php echo $data['image']; ?>">
          <div class="text w-70 h-50 text-light p-2">
            <p>
              <?php echo ($data['name']); ?>
            </p>
            <a href="blogs.php?category=<?php echo $data['slug']; ?>">Read more</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!--subs-->
  <section class="subscription container p-5">
    <div class="row pb-3 justify-content-between align-items-center">
      <div class="content col-lg-6 col-md-6 col-12">
        <h3>wanna get weekly contents faster?</h3>
        <p>sign up first to get premium features🎉</p>
      </div>
      <div class="sub col-lg-6 col-md-6 col-12">
        <input class="py-2 px-3 col-lg-6 col-md-12" type="email" name="" placeholder="Your Email">
        <button class="py-2 px-3 text-uppercase col-lg-5 col-md-12">Subscribe</button>
      </div>
    </div>
  </section>

  <!--main blog-->
  <section class="blog container my-5">
    <div class="row pb-3">

      <!--sidebar-->
      <div class="sidebar col-lg-4 col-md-4 col-12">
        <div class="sidel text-center pb-5">
          <img class="img-fluid mb-3" src="img/pfp.jpg">
          <h3>Aqilah Syaima' Fadel</h3>
          <h6>Computer Science Student</h6>
          <p>My name is Skyler White, yo. My husband is Walter White, yo. He told me everything.</p>
        </div>
        <div class="side2 pb-5">
          <h4>My personal favorites</h4>
          <hr class="w-50">
          <div class="row pb-3">
            <div class="sideimg col-lg-4 col-md-4 col-4">
              <img class="img-fluid" src="img/205807-guts-berserk-1600x900.jpg">
            </div>
            <div class="sidetext col-lg-8 col-md-8 col-8">
              <h4>Lorem ipsum dolor sit amet.</h4>
              <a href="#">Read more</a>
            </div>
          </div>

          <div class="row pb-3">
            <div class="sideimg col-lg-4 col-md-4 col-4">
              <img class="img-fluid" src="img/1123510.jpg">
            </div>
            <div class="sidetext col-lg-8 col-md-8 col-8">
              <h4>Lorem ipsum dolor sit amet.</h4>
              <a href="#">Read more</a>
            </div>
          </div>

          <div class="row pb-3">
            <div class="sideimg col-lg-4 col-md-4 col-4">
              <img class="img-fluid" src="img/sherlock_e583_1366x768.jpg">
            </div>
            <div class="sidetext col-lg-8 col-md-8 col-8">
              <h4>Lorem ipsum dolor sit amet.</h4>
              <a href="#">Read more</a>
            </div>
          </div>
        </div>

        <div class="side3">
          <h4>Offers</h4>
          <hr class="w-25">
          <div class="one">
            <img class="img-fluid" src="img/neil book.jpg" alt="">
            <div class="text text-center">
              <h4 class="text-light">Neil deGrasse Tyson's book is now available to purchase</h4>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
        </div>
      </div>


      <!--posts-->
      <div class="post col-lg-8 col-md-8 col-12 pb-4">
        <div class="row pb-3">
          <?php foreach ($blog as $data): ?>
            <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
              <img class="img-fluid pb-3" src="img/blogs/<?php echo $data['image']; ?>">
              <h3>
                <?php echo substr($data['title'], 0, 57) . '...'; ?>
              </h3>
              <p>
                <?php echo substr($data['content'], 0, 150) . '...'; ?>
              </p>
              <a href="blog.php?q=<?php echo $data['slug']; ?>">Read more</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

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