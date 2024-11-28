<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;
if (isset($_GET["id"]) && $_GET["id"] > 0){
    $isActivate = $account->ActivateAccount($_GET["id"]);
}
$admin = mysqli_num_rows($account->getUserByType(1));
$customer = mysqli_num_rows($account->getUserByType(2));
$rooms = mysqli_num_rows($account->getAllrooms());
$forapproval = mysqli_num_rows($account->getreservation(0));
$reserved = mysqli_num_rows($account->getreservation(1));
$cancelled = mysqli_num_rows($account->getreservation(2));
$history = mysqli_num_rows($account->getreservation(3));
$myreserved = mysqli_num_rows($account->getreservation(4));
?>


<head>
    <title>ReSEArva</title>

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
        $u_id = $u["userid"];

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

    <section class="hero-section" style="background: #dddddd;">

        <div class="container">
            <div class="widget-content-area br-4" style="margin-bottom: 3%;background:#fff">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-body" style="margin-bottom:50px">
                            <div class="row">
                                <?php if ($ut == 1){?>
                                <div class="col-sm-12">
                                    <div style="font-weight:600; font-size:20px">
                                        <img src="img/Researvalogo.png" style="width:140px"> ADMINISTRATOR
                                    </div>
                                    <div class="section-title" style="padding-top:20px">
                                        <span style="font-size:22px">Dashboard</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Admin accounts <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $admin; ?></span>
                                                </h4>
                                                <div style="margin-top:30px;">
                                                    <a href="account_list.php?type=1" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Guest accounts <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $customer; ?></span>
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="account_list.php?type=2" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Rooms <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $rooms; ?></span>
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="room.php" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Calendar
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="calendar.php" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-12 mx-auto" style="padding:20px">

                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">For approval <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $forapproval; ?></span>
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="reservation.php?type=0" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Reserved <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $reserved; ?></span>
                                                </h4>
                                                <div style="margin-top:30px;">
                                                    <a href="reservation.php?type=1" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Cancelled <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $cancelled; ?></span>
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="reservation.php?type=2" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">History <span
                                                        style="color:#1F995A; float:right; font-size:20px; font-weight:700"><?php echo $history; ?></span>
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="reservation.php?type=3" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-3 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">Setting </h4>
                                                <div style="margin-top:30px">
                                                    <a href="setting.php" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <?php }else{ ?>
                                <div class="col-sm-12">
                                    <div class="section-title" style="padding-top:20px">
                                        <span style="font-size:22px">Dashboard</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">My Profile
                                                </h4>
                                                <div style="margin-top:30px;">
                                                    <a href="my_profile.php?id=<?php echo $u_id; ?>"
                                                        class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-4 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">My Reservation <span
                                                        style="color:#1F995A; float:right; font-size:24px; font-weight:700"><?php echo $myreserved; ?></span>
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="reservation.php?type=4" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-xl-4 mx-auto">
                                    <blockquote class="media-object"
                                        style="border: 1px solid #5b5c5a; border-left: 4px solid #1F995A; padding:20px 20px">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <h4 class="event_name">My Calendar
                                                </h4>
                                                <div style="margin-top:30px">
                                                    <a href="calendar.php" class="btn btn-primary"
                                                        style="background:#1F995A !important; color:#fff">View
                                                        details <i class="fa fa-arrow-right"
                                                            style="vertical-align: initial;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="card-footer" style="text-align:right">
                            <a href="./" class="btn btn-primary">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
    <script>

    </script>
</body>



</html>