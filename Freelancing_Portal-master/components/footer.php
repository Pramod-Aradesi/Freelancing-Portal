<?php
$base_url = "http://localhost/hirelancer";
?>

<section id="social-media">
    <div class="container text-center">
        <p>CONNECT WITH US ON SOCIAL MEDIA</p>
        <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=100090304646163" class="mr-4"><img
                    src="<?php echo $base_url ?>/assets/img/facebook.png" alt="facebook"></a>
            <a href="https://www.instagram.com/hirelancer_platform/" class="mr-4"><img
                    src="<?php echo $base_url ?>/assets/img/instagram.png" alt="instagram"></a>
            <a href="https://twitter.com/Hirelancer1" class="mr-4"><img
                    src="<?php echo $base_url ?>/assets/img/twitter.png" alt="twitter"></a>
            <a href="https://www.linkedin.com/in/hirelancer-platform-093107268/" class="mr-4"><img
                    src="<?php echo $base_url ?>/assets/img/linkedin.png" alt="linkedin"></a>
        </div>
    </div>
</section>


<section id="footer" class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-box mt-2">
                <p class="text"><b>&nbsp;&nbsp;&nbsp;CONTACT US</b></p>
                <p><a target="_blank" style='color:#fff!important;text-decoration:none!important'
                        href="https://goo.gl/maps/YFKCaA4f9okNgPfu7"><i class="fa fa-map-marker"></i>HireLancer
                        Kurnool</a></p>
                <p><a target="_blank" style='color:#fff!important;text-decoration:none!important'
                        href="tel:+91 8688387003"><i class="fa fa-phone"></i>+91 8688387003</a></p>
                <p><a target="_blank" style='color:#fff!important;text-decoration:none!important'
                        href="mailto: hirelancer@gmail.com"><i class="fa fa-envelope-o"></i>hirelancer@gmail.com</a></p>
            </div>
            <div class="col-md-4 footer-box">
                <p><b><i class="fa fa-link"></i> Quick Links</b></p>
                <p><a href="<?php echo $base_url ?>/jobs.php" style="text-decoration:none;color:#fff;">Jobs</a>
                </p>
                <p><a href="<?php echo $base_url ?>/hiring.php" style="text-decoration:none;color:#fff;">Freelancers</a>
                </p>
                <p><a href="<?php echo $base_url ?>/aboutus.php" style="text-decoration:none;color:#fff;">About
                        Us</a></p>

            </div>
            <div class="col-md-4 footer-box">
                <div class="container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3839.568626067329!2d78.05515291003064!3d15.773943306667636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bb5dc53d50b2e4d%3A0x4bb4d8f57bcaa3e3!2sG%20Pulla%20Reddy%20Engineering%20College!5e0!3m2!1sen!2sin!4v1678035464013!5m2!1sen!2sin"
                        width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
        <hr>
        <p class="copyright"><i class="fa fa-copyright"></i> <?php echo date('Y'); ?>&nbsp;&nbsp;All Rights Reserved to
            <b>HireLancer</b>
        </p>
    </div>

</section>



<script>
function navFunction(x) {
    x.classList.toggle("change");
}
</script>






<script>
$(document).ready(function() {
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#searchdata tr").filter(function() {
            $(this).toggle($(this).text()
                .toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>


</body>