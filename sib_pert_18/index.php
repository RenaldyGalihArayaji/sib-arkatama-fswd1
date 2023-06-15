<?php

// koneksi
include "koneksi.php";

// Insert Data
if (isset($_POST['submit'])) {

    $namac = $_POST['name_c'];
    $namap = $_POST['name_p'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $created_by = 1;


    $queryc = mysqli_query($con, "INSERT INTO categories(name , created_at , updated_at) VALUES ('$namac',now(),now())");
    $queryp = mysqli_query($con, "INSERT INTO products(name ,description ,price,status,created_at , updated_at, created_by) VALUES ('$namap','$description','$price','$status',now(),now(), '$created_by')");

    if ($queryc && $queryp) {
        echo "Berhasil di tambah";
    } else {
        echo "gagal ditambahkan";
    }
}

// Menampilkan all data
$dataMagang = mysqli_query($con, "SELECT products.*, categories.name AS name_category FROM products JOIN categories ON products.category_id = categories.id ");

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body>
    <div class="container ">
        <h2 class="text-center my-5">Latihan</h2>

        <!-- Button Tambah -->
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add<i class="bi bi-plus-lg ms-2"></i></button>
        <!-- End Button Tambah -->

        <!-- Table -->
        <div class="table-responsive-md">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">name_kategory</th>
                        <th scope="col">name_produk</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $no = 1;
                    foreach ($dataMagang as $data) :
                    ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $data["name_category"]; ?></td>
                            <td><?= $data["name"]; ?></td>
                            <td><?= $data["price"]; ?></td>
                            <td><?= $data["status"]; ?></td>
                            <td><?= $data["description"]; ?></td>
                            <td>
                                <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-danger"><i class="bi bi-archive"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End table -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <div class="row mb-3">
                                <label for="name_C" class="col-sm-2 col-form-label">Name_Category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_C" name="name_c">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name_p" class="col-sm-2 col-form-label">Name_Product</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_p" name="name_p">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="status" name="status">
                                        <option selected>Pilih...</option>
                                        <option value="rejected">Rejected</option>
                                        <option value="waiting">Waiting</option>
                                        <option value="accepted">Accepted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>