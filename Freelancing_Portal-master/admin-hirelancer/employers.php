<?php
include 'security.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HireLancer - Employers</title>
    <?php require_once 'components/links.php'; ?>

</head>

<body ondragstart="return false">

    <?php require_once 'components/navbar.php'; ?>



    <section id="admin-top-title">
        <div class="container-fluid text-center px-5">
            <p class="programming-heading"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Employers </p>

            <div class="mt-2 mb-4">
                <input id="search" type="text" class="form-control col-md-4" placeholder="Search Employers">

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

                            $query = "SELECT * FROM employers";
                            $query_run = mysqli_query($connection,$query);

                            ?>

                <table class="table table-striped table-hover table-bordered" id="datatable" width="100%"
                    cellspacing="0">
                    <thead style="background-color:#618CC2 !important;">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
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
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <?php if( $row['status'] == '1')
                                {
                                    
                                    echo "<p class='text-success font-weight-bold'>ACTIVATED</p>";
                                    echo "</td>";
                                    echo '<td class="text-center"><button type="submit" name="employer_deactivate" class="btn btn-danger">DEACTIVATE</button></td>';
                                }
                                else{
                                    echo "<p class='text-danger font-weight-bold'>NOT YET ACTIVATED / DEACTIVATED </p>";
                                    echo "</td>";
                                    echo'<td class="text-center"><button type="submit" name="employer_activate" class="btn btn-success">ACTIVATE</button></td>';
                                }
                                ?>
                                </form>

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