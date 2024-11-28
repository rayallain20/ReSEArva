<!DOCTYPE html>
<html lang="en">

<?php
include "classes/userLogin.php";
$account = new user_login;
$no_of_records_per_page = 10;
$offset = 0;
?>

<head>
    <title>ReSEArva</title>

    <!-- Google Font -->
    <?php include "includes/cssContainer.php" ?>
    <style>
    .pnlm-controls-container {
        display: none;
    }


    .home-section .owl-carousel .owl-nav button.owl-next {
        left: auto;
        right: -190px;
    }

    .home-section button {
        width: 50px !important;
        height: 50px !important;
        border-radius: 50% !important;
        border: 1px solid #ebebeb !important;
        font-size: 24px !important;
        color: #707079 !important;
        background: #ffffff !important;
        /* position: absolute;
        top: 40%; */
    }

    .home-section .owl-prev {
        position: absolute;
        top: 40%;
    }

    .home-section .owl-next {
        position: absolute;
        top: 40%;
        right: 0px
    }

    .amenities table {
        width: 100% !important;
        border: none !important;

    }

    .amenities table>tbody tr {
        border-bottom: none !important;
    }

    .amenities table td {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
    </style>
</head>

<body>
    <?php include "includes/menuheader.php" ?>

    <section class="hero-section" style="padding-top:20px !Important">
        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Spend Quality Holidays With Us</h1>
                        <p>Make your holidays memorable with extraordinary comfort, ultimate luxury, and impeccable
                            services here at Punta Berde Resort.</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>ReSEArve Now</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">1-5 Persons</option>
                                    <option value="">6-10 Persons</option>
                                    <option value="">more</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">Standard Small Room</option>
                                    <option value="">Standard Big Room</option>
                                    <option value="">Couples Room</option>
                                    <option value="">Family Room</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <div id="panorama"></div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2 style="margin-top:5px !important; padding-top:5px">Punta Berde Resort</h2>
                        </div>
                        <p class="f-para">Punta Berde Resort is a leading online accommodation site. We’re located at
                            Brgy. Bignay II Sariaya Quezon. Every day, we inspire and reach lots of customers across the
                            quezon provice and some other places.</p>
                        <p class="s-para">So when it comes to reservation the perfect resort, vacation rental, hotel,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        <a href="contact.php" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/g1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/g2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Highlighted Features</span>
                        <h2>Discover Some of Our Features Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class=""></i>
                        <h4>Volley Ball</h4>
                        <p>Bump, set, and spike your way to fun in the sun at our resort's beach volleyball court.
                            Nestled along the shoreline, our court offers stunning ocean views and soft sand for a true
                            beach volleyball experience.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class=""></i>
                        <h4>Billiards</h4>
                        <p>Experience a game of pool like never before with top-quality tables, cues, and balls, our
                            billiards feature provides hours of entertainment for guests of all ages and skill levels.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class=""></i>
                        <h4>Videoke</h4>
                        <p>Unleash your inner rockstar at our resort's videoke lounge, the perfect destination for
                            singing and socializing with friends and family.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class=""></i>
                        <h4>Basketball</h4>
                        <p>Enjoy a fun game of basketball at our resort's on-site court! Whether you're a seasoned player or just looking for some casual fun, our court is perfect for all skill levels.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class=""></i>
                        <h4>Mini Boat</h4>
                        <p>Embark on an aquatic adventure at our resort's mini boat rental, where you can captain your own vessel and explore the beauty of the surrounding waters.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class=""></i>
                        <h4>Badminton</h4>
                        <p>Get your heart pumping with a friendly game of badminton at our resort's courts, designed for players of all skill levels.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="section-title">
                <span>Highlighted Features</span>
                <h2 style="padding-top:5px">Our Rooms</h2>
            </div>
            
            <div class="home-section owl-carousel owl-loaded owl-drag">
                <?php $rooms = $account->getRooms(0, $offset, $no_of_records_per_page);
                    $cntr = 0;
                    while($row = $rooms->fetch_assoc()){ ?>

                <div class="hp-room-items">
                    <?php
                    $imgurl = "";
                    $destinationFoleder = 'assets/rooms/'.$row["id"].'/';
                    if (is_dir($destinationFoleder)){
                        $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                        $counterimage = 0;
                        foreach ($files as $f) 
                        {
                            if (is_file($f) && $counterimage == 0) {
                                $imgurl = str_replace('\\', '/', $f);
                            }
                            $counterimage++;
                        }
                    }?>
                    <div class="hp-room-item set-bg" data-setbg="<?php echo $imgurl; ?>">
                        <div class="hr-text">
                            <h3><?php echo $row["name"];  ?></h3>
                            <h2><?php echo  number_format($row["price"], 2);  ?><span>/Perday</span></h2>

                            <div class="amenities">
                                <?php echo $row["amenities"]; ?>
                            </div>
                            <a href="room-details.php?id=<?php echo $row["id"]; ?>" class="primary-btn">More Details</a>
                            <br>
                            <?php
                            $img360 = "";
                            $destinationFoleder = 'assets/360/'.$row["id"];
                            if (is_dir($destinationFoleder)){
                                $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                $counterimageMultiple = 0;
                                foreach ($files as $f) 
                                {
                                    if (is_file($f)) { 
                                        $img360 = $f;
                                    }
                                    $counterimageMultiple++;
                                }
                            }?>
                            <a href="javascript:void(0)" class="primary-btn view360" data-image="<?php echo $img360; ?>"
                                style="margin-top:30px">360° view</a>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>

        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <?php $rating = $account->getAllrating(); while($rate = $rating->fetch_assoc()){ ?>
                        <div class="ts-item">
                            <p><?php echo $rate["comment"]; ?></p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"
                                        style="<?php echo $rate["rating"] > 0 ? "color:#1F995A" : "color:#ccc" ?>"></i>
                                    <i class="icon_star"
                                        style="<?php echo $rate["rating"] > 1 ? "color:#1F995A" : "color:#ccc" ?>"></i>
                                    <i class="icon_star"
                                        style="<?php echo $rate["rating"] > 2 ? "color:#1F995A" : "color:#ccc" ?>"></i>
                                    <i class="icon_star"
                                        style="<?php echo $rate["rating"] > 3 ? "color:#1F995A" : "color:#ccc" ?>"></i>
                                    <i class="icon_star"
                                        style="<?php echo $rate["rating"] > 4 ? "color:#1F995A" : "color:#ccc" ?>"></i>
                                </div>
                                <h5> - <?php echo $rate["first_name"].' '.$rate["last_name"]; ?></h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->


    <!-- Footer Section Begin -->
    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>
<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "test.jpg",
    "autoLoad": true,
    "autoRotate": 1
});
</script>

<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    margin: 10,
    loop: false,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        700: {
            items: 2
        },
        1000: {
            items: 3
        },
        1400: {
            items: 4
        }
    }
})
</script>

</html>