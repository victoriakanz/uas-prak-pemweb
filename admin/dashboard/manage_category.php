<?php include('../templates/navbar.php');

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
  exit;
}
$categories = query("SELECT * FROM tb_kategori");
?>
<?php include('../templates/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="add_category.php" class="btn btn-default">
                Add Category
              </a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name Category</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($categories as $category): ?>
                    <tr>
                      <td>
                        <?php echo $i; ?>
                      </td>
                      <td>
                        <?php echo $category["name"]; ?>
                      </td>
                      <td>
                        <img src="../../img/categories/<?php echo $category["image"]; ?>"
                          alt="<?php echo $category["name"]; ?>" width="100" class="img-fluid">
                      </td>
                      <td class="text-left py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="edit_category.php?q=<?php echo $category["slug"]; ?>" class="btn btn-warning"><i
                              class="fas fa-edit"></i></a>
                          <a href="../proccess/delete_category.php?q=<?php echo $category["slug"]; ?>"
                            onclick="return confirm('Apakah ingin mengapus data tersebut?')" class="btn btn-danger"><i
                              class="fas fa-trash"></i></a>
                        </div>
                      </td>

                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php include('../templates/footer.php'); ?>