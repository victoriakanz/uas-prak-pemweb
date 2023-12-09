<?php include('../templates/navbar.php');
$categories = query("SELECT * FROM tb_kategori");
if (isset($_POST["save"])) {
  if (add_blog($_POST) > 0) {
    echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href ='manage_blog.php';
        </script>
    ";
  } else {
    echo "<script>
        alert('Data Gagal Ditambahkan!');
        document.location.href ='manage_blog.php';
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
          <h1>Blog Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Blog Add</li>
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
            <h3 class="card-title">Add Blog</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title Blog</label>
                <input type="text" id="title" name="title" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Thumbnail</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image" required
                      onchange="previewImage()" accept='image/*'>
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <img src="#" class="img-fluid mt-3 img-preview" style="display: none;">
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select id="category" class="form-control custom-select" name="category_id" required>
                  <option selected disabled>Select one</option>
                  <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Content</label>
                <textarea class="ckeditor" id="ckedtor" name="content" required>
                </textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="save" class="btn btn-primary float-right">Save</button>
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