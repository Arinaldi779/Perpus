<?php 
if(isset($_GET['alert'])){
    if($_GET['alert']=="gagal"){
        echo "<p style='color:red;font: italic 12px/30px Georgia, serif;text-align:center;'>Maaf! Username & Password Salah!!!</p>";
    }else if($_GET['alert']=="belum_login"){
        echo "<p style='color:red;font: italic 12px/30px Georgia, serif;text-align:center;'>Anda Harus Login Terlebih Dulu!</p>";
    }else if($_GET['alert']=="logout"){
        echo "<p style='color:red; font: italic 12px/30px Georgia, serif;text-align:center;'>Anda Telah Logout!</p>";

    }
    
}
?>