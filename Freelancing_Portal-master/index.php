<?php include 'components/navbar.php'; ?>

<div class="header " id="header" style="background-image:url('./assets/img/background.jpg')">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <section id="progress">
            <div class="container  min-height-100">
                <h3 class="text-light text-center font-weight-bold mt-5 mb-5">Find & Hire Expert Freelancers</h3>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="card shadow text-center shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="carousel-inner">
                            <div class="carousel-item text-center active">

                                <div class="container text-center">
                                    <div>
                                        <blockquote class="blockquote text-center pt-3">
                                            <h3 class="mb-0">" Great site to start your career and explore your
                                                knowledge "
                                            </h3>

                                        </blockquote>
                                    </div>
                                </div>

                            </div>

                            <div class="carousel-item text-center">
                                <div class="container">
                                    <div>
                                        <blockquote class="blockquote text-center pt-3">
                                            <h3 class="mb-0">" Best place to find new jobs and talented freelancers "
                                            </h3>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item text-center">
                                <div class="container">
                                    <div>
                                        <blockquote class="blockquote text-center pt-3">
                                            <h3 class="mb-0">" Work on your own skill set "
                                            </h3>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>






<div class="container-fluid">

    <div class="card shadow text-center shadow-lg px-2 py-3 my-5 mx-2 bg-white rounded ">
        <div class="carousel-inner">
            <div class="carousel-item active">

                <div class="row">
                    <div class="col-md-3 my-auto">
                        <img src="assets/img/logo.png" width="160" height="50" style="border-radius:2x0%">
                    </div>
                    <div class="col-md-9 my-auto">
                        <blockquote class="blockquote text-center">
                            <h5 class="">
                                <br>
                                <strong>Hirelancer </strong> is a platform combines the both
                                talented freelancers and employers.Check it and Grab it as like as your requirements
                            </h5>
                        </blockquote>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<section id="about-us">
    <div class="container">
        <h3 class="title text-center font-weight-bold text-dark">What's great about HireLancer</h3>

        <div class="row d-flex flex-sm-row-reverse">

            <div class="col-md-4 text-center my-auto desktop-only">
                <i class="fa fa-bolt my-auto" aria-hidden="true"
                    style="font-size:250px!important;color:#000!important"></i>
            </div>

            <div class="col-md-6 about-us m-auto">
                <ul style="list-style: none;" class="text-justify">

                    <li><i class="fa fa-check" aria-hidden="true"></i> <b>Find Portfolios</b>
                        Find professionals you can trust by browsing their previous work and reading their profile
                        reviews.
                    </li>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i> <b>Bidding</b>
                        Find professionals you can trust by browsing their previous work and reading their profile
                        reviews.
                    </li>
                    </li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> <b>Quality Work</b>
                        Hirelancer provides always good quality of service in all technical domains
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>



<?php include 'components/footer.php'; ?>

<script>
$('.carousel').carousel({
    interval: 4000
})
</script>