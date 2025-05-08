<?php

include 'security.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HireLancer - Employer Dashboard</title>
    <?php require_once 'components/links.php'; ?>

    <style>

    </style>
</head>

<body ondragstart="return false">

    <?php require_once 'components/navbar.php'; ?>



    <section id="admin-top-title">
        <div class="container-fluid text-center px-5">
            <p class="programming-heading"><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Dashboard</p>
            <div class="row">
                <div class="col-md-4">
                    <a href="jobs.php" style="text-decoration:none!important">
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                            <p class="text-primary font-weight-bold">Total Jobs</p>
                            <?php
                        $employer_id = $_SESSION['employers_id'];
                        $query = "SELECT * FROM jobs WHERE employer_id = $employer_id";
                        $query_run = mysqli_query($connection,$query);
                        $count = mysqli_num_rows($query_run);
   
                        echo '<p style="font-size:25px;">'.$count.'</p>';

                    ?>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="freelancers.php" style="text-decoration:none!important">
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                            <p class="text-danger font-weight-bold">Total Hired Freelancers</p>
                            <?php

						$query = "SELECT * FROM hire_applications WHERE employer_id = $employer_id";
                        $query_run = mysqli_query($connection,$query);
                        $count = mysqli_num_rows($query_run);
   
                        echo '<p style="font-size:25px;">'.$count.'</p>';
                            ?>
                        </div>
                </div>
                </a>


            </div>

        </div>
    </section>


    <hr>



    <?php require_once 'components/footer.php'; ?>