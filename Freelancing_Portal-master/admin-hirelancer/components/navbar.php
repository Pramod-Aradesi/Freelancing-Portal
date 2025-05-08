<nav class="navbar my-navbar navbar-expand-lg navbar-light">

    <a class="navbar-brand " href=" <?php echo $base_url ?>/dashboard.php ">
        <div class="pt-1 ml-2">
            <img src="<?php echo $base_url ?>/assets/img/logo.png" width="150px" height="45px" alt="HireLancer" />
        </div>

    </a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="navFunction(this)">
        <span data-icon="fa-solid:bars" data-inline="false">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <hr>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "dashboard.php") ? "nav-active" : ""; ?>">
                <a class="nav-link" href=" <?php echo $base_url ?>/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "jobs.php") ? "nav-active" : ""; ?>">
                <a class="nav-link" href=" <?php echo $base_url ?>/jobs.php">Jobs</a>
            </li>

            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "employers.php") ? "nav-active" : ""; ?>">
                <a class="nav-link" href=" <?php echo $base_url ?>/employers.php">Employers</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "freelancers.php") ? "nav-active" : ""; ?>">
                <a class="nav-link" href=" <?php echo $base_url ?>/freelancers.php">Freelancers</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "contact-us.php") ? "nav-active" : ""; ?>">
                <a class="text-capitalize nav-name nav-link text-primary" href="#">| &nbsp;Name : <span
                        class="text-capitalize"><?php echo $_SESSION['admin_name']; ?></span></a>
            </li>
            <li>
                <form action="<?php echo $base_url; ?>/code.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-danger text-light "><i class="fa fa-sign-in"
                            aria-hidden="true"></i> LOGOUT</button>
                </form>
            </li>
        </ul>

    </div>
</nav>