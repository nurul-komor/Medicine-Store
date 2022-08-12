$(document).ready(function () {
    function getCategoryRow(row, index, status) {
        var singleData = "";
        singleData += `<tr>
                        <td>${index}</td>
                        <td>${row.category}</td>
                        <td>${status}</td>
                        <td><button type="submit" class="editCategory btn btn-primary" title=" Edit" data-toggle="modal" data-target="#edit-category-modal" data-id="${row.id}"  data-category="${row.category}" data-status="${row.status}"><i style="font-size: 16px;color: white;" class="fas fa-pencil-alt" aria-hidden="true"></i></button>
                        <button type="submit"  class="deleteCategory btn btn-danger Confirm" title=" Delete" data-id="${row.id}"><i style="font-size: 16px;color: white;" class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>`;
        return singleData;
    }
    function getAllRows() {
        $.ajax({
            url: '/medicineStore/dashboard/category-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "getAllRows" },
            success: function (data) {
                console.log(data);
                var categoryList = "";
                var id = 1;
                $.each(data.allCategories, function (index, singleCategory) {
                    if (singleCategory.status == '1') {
                        var status = "<p class='bg-success d-inline-block p-1 text-light rounded'>Active</p>";
                    }
                    else {
                        var status = "<p class='bg-warning d-inline-block p-1 text-black rounded'>Inactive</p>";
                    }
                    categoryList += getCategoryRow(singleCategory, id, status);
                    id++;
                });
                $("#categoryTable tbody").html(categoryList);
            }
        });
    }
    $(document).on('submit', '#addCategory', function (e) {
        // alert("ok")
        e.preventDefault();
        $.ajax({
            url: '/medicineStore/dashboard/category-ajax.php',
            method: "post",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {
            },
            success: function (response) {

                // console.log(response);
                if (response) {
                    $("#addCategory")[0].reset();
                    getAllRows()
                    alert("Category added");
                }
            },
            error: function (request, error) {
                /*  console.log(request);
                  console.log(error); */
                alert("Category name should be unique");
            }
        });
    });

    // edit modal call
    $(document).on('click', '.editCategory', function (e) {
        e.preventDefault()
        var uid = $(this).data('id');
        var modal = $('#edit-category-modal');
        var uid = $(this).data('id');
        modal.find('#edit_id').val(uid);
        var category = $(this).data('category');
        modal.find('#category').val(category);
        var status = $(this).data('status');
        modal.find('#status').val(status);
    })
    // edit Category
    $(document).on('submit', '#edit-category-form', function (e) {
        e.preventDefault();
        var modal = $('#edit-category-modal');
        $.ajax({
            url: '/medicineStore/dashboard/category-ajax.php',
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
                    $("#edit-category-form")[0].reset();
                    getAllRows()
                }
            },
            error: function (request, error) {
                console.log(request);
                console.log("Error:" + error);

            }
        });
    });
    // delete Category
    $(document).on('click', '.deleteCategory', function () {
        // e.preventDefault()
        var uid = $(this).data('id')


        $.ajax({
            url: '/medicineStore/dashboard/category-ajax.php',
            method: 'get',
            dataType: 'json',
            data: { action: "deleteCategory", id: uid },
            beforeSend: function () {


            },
            success: function (data) {
                getAllRows()

            },
            error: function (request, error) {
                console.log(request);
            }
        });


    })


    getAllRows()
})
