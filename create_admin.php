<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;
$type = ""; 
        if (isset($_GET["type"])){
            $type = $_GET["type"];
        }
        $account = new accounts;
?>


<head>
    <title>MY ACCOUNT - ACCOUNT LIST</title>

    <!-- Google Font -->
    <?php include "includes/cssContainer.php";?>
</head>
<style>
a {
    color: #56504a;

}

h5 {
    margin-bottom: 10px;
    font-size: 18px
}

</style>

<body>
    <?php include "includes/menuheader.php";
        $ut = $u["user_type"];
        if (isset($u["user_type"]) && $u["user_type"] == 1){

        }else{
            echo "<script>window.location.href = 'login.php'</script>";
        }
        
        if ($ut == 1){
            ?>
        <style>
        .header-section {
            display: none;
        }

        .footer-section {
            display: none;
        }
        </style>
    <?php } ?>

    <section class="hero-section" style="background: #dddddd; padding-top:20px">
        <div class="container">

            <div class="widget-content widget-content-area">
                <div class="card" style="border-radius:0px !important">
                    <div class="card-body">
                        <a href="my_account.php">
                            <i class="fa fa-home"></i> Account
                        </a>
                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <a href="account_list.php?type=1">
                            <i class="fa fa-user"></i> Admin Lists
                        </a>
                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <span style="color:#dfa974">
                            <i class="fa fa-user-plus"></i> Create admin account
                        </span>

                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="booking-form">
                                                <form method="POST" id="CreateAdminUser">
                                                    <div class="form-group mb-4">
                                                        <input type="text" name="first_name" value=""
                                                            class="form-control fname" placeholder="First Name"
                                                            required />
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input type="text" name="last_name" value=""
                                                            class="form-control lname" placeholder="Last Name"
                                                            required />
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input type="number" name="phone" value=""
                                                            class="form-control number" placeholder="Phone/Mobile"
                                                            required />
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input type="email" name="email" value=""
                                                            class="form-control email" placeholder="Email" required />
                                                    </div>
                                                    <!-- <div class="form-group mb-4" style="margin-bottom: 60px !important;">
                                        <select name="user_type" id="user_type" class="form-control"
                                            data-style="custom-styling btn btn-outline-primary" required>
                                            <option value="">--Select user type here--</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2"> Payroll Manager</option>
                                            <option value="3">Payroll Encoder</option>
                                            <option value="4">HR Manager</option>
                                            <option value="5">HR Encoder</option>
                                            <option value="6">Clinicians</option>
                                            <option value="7">Agency</option>
                                        </select>
                                    </div>
                                    <BR> -->
                                                    <hr style="width:100%; padding:5px 0px;" />
                                                    <div class="form-group mb-4">
                                                        <input type="hidden" name="id" value="" class="userid">
                                                        <input type="text" name="username" value=""
                                                            class="form-control uname" placeholder="Account Username" />
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" name="password"
                                                                class="form-control pass"
                                                                placeholder="Enter password (ex: Aaaa@123)"
                                                                autocomplete="new-password" id="pass" />
                                                            <div class="input-group-append">
                                                                <a href="" class="btn btn-success btn-block"><i
                                                                        class="fa fa-eye-slash"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top:5px; padding:3px 3%; width:100%; text-align:left; color: #fff;"
                                                            id="StrengthDisp" class="displayBadge">Weak</div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input type="password" name="confirm_password"
                                                            class="form-control cpass" placeholder="Confirm password" />
                                                    </div>

                                                    <button id="btnCreate" type="submit"
                                                        class="btn btn-success btn-block">
                                                        Create Account
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
    <?php if (isset($_GET["id"]) && $_GET["id"] > 0){

    echo "<script>
    swal({
        title: $isActivate == 1 ? 'Activation Completed!' : 'User not found!',
        text: $isActivate == 1 ? 'Your account has been activated, you can now use your acccount!' :
            'users not found in our system!',
        type: $isActivate == 1 ? 'success' : 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3390b9',
        confirmButtonText: 'Ok',
        cancelButtonText: 'No',
        closeOnConfirm: true
    }).then((isConfirm) => {
        if (isConfirm) {
            window.location.href = 'login.php';
        }
    });
    </script>";
    }
    ?>
</body>

<script>
    $(document).ready(function() {
    $("#StrengthDisp").hide();
    var password = document.getElementById("pass");
    password.addEventListener("input", () => {
        var timeout;
        $("#StrengthDisp").hide();
        strengthBadge = document.getElementById("StrengthDisp");
        clearTimeout(timeout);
        timeout = setTimeout(() => StrengthChecker(password.value), 200);
        if (password.value.length !== 0) {
            strengthBadge.style.display != 'block';
        } else {
            strengthBadge.style.display = 'none';
        }
    });

    function StrengthChecker(PasswordParameter) {
        $("#StrengthDisp").show();
        strengthBadge = document.getElementById("StrengthDisp");
        let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{10,})')
        let mediumPassword = new RegExp(
            '((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))'
        );
        if (strongPassword.test(PasswordParameter)) {
            strengthBadge.style.backgroundColor = "green"
            strengthBadge.textContent = 'Strong'
            $('#btnCreate').removeAttr('disabled');
        } else if (mediumPassword.test(PasswordParameter)) {
            $('#btnCreate').removeAttr('disabled');
            strengthBadge.style.backgroundColor = '#7676df'
            strengthBadge.textContent = 'Medium'
        } else {
            $('#btnCreate').attr('disabled', 'disabled');
            strengthBadge.style.backgroundColor = '#ff00007a';
            strengthBadge.textContent =
                'Password must be 8 or morethan character with Upper Case, number and special character'

        }
    }
})
</script>

</html>