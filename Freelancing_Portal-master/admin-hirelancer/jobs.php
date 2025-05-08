<?php
include 'security.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HireLancer - Jobs</title>
    <?php require_once 'components/links.php'; ?>

</head>

<body ondragstart="return false">

    <?php require_once 'components/navbar.php'; ?>



    <section id="admin-top-title">
        <div class="container-fluid text-center px-5">
            <p class="programming-heading"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Jobs</p>

            <div class="mt-2 mb-4">
                <input id="search" type="text" class="form-control col-md-4" placeholder="Search Jobs">

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

                            $query = "SELECT * FROM jobs";
                            $query_run = mysqli_query($connection,$query);

                            ?>

                <table class="table table-striped table-hover table-bordered" id="datatable" width="100%"
                    cellspacing="0">
                    <thead style="background-color:#618CC2 !important;">
                        <tr>
                            <th>ID</th>
                            <th>JOB TITLE</th>
                            <th>JOB DESCRIPTION</th>
                            <th>POSTED BY</th>
                            <th>BID</th>
                            <th>LOCATION</th>
                            <th>CREATED ON</th>
                            <th class="text-center">DELETE</th>
                        </tr>
                    </thead>
                    <tbody id="searchdata">

                        <?php

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                while($row = mysqli_fetch_assoc($query_run))
                                {

                                ?>

                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <?php
                                    $employer_id = $row['employer_id'];
                                    $query1 = "SELECT * FROM employers WHERE id = '$employer_id'";
                                    $query_run1 = mysqli_query($connection,$query1);
                                    $count1 = mysqli_num_rows($query_run1);
                                    $row1 = mysqli_fetch_assoc($query_run1);
                                    echo $row1['name'];
                                ?>
                            </td>
                            <td><?php echo $row['bid']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['created_date']; ?></td>
                            <td>
                                <form action="<?php echo $base_url; ?>/code.php" method="POST">
                                    <input type="hidden" name="job_id" value="<?php echo $row['id']; ?>" /> <button
                                        type="submit" name="job_delete" class="btn btn-danger text-light "><i
                                            class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                </form>

                            </td>
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