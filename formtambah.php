<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Form Tambah Pasien</title>
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
<div class="container rounded-3 col-md-6 border-container ">
    <nav class="colornav sizenav2"><h5 class="marginh5">Tambah Data Pasien</h5></nav>
    <form method="POST" action="input.php" action="input.php">
    
    <div class="mb-3 row">
        <label class="col-sm-4 col-form-label form-label1">Kode Pasien</label>
        <div class="col-sm-8">
        <input type="text" class="form-control form-control1" name="kode_pasien" placeholder="Kode Pasien">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-4 col-form-label ">Nama Pasien</label>
        <div class="col-sm-8">
        <input type="text" class="form-control form-control" name="nama" placeholder="Masukan nama pasien">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-4 col-form-label">Nomor Telephone</label>
        <div class="col-sm-8">
        <input type="text" class="form-control form-control" name="no_tlp" placeholder="Masukan nomor telephone">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-4 col-form-label">Date</label>
        <div class="col-sm-4">
        <input type="date" data-date="" data-date-format="DD MM YYYY" name="tgl">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-4 col-form-label">Penyakit</label>
        <div class="col-sm-4">
        <input type="text" class="form-control form-control" name="penyakit" placeholder="Masukan nama penyakit">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label class="col-sm-4 col-form-label">Alamat</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat pasien">
        </div>
    </div>  
    
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="datapasien.php" role="button">Batal</a>
  
    </form><br><br>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script>
    $("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")
</script>
</body>
</html>