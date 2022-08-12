<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <link rel="stylesheet" type="" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../dashboard/icons/fontawesome/css/all.min.css">
    <!-- sweatconsole.log css  -->
    <link rel="stylesheet" type="" href="../assets/css/sweetalert2.min.css">
    <!-- sweatconsole.log js  -->

</head>

<body>
    <div class="container">
        <div class="py-4" style="min-height: 100vh;">
            <form class="needs-validation card p-4 <?php if(!isset($_SESSION['customerId'])){ echo "createUser";}else{
                echo "UpdateUser" ;}?>" method="post">
                <?php if(!(isset($_SESSION['customerId']))){?>
                <h3 class="text-center">Create Account</h3>
                <?php }?>
                <?php if((isset($_SESSION['customerId']))){?>
                <h3 class="text-center">Update Information</h3>
                <?php }?>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-12 mb-3">
                            <label for="validationCustom03">Name</label>
                            <input type="text" class="form-control username" id="validationCustom03"
                                placeholder="eg: Mark" required name="fName" value="">
                            <div class="invalid-feedback">
                                Please provide your name.
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="validationCustom04">Email</label>
                            <input type="email" class="form-control email" id="validationCustom04"
                                placeholder="eg: customer@help.com" required name="email" value="">
                            <div class="invalid-feedback">
                                Please provide a email.
                            </div>
                        </div>
                        <?php if(!isset($_SESSION['customerId'])){?>
                        <div class="col-12 mb-3">
                            <label for="validationCustom04">Create password</label>
                            <input type="password" class="form-control" id="validationCustom04" placeholder="******"
                                required name="pass">
                            <div class="invalid-feedback">
                                Please provide a phone.
                            </div>
                        </div>
                        <?php }?>

                    </div>
                    <div class="col-md-6">
                        <div class="col-12 mb-3">
                            <label for="validationCustom04">Phone</label>
                            <input type="text" class="form-control phone" id="validationCustom04"
                                placeholder="eg: 01812459871" required name="phone" value="">
                            <div class="invalid-feedback">
                                Please provide a phone.
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="validationCustom03">Address</label>
                            <textarea type="text" class="form-control address" id="validationCustom03"
                                placeholder="eg: 07,Foy's lake housing society, Foy's lake, Chittagong,Bangladesh"
                                style="resize:none" rows="7" <?php if(isset($_SESSION['customerId'])){ echo "required"
                                ;}?> name="address"></textarea>
                            <div class="invalid-feedback">
                                Please provide address through that we can reached to you later.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <input type="hidden" name="action"
                    value="<?php if(!isset($_SESSION['customerId'])){ echo "createUser";}else{ echo "UpdateUser" ;}?>">
                <input type="hidden" name="edit_id"
                    value="<?php if(isset($_SESSION['customerId'])) { echo $_SESSION['customerId'];}?>">
                <button class="btn btn-primary col-md-2" type="submit">Submit</button>
                <div class="text-right">
                    <a href="login" style="max-width: 150px">Back to login</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../dashboard/icons/fontawesome/js/all.min.js"></script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

})();
$(document).on('submit', '.createUser.was-validated', function(event) {

    event.preventDefault();
    $.ajax({
        url: '/medicineStore/front-ajax.php',
        method: "post",
        dataType: "json",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {},
        success: function(response) {
            console.log(response);

            Swal.fire(
                'Good job!',
                'Updated Created',
                'success'
            )


        },
        error: function(request, error) {

            console.log(request);
        }
    });
})
$.ajax({
    url: '/medicineStore/front-ajax.php',
    method: "get",
    dataType: "json",
    data: {
        action: "getUser",
    },
    success: function(response) {
        console.log(response);
        $('.username').val(response.customer_name)
        $('.email').val(response.customer_email)
        $('.phone').val(response.phone)
        $('.address').val(response.address)
    },
    error: function(request, error) {

        // console.log("wrong")
        console.log("Couldn't get the user id")
    }
});
$(document).on('submit', ".UpdateUser.was-validated", function(event) {
    event.preventDefault();
    $.ajax({
        url: '/medicineStore/front-ajax.php',
        method: "post",
        dataType: "json",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {},
        success: function(response) {
            console.log(response);

            Swal.fire(
                'Good job!',
                'Updated Successfully',
                'success'
            )


        },
        error: function(request, error) {

            // console.log("wrong")
            console.log(request);
        }
    });
});
</script>

<script src="../assets/js/sweetalert2.all.min.js"></script>

</html>