<div class="fixed-top">


    <nav class="navbar navbar-expand-lg  navbar-light bg-light ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand pointer" onclick="redirectTo('/NEUBSSC/')">
                    <img src="/NEUBSSC/assets/img/logo.png" alt="">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active pointer" aria-current="page" onclick="redirectTo('/NEUBSSC/')">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pointer" onclick="redirectTo('/NEUBSSC/about/')">About</a>
                    </li>
     
                    <li class="nav-item">
                        <a class="nav-link pointer" onclick="redirectTo('/NEUBSSC/team/')">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pointer" onclick="redirectTo('/NEUBSSC/blood/')">Blood Donors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pointer" onclick="redirectTo('/NEUBSSC/records/')">Records</a>
                    </li>
     
                </ul>


            </div>
            <div class="d-flex">
                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    $user_type = $_SESSION["user_type"];
                    $UserID = $_SESSION["UserID"];
                    if ($user_type == "admin") {

                ?>
                        <div class="mx-3">
                            <a class="btn btn-sm btn-secondary " onclick="redirectTo('/NEUBSSC/admin')">
                                <i class="fa fa-dashboard" aria-hidden="true"></i> Admin Panel
                            </a>
                        </div>
                    <?php


                    }
                    ?>



                    <span class="dropdown text-light">
                        <button class="dropdown-toggle btn btn-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle fa-2x text-primary "></i>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="">
                            <li>
                                
                                <a class="dropdown-item pointer" onclick="redirectTo('/NEUBSSC/profile/?p=<?php echo $UserID ?>')"><i class="fa fa-user" aria-hidden="true"></i> Profile </a>
                            </li>
                            <li>
                                <a class="dropdown-item pointer"  onclick="redirectTo('/NEUBSSC/settings/')"><i class="fa fa-gear" aria-hidden="true"></i> Settings </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item pointer" onclick="logout()"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                            </li>
                        </ul>
                    </span>
                <?php

                } else {
                ?>
                    <a class="btn btn-sm btn-outline-secondary mx-1" onclick="redirectTo('/NEUBSSC/auth/login')">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Signin</a>
                    <a class="btn btn-sm btn-outline-secondary  mx-1" onclick="redirectTo('/NEUBSSC/auth/registration')">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Signup</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <div id="alert" class="alert alert-primary d-none my-0" role="alert">
        <span id="msg"></span>
    </div>


    <?php
    if (isset($_SESSION["message"])) {
        echo '
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        ' . $_SESSION["message"] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        ';
    }

    ?>


</div>