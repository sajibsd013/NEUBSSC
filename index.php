<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  include 'partials/_css_files.php'; ?>

    <title>NEUBSSC</title>
</head>

<body>

    <?php
    include 'partials/_header.php';
    include 'partials/_home.php';
    include 'partials/_about.php';
    include 'partials/_blood.php';
    include 'partials/_services.php';
    // include 'partials/_team_slider.php';

    include 'partials/_footer.php';
    ?>


    <!--  JS Files -->
   <?php  include 'partials/_js_files.php'; ?>

   

</body>

</html>