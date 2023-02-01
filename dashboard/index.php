<?php session_start(); 
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
    <title>DASHBOARD</title>
    <?php
        include 'ringkas/css.php';
    ?>
    <?php 
    // if(!empty($_GET["pesan"])) {
    //     echo "alert('{$_GET["pesan"]}')";
    //     }
        ?>
    </script>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

    <!-- Sidebar/menu -->
    <?php 
    include 'ringkas/navbar.index.php';
    ?>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" style="cursor:pointer" title="close side menu"
        id="myOverlay">
    </div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main p-3" style="margin-left:300px">
        <!-- Header -->
        <header id="portfolio">
            <?php include 'ringkas/sklh.php'; ?>
            <?php include 'ringkas/bars.php'; ?>
            <div class="w3-container">
                <div class="w3-section w3-bottombar w3-padding-16 dashboard">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="judul"><b>DASHBOARD</b></h6>
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
                                            class="userProfile">
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <?php
        include 'ringkas/menu.php'; 
        ?>

        <footer>
            <?php if($_SESSION['level']=='admin') { ?>
            <marquee scrollamount="10" class="marqueeadmin">
                <h5 class="fst-italic">Selamat Datang <b><?php echo $_SESSION['nama_anggota']; ?>~Sama </b> di Aplikasi
                    Kelompok
                    2
                    Anda Login Sebagai <b><?php echo $_SESSION["level"]; ?></b>
                </h5>
            </marquee>
            <?php } else { ?>
            <marquee scrollamount="10" class="marqueeuser">
                <h5 class="fst-italic">Selamat Datang <b><?php echo $_SESSION['nama_anggota']; ?>~Sama</b> di Aplikasi
                    Kelompok
                    2
                    Anda Login Sebagai <b><?php echo $_SESSION["level"]; ?></b>
                </h5>
            </marquee>
            <?php } ?>
        </footer>

        <?php   include 'ringkas/script.php'?>
</body>

</html>