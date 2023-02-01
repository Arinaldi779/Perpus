<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
// include 'class.php';
// (new Main())->redirectUser();
// ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    include 'ringkas/navbar.input.php';
    ?>
    <a href="anggota.php" class="w3-bar-item w3-button w3-white  w3-padding"><i
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
                        <h1><b>Edit Anggota</b></h1>
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
                        <span class="w3-margin-right" box-shadow="1px 1px 1px">Silahkan Mengisi Data dibawah</span>
                    </div>
        </header>


        <table>
            <?php
            //koneksi database
            include 'proses/koneksi.php';

            //mengambil url variabel id 
            $id = $_GET['id'];

            //query data table anggota
            $data = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

            //pengulangan data menggunakan while
            while($row = mysqli_fetch_assoc($data)) {

            //nama variable untuk penyesuaian kolom database
            $id                 = $row["id"];
            $nis                = $row['nis'];
            $nama_anggota       = $row['nama_anggota'];
            $jk_anggota         = $row['jk_anggota'];
            $jurusan_anggota    = $row['jurusan_anggota'];
            $no_telp_anggota    = $row['no_telp_anggota'];
            $alamat_anggota     = $row['alamat_anggota'];
            $gambar             = $row['gambar'];

            

        ?>
            <form action="proses/aksi_edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row["id"];  ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $row["gambar"];  ?>">
                <div class="row" style="padding:10px">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div>
                            <div class="form-group">
                                <label>
                                    <strong>NIS</strong>
                                </label>
                                <input type="text" name="nis" placeholder="masukkan ID" class="form-control"
                                    value="<?php echo $row["nis"]; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>
                                    <strong>Nama Anggota</strong>
                                </label>
                                <input type="text" name="nama_anggota" placeholder="masukkan nama" class="form-control"
                                    value="<?php echo $row['nama_anggota']; ?>" required>
                            </div>

                            <!-- <div>
                                <label>
                                    <strong>Jenis Kelamin</strong>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultCheck1" type="radio"
                                    name="jk_anggota" value="Laki-Laki">
                                <label class="form-check-label" for="defaultCheck1">
                                    Laki Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultCheck1" type="radio"
                                    name="jk_anggota" value="Perempuan">
                                <label class="form-check-label" for="defaultCheck1">
                                    Perempuan
                                </label>
                            </div> -->

                            <div class="form-group">
                                <label for="inputState"><strong>Jenis Kelamin</strong></label>
                                <select name="jk_anggota" id="inputState" class="form-control" required>
                                    <option>--Jenis Kelamin--</option>
                                    <option value="Laki-Laki"
                                        <?php if($jk_anggota=='Laki-Laki'){echo 'selected=\"selected\"';} ?>>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        <?php if($jk_anggota=='Perempuan'){echo 'selected=\"selected\"';} ?>>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputState"><strong>Jurusan Anggota</strong></label>
                                <select name="jurusan_anggota" id="inputState" class="form-control" required>
                                    <option>Jurusan</option>
                                    <option value="RPL"
                                        <?php if($jurusan_anggota=='RPL'){echo 'selected=\"selected\"';} ?>>
                                        Rekayasa Perangkat Lunak</option>
                                    <option value="TKJ"
                                        <?php if($jurusan_anggota=='TKJ'){echo 'selected=\"selected\"';} ?>>
                                        Teknik Komputer dan Jaringan</option>
                                    <option value="MM"
                                        <?php if($jurusan_anggota=='MM'){echo 'selected=\"selected\"';} ?>>
                                        MultiMedia</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>
                                    <strong>No Telepon Anggota</strong>
                                </label>
                            </div>
                            <input type="text" name="no_telp_anggota" placeholder="masukkan No HP" class="form-control"
                                value="<?php echo $no_telp_anggota; ?>" required>
                            <div class="form-group">
                                <label>
                                    <strong>Alamat</strong>
                                </label>
                                <textarea type="text" name="alamat_anggota" class="form-control"
                                    placeholder="Isi Alamat Anda" required><?php echo $alamat_anggota; ?></textarea>
                            </div>

                            <label>
                                <strong>Gambar Anggota</strong>
                            </label><br>
                            <img src="upload-anggota/<?php echo $gambar ?>" alt="Anggota" width="150px"
                                class="mt-1 mb-2">
                            <Input type="file" name="gambar_anggota" class="form-control">
                        </div>

                        <div>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-success m-1 mt-3">Simpan<i
                                    class="fa fa-floppy-o m-1" aria-hidden="true"></i></button>

                            <button type="reset" name="reset" value="Reset" class="btn btn-danger m-1 mt-3">Reset<i
                                    class="fa fa-repeat m-1" aria-hidden="true"></i></button>
                        </div>
                        <div clas="col-md-3"></div>
                    </div>

            </form>
            <?php } ?>
        </table>
        <?php   include 'ringkas/script.php'?>
</body>

</html>