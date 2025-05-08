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
                            $query = "SELECT * FROM hire_applications WHERE employer_id = $id ORDER BY hired_on DESC";
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
                            <th>HIRED ON</th>
                            <th colspan=3>ACTIONS</th>
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
                            <td><?php echo $row['hired_on']; ?></td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="employer_id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="freelancer_id" value="<?php echo $freelancer_id; ?>">
                                    <div class="text-center"><button type="submit" name="freelancer_dismiss"
                                            class="btn btn-danger">DISMISS</button></div>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <div class="d-flex">
                                        <div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="rating" required>
                                            </div>
                                            <input type="hidden" name="employer_id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="freelancer_id"
                                                value="<?php echo $freelancer_id; ?>">
                                        </div>
                                        <div class="text-center"><button type="submit" name="freelancer_rating"
                                                class="btn btn-primary">Give Rating</button></div>
                                    </div>
                                </form>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Pay
                                </button>
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment For Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="assets/img/payment.gif" class="img-fluid"><br>
                    <h5>Payment of Rs.5000 For Work Duration of 20 hrs Successful</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <?php require_once 'components/footer.php'; ?>