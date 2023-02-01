<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
include 'proses/koneksi.php';
$query  =   mysqli_query($conn, "SELECT * FROM user WHERE level = 'admin' ");
// var_dump($query);exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Kontak</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg bg-info">
    <h1 class="text-center">Jika Ada yg ingin ditanyakan silahkan hubungi Kontak dibawah ini</h1>
    <a class="btn btn-warning btn-sm mb-5" href="index.php">Kembali</a>
    <?php while($data = mysqli_fetch_assoc($query)) { ?>
    <?php //var_dump($data);exit; ?>
    <h3 class="text-center"><?php echo $data["nama_anggota"]; ?></h3>
    <h4 class="mb-3 text-center"><?php echo $data["no_telp_anggota"]; ?></h4>
    <?php } ?>


</body>

</html>