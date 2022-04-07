<?php
session_start();
include '../../db/_db.php';

if (isset($_POST['newTitle'])) {

    $title =  $_POST['newTitle'];
    $description =  $_POST['description'];


    $sql = "INSERT INTO `records` (`title`,`description`) VALUES ('$title','$description')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 3;
    }
}

if (isset($_POST['updateTitle'])) {

    $title =  $_POST['updateTitle'];
    $description =  $_POST['description'];
    $RecordID =  $_POST['RecordID'];


    $sql = "UPDATE `records` SET `title` = '$title', `description`='$description' WHERE `RecordID` =$RecordID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Updated!";
    }
}


if (isset($_GET['RecordID'])) {
    $RecordID  = $_GET['RecordID'];
    $sql = "DELETE FROM `records` WHERE `RecordID` = $RecordID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 1;
    }
}

if (isset($_GET['ImageID'])) {
    $ImageID  = $_GET['ImageID'];
    $sql = "DELETE FROM `r_images` WHERE `ImageID` = $ImageID";
    $result = mysqli_query($con, $sql);
    $file= $_GET['file'];
    unlink($file);

    if ($result) {
        echo 1;
    }
}
