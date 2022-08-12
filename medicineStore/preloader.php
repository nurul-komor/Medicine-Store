<style>
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    z-index: 9999;
    background-color: #FFFFFF;
    background-position: center center;
    background-repeat: no-repeat;
    background-image: url("/medicineStore/assets/images/preloader.gif");
    /* background-size: 120%; */
}
</style>
<!-- preloader Start-->
<div class=" preloader">
</div>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script>
// preloader
$(window).on("load", function() {
    $(".preloader").fadeOut();
    $(".preloader").delay(5000).fadeOut("slow");

});
</script>