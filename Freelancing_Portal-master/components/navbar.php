<?php
$base_url = "http://localhost/hirelancer";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>HireLancer - Get Hired or Find Employees Quickly</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />

    <!-- Slider Stylesheet Link -->
    <link rel="stylesheet" href="lightslider.css">
    <!-- External CSS Stylesheet Link -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- JQuery CDN Link -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Slider JS Link -->
    <script src="lightslider.js"></script>

    <!-- Bootstrap 4 Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
        integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>

<body ondragstart="return false">
    <section id="navbar" class="card">

        <nav class="navbar my-navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand  float-left" href=" <?php echo $base_url ?>/index.php ">

                <img src="<?php echo $base_url ?>/assets/img/logo.png" class="ml-5 img-fluid" width="150" height="150"
                    alt="SimulEduco" />
            </a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                onclick="navFunction(this)">
                <span data-icon="fa-solid:bars" data-inline="false">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "index.php") ? "nav-active" : ""; ?>">
                        <a class="nav-link  float-left" href=" <?php echo $base_url ?>/index.php">Home</a>
                    </li>
                    <?php if(!isset($_SESSION['type']) ||(isset($_SESSION['type']) && $_SESSION['type'] == 'freelancer')) { ?>
                    <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "jobs.php") ? "nav-active" : ""; ?>">
                        <a class="nav-link" href=" <?php echo $base_url ?>/jobs.php">Find jobs</a>
                    </li>


                    <?php } ?>


                    <?php if((isset($_SESSION['type']) && $_SESSION['type'] == 'freelancer')) { ?>

                    <li
                        class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "applied-jobs.php") ? "nav-active" : ""; ?>">
                        <a class="nav-link" href=" <?php echo $base_url ?>/applied-jobs.php">Applied jobs</a>
                    </li>
                    <?php } ?>

                    <?php if(!isset($_SESSION['type']) || (isset($_SESSION['type']) && $_SESSION['type'] == 'employer')) { ?>

                    <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "hiring.php") ? "nav-active" : ""; ?>">
                        <a class="nav-link" href=" <?php echo $base_url ?>/hiring.php">Hire Freelancer</a>
                    </li>
                    <?php } ?>

                    <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "aboutus.php") ? "nav-active" : ""; ?>">
                        <a class="nav-link" href=" <?php echo $base_url ?>/aboutus.php">About Us</a>
                    </li>
                    <?php if(!((isset($_SESSION['id']) && isset($_SESSION['name'])))) { ?>
                    <li>
                        <a href="<?php echo $base_url; ?>/login.php"
                            class="login-btn px-3 mr-3 font-weight-bold btn btn-outline-dark"><i class="fa fa-user-o"
                                aria-hidden="true"></i> LOGIN</a>
                    </li>
                    <li>
                        <a href="<?php echo $base_url; ?>/join.php"
                            class="login-btn font-weight-bold px-3 btn btn-outline-dark"><i class="fa fa-sign-in"
                                aria-hidden="true"></i> JOIN</a>
                    </li>
                    <?php } ?>
                    <?php if((isset($_SESSION['id']) && isset($_SESSION['name']))) { ?>
                    <li>
                        <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'freelancer') { ?>
                        <a href="profile.php" class="px-3 nav-link"><i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo $_SESSION['name'];?></a>
                        <?php } ?>
                    </li>
                    <li>
                        <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'employer') { ?>
                        <a href="#" class="px-3 nav-link"><i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo $_SESSION['name'];?></a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <form action="<?php echo $base_url;?>/code.php" method="POST">
                            <button type="submit" name="logout"
                                class="login-btn px-3  btn btn-outline-dark font-weight-bold "
                                style="cursor:pointer;"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                LOGOUT</button></a>
                        </form>
                    </li>
                    <?php } ?>
                </ul>

            </div>
        </nav>