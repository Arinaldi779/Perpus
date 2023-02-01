<?php   
include "proses/koneksi.php";
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
$id_pinjam= $_GET["id_pinjam"];

$pinjam = mysqli_query($conn,"SELECT * FROM pinjam a JOIN user b ON b.nis = a.nis JOIN buku c ON c.kode_buku = a.kode_buku WHERE a.id_pinjam = $id_pinjam");
$data = mysqli_fetch_assoc($pinjam);
$date=date_create($data["tgl_pinjam"]);
$dateTime = date_add($date,date_interval_create_from_date_string("7 days"));
// var_dump($dateTime);exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kembali Buku</title>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/googleApis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/perpustakaan.css">
    <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", sans-serif
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
            <a href="#"><img src="img/logoSMKN2BJM.jpeg" style="width:65px;"
                    class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
            <?php include 'ringkas/bars.php'; ?>
            <div class="w3-container">
                <div class="row">

                    <div class="col-md-6">
                        <h1><b>Pengembalian Buku</b></h1>
                    </div>

                    <div class=" col-md-6">
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
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Silahkan Mengisi Data dibawah</span>
                    </div>
                </div>
        </header>
        <?php include "proses/koneksi.php";?>
        <form method="post" action="proses/proses_kembali.php">
            <div class="row" style="padding= 10px">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="id_pinjam" value="<?php echo $data["id_pinjam"];?>">
                    <div class="form-group">
                        <label>
                            <strong>Nama Anggota</strong>
                        </label>
                        <input type="text" class="form-control" disabled value="<?php echo $data["nama_anggota"];?>">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Judul Buku</strong>
                        </label>
                        <input type="text" class="form-control" disabled value="<?php echo $data["judul_buku"];?>">
                    </div>


                    <!-- <div class="form-group">
                        <label>
                            <strong>Jumlah Kembali</strong>
                        </label>
                        <div><input type="number" name="jumlah" placeholder="Isi Jumlah Buku" class="form-control"
                                required>
                        </div>
                    </div> -->
                    <?php if($data["tgl_pinjam"] > $dateTime) { ?>
                    <div class="form-group">
                        <label for="telat"><b>Kenapa Kamu Telat</b></label>
                        <input type="text" name="telat" id="telat" class="form-control"
                            placeholder="Berikan Alasanmu!!">
                    </div>

                    <!-- <script>
                    alert('LU TELAT BEGO');
                    </script> -->
                    <?php } ?>

                    <br>
                    <!-- <div class="form-control">
                        <label>
                            <strong>Tanggal Kembali</strong>
                        </label>
                        <input type="date" name="tgl_kembali" placeholder="Tanggal Kembali" required>
                    </div> -->
                    <div>

                        <button class="btn btn-success btn-sm"><Input type="submit" name="simpan" value="Kembalikan"
                                class="btn btn-success btn-sm"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i></button>


                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>

        <?php   include 'ringkas/script.php'?>
</body>

</html>