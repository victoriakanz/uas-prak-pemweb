<?php
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    // Query basis data untuk mendapatkan data berdasarkan slug
    $query = "SELECT name FROM tb_category WHERE slug = '$slug'";
    $result = query($query);

    if ($result) {
        echo json_encode($data);
    } else {
        // Jika query gagal, kirim respons error
        echo json_encode(['error' => 'Gagal mengambil data dari basis data.']);
    }
} else {
    // Jika request tidak valid, kirim respons error
    echo json_encode(['error' => 'Permintaan tidak valid.']);
}
