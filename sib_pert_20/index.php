<?php
session_start();
include "functions.php";


if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

$roles = mysqli_query($conn, "SELECT * FROM roles ");
$users = mysqli_query($conn, "SELECT * FROM users Order By id DESC ");


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sib_Pert_19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar shadow " style="background-color: #537188; ">
        <div class="container">
            <h4 class="navbar-brand text-white">Selamat Datang <strong><?= $_SESSION["username"]; ?>!! </strong></h4>
            <a href="logout.php" class="btn btn-danger ">Logout</a>
        </div>

    </nav>
    <div class="container">

        <h2 class="text-center my-5">DATA USER </h2>
        <?php
        if (isset($_POST['submit'])) {
            if (tambah($_POST) > 0) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di Tambahkan!!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data gagal di Tambahkan!!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }
        ?>
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add">Add</button>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($users as $user) :
                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td>
                                <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-success">Edit</a>
                                <a href="hapus.php?id=<?= $user['id']; ?>" class="btn btn-danger" onclick="confirm('Yakin Mau di Hapus?')">Delete</a>
                            </td>
                            <td><img src="images/<?= $user['image']; ?> " alt="" class="rounded-circle" width="50"></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['phone']; ?></td>
                            <td><?= $user['role']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

            </table>
        </div>
        <!-- End Table -->

        <!-- Halaman Tambah  -->
        <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addLabel">Tambah Data user</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Data -->
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" require>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="contoh@gmail.com" require>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="08......." require>
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" class="form-select" name="role" require>
                                    <option selected>Pilih.....</option>
                                    <?php
                                    foreach ($roles as $role) :
                                    ?>
                                        <option value="<?= $role["nama"]; ?>"><?= $role["nama"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Avatar</label>
                                <input type="file" class="form-control" id="image" name="image" require>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                        <!-- End Form Data -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Halaman Tambah  -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>