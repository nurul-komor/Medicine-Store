$(document).ready(function () {
    // carousel 
    function carousel() {

        $(".owl-carousel").owlCarousel({
            autoWidth: false,
            loop: false,
            center: false,
            items: 5,
            loop: false,
            margin: 10,
            autoplay: false,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,

                },
                480: {
                    items: 2,

                },
                768: {
                    items: 5,

                }
            }
        });
    }
    carousel();
    // get single product 
    function getProduct(singleproduct) {
        var product = `<a href="products/?spm=${singleproduct.productId}">
            <div class="item">
                            <div class="item-bg" style="background:url('uploads/${singleproduct.product_image}');background-size:cover;background-position:center center">
                            </div>
                            <div class="item-text p-3">
                                <div class="d-flex">
                                    <div>
                                        <p>${singleproduct.product_name}</p>
                                        <p class="font-weight-bold pt-1">${singleproduct.new_price}/-</p>
                                    </div>
                                    <div class="rating-icon p-1">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>`;
        return product;
    }
    function getCategoryRow(singleCategory) {
        var categoryCarousel = `
                                <div class="singleCategory mb-3">
                                    <div class="products-title text-center py-3 mb-3">
                                        <h4 class="font-weight-bold text-light">${singleCategory.category}</h4>
                                    </div>
                                    <div class="owl-carousel cat${singleCategory.id}" style="z-index:0"></div>
                                </div>`;
        return categoryCarousel;
    }
    function getAllRows() {
        $.ajax({
            url: '/medicineStore/dashboard/category-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllRows" },
            success: function (data) {
                // console.log(data);
                var categories = "";
                $.each(data.allCategories, function (index, singleCategory) {
                    if (singleCategory.status == '1') {
                        categories += getCategoryRow(singleCategory)
                    }
                });
                carousel();
                $("#all-products").html(categories);
                getAllproduct();
            }
        });
    }

    // get all products 

    function getAllproduct() {
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllproduct" },
            success: function (data) {
                // console.log(data);
                $.each(data.allproducts, function (index, singleproduct) {
                    if (singleproduct.status == '1') {
                        if ((singleproduct.items - singleproduct.sold_out) > 0) {
                            var product = getProduct(singleproduct);
                            $(`.cat${singleproduct.cat_id}`).append(product);
                        }
                    }

                });
                carousel();
                // alert("ok")
            },
            error: function (request, error) {
                // alert("wrong")
            }
        });
    }
    getAllRows();
    // $(document).ready(function () {
    // $(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        autoWidth: false,
        loop: false,
        center: false,
        items: 5,
        loop: false,
        margin: 10,
        autoplay: false,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,

            },
            480: {
                items: 2,

            },
            768: {
                items: 5,

            }
        }
    });
    // })
    // });
    $(document).on('submit', '#createSession', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/medicineStore/front-ajax.php',
            method: "post",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {
            },
            success: function (response) {
                // console.log(response);
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        // setInterval(, 200);
                        setTimeout(function () {
                            location.reload(true)
                        }, 1000);
                    }

                })
                Toast.fire({
                    icon: 'success',
                    title: 'Added to cart'
                })
                // 

            },
            error: function (request, error) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Can't add this number of items!",
                })
            }
        });
    })
})
