<?php
session_start();

include '../../db/_db.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  include '../../partials/_css_files.php'; ?>
.css'>

    <title>NEUBSSC || Admin Dashboard</title>
</head>

<body>
    <div class="container admin_root">

        <?php



        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && isset($_GET['p'])) {
            $user_type = $_SESSION["user_type"];
            if ($user_type == "admin") {
                include '../partials/_header.php';
                include '../../db/_db.php';

                $MemberID  = $_GET['p'];
                $message = '';
                if (isset($_POST['updateName'])) {
                    $updateName =  $_POST['updateName'];
                    $uPosition =  $_POST['position'];
                    $uImage =  $_FILES['image']['name'];
                    if ($uImage) {
                        $tmp_name =  $_FILES['image']['tmp_name'];
                        $size =  $_FILES['image']['size'];
                        $image = $uImage;
                        $ext = pathinfo($image, PATHINFO_EXTENSION);
                        if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
                            if ($size <= 2097152) {
                                $sql = "UPDATE `members` SET `name` = '$updateName', `image` = '$image', `position` = '$uPosition' WHERE `MemberID` = '$MemberID'";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $path = $root_url."/assets/img/team/";
                                    move_uploaded_file($tmp_name, "../../assets/img/team/" . $image);
                                    $message = "Updated!";
                                }
                            } else {
                                $message = "Image should be or Less or Equal 2 MB!";
                            }
                        } else {
                            $message = "Your file is invalid! Please upload PBG or JPG file";
                        }
                    } else {
                        $sql = "UPDATE `members` SET `name` = '$updateName', `position` = '$uPosition' WHERE `MemberID` = '$MemberID'";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            $message = "Updated!";
                        }
                    }
                }

                $existsql = "SELECT * FROM `members` WHERE `MemberID` = '$MemberID'";

                $result = mysqli_query($con, $existsql);
                $row = mysqli_fetch_assoc($result);
                $name =  $row['name'];
                $position =  $row['position'];
                $image =  $row['image'];
                // $action_url = "/NEUBSSC/admin/committee/_config.php";

                $message = '';
                if (isset($_POST['updateName'])) {
                    $updateName =  $_POST['updateName'];
                    $uPosition =  $_POST['position'];
                    $uImage =  $_FILES['image']['name'];
                    if ($uImage) {
                        $tmp_name =  $_FILES['image']['tmp_name'];
                        $size =  $_FILES['image']['size'];
                        $ext = pathinfo($image, PATHINFO_EXTENSION);
                        $image = $uImage;
                        if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
                            if ($size <= 2097152) {
                                $sql = "UPDATE `members` SET `name` = '$updateName', `image` = '$image', `position` = '$uPosition' WHERE `MemberID` = '$MemberID'";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $path = $root_url."/assets/img/team/";
                                    move_uploaded_file($tmp_name, "../../assets/img/team/" . $image);
                                    $message = "Updated!";
                                }
                            } else {
                                $message = "Image should be or Less or Equal 2 MB!";
                            }
                        } else {
                            $message = "Your file is invalid! Please upload PBG or JPG file";
                        }
                    } else {
                        $sql = "UPDATE `members` SET `name` = '$updateName', `position` = '$uPosition' WHERE `MemberID` = '$MemberID'";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            $message = "Updated!";
                        }
                    }
                }






        ?>


                <div class="row justify-content-center g-3 my-2 ">
                    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
                        <h3 class="heading_color mb-4">Update Member Information</h3>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php
                            if ($message) {
                                echo '
                                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                        ' . $message . '
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                        ';
                            }

                            ?>
                            <input type="text" class="form-control  _form_data  d-none" id="MemberID" name="MemberID" placeholder=" " value="<?php echo $MemberID ?>" required>

                            <div class="form-floating  text-muted">
                                <input type="text" class="form-control  _form_data" id="updateName" name="updateName" placeholder=" " value="<?php echo $name ?>" required>
                                <label for="updateName">Enter Name</label>
                            </div>

                            <div class="form-floating  text-muted">
                                <input type="text" class="form-control  _form_data my-3" id="position" name="position" placeholder=" " value="<?php echo $position ?>" required>
                                <label for="position">Enter Position</label>
                            </div>
                            <div class="form-group">
                                <label for="image">Select image</label>
                                <input type="file" class="form-control-file _form_data" id="image" value="<?php echo $image ?>" name="image">
                            </div>


                            <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Update Member</button>
                        </form>

                    </div>
                </div>
        <?php


            } else {
                include '../../partials/_page_not_found.php';
            }
        } else {
            include '../../partials/_page_not_found.php';
        }
        ?>

    </div>



    <!--  JS Files -->
    <?php  include '../../partials/_js_files.php'; ?>



</body>

</html>