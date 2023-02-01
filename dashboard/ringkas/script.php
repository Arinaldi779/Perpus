<div class="loader" style="display:none;">
    <div>
        <i class="fa fa-refresh fa-spin h1"></i>
        <!-- <img src="img/.jpg" alt=""> -->
    </div>
</div>
<script src="../js/boostrap.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $(".open-menu").on("click", function() {
        $(".w3-sidebar, #myOverlay").show();
    })
    $(".close-menu,#myOverlay").on("click", function() {
        $(".w3-sidebar, #myOverlay").hide();
    })
    $("table").DataTable();

    $(".dataTables_filter input").on("keyup", delay(function(e) {
        $('.loader').fadeIn('fast');
        setTimeout(() => {
            $('.loader').fadeOut('fast');
        }, 100);
    }, 500));
})

function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
            callback.apply(context, args);
        }, ms || 0);
    };
}
</script>
<script>
$(document).ready(function() {
    $(".pinjam").on("click", function() {
        windows.location.href = "pinjam.buku.php"
    })
})
</script>