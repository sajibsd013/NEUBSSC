<div class="container">
    <?php
    $CommitteeID  = $_GET['p'];
    $RecordID  = $_GET['p'];

    $message = '';
    if (isset($_POST['RecordID'])) {
        $RecordID =  $_POST['RecordID'];
        $image =  $_FILES['image']['name'];
        $tmp_name =  $_FILES['image']['tmp_name'];
        $size =  $_FILES['image']['size'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
            if ($size <= 10485760) {
                $sql = "INSERT INTO `r_images` ( `RecordID`, `image`) VALUES ('$RecordID','$image')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $path = "../../assets/img/records/" . $RecordID;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $path . "/" . $image);
                    $message = "Member Added!";
                }
            } else {
                $message = "Image should be or Less or Equal 10 MB!";
            }
        } else {
            $message = "Your file is invalid! Please upload PBG or JPG file";
        }
    }


    $sql = "SELECT * FROM `records` WHERE `RecordID`=$RecordID";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $RecordID  = $row['RecordID'];
        $title = $row['title'];
        $description = $row['description'];
    }
    ?>

    <div class="my-3">
        <h4 class='heading_color'><?php echo $title ?></h4>
        <small class='text-muted'><?php echo $description ?> </small>
    </div>

    <div class="container">
        <div class="row g-5 mb-5">


            <?php
            $sql = "SELECT * FROM `r_images` WHERE `RecordID`='$RecordID'";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $ImageID   = $row['ImageID'];
                $image   = $row['image'];
                $file = "../../assets/img/records/" . $RecordID . "/" . $image;
                $dlt_url = '/NEUBSSC/admin/records/_config.php?ImageID=' . $ImageID . '&file=' . $file;

            ?>


                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="card">
                        <img class='card-img-top' src="/NEUBSSC/assets/img/records/<?php echo $RecordID . "/" . $image ?>" alt="">
                        <div class="card-footer">
                            <a class=" btn btn-outline-dark btn-sm w-100" onclick="return confirm(`Are you sure?`) && getFunc(`<?php echo $dlt_url ?>`)"><i class="fa fa-trash" aria-hidden="true"></i> Delete </a>

                        </div>

                    </div>
                </div>
            <?php


            }

            ?>


        </div>
    </div>



    <div class="row justify-content-center g-3 my-2 ">
        <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
            <h3 class="heading_color mb-4">Add Images</h3>
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
                <input type="text" class="form-control  _form_data  d-none" id="RecordID" name="RecordID" placeholder=" " value="<?php echo $RecordID ?>" required>

                <div class="form-group">
                    <label for="image">Select image</label>
                    <input type="file" class="form-control-file _form_data" id="image" name="image">
                </div>


                <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Add Images</button>
            </form>

        </div>
    </div>
</div>