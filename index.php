<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="page/img/favicon.ico">
    <title>Login Page</title>
    <link rel="stylesheet" href="page/css/bootstrap.min.css">
    <link rel="stylesheet" href="page/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="img col-md-5">
                <img src="page/img/SMKN2BJM.png" alt="" width="300px">
                <!-- <img src="images/img-01.png" alt="" width="300px"> -->
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 form">

                <div class="mb-1">
                    <center>
                        <h1><b>Login Perpustakaan</b></h1>
                        <?php include 'page/ringkas/alert.php'; ?>
                    </center>
                </div>

                <form action="page/berhasil_login.php" method="post" class="form">

                    <!-- Username -->
                    <div class="form-group mb-1">
                        <label for="user">
                            <i class="fa fa-user m-2"></i><b>Username</b>
                        </label>
                        <input type="text" name="user" id="user" class="form-control"
                            placeholder="Masukkan Username Anda">
                    </div>

                    <!-- Password -->
                    <div class="form-group position-relative mb-3">
                        <label>
                            <i class="fa fa-lock m-2"></i><b>Password</b>
                        </label>
                        <input class="form-control" name="pass" type="password" placeholder="Masukkan Password Anda"
                            id="password">
                        <div id="toggle" onclick="showHide();"></i></div>
                    </div>

                    <!-- Button -->
                    <button id="login" type="submit" name="login" value="Login"
                        class="btn btn-success mb-3">Login</button>

                    <p>Don't have an account yet? <a href="page/index.php">Create Account Here</a></p>

                </form>
            </div>
        </div>
    </div>

    <?php include 'page/ringkas/script.php'; ?>
</body>

</html>