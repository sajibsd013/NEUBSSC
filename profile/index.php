<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  include '../partials/_css_files.php'; ?>


    <title>NEUBSSC</title>
</head>

<body>
    <?php
    if (isset($_GET['p'])) {
        include '../partials/_header.php';
        include '_profile.php';
    } else {
        include '../partials/_page_not_found.php';
    }
    ?>



    <!--  JS Files -->
    <?php  include '../../partials/_js_files.php'; ?>



</body>

</html>