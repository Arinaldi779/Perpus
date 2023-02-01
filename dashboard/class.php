<?php 
    CLASS Main {
        public function redirectUser(){
            if($_SESSION['level']=='user'){
                header('Location: index.php');
            }
        }
    }


?>