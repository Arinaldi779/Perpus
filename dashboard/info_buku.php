<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
require 'proses/koneksi.php';
$id     =   $_GET["id"];
$query  =   mysqli_query($conn,"SELECT * FROM buku WHERE id_buku = $id");
$data   =   mysqli_fetch_assoc($query);
// var_dump($data);exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Info Buku</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body class="bg bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <img src="upload-buku/<?php echo $data["gambar_buku"] ?>" class="card-img-top" alt="..." height="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data["judul_buku"]; ?></h5><br>
                        <h6 class="card-title text-center">Sinopsis Buku</h6>
                        <p class="card-text"><?php echo $data["sinopsis"]; ?></p><br>
                        <h6 class="card-text text-center">Penulis Buku</h6>
                        <p class="card-text text-center"><?php echo $data["penulis_buku"]; ?></p>
                        <h6 class="card-text text-center">penerbit Buku</h6>
                        <p class="card-text text-center"><?php echo $data["penerbit_buku"]; ?></p><br>
                        <p class="card-text">Stok Buku Sisa <b><?php echo $data["stok_buku"]; ?></b></p>
                        <p class="card-text"><small class="text-muted">Tahun Terbit
                                <?php echo $data["tahun_penerbit"]; ?></small></p>

                        <a href="buku.php" class="btn btn-primary btn-sm">Kembali</a>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>