<section class="container section_top ">


    <?php
    include '../db/_db.php';
    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM `committee` WHERE `CommitteeID`=" . $_GET['id'];
    } else {
        $sql = "SELECT * FROM `committee` ORDER BY  `session` DESC";
    }
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $CommitteeID  = $row['CommitteeID'];
    $session = $row['session'];

    ?>


    <div class="text-center">
        <h6 class='_section_title'>our TEAM</h6>
        <h2 class='font-weight-bold py-2'>Our Hardworking <span class='text-success'>Team</span> </h2>
        <h6 class='pb-3'> Executive Committee (<?php echo $session ?>)</h6>
    </div>
    <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
        <?php
        $sql2 = "SELECT * FROM `members` WHERE `CommitteeID`='$CommitteeID'";
        $result2 = mysqli_query($con, $sql2);
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $MemberID   = $row2['MemberID'];
            $name  = $row2['name'];
            $position = $row2['position'];
            $image = $row2['image'];
        ?>
            <div class="col-md-4 col-sm-6 _cursor_pointer">
                <div class='card shadow rounded'>
                    <img src="<?php echo $root_url ?>/assets/img/team/<?php echo $image ?>" class="card-img-top w-50 _img_border rounded-circle mt-3 mx-auto " alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title my-1"><?php echo $name ?></h6>
                        <small class="card-text d-block text-muted"><?php echo $position ?></small>
                        <small class="card-text d-block text-muted"><?php echo $session ?></small>
                    </div>
                </div>
            </div>
        <?php


        }

        ?>



    </div>

    <div class="row g-5 py-5 justify-content-center">
        <?php
        $sql3 = "SELECT * FROM `committee` WHERE NOT `session`='$session' ORDER BY  `session` DESC";
        $result3 = mysqli_query($con, $sql3);
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $CommitteeID2  = $row3['CommitteeID'];
            $session2 = $row3['session'];

        ?>
            <div class="col-lg-4 col-md-6">
                <div class='card'>
                    <div class="card-body">
                        <h5 class="card-title text-primary">Executive Committee (<?php echo $session2 ?>)</h5>
                        <small class="card-text text-muted d-block pb-3">You can see committee members by click below 'View Comittee' button</small>
                        <a class="btn btn-sm btn-dark w-100 pointer" onclick="redirectTo('<?php echo $root_url ?>/team/?id=<?php echo $CommitteeID2 ?>')">View Committee</a>
                    </div>
                </div>
            </div>
        <?php


        }

        ?>


    </div>
</section>