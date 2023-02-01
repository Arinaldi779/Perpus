<?php 
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?alert=belum_login");
}
require 'proses/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn ,"SELECT * FROM user WHERE id = $id");
$data  = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!------ Include the above in your HEAD tag ---------->
    <style>
    .profile-profile {
        border-radius: 10px;
    }
    </style>

</head>

<body>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img hihi">
                        <?php if($_SESSION['level']=='admin') { ?>
                        <img src="upload-petugas/<?php echo $data["gambar"] ?>" alt="Petugas" class="imgProfile">
                        <?php } else { ?>
                        <img src="upload-anggota/<?php echo $data["gambar"] ?>" alt="Anggota" class="imgProfile">
                        <?php } ?>
                    </div>
                </div>
                <div class=" col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $data["nama_anggota"]; ?>
                        </h5>
                        <h6>
                            <?php echo $data["level"]; ?>
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <?php if($_SESSION['level']=='admin') { ?>
                    <a href="aksi_petugas.php?id=<?php echo $data['id'] ?>"
                        class="btn btn-success btn-sm btn-sm ms-5 hahaha profile-profile">Edit
                        Profile<i class="far fa-edit mb-1 ms-1 ml-1"></i></a>
                    <?php }else { ?>
                    <a href="aksi.php?id=<?php echo $_SESSION['id'] ?>"
                        class="btn btn-success btn-sm btn-sm ms-5 profile-profile">Edit
                        Profile<i class="far fa-edit mb-1 ms-1 ml-1"></i></a>
                    <?php } ?>
                    <a href=" index.php" class="btn btn-info btn-sm mt-2 profile-profile"><i
                            class="fa fa-arrow-left mr-1"></i>Kembali
                        ke dashboard</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <!-- <?php if($_SESSION['level']=='admin') { ?>
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br />
                        <a href="">Bootsnipp Profile</a><br />
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br />
                        <a href="">Web Developer</a><br />
                        <a href="">WordPress</a><br />
                        <a href="">WooCommerce</a><br />
                        <a href="">PHP, .Net</a><br />
                        <?php } else { ?>
                        <?php } ?> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['username']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <?php if($_SESSION['level']=='admin') { ?>
                                        NIP
                                        <?php } else { ?>
                                        NIS
                                        <?php } ?>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php if($_SESSION['level']=='admin') { ?>
                                        <?php echo $_SESSION['nip']; ?>
                                        <?php } else { ?>
                                        <?php echo $_SESSION['nis']; ?>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Lengkap</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['nama_anggota']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jenis Kelamin</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['jk_anggota']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>No Telephone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['no_telp_anggota']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        <?php if($_SESSION['level']=='admin') { ?>
                                        Jabatan Petugas
                                        <?php } else { ?>
                                        Jurusan Anggota
                                        <?php } ?>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['jurusan_anggota']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['email']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['alamat_anggota']; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>