<?php 
    require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<style>
body {
    background-color: #edfffe !important;
}
</style>

<head>
    <title>HireLancer - Profile</title>
    <?php require_once 'components/navbar.php'; ?>

</head>

<body ondragstart="return false">



    <section id="login-section">
        <div class="container-fluid py-5 mt-5">

        </div>
    </section>

    <section class="challenges-type">
        <?php

                if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                    echo '<div class="alert alert-primary text-center font-weight-bold" role="alert">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }

                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">' . $_SESSION['status'] . '</div>';
                    unset($_SESSION['status']);
                }

                ?>
        <div class="container-fluid">
            <?php 
                $id = $_SESSION['id'];
                $query = "SELECT * FROM freelancers WHERE id = $id";
                $query_run = mysqli_query($connection,$query);
                $count = mysqli_num_rows($query_run);
                $row = mysqli_fetch_assoc($query_run);
            
            ?>
            <div>
                <div class="card shadow text-left shadow-lg p-3 mb-5 bg-white rounded">
                    <p class="text-center font-weight-bold">Profile</p>
                    <div class="col-md-12 mx-auto">
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold py-0 my-0">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name"
                                        required value="<?php echo $row['name'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold py-0 my-0">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                                        required value="<?php echo $row['email'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold py-0 my-0">Phone</label>
                                    <input type="number" name="phone" class="form-control"
                                        placeholder="Enter Your Phone" required value="<?php echo $row['phone'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold py-0 my-0">Job</label>
                                    <input type="text" name="job" class="form-control"
                                        placeholder="Enter Your Job Designation" required
                                        value="<?php echo $row['job'] ?>">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold py-0 my-0">Resume Link</label>
                                    <input type="link" name="drive_link" class="form-control"
                                        placeholder="Enter Your Resume Link" required
                                        value="<?php echo $row['drive_link'] ?>">
                                </div>
                                <div class="form-group col-md-6 mt-4">

                                    <a href="<?php echo $row['drive_link'] ?>" target="_blank"
                                        class="btn btn-primary">View Resume</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold py-0 my-0">Skills</label>
                                    <textarea type="text" name="skills" class="form-control"
                                        placeholder="Enter Your Skills" required><?php echo $row['skills'] ?></textarea>
                                </div>
                            </div>

                            <button
                                class="btn btn-outline-success btn-lg btn-block text-uppercase font-weight-bold register-btn"
                                name="update_profile" type="submit">
                                Update Profile
                            </button>
                            <br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 
    <div class="text-center fixed-bottom">
        <hr>
        <p class="copyright"><i class="fa fa-copyright"></i> <?php echo date('Y'); ?>&nbsp;&nbsp;All Rights Reserved to
            <b>HireLancer</b>
        </p>
    </div> -->



</body>

</html>