<?php include('../templates/navbar.php');

// ambil data di url
$id = $_GET["q"];

if (!isset($id)) {
  header("Location: manage_user.php");
  exit;
}

$data = query("SELECT * FROM tb_user WHERE username = '$id'")[0];
if (isset($_POST["edit"])) {
  if (edit_user($_POST) > 0) {
    echo "<script>
        alert('Data Berhasil Diubah!');
        document.location.href ='manage_user.php';
        </script>
    ";
  } else {
    echo "<script>
        alert('Data Gagal Diubah!');
        document.location.href ='manage_user.php';
        </script>
    ";
  }
}
?>
<?php include('../templates/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">User Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit User</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <input type="hidden" name="username" value="<?php echo $data["username"]; ?>">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" value="<?php echo $data["name"]; ?>" name="name" class="form-control"
                  required>
              </div>
              <div class="form-group">
                <label for="current">Current Password</label>
                <input type="password" id="current" name="oldPassword" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="new">New Password</label>
                <input type="password" id="new" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" id="confirm" name="confirm" class="form-control" required>
              </div>
              <div class="form-group">
                <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php include('../templates/footer.php'); ?>