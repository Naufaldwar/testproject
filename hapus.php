<?php
    session_start();
    include 'koneksi.php';
    $kode_pasien = $_GET['kode_pasien'];

    $query = mysqli_query($konek,"DELETE FROM data_pasien where kode_pasien='$kode_pasien'");

    if($query)
    {
        header("location:datapasien.php");
    }
    else
    {
        echo "Data Gagal Di Hapus";
    }
?>