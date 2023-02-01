<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
// include 'class.php';
// (new Main())->redirectUser();    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Buku</title>
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
                        <h1><b>Buku</b></h1>
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

                        <nav>
                            <span class="w3-margin-right" box-shadow="1px 1px 1px">Menu Lainnya:</span>
                            <?php if($_SESSION['level']=='admin') { ?>
                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-users w3-margin-right"></i><a
                                    href="anggota.php">Anggota</a></button>
                            <button class="btn btn-outline-warning btn-sm  "><i class="fa fa-diamond w3-margin-right"><a
                                        href="pinjam.php"></i>Peminjaman</a></button>
                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-paw w3-margin-right"></i><a
                                    href="kembali.php">Pengembalian</a></button>
                            <button class="btn btn-outline-warning btn-sm"><i
                                    class="fa fa-briefcase w3-margin-right"></i><a
                                    href="petugas.php">Petugas</a></button>
                            <button class="btn btn-outline-success btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                    href="input_buku.php">Input Buku</a></button>
                            <?php } else{ ?>
                            <button class="btn btn-outline-warning btn-sm  "><i class="fa fa-diamond w3-margin-right"><a
                                        href="pinjam_buku.php"></i>Pinjam Buku</a></button>
                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-paw w3-margin-right"></i><a
                                    href="Pinjam.php">Pengembalian Buku</a></button>
                            <?php } ?>

                            <form action="buku.php?pesan='cari'" method="get" class="d-flex mt-3 mb-2 me-2"
                                autocomplete="none">
                                <input type="search" name="cari" id="" class="form-control me-2 cari"
                                    placeholder="Search Book" autocomplete="none">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>

                        </nav>
                    </div>
        </header>

        <div class="table-responsive">
            <table class="">
                <div class="container">
                    <div class="row">
                        <?php
                        include "proses/koneksi.php";
                        $query_mysql    =   mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku");
                            

                        if(isset($_GET['cari'])){
                            $query_mysql =  mysqli_query($conn, "SELECT * FROM buku WHERE
                                                        judul_buku        LIKE '%".$_GET['cari']."%' OR
                                                        kode_buku         LIKE '%".$_GET['cari']."%' OR
                                                        penulis_buku      LIKE '%".$_GET['cari']."%' OR
                                                        penerbit_buku     LIKE '%".$_GET['cari']."%' OR
                                                        tahun_penerbit    LIKE '%".$_GET['cari']."%' 
                            ");
                            $cari = $_GET['cari'];
                        }

                        $nomor          = 1;
                        while($data = mysqli_fetch_assoc($query_mysql)) {
                        ?>
                        <div class="col-md-4 mb-2">


                            <div class="card divCard" style="width: 18rem;">
                                <img src="upload-buku/<?php echo $data['gambar_buku'];?>"
                                    class="card-img-top p-2 imgBuku" alt="Book" height="250px">
                                <div class="card-body">
                                    <h5 class="card-title m-2 mb-3"><b><?php echo $data['judul_buku'];?></b></h5>
                                    <p class="blockquote-footer">Stok Sisa <b><?php echo $data["stok_buku"]; ?></b></p>
                                    <a href="info_buku.php?id=<?php echo $data['id_buku']; ?>"
                                        class="btn btn-primary btn-sm m-1"><i class="fa fa-info-circle me-1"
                                            aria-hidden="true"></i>Details</a>
                                    <?php if($_SESSION['level']=='admin') { ?>

                                    <a href="aksi_buku.php?id=<?php echo $data['id_buku']; ?>"
                                        class="btn btn-success btn-sm m-1"><i class="fa fa-pencil-square-o me-1"
                                            aria-hidden="true"></i> Edit </a>
                                    <a href="proses/hapus_buku.php?id=<?php echo $data['id_buku']; ?>"
                                        onClick="return confirm('Apakah Anda ingin menghapus  <?php echo $data['judul_buku']; ?>?')"
                                        class="btn btn-danger btn-sm m-1"><i class="fa fa-trash-o me-1"
                                            aria-hidden="true"></i>Hapus</a>

                                    <?php } else { ?>
                                    <?php } ?>
                                </div>
                            </div>


                        </div>

                        <?php } ?>
                    </div>
            </table>
        </div>

        <?php   include 'ringkas/script.php'?>
</body>

</html>