<?php
include '../../db/_db.php';

if(isset($_GET['BlogID'])){
    $BlogID = $_GET['BlogID'];
    $sql = "UPDATE `blog` SET `status` = 'approved' WHERE `BlogID` = '$BlogID'";
    $result = mysqli_query($con,$sql);
    if($result){
      echo 1;
    }
  }

?>