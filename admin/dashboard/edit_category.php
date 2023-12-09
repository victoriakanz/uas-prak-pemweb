<?php
// ambil data di url
$id = $_GET["q"];

if (!isset($id)) {
    header("Location: manage_category.php");
    exit;
}

// if (!isset($_SESSION["admin"])) {
//     header("Location: index.php");
//     exit;
// }

include('../templates/navbar.php');
// query data news berdasarkan id
$category = query("SELECT * FROM tb_kategori WHERE slug = '$id'")[0];

// cek apakah tombol submit dudah ditekan atau belum
if (isset($_POST["edit"])) {
    if (editCategory($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil Diubah!');
        document.location.href ='manage_category.php';
        </script>
    ";
    } else {
        echo "<script>
        alert('Data Gagal Diubah!');
        document.location.href ='manage_category.php';
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
                    <h1>Category Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
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
                        <h3 class="card-title">Category Edit</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $category["id"]; ?>">
                            <input type="hidden" name="slug" value="<?php echo $category["slug"]; ?>">
                            <input type="hidden" name="oldImage" value="<?php echo $category["image"]; ?>">
                            <div class="form-group">
                                <label for="title">Title News</label>
                                <input type="text" id="title" name="name" class="form-control"
                                    value="<?php echo $category["name"]; ?>" required>
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
                                <img src="../../img/categories/<?php echo $category["image"]; ?>"
                                    class="img-fluid mt-3 img-preview" width="" alt="">
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