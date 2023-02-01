<?php 
    // if(isset($_POST["tujuan"])){

    //     $tujuan = $_POST["tujuan"];
        
    //     if($tujuan == "LOGIN"){
    //         $username = $_POST["username"];
    //         $password = $_POST["password"];
            
    //         if($username == "" && $password == "daffa"){
    //             echo "<h1>Selamat Datang, ".$username."!</h1>";
    //         }else{
    //             echo "<h2>Anda Bukan Daffa</h2>";
    //         }
    
    //     }else{
    //         $username = $_POST["username"];
    //         $password = $_POST["password"];
    //         $email = $_POST["email"];
    
    //         echo "<h1>Anda sudah terdaftar sebagai ".$username."!</h1>";
            
    //     }
    // }   
?>

<?php
$servername = "localhost";
$database = "projek_perpustakaan"; 
$username = "root";
$password = ""; 
$conn = mysqli_connect($servername, $username, $password, $database);
?>

<?php
$nis        = $_POST["nis"];
$user       = $_POST["username"];
$pass       = md5($_POST["password"]);
$pass2       = md5($_POST["password2"]);
$email      = $_POST["email"];
$nama       = $_POST["nama"];
$jurusan    = $_POST["jurusan"];
$alamat     = $_POST["alamat"];
$no_telp    = $_POST["no_telp"];
$jk         = $_POST["jk"];
    

        $namaFile   = $_FILES['gambar_anggota']['name'];
        $ukuranFile = $_FILES['gambar_anggota']['size'];
        $error = $_FILES['gambar_anggota']['error'];
        $tmpName = $_FILES['gambar_anggota']['tmp_name'];
        if ($error === 4) { 
            echo "
            <script>
            alert('Silahkan Upload Gambar');
            window.location.href = 'daftar.php';
            </script>
            ";
            return false;
        }

        $ekstensiGambarValid = ['jpg','jpeg','png','gif'];
        $ekstensiGambar      = explode('.',$namaFile);
        $ekstensiGambar      = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
            echo "
            <script>
            alert('Yg anda upload bukan gambar');
            window.location.href = 'daftar.php';
            </script>
            ";
            return false;
        }

        if ($ukuranFile > 3000000) {
            echo "
            <script>
            alert('Ukuran Gambar terlalu besar');
            window.location.href = 'daftar.php';
            </script>
            ";
            return false;
        }
        
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        
        move_uploaded_file($tmpName,'../dashboard/upload-anggota/' . $namaFileBaru);
// var_dump($namaFileBaru);exit; 

// $gambar = $namaFileBaru;



$query_sql = "INSERT INTO user (nis,username, password, email,nama_anggota,jurusan_anggota,alamat_anggota,no_telp_anggota,jk_anggota,gambar,level) 
                                    VALUES ('$nis','$user', '$pass', '$email','$nama','$jurusan','$alamat','$no_telp','$jk','$namaFileBaru','user')";
if($pass !== $pass2){
    header("Location: daftar.php?pesan=salah");
}else {
    if (mysqli_query($conn, $query_sql)) {
        echo "
        <script>
        alert('Anda telah terdaftar sebagai $user');
        window.location.href = '../index.php'
        </script>
        ";
} else {
    echo " 
    <script>
    alert('Data yang Anda Masukkan Sudah Terdaftar Silahkan Masukkan Data Baru');
    window.location.href = '../index.php'
    </script> ";
    mysqli_error($conn);
}
}


?>