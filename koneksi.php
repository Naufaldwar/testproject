<?php
    $hostname ="localhost";
    $username ="root";
    $password ="";
    $database ="klinik";
  


    $konek=new mysqli($hostname,$username,$password,$database);

    if($konek-> connect_error)
    {
        die('maaf koneksi gagal:'.$connect->connect_error);
    }
?>