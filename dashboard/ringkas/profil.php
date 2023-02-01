<?php  
require '../ringkas/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
?>