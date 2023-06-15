<?php

require 'functions.php';
require 'config/koneksi.php';

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo " <script>
        alert('Registrasi Berhasil!!');
        document.location.href='login.php';
        </script>
        ";
    } else {
        echo " <script>
        alert('Registrasi gagal!!');
        document.location.href='registrasi.php';
        </script>
            ";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center ">
        <div class=" card shadow-sm" style="margin-top: 150px;">
            <h2 class="text-center py-2 mt-2"><strong>Registrasi</strong></h2>
            <div class="card-body p-4">
                <form method="post">
                    <input type="text" class="form-control mb-2" id="username" name="username" placeholder="Username">
                    <input type="password" class="form-control mb-2" id="password" name="password" placeholder="Password">
                    <input type="password" class="form-control mb-2" id="password" name="password1" placeholder="Confirmasi Password">
                    <button type="submit" class="btn btn-primary w-100 mb-2" name="registrasi">registrasi</button>
                    <span style="font-size: 14px;">Gas Login?<a href="login.php " class="text-decoration-none ">klik</a></span>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>


</html>