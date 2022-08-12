$(document).ready(function () {

    function getOrders(row, index, paymentStatus, status) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.username}</td>
                        <td >${row.phone}</td>
                        <td>${row.products}</td>        
                        <td>${row.total}</td>        
                        <td >${row.address}</td>
                        <td>${paymentStatus}</td>        
                        <td>${status}</td> 
                        <td>
                        <button type="submit" class="acceptBtn btn btn-primary mb-3" data-id="${row.id}" >Accept</button>
                        <br>
                        <button type="submit"  class="rejectBtn btn btn-danger Confirm text-light" data-id="${row.id}">Reject</button>
                        </td>       
                        </tr>`;
        return singleData;
    }
    function sender(row, index) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.username}</td>       
                        <td>${row.total}tk</td>               
                        </tr>`;
        return singleData;
    }
    function getAllCustomer() {
        $.ajax({
            url: '/medicineStore/dashboard/order-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllOrders" },
            success: function (data) {
                console.log(data);
                var orderList = "";
                var senderList = "";
                var id = 1;
                var num = 1;
                $.each(data.allOrders, function (index, singleOrders) {
                    if (singleOrders.status == '1') {
                        var status = "<p class='bg-success d-inline-block p-1 text-light rounded'>Accepted</p>";
                    }
                    else if (singleOrders.status == '0') {
                        var status = "<p class='bg-warning d-inline-block p-1 text-black rounded'>Rejected</p>";
                    }
                    else {
                        var status = "";
                    }
                    if (singleOrders.payment_status == '1') {
                        var paymentStatus = "<p class='bg-success d-inline-block p-1 text-light rounded'>Paid</p>";
                    }
                    else {
                        var paymentStatus = "<p class='bg-warning d-inline-block p-1 text-black rounded'>Pending</p>";
                    }
                    if (singleOrders.products != "") {
                        orderList += getOrders(singleOrders, num, paymentStatus, status);
                        senderList += sender(singleOrders, num);
                        num++;
                    }
                    id++;
                });
                $("#ordersTable tbody").html(orderList);
                $("#transactionTable tbody").html(senderList);
            },
            error: function (request, error) {
                console.log(request)
            }
        });
    }
    getAllCustomer();
    $(document).on("click", ".acceptBtn", function () {
        var id = $(this).data("id");
        $.ajax({
            url: '/medicineStore/dashboard/order-ajax.php',
            method: 'post',
            dataType: 'json',
            data: { action: "acceptOrder", edit_id: id },
            success: function (data) {

                console.log(data)
            },
            error: function (request, error) {
                console.log(request)
                getAllCustomer();
            }
        })
    })
    $(document).on("click", ".rejectBtn", function () {
        var id = $(this).data("id");
        // alert("ok")
        $.ajax({
            url: '/medicineStore/dashboard/order-ajax.php',
            method: 'post',
            dataType: 'json',
            data: { action: "rejectOrder", edit_id: id },
            success: function (data) {

                console.log(data)
            },
            error: function (request, error) {
                console.log(request)
                getAllCustomer()
            }
        })
    })
})