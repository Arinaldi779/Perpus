<?php 
// berfungsi mengaktifkan session
session_start();

// berfungsi menghubungkan koneksi ke database
require 'koneksi.php';

// berfungsi menangkap data yang dikirim
$user = $_POST['user'];
$pass = $_POST['pass'];
$passmd5 = md5($pass);
// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($conn,"SELECT * FROM user  WHERE username = '$user' AND password ='$passmd5'");
$cek = mysqli_num_rows($sql);		

// berfungsi mengecek apakah username dan password ada pada database
if($cek > 0){
	$data 		= mysqli_fetch_assoc($sql);	
	// var_dump($data["nip"]);exit;	

	$_SESSION['id']					=	$data['id'];
	$_SESSION['nis'] 				= 	$data['nis'];
	$_SESSION['nip'] 				= 	$data['nip'];
	$_SESSION['nama_anggota'] 		= 	$data['nama_anggota'];
	$_SESSION['jk_anggota'] 		= 	$data['jk_anggota'];
	$_SESSION['alamat_anggota']  	= 	$data['alamat_anggota'];
	$_SESSION['jurusan_anggota'] 	= 	$data['jurusan_anggota'];
	$_SESSION['no_telp_anggota'] 	= 	$data['no_telp_anggota'];
	$_SESSION['email'] 				=   $data['email'];
	$_SESSION['username']			=   $data['username'];
	$_SESSION['level'] 				=   $data['level'];	
	$_SESSION['gambar']				=	$data['gambar'];	

	// berfungsi mengecek jika user login sebagai admin
	if($data['level']=="admin"){
		echo "
		<script>alert('Selamat Datang Admin {$data["nama_anggota"]}');
        window.location.href = '../dashboard'</script>
		";
	// berfungsi mengecek jika user login sebagai user
	}else if($data['level']=="user"){
		// berfungsi mengalihkan ke halaman user
		echo "
		<script>alert('Selamat Datang User {$data["nama_anggota"]}');
        window.location.href = '../dashboard'</script>
		";
		
	}
}else{
	header("location:../index.php?alert=gagal");
};
?>