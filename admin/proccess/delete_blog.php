<?php
session_start();
require '../controller/function.php';
$slug = $_GET["q"];
if (!isset($slug)) {
	header("Location: ../dashboard/manage_blog.php");
	exit;
}

if (deleteBlog($slug) > 0) {
	echo "<script>
				alert('Data Berhasil Dihapus!');
				document.location.href ='../dashboard/manage_blog.php';
				</script>
		";
} else {
	echo "<script>
				alert('Data Gagal Dihapus!');
				document.location.href ='../dashboard/manage_blog.php';
				</script>
		";
}