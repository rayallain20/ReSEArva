<!DOCTYPE html>
<html lang="en">
<?php 
include "classes/userLogin.php";
$account = new user_login;


$id = 0;
$staravr = 0;
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $rooms = $account->getrooms($id, 0, 10);
    $r = $rooms->fetch_assoc();

    $rating = $account->getrating($id);
    $ratestar = mysqli_num_rows($account->getrating($id));
    // $reservation = $account->

    $staravr = ((int)$r["avr"] * 100) / 5;
}else{
    echo "<script>window.location.href = 'our-rooms'</script>";
}
?>

<head>
    <title>ReSEArva</title>
    <style>
    table {
        width: 100% !important;
        border: 0px solid #dee2e6 !important;
    }

    table>tbody tr {
        border-bottom: 0px solid #191e3a !important;
    }

    .table td,
    .table th {
        padding: 0 !important;
    }

    table tbody tr td {
        /* width: -10px !important; */
        font-size: 15px;
        line-height: 28px !important;
    }

    .breadcrumb-section {
        padding-top: 5px !important;
        padding-bottom: 20px !important;
    }

    .hoverbutton {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        width: 60%;
    }
    </style>
    <?php include "includes/cssContainer.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
</head>

<body>
    <?php include "includes/menuheader.php" ?>

    <section class="room-details-section spad" style="margin-top:40px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="room-details-item" style="margin-bottom:0px">
                        <!-- <img src="assets/rooms/<?php echo $id; ?>" alt=""> -->
                        <div class="row">
                            <?php
                            $count_files = 0;
                                $destinationFoleder = 'assets/rooms/'.$r["id"];
                                if (is_dir($destinationFoleder)){
                                    $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                    $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                    foreach ($files as $f) 
                                    {
                                        $count_files++;
                                    }
                            }?>


                            <?php if($count_files > 1) { ?>
                            <div class="col-sm-2" style="overflow:auto">
                                <?php
                                        $destinationFoleder = 'assets/rooms/'.$r["id"];
                                        if (is_dir($destinationFoleder)){
                                            $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                            $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                            $counterimageMultiple = 0;
                                            foreach ($files as $f) 
                                            {
                                                if (is_file($f)) { ?>
                                <img class="sideimg" src="<?php echo $f; ?>" alt="Card Back"
                                    style="width:100%; min-height:80px !important; cursor:pointer; border: 1.5px dashed;">
                                <?php }
                                                $counterimageMultiple++;
                                            }
                                    }?>
                            </div>
                            <?php } ?>
                            <div class="col-sm-<?php echo $count_files > 1 ? "10" : "12" ?>">
                                <?php
                                    $destinationFoleder = 'assets/rooms/'.$r["id"];
                                    if (is_dir($destinationFoleder)){
                                        $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                        $counterimage = 0;
                                        foreach ($files as $f) 
                                        {
                                            if (is_file($f) && $counterimage == 0) { ?>
                                <img class="setimg" src="<?php echo $f; ?>" alt="Card Back"
                                    style="width:100%; min-height:120px !important; cursor:pointer">
                                <?php }
                                            $counterimage++;
                                        }
                                }?>
                            </div>
                        </div>

                        <!-- <div class="rd-text">
                            <div class="rd-title">
                                <h3>Premium King Room</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="#">Booking Now</a>
                                </div>
                            </div>
                            <h2>159$<span>/Pernight</span></h2>
                        </div> -->
                    </div>
                    <div class="mobileimg" style="display:none">
                        <?php
                            $destinationFoleder = 'assets/rooms/'.$r["id"];
                            if (is_dir($destinationFoleder)){
                                $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                $counterimageMultiple = 0;
                                foreach ($files as $f) 
                                {
                                    if (is_file($f)) { ?>
                        <img class="mySlides" src="<?php echo $f; ?>" style="width:100%">
                        <?php }
                                }
                        }?>
                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)"
                            style="position: absolute; top: 45%;left:3.5%">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)"
                            style="position: absolute; top: 45%; right:3.5%">&#10095;</button>
                    </div>
                    <script>
                    var slideIndex = 1;
                    showDivs(slideIndex);

                    function plusDivs(n) {
                        showDivs(slideIndex += n);
                    }

                    function showDivs(n) {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        if (n > x.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        x[slideIndex - 1].style.display = "block";
                    }
                    </script>
                </div>
                <div class="col-md-4">
                    <div class="room-details-item">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h2 style="margin:0; padding:0; text-align:left;font-size: 250%;">
                                    <?php echo $r["name"]; ?></h2>
                            </div>
                            <div class="rd-title">
                                <div>
                                    <h2
                                        style="margin:0; padding:0; text-align:left; font-size:20px;font-family: system-ui">
                                        ₱ <?php echo number_format($r["price"], 2); ?> /per day</h2>
                                </div>
                            </div>

                            <div class="rd-title">
                                <div>
                                    <h2
                                        style="margin:0; padding:0; text-align:left; font-size:20px;font-family: system-ui;color:#444444; font-size:16px">
                                        Reservation fee : ₱ <?php echo number_format($r["reservedfee"], 2); ?></h2>
                                </div>
                            </div>
                            <style>
                            @media (max-width:768px) {
                                .room-details-item img {
                                    min-height: 30px !important;
                                    margin-bottom: 5px;
                                    display: none;
                                }

                                .descmobile {
                                    display: block;
                                }

                                .mobileimg {
                                    display: block !important;
                                }

                                .rd-title {
                                    margin-bottom: 0px !important;
                                }

                            }

                            .rating-stars ul {
                                list-style-type: none;
                                padding: 0;

                                -moz-user-select: none;
                                -webkit-user-select: none;
                            }

                            .rating-stars ul>li.star {
                                display: inline-block;

                            }

                            /* Idle State of the stars */
                            .rating-stars ul>li.star>i.fa {
                                font-size: 1.2em;
                                /* Change the size of the stars */
                                color: #ccc;
                                /* Color on idle state */
                            }

                            /* Hover state of the stars */
                            .rating-stars ul>li.star.hover>i.fa {
                                color: #FFCC36;
                            }

                            /* Selected state of the stars */
                            .rating-stars ul>li.star.selected>i.fa {
                                color: #FF912C;
                            }

                            .rating {
                                display: inline-block;
                                unicode-bidi: bidi-override;
                                color: #c1c1c1;
                                font-size: 25px;
                                height: 25px;
                                width: auto;
                                margin: 0;
                                position: relative;
                                padding: 0;
                            }

                            .rating-upper {
                                color: #1F995A;
                                padding: 0;
                                position: absolute;
                                z-index: 1;
                                display: flex;
                                top: 0;
                                left: 0;
                                overflow: hidden;
                            }

                            .rating-lower {
                                font-size: 26px;
                                padding: 0;
                                display: flex;
                                z-index: 0;
                            }

                            .rating-upper span {
                                font-size: 35px;
                            }

                            .rating-lower span {
                                font-size: 35px;
                            }

                            .nav-item a {
                                padding: 8px 50px;
                                color: #4e4e4e;
                                font-weight: 600
                            }

                            @media (max-width:768px) {
                                .nav-item a {
                                    padding: 8px 16.4px 8px 2.5px;
                                    color: #4e4e4e;
                                    font-size: 14px !important;
                                }
                            }
                            </style>
                            <div class="rating">
                                <div class="rating-upper" style="width: 0%">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <div class="rating-lower">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                            </div>
                            <span style="vertical-align: super; font-weight:600"><a id="gotoreview"
                                    style="cursor:pointer"> ( <?php echo $ratestar; ?> Review )</a></span>


                            <?php echo $r["amenities"]; ?>

                            <button id="gotobooknowtab"
                                <?php echo $u["userid"] > 0 ? "" : "disabled title='login is required!'" ?>
                                class="btn btn-success">RESERVE NOW</button>
                            <?php echo $u["userid"] > 0 ? "" : "<span style='color:red'>Login is required to reserved!</span>" ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div style="padding-top:40px">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" style="color: #4e4e4e; font-weight:600"
                                    data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" style="color: #4e4e4e; font-weight:600"
                                    data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                    aria-selected="false">360°
                                    view</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" style="color: #4e4e4e; font-weight:600"
                                    data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                    aria-selected="false">Review</a>
                            </li>
                            <?php if ($u["userid"] > 0){ ?>
                            <li class="nav-item">
                                <a class="nav-link" id="booknow-tab" style="color: #4e4e4e; font-weight:600"
                                    data-toggle="tab" href="#booknow" role="tab" aria-controls="contact"
                                    aria-selected="false">Reserve now</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p class="f-para" style="padding-top:50px">
                                    <?php echo $r["description"]; ?>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row" style="margin-top:20px">
                                    <?php
                                        $count_files = 0;
                                            $destinationFoleder = 'assets/360/'.$r["id"];
                                            if (is_dir($destinationFoleder)){
                                                $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                                $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                                foreach ($files as $f) 
                                                {
                                                    $count_files++;
                                                }
                                        }?>


                                    <?php if($count_files > 1) { ?>
                                    <div class="col-sm-2" style="overflow:auto">
                                        <?php
                                        $destinationFoleder = 'assets/360/'.$r["id"];
                                        if (is_dir($destinationFoleder)){
                                            $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                            $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                            $counterimageMultiple = 0;
                                            foreach ($files as $f) 
                                            {
                                                if (is_file($f)) { ?>
                                        <img class="sideimg360" src="<?php echo $f; ?>" alt="Card Back"
                                            style="width:100%; min-height:80px !important; cursor:pointer; border: 1.5px dashed;margin: 10px 0;">
                                        <?php }
                                                $counterimageMultiple++;
                                            }
                                    }?>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-<?php echo $count_files > 1 ? "10" : "12" ?>">
                                        <?php
                                            $panoramaimg = "";
                                            $destinationFoleder = 'assets/360/'.$r["id"];
                                            if (is_dir($destinationFoleder)){
                                                $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                                $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                                $counterimage = 0;
                                                foreach ($files as $f) 
                                                {
                                                    if (is_file($f) && $counterimage == 0) { $panoramaimg = $f;?>
                                        <div id="panorama"></div>
                                        <?php }
                                                    $counterimage++;
                                                }
                                        }?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="rd-reviews" style="border-top: 0px solid #e5e5e5;">
                                    <h4>Reviews</h4>
                                    <?php while($rate = $rating->fetch_assoc()){ ?>
                                    <div class="review-item">
                                        <div class="ri-text">
                                            <span><?php 
                                            echo date('Y/m/d h:i a', strtotime($rate["postdate"]));
                                            ?></span>
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
                                            <h5><?php echo $rate["first_name"].' '.$rate["last_name"] ?></h5>
                                            <p><?php echo $rate["comment"]; ?></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="review-add">
                                    <h4>Add Review</h4>
                                    <form method="post" id="submitreview" class="ra-form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div>
                                                    <h5>You Rating:</h5>
                                                    <div class='rating-stars'>
                                                        <ul id='stars'>
                                                            <li class='star' title='Poor' data-value='1'>
                                                                <i id="start1" class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Fair' data-value='2'>
                                                                <i id="start2" class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Good' data-value='3'>
                                                                <i id="start3" class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Excellent' data-value='4'>
                                                                <i id="start4" class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='WOW!!!' data-value='5'>
                                                                <i id="start5" class='fa fa-star fa-fw'></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="user_id"
                                                    value="<?php echo isset($u["userid"]) ? $u["userid"] : 0;  ?>">
                                                <input type="hidden" class="room_id" value="<?php echo $id; ?>">
                                                <textarea placeholder="Your Review" class="comment"
                                                    id="commentarea"></textarea>
                                                <button type="submit">Submit Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="booknow" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card" style="margin-top:30px;border: 3px solid #dfa974;">
                                            <div class="card-header">
                                                RESERVED SCHEDULE
                                            </div>
                                            <div class="card-body" style="padding:0 !important; margin-top:30px">
                                                <div style="position:relative; text-align:center">
                                                    <input type="hidden" class="selectmonth">
                                                    <span id="monthtext"
                                                        style="font-weight: 600;font-size: 18px;vertical-align: middle;">MARCH</span>
                                                    <button class="btn btn-sm" id="leftmonth"
                                                        style="position:absolute; left:5%; bottom: -5px;"><i
                                                            class="fa fa-angle-left fa-2x"></i></button>
                                                    <button class="btn btn-sm" id="rightmonth"
                                                        style="position:absolute; right:5%; bottom: -5px;"><i
                                                            class="fa fa-angle-right fa-2x"></i></button>
                                                </div>

                                                <div style="margin:5%;">
                                                    <div id="scheduled"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card" style="margin-top:30px">
                                            <div class="card-header">
                                                Select Date
                                            </div>
                                            <div class="card-body">
                                                <form id="submitbooknow">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card card-body" style="margin-bottom:20px;padding:0.50rem">
                                                                <div>Payment Step</div>
                                                                <div
                                                                    style="text-align:left;font-size: 14px; font-style: italic;">
                                                                    1. choose date you want to reserve</div>
                                                                <div
                                                                    style="text-align:left;font-size: 14px; font-style: italic;">
                                                                    2. Scan qr code image</div>
                                                                <div
                                                                    style="text-align:left;font-size: 14px; font-style: italic;">
                                                                    3. Pay the reserve amount</div>
                                                                <div
                                                                    style="text-align:left;font-size: 14px; font-style: italic;">
                                                                    4. Upload the reference of payment</div>
                                                                <div
                                                                    style="text-align:left;font-size: 14px; font-style: italic;">
                                                                    5. Click submit</div>

                                                                <div
                                                                    style="padding-top:20px;text-align:left;font-size: 16px;color:red">
                                                                    Note: Strictly no refund
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                Check-in: <span style="color:red">*</span><br>
                                                                <input type="datetime-local"
                                                                    class="form-control checkin" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                Check-out: <span style="color:red">*</span><br>
                                                                <input type="datetime-local"
                                                                    class="form-control checkout" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <input type="hidden" class="price"
                                                                    value="<?php echo $r["reservedfee"]; ?>">
                                                                Amount: <span style="color:red">*</span><br>
                                                                <input type="text" tabindex='1' value="0" readonly
                                                                    class="form-control amount" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12" style="text-align:center">
                                                            <div class="form-group">
                                                                <div style="text-align:left">Gcash QRcode</div>
                                                                <?php                                                
                                                                $destinationFoleder = 'assets/qrcode';
                                                                if (is_dir($destinationFoleder)){
                                                                    $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                                                    $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                                                    foreach ($files as $f) 
                                                                    {
                                                                        if (is_file($f)) { ?>
                                                                <img src="<?php echo $f; ?>">
                                                                <?php }
                                                                    }
                                                                }?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <input type="hidden" value="<?php echo $r["name"]; ?>"
                                                                    class="name">
                                                                Referrence Image: <span style="color:red">*</span><br>
                                                                <input type="file" class="form-control gcash"
                                                                    accept="image/*" required>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div style="margin-top:20px">
                                                        <button type="submit" href="#" class="btn btn-success">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>

<script>
$(function(e) {
    $(".sideimg").click(function(e) {
        var newimg = $(this).attr("src");
        $(".setimg")
            .fadeOut(400, function() {
                $(".setimg").attr('src', newimg);
            })
            .fadeIn(400);
    })

    $(".sideimg360").click(function(e) {
        var newimg = $(this).attr("src");
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            "panorama": newimg,
            "autoLoad": true,
        })
    })


    var calendar = $("#calendar").calendarGC({
        dayBegin: 0,
        prevIcon: '&#x3c;',
        nextIcon: '&#x3e;',
        onPrevMonth: function(e) {
            console.log("prev");
            console.log(e);
        },
        onNextMonth: function(e) {
            console.log("next");
            console.log(e);
        },
        events: getHoliday(),
        onclickDate: function(e, data, date) {
            console.log(e[0].style.background);
            if (e[0].style.background == "rgb(223, 169, 116)") {
                e[0].style.background = "white";
            } else {
                e[0].style.background = "#dfa974"
            }

        }
    });

    $(".rating-upper").css({
        width: "<?php echo $staravr; ?>%"
    });

    $("#gotobooknowtab").click(function() {
        $("#booknow-tab").click();
        setTimeout(() => {
            $(".amount").focus();
        }, 300);
    })

    $("#gotoreview").click(function() {
        $("#contact-tab").click();
        setTimeout(() => {
            $("#commentarea").focus();
        }, 300);
    })

    $("#profile-tab").click(function() {
        start_loader();
        setTimeout(() => {
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "<?php echo str_replace('\\', '/', $panoramaimg); ?>",
                "autoLoad": true,
            });
            end_loader();
        }, 300);
    })

    $("#leftmonth").click(function() {
        if ($(".selectmonth").val() <= 1) {
            $(".selectmonth").val(12);
        } else {
            $(".selectmonth").val(Number($(".selectmonth").val()) - 1);
            $("#monthtext").html(getMonthName($(".selectmonth").val()));
        }
        getschedule();
    })

    $("#rightmonth").click(function() {
        if ($(".selectmonth").val() >= 12) {
            $(".selectmonth").val(1);
        } else {
            $(".selectmonth").val(Number($(".selectmonth").val()) + 1);
            $("#monthtext").html(getMonthName($(".selectmonth").val()));
        }
        getschedule();
    })

    $(".selectmonth").val(((new Date).getMonth() + 1));
    $("#monthtext").html(getMonthName($(".selectmonth").val()));
    getschedule();

});

