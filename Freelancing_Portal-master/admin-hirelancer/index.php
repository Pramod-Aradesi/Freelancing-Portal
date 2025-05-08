<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style>
body {
    background-color: #edfffe !important;
}
</style>

<head>
    <title>HireLancer - AdminPanel</title>
    <?php require_once 'components/links.php'; ?>

</head>

<body ondragstart="return false">



    <section id="login-section">
        <div class="container-fluid py-5 mt-5">

        </div>
    </section>

    <section class="challenges-type">
        <div class="container">
            <div class="card shadow text-center shadow-lg p-3 mb-5 bg-white rounded">
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
                <p class="text-center font-weight-bold">HireLancer Admin Login</p>
                <div class="row">
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <form action="code.php" method="POST">
                            <div class="form-group">
                                <input type="text" id="fightername" name="name" class="form-control"
                                    placeholder="Username or Email Address" required>

                            </div>
                            <div class="form-group">
                                <input type="password" id="pass" name="pass" class="form-control" minlength="8"
                                    maxlength="200" placeholder="Password" required>
                            </div>
                            <button
                                class="btn btn-outline-success btn-lg btn-block text-uppercase font-weight-bold register-btn"
                                name="login" type="submit">
                                Login
                            </button>
                            <br>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="text-center fixed-bottom">
        <hr>
        <p class="copyright"><i class="fa fa-copyright"></i> <?php echo date('Y'); ?>&nbsp;&nbsp;All Rights Reserved to
            <b>HireLancer</b>
        </p>
    </div>



</body>

</html>