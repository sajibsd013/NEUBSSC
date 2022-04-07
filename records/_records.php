<section class="container section_top ">
    <?php

    function postTime($timestand)
    {

        $start = new DateTime();
        $end = new DateTime($timestand, timezone_open('asia/dhaka'));

        $interval = $start->diff($end);

        $year = $interval->format('%y');
        $months = $interval->format('%m');
        $days = $interval->format('%a');
        $hours = $interval->format('%h');
        $min = $interval->format('%i');
        $sec = $interval->format('%s');
        $post_time = "Just now";

        if ($year > 0) {
            $post_time = $year . ' yers ago';
        } else if ($months > 0) {
            $post_time = $months . ' months ago';
        } else if ($days > 0) {
            $post_time = $days . ' days ago';
        } else if ($hours > 0) {
            $post_time = $hours . ' hours ago';
        } else if ($min > 0) {
            $post_time = $min . ' mins ago';
        }
        return $post_time;
    }

    ?>




    <div class="">
        <?php
        include '../db/_db.php';

        $sql = "SELECT * FROM `records`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $RecordID    = $row['RecordID'];
            $title    = $row['title'];
            $description    = $row['description'];
            $timestand    = $row['timestand'];

            $post_time = postTime($timestand);

        ?>
            <div class="card my-5">
                <div class="card-body">
                    <h4 class='heading_color'><?php echo $title ?></h4>
                    <small class='text-muted'><?php echo $description ?> </small>
                    <div class="row mt-4 g-3 justify-content-center align-items-center">

                        <?php
                        $sql2 = "SELECT * FROM `r_images` WHERE `RecordID`='$RecordID'";
                        $result2 = mysqli_query($con, $sql2);
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $image   = $row2['image'];


                        ?>


                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <img class='w-100' src="/NEUBSSC/assets/img/records/<?php echo $RecordID."/".$image ?>" alt="">
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                </div>
                <div class="card-footer">
                    <small class='text-muted'><?php echo $post_time ?> </small>

                </div>
            </div>
        <?php


        }

        ?>



    </div>
</section>