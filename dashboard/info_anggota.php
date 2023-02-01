<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
require 'proses/koneksi.php';
$id     =   $_GET["id"];
$query  =   mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
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

    h5.infoAnggota {
        background-color: black;
        border: 1px solid black;
        border-radius: 100px;
        padding: 2px;
        color: white;
    }

    img.infoImg {
        border: 1px solid transparent;
        border-radius: 50%;
        padding: 10px;
    }

    div.bodyInfo {
        background-color: #ffc107;
    }
    </style>
</head>

<body class="bg bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card mb-3 bodyInfo">
                    <img src="upload-anggota/<?php echo $data['gambar'] ?>" class="card-img-top infoImg" alt="..."
                        height="">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4 infoAnggota"><?php echo $data["nama_anggota"]; ?>
                        </h5>
                        <h6 class="card-title ">Jurusan</h6>
                        <p class="card-text"><?php echo $data["jurusan_anggota"]; ?></p>
                        <h6 class="card-text ">Nis</h6>
                        <p class="card-text "><?php echo $data["nis"]; ?></p>
                        <h6 class="card-text ">Alamat</h6>
                        <p class="card-text "><?php echo $data["alamat_anggota"]; ?></p>
                        <h6 class="card-text ">Jenis Kelamin</h6>
                        <p class="card-text "><?php echo $data["jk_anggota"]; ?></p>
                        <p class="card-text">Email: <b><?php echo $data["email"]; ?></b></p>
                        <a href="anggota.php" class="btn btn-primary btn-sm">Kembali</a>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>