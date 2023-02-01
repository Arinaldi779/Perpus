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
    <title>Input Buku</title>
    <?php 
    include 'ringkas/css.php';
    ?>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

    <!-- Sidebar/menu -->
    <?php 
    include 'ringkas/navbar.input.php';
    ?>
    <a href="buku.php" class="w3-bar-item w3-button w3-white  w3-padding"><i
            class="fa fa-arrow-left fa-fw w3-margin-right"></i>KEMBALI</a>
    <a href="#about" class="w3-bar-item w3-button w3-white  w3-padding"><i
            class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a>
    <a href="kontak.php" class="w3-bar-item w3-button w3-white  w3-padding"><i
            class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
    <a href="index.php" class="w3-bar-item w3-button w3-white  w3-padding"><i
            class="fa fa-home fa-fw w3-margin-right"></i>HOME</a>
    </div>
    <div class="w3-panel w3-large text-center ">
        <i class="fa fa-whatsapp w3-hover-opacity mx-1"></i>
        <i class="fa fa-facebook-official w3-hover-opacity mx-1"></i>
        <i class="fa fa-instagram w3-hover-opacity mx-1"></i>
        <i class="fa fa-twitter w3-hover-opacity mx-1"></i>
    </div>
    </nav>
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
                        <h1><b>Input Buku</b></h1>
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
                    <div class="w3-container">
                        <div class="w3-section w3-bottombar w3-padding-16">
                            <span class="w3-margin-right" box-shadow="1px 1px 1px">Silahkan Mengisi Data dibawah</span>
                        </div>
        </header>
        <form method="post" action="proses/proses_buku.php" enctype="multipart/form-data">
            <div class="row" style="padding:10px">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <strong>Kode Buku</strong>
                        </label>
                        <input type="text" name="kode" placeholder="Kode Buku" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Judul Buku</strong>
                        </label>
                        <input type="text" name="judul" placeholder="Judul Buku" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Penulis Buku</strong>
                        </label>
                        <input type="text" name="penulis" placeholder="Penulis Buku" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Penerbit Buku</strong>
                        </label>
                        <input type="text" name="penerbit" placeholder="Penerbit Buku" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Tahun Terbit</strong>
                        </label>
                        <input type="text" name="tahun" placeholder="Tahun Terbit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Stok Buku</strong>
                        </label>
                    </div>
                    <input name="stok" placeholder="Stok Buku" class="form-control">

                    <div class="form-group">
                        <label for="gambar_buku">
                            <b>Gambar Buku</b>
                        </label>
                        <input type="file" name="gambar_buku" id="gambar_buku" class="form-control">
                    </div>

                    <div class="form-group">
                        <label><b>Sinopsis Buku</b></label>
                        <textarea name="sinopsis" class="form-control" placeholder="Sinopsis"></textarea>
                    </div>

                    <label>
                    </label>
                    <div>


                        <div>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-success m-1">Simpan<i
                                    class="fa fa-floppy-o m-1" aria-hidden="true"></i></button>

                            <button type="reset" name="reset" value="Reset" class="btn btn-danger m-1">Reset<i
                                    class="fa fa-repeat m-1" aria-hidden="true"></i></button>
                        </div>

                    </div>

                </div>
            </div>
        </form>
        </table>
        <?php   include 'ringkas/script.php'?>
</body>

</html>