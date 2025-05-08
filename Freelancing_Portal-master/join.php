<!DOCTYPE html>
<html lang="en">
<style>
body {
    background-color: #edfffe !important;
}
</style>

<head>
    <title>HireLancer - Join</title>
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
        <div class="container-fluid row">

            <div class="col-md-6">
                <div class="card shadow text-center shadow-lg p-3 mb-5 bg-white rounded">

                    <p class="text-center font-weight-bold">FreeLancer SignUp</p>
                    <div class="row">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control"
                                        placeholder="Enter Your Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" minlength="8"
                                        maxlength="200" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="job" class="form-control"
                                        placeholder="Enter Your Job Designation" required>
                                </div>
                                <div class="form-group">
                                    <input type="link" name="drive_link" class="form-control"
                                        placeholder="Enter Your Resume Link" required>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" name="skills" class="form-control"
                                        placeholder="Enter Your Skills" required></textarea>
                                </div>
                                <p><input type="checkbox" required>Yes,I understand and agree to the <a href="terms.html">Terms and Condition</a></p>
                                <button
                                    class="btn btn-outline-success btn-lg btn-block text-uppercase font-weight-bold register-btn"
                                    name="freelancer_signup" type="submit">
                                    SignUp as FreeLancer
                                </button>
                                <br>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow text-center shadow-lg p-3 mb-5 bg-white rounded">

                    <p class="text-center font-weight-bold">Employer SignUp</p>
                    <div class="row">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control"
                                        placeholder="Enter Your Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" minlength="8"
                                        maxlength="200" placeholder="Password" required>
                                </div>
                                <p><input type="checkbox" required>Yes,I understand and agree to the <a href="terms.html">Terms and Condition</a></p>
                                <button
                                    class="btn btn-outline-success btn-lg btn-block text-uppercase font-weight-bold register-btn"
                                    name="employer_signup" type="submit">
                                    SignUp as Employer
                                </button>
                                <br>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="text-center">
        <hr>
        <p class="copyright"><i class="fa fa-copyright"></i> <?php echo date('Y'); ?>&nbsp;&nbsp;All Rights Reserved to
            <b>HireLancer</b>
        </p>
    </div>



</body>

</html>