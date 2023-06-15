<?php

include "config/koneksi.php";

// Tambah Data
function tambah($data)
{
    global $conn;

    $nama = $data['nama'];
    $email = $data['email'];
    $phone = $data['phone'];
    $role = $data['role'];
    $image = gambar();

    if (!$image) {
        return false;
    }


    mysqli_query($conn, "INSERT INTO users(nama , email , phone , role , image  ,created_at,updated_at) VALUES ('$nama','$email', '$phone','$role','$image',now(),now())");

    return mysqli_affected_rows($conn);
}

function gambar()
{

    $ekstensi_format = ['jpg', 'jpeg', 'png'];
    $nama = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $tmp = $_FILES['image']['tmp_name'];

    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));

    if (!in_array($ekstensi, $ekstensi_format)) {
        echo " <script>
        alert('Format yang anda masukan salah');
        </script>";

        return false;
    }

    if ($size > 500000) {
        echo " <script>
        alert('Ukuran Gambar Terlalu Besar , max. 5Mb!!');
        </script>";

        return false;
    }

    $namaNew = uniqid();
    $namaNew .= '.';
    $namaNew .= $ekstensi;

    move_uploaded_file($tmp, 'images/' . $namaNew);

    return $namaNew;
}
// Delete Data

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id = $id");

    return mysqli_affected_rows($conn);
}
// Update Data

function edit($data)
{
    global $conn;
    $id = $data['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $phone = $data['phone'];
    $role = $data['role'];
    $imageLama = $data['imageLama'];

    if ($_FILES['image']['error'] === 4) {
        $image = $imageLama;
    } else {
        $image = gambar();
    }


    mysqli_query($conn, "UPDATE users SET nama ='$nama',email ='$email',phone ='$phone',role ='$role', image = '$image' WHERE id='$id'");

    return mysqli_affected_rows($conn);
}
