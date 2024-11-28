<!DOCTYPE html>
<html lang="en">
<?php
include "classes/userLogin.php";
$account = new user_login;
if (isset($_GET["id"]) && $_GET["id"] > 0){
    $isActivate = $account->ActivateAccount($_GET["id"]);
}
?>


<head>
    <title>ReSEArva</title>

    <!-- Google Font -->
    <?php include "includes/cssContainer.php" ?>
</head>

<body>
    <?php include "includes/menuheader.php" ?>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="booking-form">
                                <h3 style="margin-bottom:20px;"><i class="fa fa-user"></i> LOG IN</h3>
                                <form method="post" id="login">
                                    <div class="form-group">
                                        Username / Email <span style="color:red">*</span>
                                        <input type="text" placeholder="Username" name="email"
                                            class="form-control uname or email" required>
                                    </div>
                                    <div class="form-group">
                                        Password <span style="color:red">*</span>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" placeholder="Password" name="password"
                                                class="form-control upass" required>
                                            <div class="input-group-append">
                                                <a href="" class="btn btn-success"><i class="fa fa-eye-slash"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">LOGIN</button>
                                    <div style="margin-top:15px">
                                        <a href="forgotpassword.php" style="float:left">Forgot password</a>
                                        <a href="register.php" style="float:right">Create account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
    <?php
        if (isset($_GET["id"]) && $_GET["id"] > 0){
            
            echo "<script>
                    swal({
                        title: $isActivate==1 ? 'Activation Completed!' : 'User not found!',
                        text: $isActivate==1 ? 'Your account has been activated, you can now use your acccount!' : 'users not found in our system!',
                        type: $isActivate==1 ? 'success' : 'warning',
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
function start_loader() {
    $(".loader").show();
    $("#preloder").show();
}

function end_loader() {
    $(".loader").hide();
    $("#preloder").delay(0).fadeOut("fast");
}
</script>

</html>