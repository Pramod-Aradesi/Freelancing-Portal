<?php
include 'database.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HireLancer - Jobs</title>

</head>

<body ondragstart="return false">

    <?php require_once 'components/navbar.php'; ?>


    <br><br>
    <section id="admin-top-title">
        <div class="container-fluid text-center px-5">
            <div class="mt-2 mb-4">
                <input id="search" type="text" class="form-control col-md-4" placeholder="Search Applied Jobs">

            </div>

            <?php

if(isset($_SESSION['success']) && $_SESSION['success']!='')
{
    echo'<div class="alert alert-primary text-center font-weight-bold" role="alert">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['status']) && $_SESSION['status']!='')
{
    echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status'].'</div>';
    unset($_SESSION['status']);
}

?>


            <div class="table-responsive">

                <?php
                            $id = $_SESSION['id'];       
                            $query = "SELECT * FROM job_applications WHERE freelancer_id = $id ORDER BY applied_on DESC";
                            $query_run = mysqli_query($connection,$query);

                            ?>

                <table class="table table-striped table-hover table-bordered" id="datatable" width="100%"
                    cellspacing="0">
                    <thead style="background-color:#618CC2 !important;">
                        <tr>
                            <th>JOB ID</th>
                            <th>JOB TITLE</th>
                            <th>JOB DESCRIPTION</th>
                            <th>BID</th>
                            <th>LOCATION</th>
                            <th>APPLIED ON</th>
                        </tr>
                    </thead>
                    <tbody id="searchdata">

                        <?php

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                while($row = mysqli_fetch_assoc($query_run))
                                {
                                    $job_id = $row['job_id'];
                                    $query1 = "SELECT * FROM jobs WHERE id = $job_id";
                                    $query_run1 = mysqli_query($connection,$query1);
                                    $row1 = mysqli_fetch_assoc($query_run1);
                                ?>

                        <tr>
                            <td><?php echo $job_id; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row1['description']; ?></td>
                            <td><?php echo $row1['bid']; ?></td>
                            <td><?php echo $row1['location']; ?></td>
                            <td><?php echo $row['applied_on']; ?></td>
                        </tr>
                        <?php
                            }
                            }
                            else
                            {
                            echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">NO RECORD FOUND</div>';
                            }

                            ?>

                    </tbody>
                </table>
            </div>




        </div>
    </section>



    <?php require_once 'components/footer.php'; ?>