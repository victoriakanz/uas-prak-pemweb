<?php include('../templates/navbar.php');
if (!isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit;
}
$users = query("SELECT * FROM tb_user");
?>
<?php include('../templates/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                            <h3 class="card-title">Table Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="add_user.php" class="btn btn-default">
                                Add User
                            </a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $user["name"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $user["username"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $user["email"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $user["is_admin"] == 1 ? 'Admin' : 'Author'; ?>
                                            </td>
                                            <td class="text-left py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="edit_user.php?q=<?php echo $user["username"]; ?>"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <?php if ($user["is_admin"] != 1): ?>
                                                        <a href="../proccess/delete_user.php?q=<?php echo $user["username"]; ?>"
                                                            onclick="return confirm('Apakah ingin mengapus data tersebut?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    <?php endif; ?>
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