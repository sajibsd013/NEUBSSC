<?php
session_start();
include '../../db/_db.php';

if (isset($_POST['newSession'])) {

    $session =  $_POST['newSession'];


    $existsql = "SELECT * FROM `committee` WHERE `session` = '$session'";

    $result = mysqli_query($con, $existsql);
    $numRows = mysqli_num_rows($result);


    function addCommittee($con, $session)
    {
        $sql = "INSERT INTO `committee` (`session`) VALUES ('$session')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo 3;
        }
    }


    if ($numRows > 0) {
        $showError = "Session already exists";
        echo $showError;
    } else {
        addCommittee($con, $session);
    }
}

if (isset($_POST['updateSession'])) {

    $session =  $_POST['updateSession'];
    $CommitteeID =  $_POST['CommitteeID'];


    $existsql = "SELECT * FROM `committee` WHERE `session` = '$session'";

    $result = mysqli_query($con, $existsql);
    $numRows = mysqli_num_rows($result);


    function updateCommittee($con, $session, $CommitteeID)
    {
        $sql = "UPDATE `committee` SET `session` = '$session' WHERE `CommitteeID` =$CommitteeID";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "Updated!";
        }
    }


    if ($numRows > 1) {
        $showError = "Session already exists";
        echo $showError;
    } else {
        updateCommittee($con, $session, $CommitteeID);
    }
}


if (isset($_GET['CommitteeID'])) {
    $CommitteeID  = $_GET['CommitteeID'];
    $sql = "DELETE FROM `committee` WHERE `CommitteeID` = $CommitteeID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 1;
    }
}
