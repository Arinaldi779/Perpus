<?php
    session_start();    
    //koneksi database
    include 'koneksi.php';

    //variable data yang dikirimkan oleh form
    $id                 = $_POST['id'];
    $nama_anggota       = htmlspecialchars($_POST['nama']);
    $jk_anggota         = htmlspecialchars($_POST['jk_anggota']);
    $jurusan_anggota    = htmlspecialchars($_POST['jabatan']);
    $no_telp_anggota    = htmlspecialchars($_POST['no_telp']);
    $alamat_anggota     = htmlspecialchars($_POST['alamat']);
    $gambarLama         = $_POST['gambarLama'];

    // if($_FILES['gambar_petugas']['name'] !== "") { echo true; } else { echo false; }
    
    // echo $_FILES['gambar_petugas']['name'];
    
    // exit;


    if ($_FILES['gambar_petugas']['error'] === 4) {
        $namaFileBaru = $gambarLama;
    } else {
        $namaFile   = $_FILES['gambar_petugas']['name'];
        $ukuranFile = $_FILES['gambar_petugas']['size'];
        $error = $_FILES['gambar_petugas']['error'];
        $tmpName = $_FILES['gambar_petugas']['tmp_name'];

                

        if ($error === 4) { 
            echo "
            <script>
            alert('Silahkan Upload Gambar')
            window.location.href = '../aksi_petugas.php';
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
            alert('Yg anda upload bukan gambar');
            window.location.href = '../aksi_petugas.php';
            </script>
            ";
            return false;
        }

        if ($ukuranFile > 5000000) {
            echo "
            <script>
            alert('Ukuran Gambar terlalu besar');
            window.location.href = '../aksi_petugas.php';
            </script>
            ";
            return false;
        }
        
        $namaFileBaru = $nama_anggota;
        // $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        
        // $gambar = mysqli_query($conn,"SELECT * FROM user WHERE id = '$id'");
        // $gambar2 = mysqli_fetch_assoc($gambar);

        // var_dump($gambar2);exit;
        // unlink("../upload-petugas/".$gambar2['gambar']);


        
        
        move_uploaded_file($tmpName,'../upload-petugas/' . $namaFileBaru);
        
    }
        
                

    //query edit data ke dalam table (anggota)
    $query = "UPDATE    user
                SET     nama_anggota        ='$nama_anggota ',
                        jk_anggota          ='$jk_anggota',
                        jurusan_anggota     ='$jurusan_anggota',
                        no_telp_anggota     ='$no_telp_anggota',
                        alamat_anggota      ='$alamat_anggota',
                        gambar              ='$namaFileBaru'
                        WHERE id            ='$id' 
                                ";

                // var_dump($jk_anggota);exit;                                 

    if(mysqli_query($conn,$query)) {
        //pindah halaman index.php setelah eksekusi coding diatasnya
        echo "
        <script>
        alert('Data Petugas berhasil di Edit');
        window.location.href = '../petugas.php'
        </script>
        ";
    }else {
        echo "
        <script>
        alert('Data Petugas gagal di Edit');
        window.location.href = '../petugas.php'
        </script>
        ";
    }
?>