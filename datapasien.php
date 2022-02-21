<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Data Pasien Klinik Sehat</title>
</head>
<body>

    <!-- nav judul -->
    <nav class="colornav sizenav"><h2 class="marginh1">Data Pasien</h2></nav>
    <!-- akhir nav judul -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datapasien.php">Data Pasien</a>
                    </li>
                    
                    <li>
                        <a class="btn posisi-btn" href="logout.php" role="button">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    
    <a class="btn btn-posisi btn-primary" href="formtambah.php" role="button">+Tambah</a>

    <!-- table -->
    <div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Kode Pasien</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Nomor Telephone</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Penyakit</th>
            <th scope="col">Alamat</th>
            <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
   
    session_start();
    $username =$_SESSION['username'];
    if(empty($_SESSION['username']))
    {
        header("location:login.php?pesan=belum_login");
    }
    include 'koneksi.php';
    
    
            $query = mysqli_query($konek, "SELECT kode_pasien, nama, no_tlp, tgl, penyakit, alamat from data_pasien ");
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

            
            
            while($data=mysqli_fetch_array($query))

            
            
    {?>
                <tr>
                    <td><?php echo $data['kode_pasien'];?></td>
                    <td><?php echo dekripsi($data['nama'], 6);?></td>
                    <td><?php echo dekripsi($data['no_tlp'], 7);?></td>
                    <td><?php echo $data['tgl'];?></td>
                    <td><?php echo dekripsi($data['penyakit'], 6);?></td>
                    <td><?php echo dekripsi($data['alamat'], 6);?></td>
                    <td>
                    <a class="btn btn-primary" href=hapus.php?kode_pasien=<?php echo $data['kode_pasien']; ?>>Hapus</a>
                    </td>
                    
                
            <?php }
            ?>
                </tr>
        </tbody>
    </table>
    
    
</div>
    <!-- akhir table -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>