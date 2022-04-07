    <div class="container section_top">
        <div class="">
            <h3 class=" text-center heading_color" id="">Search Blood Donors</h3>
            <h6 class="text-muted text-center _modal_subheading pb-2">If you need blood donors, search now...</h6>
            <?php
            include '../db/_db.php';

            function donorTable($sql, $con)
            {

            ?>
                <table class="table bg-white border border-top-0" style="font-size: 13px; overflow:hidden;">

                    <thead class="bg-white">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Last Donate</th>
                            <th scope="col">Address</th>

                        </tr>
                    </thead>

                    <tbody class="text-secondary bg-light" style="overflow:hidden;">

                        <?php

                        $sql = $sql;
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $UserID   = $row['UserID'];
                            $name   = $row['name'];
                            $mobile   = $row['mobile'];
                            $gender   = $row['gender'];
                            $address   = $row['address'];
                            $blood_group   = $row['blood_group'];
                            $last_blood_donate   = $row['last_blood_donate'];
                            if ($gender == 'Female') {
                                $mobile   = "N/A";
                            }

                            echo '
                            <tr>
                                <td>
                                    <a class="text-decoration-none text-bold pointer" onclick="redirectTo(`/NEUBSSC/profile/?p=' . $UserID . '`)"  >' . $name . '</a>
                                </td>
                                <td class="">
                                ' . $gender . '
                                </td>
                                <td class="">
                                ' . $mobile . '
                                </td>
                                <td class="">
                                ' . $blood_group . '
                                </td>
                                <td class="">
                                ' . $last_blood_donate . '
                                </td>
                                <td class="">
                                ' . $address . '
                                </td>
                            </tr>
        ';
                        }

                        ?>


                    </tbody>
                </table>
            <?php
            }
            ?>


            <div class="my-5">
                <nav class="">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <button class="nav-link active" id="All-tab" data-bs-toggle="tab" data-bs-target="#All" type="button" role="tab" aria-controls="All" aria-selected="true">All
                        </button>

                        <button class="nav-link " id="A_pos-tab" data-bs-toggle="tab" data-bs-target="#A_pos" type="button" role="tab" aria-controls="A_pos" aria-selected="false">A+
                        </button>

                        <button class="nav-link " id="A_neg-tab" data-bs-toggle="tab" data-bs-target="#A_neg" type="button" role="tab" aria-controls="A_neg" aria-selected="false">A-
                        </button>

                        <button class="nav-link " id="B_pos-tab" data-bs-toggle="tab" data-bs-target="#B_pos" type="button" role="tab" aria-controls="B_pos" aria-selected="false">B+
                        </button>
                        <button class="nav-link " id="B_neg-tab" data-bs-toggle="tab" data-bs-target="#B_neg" type="button" role="tab" aria-controls="B_neg" aria-selected="false">B-
                        </button>

                        <button class="nav-link " id="AB_pos-tab" data-bs-toggle="tab" data-bs-target="#AB_pos" type="button" role="tab" aria-controls="AB_pos" aria-selected="false">AB+
                        </button>
                        <button class="nav-link " id="AB_neg-tab" data-bs-toggle="tab" data-bs-target="#AB_neg" type="button" role="tab" aria-controls="AB_neg" aria-selected="false">AB-
                        </button>

                        <button class="nav-link " id="O_pos-tab" data-bs-toggle="tab" data-bs-target="#O_pos" type="button" role="tab" aria-controls="O_pos" aria-selected="false">O+
                        </button>
                        <button class="nav-link " id="O_neg-tab" data-bs-toggle="tab" data-bs-target="#O_neg" type="button" role="tab" aria-controls="O_neg" aria-selected="false">O-
                        </button>

                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="All-tab">
                        <?php
                        $sql = "SELECT * FROM `users` ";
                        donorTable($sql, $con);
                        ?>
                    </div>

                    <div class="tab-pane fade" id="A_pos" role="tabpanel" aria-labelledby="A_pos-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='A+' ";
                        donorTable($sql, $con);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="A_neg" role="tabpanel" aria-labelledby="A_neg-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='A-' ";
                        donorTable($sql, $con);
                        ?>
                    </div>

                    <div class="tab-pane fade" id="B_pos" role="tabpanel" aria-labelledby="B_pos-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='B+' ";
                        donorTable($sql, $con);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="B_neg" role="tabpanel" aria-labelledby="B_neg-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='B-' ";
                        donorTable($sql, $con);
                        ?>
                    </div>

                    <div class="tab-pane fade" id="AB_pos" role="tabpanel" aria-labelledby="AB_pos-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='AB+' ";
                        donorTable($sql, $con);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="AB_neg" role="tabpanel" aria-labelledby="AB_neg-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='AB-' ";
                        donorTable($sql, $con);
                        ?>
                    </div>

                    <div class="tab-pane fade" id="O_pos" role="tabpanel" aria-labelledby="O_pos-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='O+' ";
                        donorTable($sql, $con);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="O_neg" role="tabpanel" aria-labelledby="O_neg-tab">
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `blood_group`='O-' ";
                        donorTable($sql, $con);
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>