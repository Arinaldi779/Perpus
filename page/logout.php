<?php 
// berfungsi mengaktifkan session
session_start();
//berfungsi menghapus semua session
session_destroy();
// berfungsi mengalihkan halaman ke halaman login
header("location:../index.php?alert=logout");
?>