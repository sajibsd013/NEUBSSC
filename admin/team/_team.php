<div class="container">
    <?php
    $CommitteeID  = $_GET['p'];

    $message = '';
    if (isset($_POST['newName'])) {
        $name =  $_POST['newName'];
        $CommitteeID =  $_POST['CommitteeID'];
        $position =  $_POST['position'];
        $image =  $_FILES['image']['name'];
        $tmp_name =  $_FILES['image']['tmp_name'];
        $size =  $_FILES['image']['size'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
            if ($size <= 2097152) {
                $sql = "INSERT INTO `members` ( `CommitteeID`, `image`, `position`,`name`) VALUES ('$CommitteeID','$image','$position','$name')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    move_uploaded_file($tmp_name, "../../assets/img/team/" . $image);
                    $message = "Member Added!";
                }
            } else {
                $message = "Image should be or Less or Equal 2 MB!";
            }
        } else {
            $message = "Your file is invalid! Please upload PBG or JPG file";
        }
    }

    $sql = "SELECT * FROM `committee` WHERE `CommitteeID`='$CommitteeID' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $session = $row['session'];

    ?>

    <table class="table bg-white border border-top-0" style="font-size: 13px;">
        <h3 class="heading_color d-inline-block">Team Members </h3> <small> (<?php echo $session ?> Session) </small>

        <thead class="bg-white">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody class="text-secondary bg-light">

            <?php
            $sql = "SELECT * FROM `members` WHERE `CommitteeID`='$CommitteeID'";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $MemberID   = $row['MemberID'];
                $name  = $row['name'];
                $position = $row['position'];
                $member_dlt = '/NEUBSSC/admin/team/_config.php?MemberID=' . $MemberID;
                $update_url = '/NEUBSSC/admin/team/update.php?p=' . $MemberID;
                // $team_url = '/NEUBSSC/admin/team/?p=' . $CommitteeID;


                echo '
            <tr>
                <td>
                <a class="text-decoration-none text-bold pointer"  >' . $name . '</a>
                </td>

                <td class="">
                ' . $position . '
                </td>

                <td class="d-flex ">
                <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded pointer"  onclick="redirectTo(`' . $update_url . '`)" ><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded pointer"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $member_dlt . '`)"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                </td>
            </tr>

                ';
            }

            ?>


        </tbody>
    </table>



    <div class="row justify-content-center g-3 my-2 ">
        <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
            <h3 class="heading_color mb-4">Add Team Member</h3>
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
                <input type="text" class="form-control  _form_data  d-none" id="CommitteeID" name="CommitteeID" placeholder=" " value="<?php echo $CommitteeID ?>" required>

                <div class="form-floating  text-muted">
                    <input type="text" class="form-control  _form_data" id="newName" name="newName" placeholder=" " required>
                    <label for="newName">Enter Name</label>
                </div>
                <div class="form-floating  text-muted">
                    <input type="text" class="form-control  _form_data my-3" id="position" name="position" placeholder=" " required>
                    <label for="position">Enter Position</label>
                </div>
                <div class="form-group">
                    <label for="image">Select image</label>
                    <input type="file" class="form-control-file _form_data" id="image" name="image">
                </div>


                <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Add Member</button>
            </form>

        </div>
    </div>
</div>