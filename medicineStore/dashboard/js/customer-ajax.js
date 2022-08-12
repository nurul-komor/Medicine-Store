$(document).ready(function () {
    function getCustomer(row, index, status) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.customer_name}</td>
                        <td >${row.customer_email}</td>
                        <td >${row.phone}</td>
                        <td >${row.address}</td>
                        <td>${status}</td>        
                        </tr>`;
        return singleData;
    }
    function getAllCustomer() {
        $.ajax({
            url: '/medicineStore/dashboard/customer-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllCustomers" },
            success: function (data) {
                console.log(data);
                var customerList = "";
                var id = 1;
                $.each(data.allCustomers, function (index, singleCustomer) {
                    if (singleCustomer.status == '1') {
                        var status = "<p class='bg-success d-inline-block p-1 text-light rounded'>Active</p>";
                    }
                    else {
                        var status = "<p class='bg-warning d-inline-block p-1 text-black rounded'>Inactive</p>";
                    }
                    customerList += getCustomer(singleCustomer, id, status);
                    id++;
                });
                $("#customersTable tbody").html(customerList);
            },
            error: function (request, error) {
                console.log(request)
            }
        });
    }
    getAllCustomer();
})