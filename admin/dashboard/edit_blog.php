<?php
// ambil data di url
$id = $_GET["q"];

if (!isset($id)) {
    header("Location: manage_blog.php");
    exit;
}

include('../templates/navbar.php');
// query data blog berdasarkan id

$blog = query("SELECT title, content, category_id, tb_blog.id AS blog_id, tb_blog.slug AS blog_slug, tb_blog.image AS blog_image, tb_kategori.name AS category_name , tb_blog.slug AS blog_slug FROM tb_blog
JOIN tb_user ON tb_blog.user_id = tb_user.id
JOIN tb_kategori ON tb_blog.category_id = tb_kategori.id WHERE tb_blog.slug = '$id'")[0];
$categories = query("SELECT * FROM tb_kategori");

// cek apakah tombol submit dudah ditekan atau belum
if (isset($_POST["edit"])) {
    if (editBlog($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil Diubah!');
        document.location.href ='manage_blog.php';
        </script>
    ";
    } else {
        echo "<script>
        alert('Data Gagal Diubah!');
        document.location.href ='manage_blog.php';
        </script>
    ";
    }
}

include('../templates/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>blog Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">blog Edit</li>
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
                        <h3 class="card-title">Blog Edit</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $blog["blog_id"]; ?>">
                            <input type="hidden" name="slug" value="<?php echo $blog["blog_slug"]; ?>">
                            <input type="hidden" name="oldImage" value="<?php echo $blog["blog_image"]; ?>">
                            <div class="form-group">
                                <label for="title">Blog Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="<?php echo $blog["title"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thumbnail</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                            onchange="previewImage()" accept='image/*'>
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <img src="../../img/blogs/<?php echo $blog["blog_image"]; ?>"
                                    class="img-fluid mt-3 img-preview" width="" alt="">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" class="form-control custom-select" name="category_id" required>
                                    <option selected value="<?php echo $blog["category_id"]; ?>"><?php echo $blog["category_name"]; ?></option>
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category["id"] === $blog["category_id"]) {
                                            continue;
                                        } ?>
                                        <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Content</label>
                                <textarea class="ckeditor" id="ckedtor" name="content" required>
                                    <?php echo $blog["content"]; ?>
                                </textarea>
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