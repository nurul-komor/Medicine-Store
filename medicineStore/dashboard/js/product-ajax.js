$(document).ready(function () {
    function getproduct(row, index, status) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.product_name}</td>
                        <td style="max-width:120px">${row.product_title}</td>
                        <td scope="row"><img src="../uploads/${row.product_image}" width="130px" height="100px"></td>
                        <td>${row.items - row.sold_out}</td>
                        <td>${row.new_price}</td>
                        <td>${row.old_price}</td>
                        <td>${status}</td>
                           
                        </tr>`;
        return singleData;
    }
    function getAllproduct() {
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllproduct" },
            success: function (data) {
                console.log(data);
                var productList = "";
                var id = 1;
                $.each(data.allproducts, function (index, singleproduct) {
                    if (singleproduct.status == '1') {
                        var status = "<p class='bg-success d-inline-block p-1 text-light rounded'>Active</p>";
                    }
                    else {
                        var status = "<p class='bg-warning d-inline-block p-1 text-black rounded'>Inactive</p>";
                    }
                    productList += getproduct(singleproduct, id, status);
                    id++;
                });
                $("#productsTable tbody").html(productList);
            },
            error: function (request, error) {
                console.log(request)
            }
        });
    }
    $(document).on('submit', '#add-product-form', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: "post",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {


            },
            success: function (response) {
                console.log(response);
                if (response) {
                    $("#add-product-form")[0].reset();
                    /*  Swal.fire(
                         'Good job!',
                         'You clicked the button!',
                         'success'
                     ) */
                    getAllproduct();
                }
            },
            error: function () {
                /* Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                }) */
            }
        });
    });

    // edit modal call
    $(document).on('click', '.editproduct', function (e) {
        e.preventDefault()
        var uid = $(this).data('id');
        var productName = $(this).data('product');
        var productTitle = $(this).data('title');
        var productItems = $(this).data('items');
        var productTitle = $(this).data('title');
        var productnewprice = $(this).data('new-price');
        var productoldprice = $(this).data('old-price');
        var modal = $('#edit-product');
        modal.find('#edit_id').val(uid);
        modal.find('#product-name').val(productName);
        modal.find('#product-title').val(productTitle);
        modal.find('#product-itmes').val(productItems);
        modal.find('#product-price-old').val(productoldprice);
        modal.find('#product-price-new').val(productnewprice);
    })
    // edit topics 
    $('#edit-product-form').on('submit', function (e) {
        e.preventDefault();
        // alert("ok")
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: "post",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (data) {
                console.log(data);
                if (response) {
                    $("#add-product-form")[0].reset();
                    /*  Swal.fire(
                         'Good job!',
                         'Successfully Edited!',
                         'success'
                     ) */
                    $('#edit-product').modal('hide');
                    getAllproduct();
                }
            },
            error: function (request, error) {
                console.log(request);
                console.log(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    });
    // delete topic 
    $(document).on('click', '.deleteproduct', function () {
        // e.preventDefault()
        var uid = $(this).data('id')
        alert(uid);
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "deleteproduct", id: uid, tableName: "products" },

            success: function (data) {
                getAllproduct()
                // swal("Good job !!", "You Successfull Deleted !!", "success");
            }
        });

    })
    // search operation 
    $(document).on('keyup', 'input#search', function () {
        var search = $(this).val();
        if (!(search === '')) {
            $.ajax({
                url: '/bookShelf/dashboard/search.php',
                method: 'post',
                dataType: 'json',
                data: { search_query: search },
                success: function (result) {
                    console.log(result);
                    var searchList = "";
                    var id = 1;
                    $.each(result.searchResult, function (index, data) {
                        searchList += getTopicsRow(data, id);
                        id++;
                    });
                    $("#topicTable tbody").html(searchList);
                },
                error: function () {
                    webToast.Danger({
                        status: 'Sorry !',
                        align: 'topright',
                        message: 'Not found',
                        delay: 3000 /* 5 second will stay */
                    })
                }
            })
        }
        else {
            getAllproduct()
        }
    })
    getAllproduct()
    function getOrder(row, index) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.username}</td>
                        <td>${row.phone}</td>
                        <td style="width:200px;text-align:justify;break:break-all">${row.address}</td>
                        <td><textarea class="form-control" disabled style="resize:none" cols="20" rows="5">${row.products} </textarea>
                        </td>
                        <td>${row.price}</td>
                        <td>${row.status}</td>
                        <td>
                        <button type="submit" class="me-3 btn" title="update status" id="updateStatus" data-id="${row.id}"><i style="font-size: 20px;color: white;" class="text-success fa-solid fa-circle-check"></i></button>
                        </td>
                        </tr>`;
        return singleData;
    }

    function getAllOrders() {
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllOrder" },
            success: function (data) {
                console.log(data);
                var orderList = "";
                var id = 1;
                $.each(data.orderLists, function (index, singleOrder) {
                    orderList += getOrder(singleOrder, id);
                    id++;
                });
                $("#orderTable tbody").html(orderList);
            },
            error: function (request, error) {
                // console.log(request);
            }
        });
    }
    getAllOrders()

    function getCustomer(row, index) {
        // alert("ok")
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.username}</td>
                        <td>${row.email}
                        <td>${row.phone}</td>
                        <td style="max-width:120px">${row.address}</td>
                        </tr>`;
        return singleData;
    }
    function getAllCustomer() {
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllCustomers" },
            success: function (data) {
                console.log(data);
                var orderList = "";
                var id = 1;
                $.each(data.customerList, function (index, singleOrder) {
                    orderList += getCustomer(singleOrder, id);
                    id++;
                });
                $("#customers tbody").html(orderList);
            },
            error: function (request, error) {
                // console.log(request);
            }
        });
    }
    getAllCustomer();

    // get cusomters messages 
    function getMessage(row, index) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.name}</td>
                        <td >${row.email}</td>
                        <td>${row.date}</td>
                        <td>${row.people}</td>
                        <td>${row.time}</td>
                        </td>          
                        </tr>`;
        return singleData;
    }
    function getAllMessages() {
        // alert("ok")
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getMessages" },
            success: function (data) {
                console.log(data);
                var messageList = "";
                var id = 1;
                $.each(data.getMessages, function (index, singleMessage) {
                    messageList += getMessage(singleMessage, id);
                    id++;
                });
                $("#messageList tbody").html(messageList);
            }
        });
    }
    getAllMessages();
    $(document).on('click', '#updateStatus', function (e) {
        e.preventDefault()
        var uid = $(this).data('id');
        // alert(uid)
        $.ajax({
            url: '/medicineStore/dashboard/product-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "updateOrderStatus", id: uid },
            success: function (response) {
                console.log(response);
                location.reload();
                if (response) {
                    Swal.fire(
                        'Good job!',
                        'Delivered!',
                        'success'
                    )
                }


            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        })
    })

})
