<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/NEUBSSC/assets/bootstrap/css/bootstrap.min.css'>
    <link rel=" stylesheet" href='/NEUBSSC/assets/css/style.css'>
    <link rel="stylesheet" href='/NEUBSSC/assets/font-awesome/css/font-awesome.min.css'>
    <link href="/NEUBSSC/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" />


    <title>NEUBSSC</title>
</head>

<body>

    <?php
    include '../partials/_header.php';
    include '_blood.php';
    include '../partials/_footer.php';
    ?>


    <!--  JS Files -->
    <script src="/NEUBSSC/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/NEUBSSC/assets/vendor/owl.carousel/owl.carousel.min.js"></script>


    <script src='/NEUBSSC/assets/js/app.js'></script>
    <script src='/NEUBSSC/assets/bootstrap/js/bootstrap.bundle.js'></script>

</body>

</html>