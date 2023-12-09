<?php
session_start();
require '../controller/function.php';
$slug = $_GET["q"];

if (!isset($slug)) {
	header("Location: manage_category.php");
	exit;
}

if (!isset($_SESSION["admin"])) {
	header("Location: index.php");
	exit;
}
if (deleteCategory($slug) > 0) {
	echo "<script>
				alert('Data Berhasil Dihapus!');
				document.location.href ='../dashboard/manage_category.php';
				</script>
		";
} else {
	echo "<script>
				alert('Data Gagal Dihapus!');
				document.location.href ='../dashboard/manage_category.php';
				</script>
		";
}