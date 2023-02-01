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
    <title>Anggota</title>
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
            <?php include 'ringkas/sklh.php'; ?>
            <?php include 'ringkas/bars.php'; ?>
            <div class="w3-container">
                <h1><b>Input Anggota</b></h1>
                <div class="w3-section w3-bottombar w3-padding-16">
                    <span class="w3-margin-right" box-shadow="1px 1px 1px">Silahkan Mengisi Data dibawah</span>
                </div>
        </header>
        <form action="proses/proses.php" method="POST" class="wibu">
            <div class="row" style="padding:10px">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <strong>NIS</strong>
                        </label>
                        <input type="text" name="nis" placeholder="Masukkan NIS Anggota" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>Nama Anggota</strong>
                        </label>
                        <input type="text" name="nama" placeholder="Nama" class="form-control">
                        <div>
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
                        </div>
                        <div class="form-group">
                            <label for="inputState"><strong>Jurusan Anggota</strong></label>
                            <select name="jurusan" id="inputState" class="form-control">
                                <option>Jurusan</option>
                                <option value="RPL">Rekayasa Perangkat Lunak</option>
                                <option value="TKJ">Teknik Komputer dan Jaringan</option>
                                <option value="MM">MultiMedia</option>
                            </select>
                        </div>
                        <!-- <div class="form_group">
                            <label>
                                <strong>Username</strong>
                            </label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                        </div>
                        <div class="form_group">
                            <label>
                                <strong>Password</strong>
                            </label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        </div> -->
                        <div class="form-group">
                            <label>
                                <strong>No Telepon Anggota</strong>
                            </label>
                            <input type="text" name="no_telp" placeholder="No Telepon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>
                                <strong>Alamat</strong>
                            </label>
                            <input name="alamat" placeholder="Alamat" class="form-control">
                        </div>
                        <br>
                        <label>
                        </label>
                        <button class="btn btn-success btn-sm"><Input type="submit" name="simpan" value="Simpan"
                                class="btn btn-success btn-sm"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i></button>
                    </div>
                </div>

            </div>
    </div>
    </form>

    <!--<table>
                <thead>
<td width="500">
    <form action="proses.php" method="POST">
    <div></div>
     <table border="0">
     	<tr>
         <td>ID anggota</td>
         <td><input type="text" name="ID"  placeholder="ID"></td>
       </tr>

       <tr>
         <td>nama anggota</td>
         <td><input type="text" name="nama"  placeholder="Nama"></td>
       </tr>   

        <tr>
          <td>Jenis Kelamin</td>
          <td>
            <input type="radio" name="jk_anggota" value="Laki-Laki">Laki-Laki
            <input type="radio" name="jk_anggota" value="Perempuan">Perempuan
          </td>
         </tr>

         <tr>
         <td>jurusan anggota</td>
         <td><input type="text" name="jurusan"  placeholder="jurusan"></td>
       </tr>

       <tr>
         <td>no telp anggota</td>
         <td><input type="text" name="no_telp"  placeholder="no_telp"></td>
       </tr>

       <tr>
         <td>Alamat</td>
         <td><textarea name="alamat" placeholder="Alamat" ></textarea></td>
       </tr>

      <tr>
        <td><input type="submit" name="simpan" value="simpan"></td>
       </tr>
       </thead>

      </table>
    </center>
   </form>
</td>
</tr>
</table>!-->

    <?php   include 'ringkas/script.php'?>
</body>

</html>