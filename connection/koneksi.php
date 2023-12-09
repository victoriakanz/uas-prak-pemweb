<?php
// menghubungkan database
$koneksi = mysqli_connect("localhost", "root", "", "blog_db");


// menampilkan data
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $koneksi;
    $email = strtolower(stripcslashes($data["email"]));
    $username = strtolower(stripcslashes($data["username"]));
    $name = strtolower(stripcslashes($data["name"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["confirm_password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Digunakan!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai');
        </script>";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$email', '$name', '$username', '$password', 0 )");
    return mysqli_affected_rows($koneksi);
}