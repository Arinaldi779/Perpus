<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
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
    <title>Edit Buku</title>
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
                        <h1><b>Edit Buku</b></h1>
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
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Silahkan Mengisi Data Baru</span>
                    </div>
        </header>
        <table>
            <?php
            //koneksi database
            include 'proses/koneksi.php';

            //mengambil url variabel id
            $id_buku= $_GET['id'];

            //query data table anggota
            $data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");

            //pengulangan data menggunakan while
            while($row = mysqli_fetch_assoc($data)) {

            //nama variable untuk penyesuaian kolom database
            $id_buku           = $row['id_buku'];
            $kode_buku         = $row['kode_buku'];
            $judul_buku        = $row['judul_buku'];
            $penulis_buku      = $row['penulis_buku'];
            $penerbit_buku     = $row['penerbit_buku'];
            $tahun_penerbit    = $row['tahun_penerbit'];
            $gambar_buku       = $row['gambar_buku'];
            $stok_buku         = $row['stok_buku'];


        ?>
            <form action="proses/edit_buku.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row["id_buku"]; ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $row["gambar_buku"]; ?>">

                <?php 
                // var_dump($gambar_buku);exit;
                ?>
                <div class="row" style="padding: 10px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>
                                <b>Kode Buku</b>
                            </label>
                            <input type="text" name="kode_buku" placeholder="Masukkan Kode Buku" class="form-control"
                                value="<?php echo $row['kode_buku']; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label>
                                <b>Judul Buku</b>
                            </label>
                            <input type="text" name="judul_buku" placeholder="Masukkan Judul Buku" class="form-control"
                                value="<?php echo $row['judul_buku']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>
                                <b>Penulis Buku</b>
                            </label>
                            <input type="text" name="penulis_buku" placeholder="Masukkan Nama Penulis"
                                class="form-control" value="<?php echo $row['penulis_buku'];?>" required>
                        </div>

                        <div class="form-group">
                            <label>
                                <b>Penerbit Buku</b>
                            </label>
                            <input type="text" name="penerbit_buku" plalceholder="Masukkan Nama Penerbit"
                                class="form-control" value="<?php echo $row['penerbit_buku']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>
                                <b>Tahun Terbit<b>
                            </label>
                            <input type="text" name="tahun_penerbit" placeholder="Masukkan Tahun Terbit"
                                class="form-control" value="<?php echo $row['tahun_penerbit']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label><b>Gambar Buku</b></label><br>
                            <img src="upload-buku/<?php echo $row['gambar_buku'];?>" alt="Buku" width="150px"
                                class="mt-1 mb-2">
                            <input type="file" name="gambar_buku" placeholder="Masukkan Tahun Terbit"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label><b>Stok Buku</b></label>
                            <input type="number" name="stok_buku" placeholder="Masukkan Stok Buku" class="form-control"
                                value="<?php echo $row['stok_buku'];?>" required>
                        </div>

                        <div class="form-group">
                            <label>Sinopsis</label>
                            <textarea name="detail" id=""
                                class="form-control"><?php echo $row["sinopsis"]; ?></textarea>
                        </div><br>

                        <div>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-success m-1">Simpan<i
                                    class="fa fa-floppy-o m-1" aria-hidden="true"></i></button>

                            <button type="reset" name="reset" value="Reset" class="btn btn-danger m-1">Reset<i
                                    class="fa fa-repeat m-1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div clas="col-md-3"></div>
                </div>
                <!-- <tr>
                <td>ID Buku</td>
                <td> : </td>
                <td><input type="text" name="id_buku" placeholder="masukkan ID"readonly value="<?php echo $id_buku; ?>"></td>
            </tr>
            <tr>
                <td>Kode Buku</td>
                <td> : </td>
                <td><input type="text" name="kode_buku" placeholder="masukkan kode" value="<?php echo $row['kode_buku']; ?>"></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td> : </td>
                <td>
                    <input type="text" name="judul_buku" placeholder="masukkan judul" value="<?php echo $row['judul_buku']; ?>">
                </td>
            </tr>
            <tr>
                <td>Penulis Buku</td>
                <td> : </td>
                <td><input type="text" name="penulis_buku" placeholder="masukkan nama penulis" value="<?php echo $row['penulis_buku']; ?>">
                    
                </td>
            </tr>
            <tr>
                <td>Penerbit Buku</td>
                <td> : </td>
                <td><input type="text" name="penerbit_buku" placeholder="masukkan penerbit buku" value="<?php echo $penerbit_buku; ?>"></td>
            </tr>
            <tr>
                <td>Tahun Penerbit</td>
                <td> : </td>
                <td><input type="text" name="tahun_penerbit" placeholder="masukkan tahun penerbit" value="<?php echo $tahun_penerbit; ?>"></td>
            </tr>
            <tr>
                <td>Stok Buku</td>
                <td> : </td>
                <td><input type="text" name="stok_buku" placeholder="masukkan stok buku" value="<?php echo $stok_buku; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="simpan" value="SIMPAN"></td>
            </tr>!-->
            </form>
            <?php } ?>
        </table>
        <?php   include 'ringkas/script.php'?><?php   include 'ringkas/script.php'?>
</body>

</html>