<?php
session_start();

require 'config/koneksi.php';
if (isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE username ='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            header("location: index.php");
        } else {
            echo " <script>
            alert('Login gagal!!');
            document.location.href='login.php';
            </script>
            ";
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center ">
        <div class=" card shadow-sm" style="margin-top: 150px;">
            <h2 class="text-center py-2 mt-2"><strong>Login</strong></h2>
            <div class="card-body p-4">
                <form method="post">
                    <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Masukan username ">
                    <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Masukan Password">
                    <button type="submit" class="btn btn-primary w-100 mb-2" name="login">Login</button>
                    <span style="font-size: 14px;">Registrasi dulu?<a href="registrasi.php " class="text-decoration-none ">klik</a></span>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>


</html>