<?php
//koneksi php
include 'koneksi.php';

// mengambil data id yang di kirimkan oleh URL
$id     = $_GET['id'];

// menghapus data dari database
$query = "DELETE FROM kembali WHERE id_kembali='$id'";
 
//mengalihkan ke halaman tujuan ( index.php )
if(mysqli_query($conn,$query)){
    echo "
    <script>
    alert('Data Berhasil di Hapus');
    window.location.href = '../kembali.php'
    </script>
    ";
}else{
    echo "
    <script>
    alert('Data Gagal di Hapus');
    window.location.href = '../kembali.php'
    </script>
    ";
}

?>