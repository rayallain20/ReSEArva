<!DOCTYPE html>
<html lang="en">
<?php 
include "classes/userLogin.php";
$account = new user_login;
?>

<head>
    <title>ReSEArva</title>

    <!-- Google Font -->
    <?php include "includes/cssContainer.php" ?>

</head>

<body>
    <?php include "includes/menuheader.php" ?>

    <section class="contact-section spad" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <p>Make your holidays memorable with extraordinary comfort, ultimate luxury, and impeccable
                            services here at Punta Berde Resort.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Brgy. Bignay II Sariaya Quezon</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>0917-135-5571</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>support@researva.com</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d61969.68953730336!2d121.50058386827462!3d13.89263371921277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sBrgy.%20Bignay%20II%20Sariaya%20Quezon!5e0!3m2!1sen!2sph!4v1669224441672!5m2!1sen!2sph"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>

</script>

</html>