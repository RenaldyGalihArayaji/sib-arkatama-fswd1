<?php
require "config/koneksi.php";
require "functions.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

$roles = mysqli_query($conn, "SELECT * FROM roles ");

$id = $_GET["id"];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$x = mysqli_fetch_assoc($query);


if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo " <script>
    alert('Data Berhasil di edit!!');
    document.location.href='index.php';
    </script>
    ";
    } else {
        echo " <script>
        alert('Data gagal di edit!!');
        document.location.href='index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sib_Pert_19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container px-5">
        <h2 class="text-center my-5">UPDATE DATA USER </h2>
        <form class="row g-3" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <input type="hidden" name="id" value="<?= $x["id"]; ?>">
                <input type="hidden" name="imageLama" value="<?= $x["image"]; ?>">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" require value="<?= $x["nama"]; ?>">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="contoh@gmail.com" require value="<?= $x["email"]; ?>">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="08......." require value="<?= $x["phone"]; ?>">
            </div>

            <div class="col-md-6">
                <label for="role" class="form-label">Role</label>
                <select id="role" class="form-select" name="role" require value="<?= $x["role"]; ?>">
                    <?php
                    foreach ($roles as $role) :
                    ?>
                        <option value="<?= $role["nama"]; ?>"><?= $role["nama"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Avatar</label>
                <img src="images/<?= $x["image"]; ?>" alt="" width="50">
                <input type="file" class="form-control" id="image" name="image" require>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>