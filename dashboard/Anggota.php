<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
include 'class.php';
(new Main())->redirectUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Anggota</title>
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
                        <h1><b>Anggota</b></h1>
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
                    <div class="w3-section w3-bottombar w3-padding-16">
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Menu Lainnya:</span>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                href="buku.php">Buku</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-diamond w3-margin-right"><a
                                    href="pinjam.php"></i>Peminjaman</a></button>
                        <button class="btn btn-outline-warning btn-sm  "><i class="fa fa-paw w3-margin-right"></i><a
                                href="kembali.php">Pengembalian</a></button>
                        <button class="btn btn-outline-warning btn-sm  "><i
                                class="fa fa-briefcase w3-margin-right"></i><a href="petugas.php">Petugas</a></button>
                        <!-- <button class="w3-button w3-white  w3-button w3-white "><i class="fa fa-user-plus" aria-hidden="true"></i><a
                            href="input_anggota.php">Input Angggota</a></button> -->
        </header>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">No Telp Anggota</th>
                        <th scope="col">Alamat Anggota</th>
                        <th scope="col">Gambar Anggota</th>
                        <th scope="col" class=>Aksi</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
        
        include 'proses/koneksi.php';
        $query_mysql    =   mysqli_query($conn, "SELECT * FROM user WHERE level = 'user' ");

        // if(isset($_GET['cari?level=user'])){
        //     $query_mysql =  mysqli_query($conn, "SELECT * FROM user WHERE level = 'user' AND 
        //                                         nama_anggota        LIKE '%{$_GET["cari"]}%' OR 
        //                                         nis                 LIKE '%{$_GET["cari"]}%' OR 
        //                                         jurusan_anggota     LIKE '%{$_GET["cari"]}%' OR 
        //                                         alamat_anggota      LIKE '%{$_GET["cari"]}%' OR 
        //                                         no_telp_anggota     LIKE '%{$_GET["cari"]}%'
        //     ");
        //     $cari = $_GET['cari'];
        // }

        $nomor          = 1;
        while($data = mysqli_fetch_assoc($query_mysql)) {
        ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data['nis'] ?></td>
                        <td><?php echo $data['nama_anggota'] ?></td>
                        <td><?php echo $data['jk_anggota'] ?></td>
                        <td><?php echo $data['jurusan_anggota'] ?></td>
                        <td><?php echo $data['no_telp_anggota'] ?></td>
                        <td><?php echo $data['alamat_anggota'] ?></td>
                        <td><img src="upload-anggota/<?php echo $data['gambar'] ?>" width="150px" height="150px"
                                class="userImg"></td>
                        <td>
                            <a href="aksi.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm m-1"><i
                                    class="fa fa-pencil-square-o me-1" aria-hidden="true"></i>Edit</a>
                            <a href="proses/aksi_hapus.php?id=<?php echo $data['id'];?>"
                                onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-sm m-1"><i
                                    class="fa fa-trash-o me-1" aria-hidden="true"></i>Hapus</a>
                            <a href="info_anggota.php?id=<?php echo $data['id']; ?>"
                                class="btn btn-primary btn-sm m-1"><i class="fa fa-info-circle me-1"
                                    aria-hidden="true"></i>Info</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php   include 'ringkas/script.php'?>
</body>

</html>