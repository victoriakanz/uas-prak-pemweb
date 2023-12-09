<?php include('../templates/navbar.php');
$user = $_SESSION["id"];
$blog = query("SELECT title, content, category_id, tb_kategori.name As category_name , tb_blog.slug AS blog_slug FROM tb_blog
 JOIN tb_user ON tb_blog.user_id = tb_user.id
 JOIN tb_kategori ON tb_blog.category_id = tb_kategori.id WHERE user_id = '$user'");
?>
<?php include('../templates/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Blog</li>
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
              <h3 class="card-title">Table Blog</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="add_blog.php" class="btn btn-primary">
                Add Blog
              </a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Blog Title</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($blog as $data): ?>
                    <tr>
                      <td>
                        <?php echo $i; ?>
                      </td>
                      <td>
                        <?php echo $data["title"]; ?>
                      </td>
                      <td>
                        <?php echo strip_tags(substr($data["content"], 0, 50) . "...");
                        ; ?>
                      </td>
                      <td>
                        <?php echo $data["category_name"]; ?>
                      </td>
                      <td class="text-left py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="edit_blog.php?q=<?php echo $data["blog_slug"]; ?>" class="btn btn-warning"><i
                              class="fas fa-edit"></i></a>
                          <a href="../proccess/delete_blog.php?q=<?php echo $data["blog_slug"]; ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah ingin mengapus data tersebut?')"><i
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name Category</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name category">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php include('../templates/footer.php'); ?>