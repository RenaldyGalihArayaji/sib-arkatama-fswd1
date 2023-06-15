<?php

include "functions.php";

session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

$id = $_GET["id"];

$query = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

if ($query > 0) {
    echo " <script>
    alert('Data Berhasil di hapus!!');
    document.location.href='index.php';
    </script>
    ";
} else {
    echo " <script>
    alert('Data gagal di hapus!!');
    document.location.href='index.php';
    </script>
    ";
}
