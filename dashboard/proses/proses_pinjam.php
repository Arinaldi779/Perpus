<?php 
    session_start();
    include 'koneksi.php';
    
    $nis                = htmlspecialchars($_POST['nis']);
    $kode_buku          = htmlspecialchars($_POST['kode_buku']);
    // $jumlah             = htmlspecialchars($_POST['jumlah']);
    $tgl_pinjam         = date('Y-m-d');

    

    $query_buku = mysqli_query($conn,"SELECT * FROM buku WHERE kode_buku = '$kode_buku'");
    $cek_buku = mysqli_fetch_assoc($query_buku);
    // var_dump($cek_buku);exit;
    $stok_buku = $cek_buku['stok_buku'];
    // if($jumlah > $stok_buku) {
    //     echo "
    //     <script>alert('jumlah buku yg anda pinjam melebihi stok buku yg ada');
    //     window.location.href = '../pinjam_buku.php'</script>
    //     ";
    // }else {

$pinjam =   mysqli_query($conn,"INSERT INTO pinjam
        VALUES ('',
                '$nis',
                '$kode_buku',
                '1',
                '$tgl_pinjam'
                )");

                $_SESSION['pinjam'] = $tgl_pinjam;

mysqli_query($conn, "UPDATE  buku SET stok_buku=stok_buku-1 WHERE kode_buku = $kode_buku");

// exit;
echo "
<script>
alert('Buku Berhasil di Pinjam');
window.location.href = '../pinjam.php';
</script>
"; 
    // }


?>