<?php 
    include 'koneksi.php';

    $id_anggota         = htmlspecialchars($_POST['ID']);
    $nama_anggota       = htmlspecialchars($_POST['nama']);
    $jk_anggota         = htmlspecialchars($_POST['jenkel']);
    $jurusan_anggota    = htmlspecialchars($_POST['jurusan']);
    $no_telp_anggota    = htmlspecialchars($_POST['no_telp']);
    $alamat_anggota     = htmlspecialchars($_POST['alamat']);

    mysqli_query($conn, "INSERT INTO anggota
                         VALUES ('$id_anggota',
                                '$nama_anggota',
                                '$jk_anggota',
                                '$jurusan_anggota',
                                '$no_telp_anggota',
                                '$alamat_anggota')");

   header("location:Anggota.php");
?>