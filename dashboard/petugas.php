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
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petugas</title>
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
                        <h1><b>Petugas</b></h1>
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
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-users w3-margin-right"></i><a
                                href="Anggota.php">Anggota</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                href="buku.php">Buku</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-diamond w3-margin-right"></i><a
                                href="pinjam.php">Peminjaman</a></button>
                        <button class="btn btn-outline-warning btn-sm"><i class="fa fa-paw w3-margin-right"></i><a
                                href="kembali.php">Pengembalian</a></button>
                        <button class="btn btn-outline-success btn-sm"><i class="fa fa-book w3-margin-right"></i><a
                                blank href="input_petugas.php">Input Petugas</a></button><br>



                        </nav>
                    </div>
        </header>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Jabatan Petugas</th>
                        <th scope="col">No Telp Petugas</th>
                        <th scope="col">Alamat Petugas</th>
                        <th scope="col">Foto Petugas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        
        include 'proses/koneksi.php';
        $query_mysql    =   mysqli_query($conn, "SELECT * FROM user WHERE level = 'admin'");

        
        // if(isset($_GET['cari?level=admin'])){
        //     $query_mysql =  mysqli_query($conn, "SELECT * FROM user WHERE level='admin' AND 
        //                                     nama_anggota LIKE '%{$_GET["cari"]}%' OR 
        //                                     nip LIKE '%{$_GET["cari"]}%' OR 
        //                                     jurusan_anggota LIKE '%{$_GET["cari"]}%' OR 
        //                                     alamat_anggota LIKE '%{$_GET["cari"]}%' OR 
        //                                     no_telp_anggota LIKE '%{$_GET["cari"]}%'");
        //                                     $cari = $_GET['cari'];
        // }

        $nomor          = 1;
        while($data = mysqli_fetch_assoc($query_mysql)) {
        ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data['nip'] ?></td>
                        <td><?php echo $data['nama_anggota'] ?></td>
                        <td><?php echo $data['jk_anggota'] ?></td>
                        <td><?php echo $data['jurusan_anggota'] ?></td>
                        <td><?php echo $data['no_telp_anggota'] ?></td>
                        <td><?php echo $data['alamat_anggota'] ?></td>
                        <td><img src="upload-petugas/<?php echo $data['gambar'] ?>" alt="Petugas" class="petugasImg">
                        </td>
                        <td>
                            <a href="aksi_petugas.php?id=<?php echo $data['id']; ?>"
                                class="btn btn-success btn-sm m-1"><i class="fa fa-pencil-square-o m-1"
                                    aria-hidden="true"></i>Edit
                            </a>
                            <a href="proses/hapus_petugas.php?id=<?php echo $data['id'];?>"
                                onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-sm m-1"><i
                                    class="fa fa-trash-o m-1" aria-hidden="true"></i>Hapus</a>
                            <a href="info_petugas.php?id=<?php echo $data['id']; ?>"
                                class="btn btn-primary btn-sm m-1"><i class="fa fa-info-circle me-1"
                                    aria-hidden="true"></i>Info</a>
                        </td>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>

            </table>
        </div>
        <?php   include 'ringkas/script.php'?>
</body>

</html>