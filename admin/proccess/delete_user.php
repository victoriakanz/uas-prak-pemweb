<?php
session_start();
require '../controller/function.php';
$username = $_GET["q"];
if (!isset($_SESSION["admin"])) {
	header("Location: index.php");
	exit;
}
if (!isset($username)) {
	header("Location: ../dashboard/manage_user.php");
	exit;
}

if (deleteUser($username) > 0) {
	echo "<script>
				alert('Data Berhasil Dihapus!');
				document.location.href ='../dashboard/manage_user.php';
				</script>
		";
} else {
	echo "<script>
				alert('Data Gagal Dihapus!');
				document.location.href ='../dashboard/manage_user.php';
				</script>
		";
}
