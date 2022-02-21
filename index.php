<!DOCTYPE html>
<html >
<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">

    <title>login</title>
</head>
<body>
<?php
    if(isset($_GET['pesan']))
    {
        if($_GET['pesan']=="gagal")
        {
            echo "login gagal! Username dan password salah!";
        }
        else if($_GET['pesan']=="logout")
        {
            echo "Anda telah berhasil logout";
        }
        else if($_GET['pesan']=="Belum_login")
        {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="col-sm"></div>
            <div class="col-sm">
      </div>
        <div class="col-sm"></div>
    </div>
</div>
<br><br><br><br><br><br>
<div class="coontainer col-md-4 offset-4"><br>
    <center><h4>Silahkan login terlebih dahulu</h4></center>
    <form action="ceklogin.php" method="POST">
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label1 padding1">Username</label>
            <input type="text" class="form-control" name="username" placeholder="masukan username">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputPassword1" class="form-label1 padding1" >Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="masukan password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button><br><br>
    </form>
</div>    
</body>
</html>