<!DOCTYPE html>
<html lang="en">

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
                                <h3 style="margin-bottom:20px;"><i class="fa fa-user"></i> FORGOT PASSWORD</h3>
                                <form method="post" id="forgetpass">
                                    <div class="form-group">
                                        Email
                                        <input type="email" placeholder="Email address" name="email"
                                            class="form-control emailaddress">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <div style="margin-top:15px">
                                        <a href="login.php" style="float:left">Login</a>
                                    </div>
                                </form>
                                <form id="resetpassword" action="" method="post" style="display:none">
                                    <div class="form-group">
                                    Please enter the verification code that send on your email <br>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control email" name="email">
                                            <input type="hidden" class="code">
                                            <input type="text" class="form-control verification" name="verification"
                                                autofocus placeholder="Verification code" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fa fa-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group input-group" id="show_hide_password">
                                        <input type="password" class="form-control np" name="new_password"
                                            placeholder="New Password" required autocomplete="new-password">
                                        <div class="input-group-text">
                                            <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group input-group" id="show_hide_password_c">
                                        <input type="password" class="form-control cp" name="password"
                                            placeholder="Confirm Password" required autocomplete="new-password">
                                        <div class="input-group-text">
                                            <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-sm btn-flat btn-block submitresetpassword">Reset</button>
                                        </div>
                                        <!-- /.col -->
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



</html>