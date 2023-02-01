<?php 
    //koneksi database
    include 'koneksi.php';

    //variable data yang dikirimkan oleh form
    $id_anggota         = $_POST['id'];
    $nama_anggota       = htmlspecialchars($_POST['nama_anggota']);
    $jk_anggota         = htmlspecialchars($_POST['jk_anggota']);
    $jurusan_anggota    = htmlspecialchars($_POST['jurusan_anggota']);
    $no_telp_anggota    = htmlspecialchars($_POST['no_telp_anggota']);
    $alamat_anggota     = htmlspecialchars($_POST['alamat_anggota']);
    $gambarLama         = htmlspecialchars($_POST['gambarLama']);



    if ($_FILES['gambar_anggota']['error'] === 4) {
        $namaFileBaru = $gambarLama;
    } else {
        $namaFile   = $_FILES['gambar_anggota']['name'];
        $ukuranFile = $_FILES['gambar_anggota']['size'];
        $error = $_FILES['gambar_anggota']['error'];
        $tmpName = $_FILES['gambar_anggota']['tmp_name'];
        if ($error === 4) { 
            echo "
            <script>
            alert('Silahkan Upload Gambar')
            window.location.href = '../aksi.php';
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
            window.location.href = '../aksi.php';
            </script>
            ";
            return false;
        }

        if ($ukuranFile > 3000000) {
            echo "
            <script>
            alert('Ukuran Gambar terlalu besar')
            window.location.href = '../aksi.php';
            </script>
            ";
            return false;
        }
        
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        
        move_uploaded_file($tmpName,'../upload-anggota/' . $namaFileBaru);
    }
        
    

        

        


    //query edit data ke dalam table (anggota)
    $query = "UPDATE user 
                            SET nama_anggota    ='$nama_anggota',
                                jk_anggota      ='$jk_anggota',
                                jurusan_anggota ='$jurusan_anggota',
                                no_telp_anggota ='$no_telp_anggota',
                                alamat_anggota  ='$alamat_anggota',
                                gambar          ='$namaFileBaru'
                                WHERE id        ='$id_anggota' 
                                ";
                                
    if(mysqli_query($conn,$query)) {
    //pindah halaman index.php setelah eksekusi coding diatasnya
    echo "
        <script>
        alert('Data Anggota Berhasil di Edit');
        window.location.href = '../Anggota.php'
        </script>
        ";
}else {
    echo "
        <script>
        alert('Data Anggota Gagal di Edit');
        window.location.href = '../Anggota.php'
        </script>
        ";
}
?>