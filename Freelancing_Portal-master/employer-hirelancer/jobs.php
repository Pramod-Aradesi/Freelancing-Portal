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
            <div class="text-right mb-4">
                <div>
                    <button type="button" class="btn btn-outline-primary mt-2" data-toggle="modal"
                        data-target="#post-job">
                        POST JOB
                    </button>
                </div>
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
                        $employer_id = $_SESSION['employers_id'];       
                            $query = "SELECT * FROM jobs WHERE employer_id = $employer_id ORDER BY created_date DESC";
                            $query_run = mysqli_query($connection,$query);

                            ?>

                <table class="table table-striped table-hover table-bordered" id="datatable" width="100%"
                    cellspacing="0">
                    <thead style="background-color:#618CC2 !important;">
                        <tr>
                            <th>ID</th>
                            <th>JOB TITLE</th>
                            <th>JOB DESCRIPTION</th>
                            <th>SKILLS</th>
                            <th>DURATION</th>
                            <th>BID</th>
                            <th>LOCATION</th>
                            <th>CREATED ON</th>
                            <th class="text-center">UPDATE</th>
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
                            <td><?php echo $row['skills']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $row['bid']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['created_date']; ?></td>
                            <td class="text-center"><button type="button"
                                    class="btn btn-success update_job">UPDATE</button></td>
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



    <div class="modal fade" id="post-job" tabindex="-1" role="dialog" aria-labelledby="post-jobTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Post New Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="code.php" method="POST" enctype="multipart/form-data">


                        <div class="form-group">
                            <label class="font-weight-bold">JOB TITLE</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Job Title" required>

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JOB DESCRIPTION</label>
                            <textarea type="text" name="description" class="form-control"
                                placeholder="Enter Job Description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">SKILLS REQUIRED</label>
                            <input type="text" name="skills" class="form-control" placeholder="Enter Required Skills"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JOB DURATION</label>
                            <input type="text" name="duration" class="form-control" placeholder="Enter Job Duration"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">BID PER HOUR</label>
                            <input type="text" name="bid" class="form-control" placeholder="Enter Job Bid Per Hour"
                                required>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">LOCATION</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter Job Location"
                                required>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="post_job" class="btn btn-primary">Post
                    </button>
                </div>

                </form>
            </div>
        </div>
    </div>




    <!--Update Job Modal-->
    <div class="modal fade" id="update_job" tabindex="-1" role="dialog" aria-labelledby="post-jobTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="code.php" method="POST" enctype="multipart/form-data">


                        <input type="hidden" name="update_jobid" id="update_jobid">



                        <div class="form-group">
                            <label class="font-weight-bold">JOB TITLE</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter Job Title" required>

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JOB DESCRIPTION</label>
                            <textarea type="text" name="description" id="description" class="form-control"
                                placeholder="Enter Job Description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">SKILLS REQUIRED</label>
                            <input type="text" name="skills" id="skills" class="form-control"
                                placeholder="Enter Required Skills" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JOB DURATION</label>
                            <input type="text" name="duration" id="duration" class="form-control"
                                placeholder="Enter Job Duration" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">BID PER HOUR</label>
                            <input type="text" name="bid" id="bid" class="form-control"
                                placeholder="Enter Job Bid Per Hour" required>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">LOCATION</label>
                            <input type="text" name="location" id="location" class="form-control"
                                placeholder="Enter Job Location" required>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_job" class="btn btn-primary">Update
                        Job</button>
                </div>

                </form>
            </div>
        </div>
    </div>





    <?php require_once 'components/footer.php'; ?>