<?php

// fungsi upSideLeft
function upSideLeft($baris, $tampilan)
{
    for ($i = 1; $i <= $baris; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $tampilan;
        }
        echo "<br>";
    }
    echo "<pre>";
}

// fungsi upSideRight
function upSideRight($baris, $tampilan)
{
    for ($i = 1; $i <= $baris; $i++) {
        for ($j = 1; $j <= ($baris - $i); $j++) {
            echo " ";
        }
        for ($j = 1; $j <= $i; $j++) {
            echo $tampilan;
        }
        echo "<br>";
    }
}


// fungsi downSideLeft
function downSideLeft($baris, $tampilan)
{
    for ($i = $baris; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo $tampilan;
        }
        echo "<br>";
    }
    echo "<pre>";
}

// fungsi downSideRight
function downSideRight($baris, $tampilan)
{
    for ($i = $baris; $i >= 1; $i--) {
        for ($j = 1; $j <= ($baris - $i); $j++) {
            echo " ";
        }
        for ($j = 1; $j <= $i; $j++) {
            echo $tampilan;
        }
        echo "<br>";
    }
}


function pilih_patern($pilih, $angka, $tampilans)
{
    if ($pilih == 'a') {
        upSideLeft($angka, $tampilans);
    } else if ($pilih == 'b') {
        upSideRight($angka, $tampilans);
    } else if ($pilih == 'c') {
        downSideLeft($angka, $tampilans);
    } else if ($pilih == 'd') {
        downSideRight($angka, $tampilans);
    } else {
        echo "error";
    }
}


// Menampilkan upSideLeft
echo "Tampilan upSideLeft <br>";
pilih_patern('a', 5, '*');

// Menampilkan upSideRight
echo "Tampilan upSideRight <br>";
pilih_patern('b', 5, '*');

// Menampilkan downSideLeft
echo "Tampilan downSideLeft <br>";
pilih_patern('c', 5, '*');

// Menampilkan downSideRight
echo "Tampilan downSideRight <br>";
pilih_patern('d', 5, '*');
