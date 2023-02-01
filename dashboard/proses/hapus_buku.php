<?php
//koneksi php
include 'koneksi.php';

// mengambil data id yang di kirimkan oleh URL
$id     = $_GET['id'];

// menghapus data dari database
$query = "DELETE FROM buku WHERE id_buku='$id'";

//mengalihkan ke halaman tujuan ( index.php )
if(mysqli_query($conn,$query)){
    echo "
    <script>
    alert('Data Buku Berhasil di Hapus');
    window.location.href = '../buku.php'
    </script>
    ";
}else{
    echo "
    <script>
    alert('Data Buku Gagal di Hapus');
    window.location.href = '../buku.php'
    </script>
    ";
}
?>