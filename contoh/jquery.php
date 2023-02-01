<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>



    <div class="container">
        <button class="btn btn-success btn-lg" id="home">Home</button>
        <div id="load-halaman"></div>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#home').click(function() {
            $('#load-halaman').load('home.html')
        })
    })
    </script>
</body>

</html>