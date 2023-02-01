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
    <title>Pengembalian Buku</title>
    <?php 
    include 'ringkas/css.php';
    ?>
    <style>
    span.level {
        margin-left: 280px;
    }

    p.info {
        color: black;
    }
    </style>
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
                        <h1><b>Kembalikan Buku</b></h1>
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
                        <?php if($_SESSION['level']=='admin') { ?>
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Menu Lainnya:</span>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-users w3-margin-right"></i><a
                                href="Anggota.php">Anggota</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                href="buku.php">Buku</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-paw w3-margin-right"></i><a
                                href="kembali.php">Pengembalian</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-briefcase w3-margin-right"></i><a
                                href="petugas.php">Petugas</a></button>
                        <button class="btn btn-outline-success btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                href="pinjam_buku.php" class="pinjam">Pinjam Buku</a></button>
                        <?php }else { ?>
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Menu Lainnya:</span>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-paw w3-margin-right"></i><a
                                href="kembali.php">List Pengembalian</a></button>
                        <?php } ?>
                    </div>
        </header>
        <div class="table rensponsive">
            <table class="table table-striped">
                <thead class="bg-warning">
                    <tr>
                        <th class="mb-1" scope="col">No</th>
                        <th class="mb-1" scope="col">Anggota</th>
                        <th class="mb-1" scope="col">Judul Buku</th>
                        <th class="mb-1" scope="col">Jumlah</th>
                        <th class="mb-1" scope="col">Sisa</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <?php if($_SESSION['level']=='user'){ ?>
                        <th class="mb-1 thaksi" scope="col">Status</th>
                        <?php }else { ?>
                        <th class="mb-1 thaksi" scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
    include "proses/koneksi.php";

    if($_SESSION['level']=='user'){
        $where = " WHERE a.nis = $_SESSION[nis]";}else{$where = "";}

    $query_mysql    =   mysqli_query($conn, "SELECT * FROM pinjam a JOIN buku b ON b.kode_buku = a.kode_buku JOIN user c ON c.nis = a.nis ".$where);
    
    $nomor          = 1;
    while($data = mysqli_fetch_assoc($query_mysql)) {
    $cek = mysqli_query($conn,"SELECT SUM(jumlah) as jml FROM log_kembali WHERE id_pinjam = $data[id_pinjam]");
    $cek = mysqli_fetch_assoc($cek);

    $total_kembali = $cek["jml"] ?  $cek["jml"]  : 0;
    $sisa_buku = $data["jumlah"] - $total_kembali;
    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data["nama_anggota"];?></td>
                        <td><?php echo $data["judul_buku"];?></td>
                        <td><?php echo $data["jumlah"];?></td>
                        <td><?php echo $sisa_buku ?></td>
                        <td><?php echo $data["tgl_pinjam"];?></td>

                        <?php if($_SESSION['level']=='user'){ ?>
                        <td>
                            <?php if($total_kembali < $data["jumlah"]){ ?>
                            <a href="kembali_buku.php?id_pinjam=<?php echo $data['id_pinjam'];?>"
                                class="btn btn-success btn-sm m-1"><i class="fa fa-hand-o-left me-1"
                                    aria-hidden="true"></i>Kembalikan</a>
                            <?php } else {?>
                            <p class="badge bg-success text-wrap fst-italic info"><b>Sudah Di Kembalikan</b></p>
                            <?php } ?>
                        </td>
                        <?php } ?>
                        <?php if($_SESSION['level']=='admin') { ?>
                        <td>
                            <a class="btn btn-warning btn-sm" href="laporan.php?id=<?php echo $data['id_pinjam'] ?>"
                                target="_blank">Laporan</a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php include 'ringkas/script.php'; ?>
        <script>
        </script>
</body>

</html>