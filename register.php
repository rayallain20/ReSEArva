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
                                <h3 style="margin-bottom:20px;"><i class="fa fa-user"></i> SIGN UP</h3>
                                <form method="POST" id="CreateUser">
                                    <div class="form-group mb-4">
                                        First Name :<span style="color:red">*</span>
                                        <input type="text" name="first_name" value=""
                                            class="form-control fname alphaonly" placeholder="First Name" required />
                                    </div>
                                    <div class="form-group mb-4">
                                        Last Name :<span style="color:red">*</span>
                                        <input type="text" name="last_name" value=""
                                            class="form-control lname alphaonly" placeholder="Last Name" required />
                                    </div>
                                    <div class="form-group mb-4">
                                        Number :<span style="color:red">*</span>
                                        <input type="number" name="phone" value="09" class="form-control number isphone"
                                            onKeyPress="if(this.value.length==11) return false;"
                                            placeholder="Phone/Mobile" required />
                                    </div>
                                    <div class="form-group mb-4">
                                        Email :<span style="color:red">*</span>
                                        <input type="email" name="email" value="" class="form-control email"
                                            placeholder="Email" required />
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
                                        Username :<span style="color:red">*</span>
                                        <input type="hidden" name="id" value="" class="userid">
                                        <input type="text" name="username" value="" class="form-control uname"
                                            placeholder="Account Username" required />
                                    </div>
                                    <div class="form-group mb-4">
                                        Password :<span style="color:red">*</span>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" name="password" class="form-control pass"
                                                placeholder="Enter password (ex: Aaaa@123)" autocomplete="new-password"
                                                id="pass" required />
                                            <div class="input-group-append">
                                                <a href="" class="btn btn-success btn-block"><i class="fa fa-eye-slash"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div style="margin-top:5px; padding:3px 3%; width:100%; text-align:left; color: #fff;"
                                            id="StrengthDisp" class="displayBadge">Weak</div>
                                    </div>
                                    <div class="form-group mb-4">
                                        Confirm Password :<span style="color:red">*</span>
                                        <div class="input-group" id="show_hide_password_C">
                                            <input type="password" name="confirm_password" class="form-control cpass"
                                                placeholder="Confirm password" required />
                                            <div class="input-group-append">
                                                <a href="" class="btn btn-success btn-block"><i class="fa fa-eye-slash"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <label>
                                        <input id="terms" style="display:inline-block;" type="checkbox"
                                            class="checkbox" />
                                        <span style="color:#000">I have read and agree the</span>
                                        <a href="#" data-target="#termsModal" data-toggle="modal">terms and
                                            condition</a>
                                    </label>
                                    <button id="btnCreate" type="submit" class="btn btn-success btn-block" disabled>
                                        Create Account
                                    </button>
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


    <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background:#fff">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y:auto; height:600px">
                    <div class="container">
                        <p class="login-text"
                            style="font-size: 2rem; font-weight: 150; text-align: center; color: dark-green; font-family: Arial;">
                            Terms And Condition and User’s Agreement</p>

                        <div>
                            <p>
                                1. <b>Observe Physical Distancing</b> – Reflectorized sticker on the floor are provided
                                as marks for your
                                standing points in maintaining physical distancing.
                            </p>
                        </div>

                        <div>
                            <p>
                                2.<b>Body Temperature</b> – The front desk officer will check the guests body
                                temperature and
                                sanitize
                                their hands using alcohol. Once the temperature is above 38 degrees Celsius, guests will
                                not be
                                able to enter the premises.
                            </p>
                        </div>

                        <div>
                            <p>
                                3. <b>Health Declaration Form</b> – As part of DOH protocol, a declaration form will be
                                filled
                                out by
                                the guest for security and contact tracing for future reference. Please write HONESTLY.
                            </p>
                        </div>

                        <div>
                            <p>
                                4.Anybody caught in possession or using prohibited drugs shall be apprehended in
                                accordance with
                                the provision of Dangerous Drug Act.
                            </p>
                        </div>

                        <div>
                            <p>
                                5.<b>Do not leave your things unattended</b> The resort will not be responsible for any
                                loss or damage
                                to anyone’s property.
                            </p>
                        </div>

                        <div>
                            <p>
                                6.Limit activities within the Resort’s property boundaries for your safety.
                            </p>
                        </div>

                        <div>
                            <p>
                                7.Senior Citizen and Children should always be accompanied by a responsible adult at all
                                times,
                                especially on poolside or beach area.
                            </p>
                        </div>

                        <div>
                            <p>
                                8.Swimming time 6:00 AM to 10:00 PM. (10:00 PM onwards swim at your own risk)
                            </p>
                        </div>

                        <div>
                            <p>
                                9.Never go swimming when the sea is not calm or during bad weather. The “BOATMAN or
                                BANKEROS”
                                are not part of the resort’s facilities. Wearing life jacket is highly recommended when
                                taking
                                boat rides.
                            </p>
                        </div>

                        <div>
                            <p>
                                10.Limit activities within the Resort’s property boundaries for your safety. Refrain
                                from
                                swimming in pool or in the beach right after drinking wines, liquors, or other form of
                                intoxicating drinks. Familiarize beach and pool’s regulations.
                            </p>
                        </div>

                        <div>
                            <p>
                                11.Always maintain order and cleanliness in the Resort’s facilities. Please clean up
                                yourselves.
                                We keep out beach and Resort as clean as possible. Kindly do your part by disposing all
                                trash in
                                the designated trash bins, including cigarette butts. We practice trash segregation and
                                recycling.
                            </p>
                        </div>

                        <div>
                            <p>
                                12.The Resort reserved the right to refuse admission or to dismiss refund against anyone
                                with
                                untruly conduct. Customers are obliged to pay for any loss and damage of Resort property
                                caused
                                by themselves, their friends or any person for whom they are responsible.
                            </p>
                        </div>

                        <div>
                            <p>
                                13.Your strict compliance is thereby necessary.
                            </p>
                        </div>

                        <div>
                            <p>
                                14.Strictly NO RESERVATION FEE REFUND.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
            if ($("#terms").prop('checked')) {
                $('#btnCreate').removeAttr('disabled');
            }
        } else if (mediumPassword.test(PasswordParameter)) {
            if ($("#terms").prop('checked')) {
                $('#btnCreate').removeAttr('disabled');
            }
            strengthBadge.style.backgroundColor = '#7676df'
            strengthBadge.textContent = 'Medium'
        } else {
            $('#btnCreate').attr('disabled', 'disabled');
            strengthBadge.style.backgroundColor = '#ff00007a';
            strengthBadge.textContent =
                'Password must be 8 or morethan character with Upper Case, number and special character'

        }
    }

    $("#terms").change(function() {
        if ($("#terms").prop('checked') && $("#StrengthDisp").html() !=
            "Password must be 8 or morethan character with Upper Case, number and special character") {
            $("#btnCreate").prop("disabled", false);
        } else {
            $("#btnCreate").prop("disabled", true);
        }

    })
    $('.alphaonly').bind('keyup blur', function() {
        if ($(this).val().match(/[^a-zA-Z]/g) != null) {
            swal("Oops", "please type letters only", "warning");
            $(this).val($(this).val().replace(/[^a-z]/g, ''));
            $(this).focus();
        }
    });

    $('.isphone').bind('keyup blur', function() {
        if ($(this).val().length == 2) {
            if ($(this).val() != "09") {
                swal("Oops", "number must start with 09", "warning");
                $(this).val("09");
                $(this).focus();
            }
        }
    });
})
</script>

</html>