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
<?php
    include 'koneksi.php';
    session_start();
    $username =$_SESSION['username'];
    if(empty($_SESSION['username']))
    {
        header("location:login.php?pesan=belum_login");
    }
?>
    <!-- nav judul -->
    <nav class="colornav sizenav"><h2 class="marginh1" class="size">Klinik <small class="text-muted">Sehat</small></h2>
    
    </nav>
    <!-- akhir nav judul -->
    <!-- nav bar -->
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
    <!-- akhir navbar -->
    <center>
            <br><br><br><br><br><br>
            <h1 class="home">Selamat Datang <br><?php echo $username?></h1>
            <br>
        
        </center>

    <nav class="colornav fixed-bottom"><p class="marginh11">Klinik Sehat</p></nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>