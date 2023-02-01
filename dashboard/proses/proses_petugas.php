<?php 
    session_start();
    include 'koneksi.php';

    $nip                = htmlspecialchars($_POST['nip']);
    $nama               = htmlspecialchars($_POST['nama']);
    $jk_anggota         = htmlspecialchars($_POST['jk_anggota']);
    $jurusan_anggota    = htmlspecialchars($_POST['jurusan']);
    $no_telp_anggota    = htmlspecialchars($_POST['no_telp']);
    $alamat_anggota     = htmlspecialchars($_POST['alamat']);
    $email              = htmlspecialchars($_POST['email']);
    $username           = htmlspecialchars($_POST['username']);
    $password           = htmlspecialchars($_POST['password']);
    $password           = md5($password);

    $namaFile   = $_FILES['gambar_petugas']['name'];
    $ukuranFile = $_FILES['gambar_petugas']['size'];
    $error = $_FILES['gambar_petugas']['error'];
    $tmpName = $_FILES['gambar_petugas']['tmp_name'];
    if ($error === 4) { 
        echo "
        <script>
        alert('Silahkan Upload Gambar');
        window.location.href = '../input_petugas.php';
        </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png','gif'];
    $ekstensiGambar      = explode('.',$namaFile);
    $ekstensiGambar      = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
        echo "
        <script>
        alert('Yg anda upload bukan gambar')
        window.location.href = '../input_petugas.php';
        </script>
        ";
        return false;
    }

    if ($ukuranFile > 150) {
        echo "
        <script>
        alert('Ukuran Gambar terlalu besar');
        window.location.href = '../input_petugas.php';
        </script>
        ";
        return false;
    }
    
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    move_uploaded_file($tmpName,'../upload-petugas/' . $namaFileBaru);
// var_dump($namaFileBaru);exit; 

    $query = "INSERT INTO user (nip,nama_anggota,jk_anggota,jurusan_anggota,no_telp_anggota,alamat_anggota,email,username,password,gambar,level)
                        VALUES  ('$nip',
                                '$nama',
                                '$jk_anggota',
                                '$jurusan_anggota',
                                '$no_telp_anggota',
                                '$alamat_anggota',
                                '$email',
                                '$username',
                                '$password',
                                '$namaFileBaru',
                                'admin'
                            
                                
                                )";

    if(mysqli_query($conn,$query)){
        echo "
        <script>
        alert('Data Petugas berhasil ditambahkan');
        window.location.href = '../petugas.php'
        </script>
        ";
    }else {
        echo "
        <script>
        alert('Data Petugas gagal ditambahkan');
        window.location.href = '../input_petugas.php'
        </script>
        ";
        mysqli_error($query);
    }
?>