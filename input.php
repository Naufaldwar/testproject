<?php
    session_start();
    $username =$_SESSION['username'];
    if(empty($_SESSION['username']))
    {
        header("location:login.php?pesan=belum_login");
    }
    
    include 'koneksi.php';
    $kode_pasien =$_POST['kode_pasien'];
    $nama1 =$_POST['nama'];
    $no_tlp1 =$_POST['no_tlp'];
    $tgl =$_POST['tgl'];
    $penyakit1 =$_POST['penyakit'];
    $alamat1 = $_POST['alamat'];

    function geser_teks($string, $key) {
        return implode('', array_map(function ($char) use ($key) {
            return geser_karakter($char, $key);
        }, str_split($string)));
    }
    function geser_karakter($char, $shift) {
        $shift = $shift % 25;
        $ascii = ord($char);
        $shifted = $ascii + $shift;
    
        if ($ascii >= 65 && $ascii <= 90) {
            return chr(geser_huruf_besar($shifted));
        }
    
        if ($ascii >= 97 && $ascii <= 122) {
            return chr(geser_huruf_kecil($shifted));
        }
    
        if ($ascii >= 33 && $ascii <= 58) {
            return chr(geser_angka($shifted));
        }
    
        return chr($ascii);
    }
    
    function geser_angka($ascii) {
        if ($ascii < 33) {
            $ascii = 59 - (33 - $ascii);
        }
      
        if ($ascii > 58) {
            $ascii = ($ascii - 58) + 32;
        }
        return $ascii;
      }
    
    function geser_huruf_besar($ascii) {
        if ($ascii < 65) {
            $ascii = 91 - (65 - $ascii);
        }
    
        if ($ascii > 90) {
            $ascii = ($ascii - 90) + 64;
        }
    
        return $ascii;
    }
    
    function geser_huruf_kecil($ascii) {
        if ($ascii < 97) {
            $ascii = 123 - (97 - $ascii);
        }

        if ($ascii > 122) {
            $ascii = ($ascii - 122) + 96;
        }
    
        return $ascii;
    }
    
    function enkripsi($plaintext, $key = 12) {
        return geser_teks($plaintext, $key);
    }
    
    function dekripsi($ciphertext, $key = -12) {
        return geser_teks($ciphertext, -$key);
    }

    $plainText = $nama1;
    $cipherText = enkripsi($plainText, 6);
    $nama = $cipherText;

    $plainText = $no_tlp1;
    $cipherText = enkripsi($plainText, 7);
    $no_tlp = $cipherText;

    $plainText = $penyakit1;
    $cipherText = enkripsi($plainText, 6);
    $penyakit = $cipherText;

    $plainText = $alamat1;
    $cipherText = enkripsi($plainText, 6);
    $alamat = $cipherText;
    
    $query=mysqli_query($konek, "INSERT INTO data_pasien values('','$kode_pasien','$nama','$no_tlp','$tgl','$penyakit','$alamat')")
    or die(mysqli_error($konek));

    if($query)
    {
        echo"proses input berhasil, ingin lihat hasil <a href='datapasien.php'>disini</a>";
    }
    else
    {
        echo"proses input gagal";
    }
?>