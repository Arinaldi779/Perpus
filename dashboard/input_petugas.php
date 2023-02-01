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
    <title>Input Petugas</title>
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
    <!-- !PAGE CONTENT! -->
    <div class="w3-main p-3" style="margin-left:300px">
        <!-- Header -->
        <header id="portfolio">
            <?php include 'ringkas/sklh.php'; ?>
            <?php include 'ringkas/bars.php'; ?>
            <div class="w3-container">
                <div class="w3-container">
                    <div class="row">

                        <div class="col-md-6">
                            <h1><b>Input Petugas</b></h1>
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
        <form action="proses/proses_petugas.php" method="POST" enctype="multipart/form-data">
            <div class="row" style="padding= 10px">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <strong>NIP</strong>
                        </label>
                        <input type="text" name="nip" placeholder="Masukkan NIP" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Nama Petugas</strong>
                        </label>
                        <input type="text" name="nama" placeholder="Nama" class="form-control">
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
                        <select name="jk_anggota" id="inputState" class="form-control">
                            <option>--Jenis Kelamin--</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputState"><strong>Jabatan Petugas</strong></label>
                        <select name="jurusan" id="inputState" class="form-control">
                            <option>--Jabatan Petugas--</option>
                            <option>Admin</option>
                            <option>Pengurus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>No Telepon Petugas</strong>
                        </label>
                        <input type="text" name="no_telp" placeholder="No Telepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Foto Petugas</strong>
                        </label>
                        <input type="file" name="gambar_petugas" placeholder="Masukkan Foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Alamat</strong>
                        </label>
                        <textarea type="text" name="alamat" class="form-control" placeholder="Isi Alamat Anda"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Email</strong>
                        </label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Username</strong>
                        </label>
                        <input name="username" placeholder="Username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Password</strong>
                        </label>
                        <input type="password" name="password" placeholder=" Masukkan Password" class="form-control"
                            required>
                    </div>
                    <div>
                        <br>
                        <label>
                        </label>
                        <div>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-success m-1">Simpan<i
                                    class="fa fa-floppy-o m-1" aria-hidden="true"></i></button>

                            <button type="reset" name="reset" value="Reset" class="btn btn-danger m-1">Reset<i
                                    class="fa fa-repeat m-1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
    </div>
    <!-- <table border="0">
     	<tr>
         <td>ID petugas</td>
         <td>:</td>
         <td><input type="text" name="ID"  placeholder="ID"></td>
       </tr>

       <tr>
         <td>nama petugas</td>
         <td>:</td>
         <td><input type="text" name="nama"  placeholder="Nama"></td>
       </tr>   

        <tr>
        <td>jabatan Petugas</td>
        <td>:</td>
       <td>
                    <select name="jabatan">
                    <option>----- Pilih Jabatan -----</option>
                    <option value="Admin">Admin</option>
                    <option value="Pengurus" >Pengurus</option>
                    </select>
                </td>
        </tr>      


       <tr>
         <td>no telp petugas</td>
         <td>:</td>
         <td><input type="text" name="no_telp"  placeholder="no_telp"></td>
       </tr>

       <tr>
         <td>Alamat petugas</td>
         <td>:</td>
         <td><textarea name="alamat" placeholder="Alamat" ></textarea></td>
       </tr>

      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="simpan" value="simpan"></td>
       </tr>

      </table>
   </form>
</td>
</tr>
<tr>
<td colspan="2" align="center"><br>SILAHKAN MENGISI ISIAN DIATAS</script></td>
</tr>
</table>!-->
    <?php   include 'ringkas/script.php'?>
</body>

</html>