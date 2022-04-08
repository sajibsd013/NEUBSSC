<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  include '../../partials/_css_files.php'; ?>


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

                $CommitteeID  = $_GET['p'];

                $existsql = "SELECT * FROM `committee` WHERE `CommitteeID` = '$CommitteeID'";

                $result = mysqli_query($con, $existsql);
                $row = mysqli_fetch_assoc($result);
                $session =  $row['session'];
                $action_url = $root_url."/admin/committee/_config.php";



        ?>

                <div class="row justify-content-center g-3 my-2 ">
                    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
                        <h3 class="heading_color mb-4">Update Committee</h3>
                        <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                        <input type="text" class="form-control  _form_data d-none" id="CommitteeID" name="CommitteeID" placeholder=" " value="<?php echo $CommitteeID ?>" required>

                            <div class="form-floating  text-muted">
                                <input type="text" class="form-control  _form_data" id="newSession" name="updateSession" placeholder=" " value="<?php echo $session ?>" required>
                                <label for="newSession">Enter Session</label>
                            </div>
                            <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Update</button>
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