<?php

// koneksi
$con = mysqli_connect("localhost", "root", "", "data_magang");
if (!$con) {
    echo "database error";
}


// function tambah($data)
// {
//     global $con;
//     $namac = $data['name_c'];
//     $namap = $data['name_p'];
//     $description = $data['description'];
//     $price = $data['price'];
//     $status = $data['status'];
//     $created_by = 1;


//     mysqli_query($con, "INSERT INTO categories(name , created_at , updated_at) VALUES ('$namac',now(),now())");
//     mysqli_query($con, "INSERT INTO products(name ,description ,price,status,created_at , updated_at, created_by) VALUES ('$namap','$description','$price','$status',now(),now(), '$created_by')");

//     return mysqli_affected_rows($con);
// }
