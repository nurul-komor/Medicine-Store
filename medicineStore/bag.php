<script src="assets/js/jquery-3.3.1.min.js"></script>
<a href="/medicineStore/cart.php">
    <div class="bag ">
        <span id="cartNum">0</span>
        <i class="fas fa-shopping-cart hvr-icon-grow-rotate"></i>
        <script>
        // $(document).ready(function() {
        $.ajax({
            url: '/medicineStore/front-ajax.php',
            method: "post",
            dataType: "json",
            data: {
                action: "getCartNum"
            },
            success: function(data) {
                $('#cartNum').html(data)
            },
            error: function(request, error) {
                console.log(request);
            }
        });
        // })
        </script>
    </div>
</a>

<style>
.bag {
    font-size: 25px;
    position: relative;
}

.bag span {
    position: absolute;
    top: -10px;
    right: -14px;
    color: #fff;
    background: #e67e22;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 50%;
    font-weight: 700;
    z-index: 101;
}
</style>