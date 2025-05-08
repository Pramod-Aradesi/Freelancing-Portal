<?php 
    include 'components/navbar.php'; 
    include 'components/database.php';
?>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;500;700;900&display=swap");

:root {
    --div-price-height: 60px;
}

body {
    margin: 0;
}

/* CARD SECTION */
#card-section {
    width: 100%;
    /* min-height: 100vh;
    */
    display: flex;
    align-items: center;
    justify-content: center;
}

#card-section * {
    margin: 0;
    padding: 0;
}

#card-section .card {
    max-width: 330px;
    width: 90%;
    border-radius: 15px;
    text-align: center;
    font-family: "Roboto Slab", serif;
    overflow: hidden;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px,
        rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
}

#card-section .card .card-part {
    position: relative;
}

#card-section .card .card-top,
#card-section .card .card-bottom {
    transition: all 0.4s ease-in;
    z-index: 10;
}

#card-section .card .card-top::before,
#card-section .card .card-bottom::before {
    content: "";
    position: absolute;
    border-style: solid;
    width: 100%;
    left: 0;
    box-sizing: border-box;
}

/* CARD TOP */
#card-section .card .card-top {
    background-color: #0f1012;
    border-radius: 15px 15px 0 0;
    padding: 2.5rem 1.5rem 0 1.3rem;
}

#card-section .card:hover .card-top {
    transform: translateY(calc(var(--div-price-height) * -1));
}

#card-section .card .card-top::before {
    border-color: transparent transparent transparent #0f1012;
    border-top-width: 0;
    border-right-width: 0;
    border-bottom-width: calc(var(--div-price-height));
    border-left-width: 330px;
    bottom: calc(var(--div-price-height) * -1);
}

#card-section .card .card-top .card-icon {
    font-size: 70px;
    color: #fff;
    height: 70px;
    width: 70px;
    display: inline-block;
    line-height: 50px;
    border-radius: 50%;
    background-color: #63aaa4;
    margin-bottom: 15px;
}

#card-section .card .card-top .card-title {
    font-size: 32px;
    color: #ccc;
}

/* CARD CENTER */
#card-section .card .card-center {
    height: var(--div-price-height);
    line-height: var(--div-price-height);
}

#card-section .card .card-center .price {
    font-size: 60px;
}

/* CARD BOTTOM */
#card-section .card .card-bottom {
    padding: 0 1.3rem 2.5rem 1.3rem;
    background-color: #2a2b2f;
    border-radius: 0 0 15px 15px;
}

#card-section .card:hover .card-bottom {
    transform: translateY(var(--div-price-height));
}

#card-section .card .card-bottom::before {
    border-color: transparent #2a2b2f transparent transparent;
    border-top-width: calc(var(--div-price-height) + 1px);
    border-right-width: 330px;
    border-bottom-width: 0;
    border-left-width: 0;
    top: calc(var(--div-price-height) * -1 - 1px);
}

#card-section .card .card-bottom .list-options {
    list-style: none;
}

#card-section .card .card-bottom .list-options li {
    font-size: 18px;
    color: #7a7b7d;
}

#card-section .card .card-bottom .list-options li:not(:last-child) {
    margin-bottom: 16px;
}

#card-section .card .card-bottom .btn-signup {
    margin-top: 35px;
    width: 85%;
    max-width: 190px;
    padding: 0.8rem 1rem;
    border-radius: 50px;
    border: none;
    font-size: 16px;
    font-family: "Roboto Slab", serif;
    background-color: #63aaa4;
    color: #fff;
    cursor: pointer;
    position: relative;
    z-index: 15;
    transition: all 0.4s ease-in;
}

#card-section .card:hover .card-bottom .btn-signup {
    transform: translateY(calc(var(--div-price-height) * -1));
}
</style>
<div>
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
</div>
<div class="row container-fluid mx-0 px-0">

    <?php

            $query = "SELECT * FROM jobs ORDER BY bid DESC";
            $query_run = mysqli_query($connection,$query);


            if(mysqli_num_rows($query_run) > 0)
            {
            while($row = mysqli_fetch_assoc($query_run))
            {

            ?>
    <div class="card-section col-md-4 my-4 px-0" id="card-section">
        <div class="card">
            <div class="card-part card-top">
                <span class="card-icon">&infin;</span>
                <h2 class="card-title"><?php echo $row['name']; ?></h2>
            </div>
            <div class="card-part card-center">
                <span class="sign">₹</span>
                <span class="price"><?php echo $row['bid']; ?></span>
                <span class="time">/hour</span>
            </div>
            <div class="card-part card-bottom">
                <ul class="list-options">
                    <li><?php echo $row['description']; ?></li>
                </ul>
                <ul class="list-options">
                    <li><b class="text-light">Duration</b> : <?php echo $row['duration']; ?></li>
                </ul>
                <ul class="list-options">
                    <li><b class="text-light">Skills Required</b> : <?php echo $row['skills']; ?></li>
                </ul>
                <form action="<?php echo $base_url;?>/code.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="freelancer_apply" class="btn-signup" style="cursor:pointer;">
                        Apply Now</button></a>
                </form>
            </div>
        </div>
    </div>

    <?php
        }
        }
        else
        {
        echo '<div class="alert alert-danger text-center font-weight-bold" role="alert">NO RECORD FOUND</div>';
        }

        ?>


</div>


<?php include 'components/footer.php'; ?>

<script>
$('.carousel').carousel({
    interval: 4000
})

document.getElementsByTagName("h1")[0].style.fontSize = "6vw";
</script>