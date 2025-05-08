<?php
$base_url = "http://localhost/hirelancer/employer-hirelancer/";
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





<!-- update Job script -->
<script>
$(document).ready(function() {

    $('.update_job').on('click', function() {
        $('#update_job').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#update_jobid').val(data[0]);
        $('#title').val(data[1]);
        $('#description').val(data[2]);
        $('#skills').val(data[3]);
        $('#duration').val(data[4]);
        $('#bid').val(data[5]);
        $('#location').val(data[6]);
    });
});
</script>







<script>
function navFunction(x) {
    x.classList.toggle("change");
}
</script>