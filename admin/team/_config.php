<?php
session_start();
include '../../db/_db.php';


if (isset($_GET['MemberID'])) {
    $MemberID  = $_GET['MemberID'];
    $sql = "DELETE FROM `members` WHERE `MemberID` = $MemberID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 1;
    }
}
