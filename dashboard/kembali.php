<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Kembali</title>
    <?php 
        include 'ringkas/css.php';
    ?>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

    <!-- Sidebar/menu -->
    <?php 
    include 'ringkas/navbar.php';
    ?>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" style="cursor:pointer" title="close side menu"
        id="myOverlay"></div>
    <!-- !PAGE CONTENT! -->
    <div class="w3-main p-3" style="margin-left:300px">
        <!-- Header -->
        <header id="portfolio">
            <?php include 'ringkas/sklh.php'; ?>
            <?php include 'ringkas/bars.php'; ?>
            <div class="w3-container">
                <div class="row">

                    <div class="col-md-6">
                        <h1><b>History Pengembalian</b></h1>
                    </div>

                    <div class="col-md-6">
                        <div class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <?php include 'ringkas/modal.php' ?>

                            <a href="#" class=" navbar-brand profile">
                                <?php if($_SESSION['level']=='admin') { ?>
                                <img src="upload-petugas/<?php echo $_SESSION['gambar'] ?>" alt="" width="40px"
                                    class="imgProfil">
                                <?php } else { ?>
                                <img src="upload-anggota/<?php echo $_SESSION['gambar'] ?>" alt="" width="40px"
                                    class="userProfile2">
                                <?php } ?>
                            </a>
                        </div>

                    </div>
                    <?php if($_SESSION['level']=='admin') {  ?>
                    <div class="w3-section w3-bottombar w3-padding-16">
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Menu Lainnya:</span>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-users w3-margin-right"></i><a
                                href="Anggota.php">Anggota</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                href="buku.php">Buku</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-diamond w3-margin-right"></i><a
                                href="pinjam.php">Peminjaman</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-briefcase w3-margin-right"></i><a
                                href="petugas.php">Petugas</a></button>

                        <?php }else{ ?>
                        <div class="w3-section w3-bottombar w3-padding-16">
                            <span class="w3-margin-right" box-shadow="1px 1px 1px">Menu Lainnya:</span>
                            <button class="btn btn-outline-warning btn-sm"><i
                                    class="fa fa-diamond w3-margin-right"></i><a href="pinjam.php">List
                                    Peminjaman</a></button>
                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                    href="buku.php">Daftar
                                    Buku</a></button>
                        </div>
                        <?php } ?>

        </header>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>

                        <?php if($_SESSION['level'] == 'admin') { ?>
                        <th scope="col">Status</th>
                        <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
include "proses/koneksi.php";

if($_SESSION['level']=='user'){
    $where = " WHERE b.nis = $_SESSION[nis]";}else{$where = "";}
    

$query_mysql    =   mysqli_query($conn, "SELECT *, a.jumlah as jumlah FROM log_kembali a JOIN pinjam b ON b.id_pinjam = a.id_pinjam JOIN buku c ON c.kode_buku = b.kode_buku JOIN user d ON d.nis = b.nis $where ORDER by a.id_log_kembali DESC"); 

$nomor          = 1; 
while($data = mysqli_fetch_assoc($query_mysql))  {
?>
                    <tr>
                        <!-- <td><?php echo $nomor++; ?></td> -->
                        <td><?php echo $data["nama_anggota"];?></td>
                        <td><?php echo $data["judul_buku"];?></td>
                        <td><?php echo $data["jumlah"];?></td>
                        <td><?php echo $data["tgl_pinjam"];?></td>
                        <td><?php echo $data["tanggal"];?></td>
                        <?php if($_SESSION['level'] == 'admin') { ?>
                        <?php if($data["alasan"] == 0) { ?>
                        <td>Tepat Waktu</td>
                        <?php }else { ?>
                        <td><?php echo $data["alasan"]; ?></td>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php include 'ringkas/script.php'; ?>
</body>

</html>