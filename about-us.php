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

    
    <!-- About Us Page Section End -->

    <!-- Video Section Begin -->
    <section class="video-section set-bg" data-setbg="img/video-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <h2>Discover Our Resorts & Services.</h2>
                        <p>Make your holidays memorable with extraordinary comfort, ultimate luxury, and impeccable
                            services here at Punta Berde Resort.</p>
                        <a href="https://www.youtube.com/watch?v=hibrxg2umh8" class="play-btn video-popup"><img
                                src="img/play.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Section End -->

    <!-- Gallery Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>

</script>

</html>