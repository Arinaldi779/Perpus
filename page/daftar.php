<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Daftar Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/daftar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="img/smkn2.png" alt="" class="img" width="500px">
                <img src="img/SMKN2BJM.png" alt="" class="img2" width="500px">
                <!-- <img src="img/LogoRPL.png" alt="" class="img3" width="500px"> -->
            </div>
            <div class="col-md-2 vertical">
                <img src="img/tes.jpg" alt="">
            </div>
            <div class="col-md-5 form">
                <center>
                    <h1 class="mb-5">Register</h1>
                </center>
                <form action="berhasil_daftar.php" method="post" class="form" enctype="multipart/form-data"
                    autocomplete="off">
                    <!-- Username -->
                    <div class=" form-group">
                        <label for="" class="m-2">
                            <i class="fa fa-user m-2" aria-hidden="true"></i><b>Username</b>
                        </label>
                        <input type="text" name="username" id="" class="form-control" placeholder="Isi Username Anda">
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="m-2">
                            <i class="fa fa-envelope m-2" aria-hidden="true"></i>
                            <b>Email</b>
                        </label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Isi Email Anda">
                    </div>
                    <!-- Password -->
                    <div class="form-group position-relative">
                        <label for="password" class="m-2">
                            <i class="fa fa-lock m-2" aria-hidden="true"></i>
                            <b>Password</b>
                        </label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Isi Password Anda">
                        <div id="toggle" onclick="showHide();"></div>
                    </div>
                    <!-- Konfirmasi Password -->
                    <div class="form-group position-relative">
                        <label for="password2" class="mt-2 ms-2 me-3">
                            <i class="fa fa-unlock-alt m-2" aria-hidden="true"></i>
                            <b>Konfirmasi Password </b>
                        </label>
                        <?php include 'ringkas/salah.php' ?>
                        <input type="password" name="password2" id="passwordd" class="form-control"
                            placeholder="Konfirmasi Password Anda">
                        <div id="togglee" onclick="showHidee();"></div>
                    </div>
                    <!-- Nis -->
                    <div class="form-group">
                        <label for="nis" class="m-2">
                            <i class="fa fa-id-card m-2" aria-hidden="true"></i>
                            <b>NIS</b>
                        </label>
                        <input type="text" name="nis" id="nis" class="form-control" placeholder="Isi NIS Anda">
                    </div>
                    <!-- Nama Lengkap -->
                    <div class="form-group">
                        <label for="nama" class="m-2">
                            <i class="fa fa-user-secret m-2" aria-hidden="true"></i>
                            <b>Nama Lengkap</b>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Isi Nama Lengkap Anda">
                    </div>
                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label class="m-2"><i class="fas fa-male ms-2"></i><i class="fas fa-female m-2"></i><b>Jenis
                                Kelamin</b></label>
                        <select name="jk" class="form-control">
                            <option>-- JENIS KELAMIN --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <!-- Jurusan Anggota -->
                    <div class="form-group">
                        <label for="inputState" class="m-2"><strong><i class="fa fa-briefcase m-2"
                                    aria-hidden="true"></i>Jurusan
                                Anggota</strong></label>
                        <select name="jurusan" id="inputState" class="form-control">
                            <option>-- JURUSAN ANGGOTA --</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="MultiMedia">MultiMedia</option>
                        </select>
                    </div>
                    <!-- Alamat -->
                    <div class="form-group">
                        <label class="m-2">
                            <i class="fas fa-map-marker-alt m-2"></i></i><b>Alamat</b>
                        </label>
                        <textarea type="text" name="alamat" class="form-control" placeholder="Isi Alamat Anda"
                            required></textarea>
                    </div>
                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar_anggota" class="m-2">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i><b>Gambar Anggota</b>
                        </label>
                        <input type="file" name="gambar_anggota" id="gambar_anggota"
                            placeholder="Silahkan Masukkan Gambar Anda" class="form-control">
                    </div>
                    <!-- Telephone -->
                    <div class="form-group">
                        <label class="m-2   "><i class="fa fa-phone m-2" aria-hidden="true"></i><b>No
                                Telephone</b></label>
                        <input type="number" name="no_telp" class="form-control" placeholder="Isi Nomor Telphone Anda"
                            required autocomplete="none">
                    </div>
                    <!-- button -->
                    <button type="submit" id="login" name="submit" class="btn btn-success mt-3 mb-3">Daftar</button>
                    <p class="mb-2"> Sudah punya akun?
                        <a href="index.php" class="color p-1">Login di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <?php include 'ringkas/script.php' ; ?>
</body>

</html>