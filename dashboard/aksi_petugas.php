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
    <title>Aksi Petugas</title>
    <?php 
    include 'ringkas/css.php';
    ?>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

    <!-- Sidebar/menu -->
    <?php 
    include 'ringkas/navbar.input.php';
    ?>
    <a href="petugas.php" class="w3-bar-item w3-button w3-white  w3-padding"><i
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
            <span class="w3-button w3-white  w3-hide-large w3-xxlarge w3-hover-text-grey open-menu haha"><i
                    class="fa fa-bars"></i></span>
            <div class="w3-container">
                <div class="row">

                    <div class="col-md-6">
                        <h1><b>Edit Petugas</b></h1>
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
            $id= $_GET['id'];

            //query data table anggota
            $data = mysqli_query($conn, "SELECT * FROM user WHERE id ='$id'");

            //pengulangan data menggunakan while
            while($row = mysqli_fetch_assoc($data)) {

            //nama variable untuk penyesuaian kolom database
            $id_petugas         = $row["id"];
            $nip                = $row['nip'];
            $nama_petugas       = $row['nama_anggota'];
            $jk_anggota         = $row['jk_anggota'];
            $jurusan_anggota    = $row['jurusan_anggota'];
            $no_telp_anggota    = $row['no_telp_anggota'];
            $alamat_anggota     = $row['alamat_anggota'];
            $gambar             = $row['gambar'];

        ?>
            <form action="proses/edit_petugas.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row["id"];  ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $row["gambar"];  ?>">
                <div class="row" style="padding: 10px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>
                                <strong>Nip</strong>
                            </label>
                            <input type="text" name="nip" placeholder="Masukkan NIP Petugas" class="form-control"
                                value="<?php echo $row["nip"]; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label>
                                <strong>Nama Petugas</strong>
                            </label>
                            <input type="text" name="nama" placeholder="Masukkan Nama Petugas" class="form-control"
                                value="<?php echo $row['nama_anggota']; ?>" required>
                        </div>

                        <!-- <div class="form-group">
                            <label>
                                <strong>Jenis Kelamin</strong>
                            </label>
                        </div> -->

                        <!-- <div class="form-check">
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
                            <select name="jabatan" id="inputState" class="form-control" required>
                                <option>--Jabatan Petugas--</option>
                                <option value="Admin"
                                    <?php if($jurusan_anggota=='Admin'){echo 'selected=\"selected\"';} ?>>
                                    Admin</option>
                                <option value="Pengurus"
                                    <?php if($jurusan_anggota=='Pengurus'){echo 'selected=\"selected\"';} ?>>
                                    Pengurus</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>
                                <strong>Nomor Telephone</strong>
                            </label>
                            <input type="text" name="no_telp" placeholder="masukkan No HP" class="form-control"
                                value="<?php echo $row['no_telp_anggota'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>
                                <strong>Foto Petugas</strong>
                            </label><br>
                            <img src="upload-petugas/<?php echo $row['gambar'] ?>" alt="Petugas" width="150px"
                                height="150px" class="mt-2 mb-2">
                            <input type="file" name="gambar_petugas" placeholder="masukkan No HP" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>
                                <strong>Alamat</strong>
                            </label>
                            <textarea type="text" name="alamat" class="form-control" placeholder="Isi Alamat Anda"
                                value="<?php echo $row['alamat_anggota'] ?>"
                                required><?php echo $row['alamat_anggota'] ?></textarea>
                        </div>

                        <br>
                        <div class="form-group">
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-success m-1">Simpan<i
                                    class="fa fa-floppy-o m-1" aria-hidden="true"></i></button>

                            <button type="reset" name="reset" value="Reset" class="btn btn-danger m-1">Reset<i
                                    class="fa fa-repeat m-1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <!--<tr>
                <td>ID Anggota</td>
                <td> : </td>
                <td><input type="text" name="id_petugas" placeholder="masukkan ID" value="<?php echo $id_petugas; ?>"></td>
            </tr>
            <tr>
                <td>Nama petugas</td>
                <td> : </td>
                <td><input type="text" name="nama" placeholder="masukkan nama" value="<?php echo $row['nama_petugas']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td> : </td>
                <td><input type="text" name="jk_petugas" placeholder="masukkan Jenkel" value="<?php echo $row['jk_petugas']; ?>"></td>
            </tr>
            
            <tr>
                <td>Jabatan</td>
                <td> : </td>
                <td>
                    <select name="jabatan">
                    <option>----- Pilih Jabatan -----</option>
                    <option value="Admin">Admin</option>
                    <option value="Pengurus">Pengurus</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor Telephone</td>
                <td> : </td>
                <td><input type="text" name="no_telp" placeholder="masukkan No HP" value="<?php echo $no_telp_petugas; ?>"></td>
            </tr>
            <tr>
                <td>Alamat Anggota</td>
                <td> : </td>
                <td><textarea name="alamat"><?php echo $alamat_petugas; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="simpan" value="SIMPAN"></td>
            </tr>!-->
            </form>
            <?php } ?>
        </table>

        <?php   include 'ringkas/script.php'?>
</body>

</html>