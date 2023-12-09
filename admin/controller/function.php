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

function add_category($tambah)
{
    global $koneksi;

    $name = htmlspecialchars($tambah["name"]);
    $slug = slugify($name);

    // UPLOAD GAMBAR
    $thumbnail = upload_category();
    if (!$thumbnail) {
        return false;
    }

    $query = "INSERT INTO tb_kategori VALUES('','$name','$slug','$thumbnail')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function add_blog($tambah)
{
    global $koneksi;
    $title = htmlspecialchars($tambah["title"]);
    $content = $tambah["content"];
    $category = $tambah["category_id"];
    $user = $_SESSION['id'];

    $slug = slugify($title);

    // UPLOAD GAMBAR
    $image = upload_blog();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO tb_blog VALUES('','$title','$content','$category','$image','$slug','$user', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


function add_user($data)
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



function upload_category()
{
    $namafile = $_FILES['image']['name'];
    $ukuranfile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpname = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada foto yang diupload
    if ($error === 4) {
        echo "<script>
				alert('Silahkan Masukkan Foto Terlebih dahulu!');
				</script>";

        return false;
    }

    // cek apakah yang diupload adalah foto
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
				alert('Yang Anda Upload Bukan Foto!');
				</script>";

        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
				alert('Ukuran Foto Terlalu Besar');
				</script>";

        return false;
    }

    // lolos pengecekan, foto siap diupload
    // generate nama foto baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, '../../img/categories/' . $namafilebaru);

    return $namafilebaru;
}

function upload_blog()
{
    $namafile = $_FILES['image']['name'];
    $ukuranfile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpname = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada foto yang diupload
    if ($error === 4) {
        echo "<script>
				alert('Silahkan Masukkan Foto Terlebih dahulu!');
				</script>";

        return false;
    }

    // cek apakah yang diupload adalah foto
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
				alert('Yang Anda Upload Bukan Foto!');
				</script>";

        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
				alert('Ukuran Foto Terlalu Besar');
				</script>";

        return false;
    }

    // lolos pengecekan, foto siap diupload
    // generate nama foto baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, '../../img/blogs/' . $namafilebaru);

    return $namafilebaru;
}

function slugify($text)
{
    // Replace non-alphanumeric characters with dashes
    $text = preg_replace('/[^a-zA-Z0-9]/', '-', $text);

    // Remove duplicate dashes
    $text = preg_replace('/-+/', '-', $text);

    // Remove dashes from the beginning and end of the string
    $text = trim($text, '-');

    // Convert the text to lowercase
    $text = strtolower($text);

    return $text;
}

function editBlog($ubah)
{
    global $koneksi;
    $id = $ubah["id"];
    $slug = $ubah["slug"];
    $title = htmlspecialchars($ubah["title"]);
    $newSlug = slugify($title);
    $content = $ubah["content"];
    $category = $ubah["category_id"];
    $user = $_SESSION['id'];
    $oldImage = $ubah["oldImage"];
    // cek apakah user pilih foto baru atau gak
    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = upload_blog();
        if ($image) {
            $filePath = '../../img/blogs/' . $oldImage;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }


    $query = "UPDATE tb_blog SET 
					title = '$title',
                    slug = '$newSlug',
                    content = '$content',
                    category_id = '$category',
                    user_id = '$user',
                    image = '$image'
					WHERE id = $id
					  ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function editCategory($ubah)
{
    global $koneksi;
    $id = $ubah["id"];
    $name = htmlspecialchars($ubah["name"]);
    $newSlug = slugify($name);
    $content = $ubah["content"];
    $oldImage = $ubah["oldImage"];
    // cek apakah user pilih foto baru atau gak
    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = upload_category();
        if ($image) {
            $filePath = '../../img/categories/' . $oldImage;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }


    $query = "UPDATE tb_kategori SET 
					name = '$name',
                    slug = '$newSlug',
                    image = '$image'
					WHERE id = '$id'
					  ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function edit_user($data)
{
    global $koneksi;
    $name = htmlspecialchars($data["name"]);
    $username = $data["username"];
    $oldPassword = mysqli_real_escape_string($koneksi, $data["oldPassword"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $confirm = mysqli_real_escape_string($koneksi, $data["confirm"]);

    $result = mysqli_query($koneksi, "SELECT password FROM tb_user WHERE username = '$username'");

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($oldPassword, $row["password"])) {

        // cek konfirmasi password
        if ($password !== $confirm) {
            echo "<script>
                alert('konfirmasi Password Tidak Sesuai');
                </script>";

            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);


        // tambahkan user baru ke database
        $query = "UPDATE tb_user SET 
                name = '$name',
                password = '$password'
                WHERE username = '$username'
                ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
    // password tidak sesuai
    echo "<script>
        alert('Password Anda Salah');
        </script>";
    return false;
}

function deleteCategory($slug)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE slug = '$slug'");
    $row = mysqli_fetch_assoc($result);
    $filePath = '../../img/categories/' . $row["image"];

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE slug= '$slug'");
        }
    }
    return mysqli_affected_rows($koneksi);
}

function deleteBlog($slug)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM tb_blog WHERE slug = '$slug'");
    $row = mysqli_fetch_assoc($result);
    $filePath = '../../img/blogs/' . $row["image"];

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            mysqli_query($koneksi, "DELETE FROM tb_blog WHERE slug= '$slug'");
        }
    }
    return mysqli_affected_rows($koneksi);
}

function deleteUser($username)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_user WHERE username = '$username'");
    return mysqli_affected_rows($koneksi);
}