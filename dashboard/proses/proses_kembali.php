<?php 
   session_start();
   include 'koneksi.php';

   $date=date_create($_SESSION['pinjam']);
   $dateTime = date_add($date,date_interval_create_from_date_string("7 days"));

   // if ($_POST['simpan'] > 0) {
   //    if ($_SESSION['level']=='admin') {
   //       echo "
   //       <script>
   //       onclick('Apakah Buku sudah dikembalikan?');
   //       </script>
   //       ";
   //    }
   // }
if($_SESSION['pinjam'] > $dateTime) {
   $id_pinjam = $_POST['id_pinjam'];
// $jumlah = $_POST['jumlah'];
$tgl_kembali = date('Y-m-d');
$alasan      = htmlspecialchars($_POST['telat']);

$cek_kembali = mysqli_query($conn,"SELECT SUM(jumlah) as jml FROM log_kembali WHERE id_pinjam = $id_pinjam");
$cek_kembali = mysqli_fetch_assoc($cek_kembali);

$total_kembali = $cek_kembali["jml"] ? $cek_kembali["jml"] : 0;

$cek_buku = mysqli_query($conn,"SELECT * FROM buku a JOIN pinjam b ON b.kode_buku = a.kode_buku WHERE b.id_pinjam =
$id_pinjam");
$cek_buku = mysqli_fetch_assoc($cek_buku);

// $sisa_buku = $cek_buku["jumlah"] - $total_kembali;

// if ($jumlah > $sisa_buku) {
// echo "
// <script>
// alert('jumlah buku melebihi sisa buku yg anda pinjam');
// window.location.href = '../kembali_buku.php?id_pinjam=$id_pinjam'
// </script>
// ";
// }else {  
mysqli_query($conn, "INSERT INTO log_kembali (id_pinjam,tanggal,jumlah,alasan) VALUES('$id_pinjam','$tgl_kembali','1','$alasan')");

mysqli_query($conn, "UPDATE buku SET stok_buku=stok_buku+1 WHERE kode_buku={$cek_buku["kode_buku"]}");
echo "
<script>
alert('Buku Berhasil di Kembalikan');
window.location.href = '../kembali.php'
</script>
";
}else{
   $id_pinjam = $_POST['id_pinjam'];
   // $jumlah = $_POST['jumlah'];
   $tgl_kembali = date('Y-m-d');
   
   $cek_kembali = mysqli_query($conn,"SELECT SUM(jumlah) as jml FROM log_kembali WHERE id_pinjam = $id_pinjam");
   $cek_kembali = mysqli_fetch_assoc($cek_kembali);
   
   $total_kembali = $cek_kembali["jml"] ? $cek_kembali["jml"] : 0;
   
   $cek_buku = mysqli_query($conn,"SELECT * FROM buku a JOIN pinjam b ON b.kode_buku = a.kode_buku WHERE b.id_pinjam =
   $id_pinjam");
   $cek_buku = mysqli_fetch_assoc($cek_buku);
   
   // $sisa_buku = $cek_buku["jumlah"] - $total_kembali;
   
   // if ($jumlah > $sisa_buku) {
   // echo "
   // <script>
   // alert('jumlah buku melebihi sisa buku yg anda pinjam');
   // window.location.href = '../kembali_buku.php?id_pinjam=$id_pinjam'
   // </script>
   // ";
   // }else {  
   mysqli_query($conn, "INSERT INTO log_kembali (id_pinjam,tanggal,jumlah,alasan) VALUES('$id_pinjam','$tgl_kembali','1','0')");
   
   mysqli_query($conn, "UPDATE buku SET stok_buku=stok_buku+1 WHERE kode_buku={$cek_buku["kode_buku"]}");
   echo "
   <script>
   alert('Buku Berhasil di Kembalikan');
   window.location.href = '../kembali.php'
   </script>
   ";
}
?>