function getschedule() {
    var d = {
        room_id: $(".room_id").val(),
        month: $(".selectmonth").val(),
    }
    $.ajax({
        url: 'actions/php/getSchedule.php',
        type: 'POST',
        dataType: 'json',
        data: d,
        success: function(res) {
            $("#scheduled").html('');
            var table =
                "<table width='100%' class='table'> <tr> <th>Check-in</th> <th>Check-out</th> </tr> <tbody> ";
            for (var i = 0; i < res.length; i++) {
                table += "<tr> <td> " + convertDate(res[i].checkin) + " </td> <td> " + convertDate(res[i]
                    .checkout) + " </td>   </tr>"
            }
            if (res.length == 0) {
                table += "<tr> <td colspan='2' style='text-align:center'> No reserved yet! </td>   </tr>"
            }
            table += "</tbody> </table>";
            $("#scheduled").append(table);
        },
        error: function(res) {
            end_loader();
            console.log("error: ", res)
        }
    });
}

var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
    "November", "December"
];

function convertDate(date_str) {
    var d = new Date(date_str);
    var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
    var time = d.toLocaleTimeString().toLowerCase();
    return date + " " + time;
}

function getHoliday() {
    var d = new Date();
    var totalDay = new Date(d.getFullYear(), d.getMonth(), 0).getDate();
    var events = [];


    for (var i = 1; i <= totalDay; i++) {
        var newDate = new Date(d.getFullYear(), d.getMonth(), i);
        var today = new Date();
        if (today > newDate) { //if Sunday
            events.push({
                date: newDate,
                eventName: "s",
                className: "researved",
                onclick(e, data) {
                    console.log(data);
                },
                dateColor: "rgb(76, 111, 255);"
            });
        }
    }
    return events;
}

getHoliday()
</script>

<script>
$(document).ready(function() {

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function() {
        $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
        });
    });


    /* 2. Action to perform on click */
    $('#stars li').on('click', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);

    });


});


function responseMessage(msg) {
    $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>

</html>