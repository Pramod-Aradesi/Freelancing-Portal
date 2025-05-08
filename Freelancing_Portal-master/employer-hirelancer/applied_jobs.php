<?php
include 'security.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HireLancer - Freelancers</title>
    <?php require_once 'components/links.php'; ?>

</head>

<body ondragstart="return false">

    <?php require_once 'components/navbar.php'; ?>



    <section id="admin-top-title">
        <div class="container-fluid text-center px-5">
            <p class="programming-heading"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Freelancers </p>

            <div class="mt-2 mb-4">
                <input id="search" type="text" class="form-control col-md-4" placeholder="Search Freelancers">

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
                            $id = $_SESSION['employers_id'];
                            $query = "SELECT * FROM job_applications";
                            $query_run = mysqli_query($connection,$query);

                            ?>

                <table class="table table-striped table-hover table-bordered" id="datatable" width="100%"
                    cellspacing="0">
                    <thead style="background-color:#618CC2 !important;">
                        <tr>
                            <th>ID</th>
                            <th>FREELANCER NAME</th>
                            <th>FREELANCER EMAIL</th>
                            <th>FREELANCER PHONE</th>
                            <th>APPLIED ON</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="searchdata">

                        <?php

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                while($row = mysqli_fetch_assoc($query_run))
                                {
                                    $freelancer_id = $row['freelancer_id'];
                                    $query1 = "SELECT * FROM freelancers WHERE id = $freelancer_id";
                                    $query_run1 = mysqli_query($connection,$query1);
                                    $row1 = mysqli_fetch_assoc($query_run1);
                                ?>

                        <tr>
                            <td><?php echo $row1['id']; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row1['email']; ?></td>
                            <td><?php echo $row1['phone']; ?></td>
                            <td><?php echo $row['applied_on']; ?></td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="text-center"><button type="submit" name="applied_freelancer_dismiss"
                                            class="btn btn-danger">DISMISS</button></div>
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