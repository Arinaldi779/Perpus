<?php
//koneksi php
include 'koneksi.php';

// mengambil data id yang di kirimkan oleh URL
$id     = $_GET['id'];

// menghapus data dari database
$query = "DELETE FROM user WHERE id='$id'";

//mengalihkan ke halaman tujuan ( index.php )
if(mysqli_query($conn,$query)){
    echo "
    <script>
    alert('Data Petugas Berhasil di Hapus');
    window.location.href = '../petugas.php'
    </script>
    ";
}else{
    echo "
    <script>
    alert('Data Petugas Gagal di Hapus');
    window.location.href = '../petugas.php'
    </script>
    ";
}

?>