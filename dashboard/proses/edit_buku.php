<?php 
    //koneksi database
    include 'koneksi.php';

    //variable data yang dikirimkan oleh form
    $id_buku            = $_POST['id'];
    $judul_buku         = htmlspecialchars($_POST['judul_buku']);
    $penulis_buku       = htmlspecialchars($_POST['penulis_buku']);
    $penerbit_buku      = htmlspecialchars($_POST['penerbit_buku']);
    $tahun_penerbit     = htmlspecialchars($_POST['tahun_penerbit']);
    $stok_buku          = htmlspecialchars($_POST['stok_buku']);
    $sinopsis           = htmlspecialchars($_POST['detail']);
    $gambarLama         = $_POST['gambarLama'];


    if ($_FILES['gambar_buku']['error'] === 4) {
        $namaFileBaru = $gambarLama;
    } else {
        $namaFile   = $_FILES['gambar_buku']['name'];
        $ukuranFile = $_FILES['gambar_buku']['size'];
        $error = $_FILES['gambar_buku']['error'];
        $tmpName = $_FILES['gambar_buku']['tmp_name'];
        if ($error === 4) { 
            echo "
            <script>
            alert('Silahkan Upload Gambar');
            window.location.href = '../aksi_buku.php';
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
            window.location.href = '../aksi_buku.php';
            </script>
            ";
            return false;
        }

        if ($ukuranFile > 3000000) {
            echo "
            <script>
            alert('Ukuran Gambar terlalu besar')
            window.location.href = '../aksi_buku.php';
            </script>
            ";
            return false;
        }
        
        $namaFileBaru = $judul_buku;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        
        move_uploaded_file($tmpName,'../upload-buku/' . $namaFileBaru);
    }
    // var_dump($gambarLama);exit;


    //query edit data ke dalam table (anggota)
    $query = "UPDATE buku
                        SET     judul_buku          ='$judul_buku',
                                penulis_buku        ='$penulis_buku',
                                penerbit_buku       ='$penerbit_buku',
                                tahun_penerbit      ='$tahun_penerbit',
                                gambar_buku         ='$namaFileBaru',
                                stok_buku           ='$stok_buku',
                                sinopsis            ='$sinopsis'
                                WHERE id_buku       = '$id_buku' 
                                ";

    //pindah halaman index.php setelah eksekusi coding diatasnya
    if(mysqli_query($conn,$query)){
        echo "
        <script>
        alert('Data Buku berhasil di edit');
        window.location.href = '../buku.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Data Buku Berhasil di Edit');
        window.location.href = '../buku.php'
        </script>
        ";
    }