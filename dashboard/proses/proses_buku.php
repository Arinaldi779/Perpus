<?php 
include 'koneksi.php';

$namaBuku       = mysqli_query($conn,"SELECT * FROM buku");
$namaBukuBaru   = mysqli_fetch_assoc($namaBuku);
// var_dump($namaBuku);exit;

$kode_buku          = htmlspecialchars($_POST['kode']);
$judul_buku         = htmlspecialchars($_POST['judul']);
$penulis_buku       = htmlspecialchars($_POST['penulis']);
$penerbit_buku      = htmlspecialchars($_POST['penerbit']);
$tahun_penerbit     = htmlspecialchars($_POST['tahun']);
$stok_buku          = htmlspecialchars($_POST['stok']);
$sinopsis           = htmlspecialchars($_POST['sinopsis']);

// var_dump($sinopsis);exit;

$namaFile   = $_FILES['gambar_buku']['name'];
$ukuranFile = $_FILES['gambar_buku']['size'];
$error = $_FILES['gambar_buku']['error'];
        $tmpName = $_FILES['gambar_buku']['tmp_name'];
        if ($error === 4) { 
                echo "
                <script>
                alert('Silahkan Upload Gambar');
                window.location.href = '../input_buku.php';
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
        window.location.href = '../input_buku.php';
        </script>
        ";
        return false;
        }

        if ($ukuranFile > 3000000) {
        echo "
        <script>
        alert('Ukuran Gambar terlalu besar');
        window.location.href = '../input_buku.php';
        </script>
        ";
        return false;
        }

        $namaFileBaru = $judul_buku;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName,'../upload-buku/' . $namaFileBaru);

$query = "INSERT INTO buku
                        VALUES ('',
                                '$kode_buku',
                                '$judul_buku',
                                '$penulis_buku',
                                '$penerbit_buku',
                                '$tahun_penerbit',
                                '$namaFileBaru',
                                '$stok_buku',
                                '$sinopsis'
                                )";
        if(mysqli_query($conn,$query)){
                echo "
                <script>
                alert('Data Buku Berhasil di Tambahkan');
                window.location.href = '../buku.php'
                </script>
                ";
        }else{
                echo "
                <script>
                alert('Data Buku Gagal di Tambahkan');
                window.location.href = '../buku.php'
                </script>
                ";
        }



?>