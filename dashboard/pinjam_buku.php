<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
include "proses/koneksi.php";
// $id        = $_GET["id"];
// $list_buku = mysqli_query($conn,"SELECT * FROM buku WHERE id_buku = $id");
$list_buku = mysqli_query($conn,"SELECT * FROM buku");
$list_anggota = mysqli_query($conn,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Pinjam Buku</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <?php include 'ringkas/css.php'; ?>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

    <!-- Sidebar/menu -->
    <?php 
    include 'ringkas/navbar.input.php';
    ?>
    <a href="pinjam.php" class="w3-bar-item w3-button w3-white  w3-padding"><i
            class="fa fa-table fa-fw w3-margin-right"></i>LIST
        PINJAM</a>
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
            <a href="#"><img src="img/logoSMKN2BJM.jpeg" style="width:65px;"
                    class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
            <?php include 'ringkas/bars.php'; ?>
            <div class="w3-container">
                <div class="row">

                    <div class="col-md-6">
                        <h1><b>Pinjam Buku</b></h1>
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
                        <span class="w3-margin-right" box-shadow="1px 1px 1px" style="margin-left: 20px;">Silahkan
                            Mengisi
                            Data dibawah</span>
                    </div>
                </div>
        </header>
        <form method="post" action="proses/proses_pinjam.php">
            <input type="hidden" name="id">
            <div class="row" style="padding: 10px;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <strong>Anggota</strong>
                        </label>
                        <?php if($_SESSION['level'] == 'admin') {?>
                        <select name="nis" id="" class="form-control" required>
                            <option value="">-- PILIH ANGGOTA --</option>
                            <?php while($data = mysqli_fetch_assoc($list_anggota)) { ?>
                            <option value="<?php echo $data["nis"] ?>"><?php echo $data["nama_anggota"] ?></option>
                            <?php } ?>
                        </select>
                        <?php }else { ?>
                        <input type="hidden" name="nis" value="<?php echo $_SESSION['nis'] ?>">
                        <input type="text" class="form-control" value="<?php echo $_SESSION['nama_anggota'] ?>"
                            disabled>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>
                            <strong>Buku</strong>
                        </label>
                        <select name="kode_buku" id="" class="form-control" required>
                            <option value="">-- PILIH BUKU --</option>
                            <?php while($data = mysqli_fetch_assoc($list_buku)) { ?>
                            <?php if($data["stok_buku"] > 0) { ?>

                            <option value="<?php echo $data["kode_buku"]; ?>">
                                <?php echo $data["judul_buku"] ?>
                            </option>

                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>
                            <strong>Jumlah Pinjam</strong>
                        </label>
                        <div><input type="number" name="jumlah" placeholder="Isi Jumlah Buku" class="form-control"
                                required>
                        </div>
                    </div> -->
                    <br>
                    <!-- <div class="form-control">
                        <label>
                            <strong>Tanggal Pinjam</strong>
                        </label>
                        <input type="date" name="pinjam" placeholder="Tanggal Pinjam" class="form-control" required>
                    </div> -->
                    <br>
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm"><Input type="submit" name="simpan" value="Pinjam"
                                class="btn btn-success btn-sm"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>




            <!--<table border="0">
       <tr>
         <td>ID anggota</td>
         <td>:</td>
         <td><input type="text" name="ID_anggota"  placeholder="ID"></td>
       </tr>   

        <tr>
         <td>ID Buku</td>
         <td>:</td>
         <td><input type="text" name="ID_buku"  placeholder="ID"></td>
       </tr> 

         <tr>
         <td>Jumlah Pinjam</td>
         <td>:</td>
         <td><input type="number" name="jumlah"  placeholder="jumlah"></td>
       </tr>

       <tr>
         <td>Tanggal Pinjam</td>
         <td>:</td>
         <td><input type="date" name="pinjam"  placeholder="pinjam"></td>
       </tr>

       <tr>
         <td>Tanggal kembali</td>
         <td>:</td>
         <td><input type="date" name="kembali"  placeholder="kembali"></td>
       </tr>


      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="simpan" value="simpan"></td>
       </tr>

      </table>!-->
        </form>
        <?php   include 'ringkas/script.php'?>
</body>

</html>