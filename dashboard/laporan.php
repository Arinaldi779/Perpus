<?php 
session_start();
require 'proses/koneksi.php';
$id         = $_GET['id'];
$query_mysql    =   mysqli_query($conn, "SELECT *, a.jumlah as jumlah FROM log_kembali a JOIN pinjam b ON b.id_pinjam = a.id_pinjam JOIN buku c ON c.kode_buku = b.kode_buku JOIN user d ON d.nis = b.nis WHERE b.id_pinjam = $id");
$data           = mysqli_fetch_assoc($query_mysql);
// var_dump($data);exit;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <?php include 'ringkas/css.php' ?>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6  m-3">
                <div class="laporanPeminjaman bg-light" id="laporanid">
                    <h2 class="text-center mt-3">E-Perpustakaan Kelompok 2</h2>
                    <hr class="garis">
                    <div class="keterangan p-2">
                        <p>Nis Peminjam <b class="ms-5 titik1">:</b> <?php echo $data["nis"]; ?></p>
                        <p>Nama Peminjam <b class="ms-5 titik2">:</b> <?php echo $data["nama_anggota"]; ?>
                        </p>
                        <p>Buku yang Dipinjam <b class="ms-5 titik3">:</b> <?php echo $data["judul_buku"]; ?></p>
                        <p>Kode Buku <b class="ms-5 titik4">:</b> <?php echo $data["kode_buku"]; ?></p>
                        <p>Tanggal Peminjaman <b class="ms-5 titik5">:</b> <?php echo $data["tgl_pinjam"]; ?></p>
                        <p>Tanggal Pengembalian <b class="ms-4 titik6">:</b> <?php echo $data["tanggal"]; ?></p>
                    </div>
                </div>

                <div class="btn-laporan m-3">
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <script type="text/javascript">
    window.print();
    </script>
</body>

</html>