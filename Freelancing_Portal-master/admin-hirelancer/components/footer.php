<?php
$base_url = "http://localhost/hirelancer/admin-hirelancer/";
?>



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



<script>
function navFunction(x) {
    x.classList.toggle("change");
}
</script>