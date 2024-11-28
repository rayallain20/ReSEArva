<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;
?>


<head>
    <title>MY ACCOUNT - ROOMS</title>

    <!-- Google Font -->
    <?php include "includes/cssContainer.php";?>
    <style>
    a {
        color: #56504a;

    }

    h5 {
        margin-bottom: 10px;
        font-size: 18px
    }
    </style>
</head>

<body>
    <?php include "includes/menuheader.php";
        $ut = $u["user_type"];
        
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

    <section class="hero-section" style="background: #dddddd">
        <div class="container">
            <div class="widget-content widget-content-area">
                <div class="card" style="border-radius:0px !important">
                    <div class="card-body">
                        <a href="my_account.php">
                            <i class="fa fa-home"></i> Account
                        </a>
                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <span style="color:#dfa974">
                            <i class="fa fa-calendar"></i> Calendar
                        </span>

                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h4 style="text-align:center; padding-bottom:25px">Ledger</h4>
                                <div class="row">
                                    <div class="col-sm-4" style="text-align:center">
                                        <span style="border:1px solid; background:#5f01f7; padding:2px 10px"></span>&nbsp; - Reserved
                                    </div>
                                    <div class="col-sm-4" style="text-align:center">
                                        <span style="border:1px solid; background:#1F995A; padding:2px 10px"></span>&nbsp; - Checkin
                                    </div>
                                    <div class="col-sm-4" style="text-align:center">
                                        <span style="border:1px solid; background:#c7c6c5; padding:2px 10px"></span>&nbsp; - Pass transaction
                                    </div>
                                </div>
                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>

<script>
$(document).ready(function() {
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
        events: [],
        onclickDate: function(e, data, date) {

        }
    });
})

function formatDate(date, havetime) {
    if (havetime) {
        return new Date(date).getFullYear() + "-" + (new Date(date).getMonth() + 1) + "-" + new Date(date).getDate() +
            " " + new Date(date).getHours() + ":" + new Date(date).getMinutes() + " " + (new Date(
                date).getHours() >= 12 ? "PM" : "AM");
    } else {
        return new Date(date).getFullYear() + "-" + (new Date(date).getMonth() + 1) + "-" + new Date(date).getDate();
    }

}

function showevent(e) {
    var d = {
        id: $(e).attr("data-event")
    }
    $.ajax({
        url: 'actions/php/getreservationbyid.php',
        type: 'POST',
        dataType: 'json',
        data: d,
        success: function(res) {
            console.log(res);
            $(".fullname").html(res.last_name + ", " + res.first_name);
            $(".reserved_no").html(res.reserved_no);
            $(".datereserved").html(formatDate(res.datereserved, false));
            $(".number").html(res.user_number);
            $(".email").html(res.user_email);
            $(".room_type").html(res.type);
            $(".room_name").html(res.name);
            $(".checkin").html(formatDate(res.checkin, true));
            $(".checkout").html(formatDate(res.checkout, true));
            $(".amount").html(res.amount);

            $("#reservation").modal("show");
        },
        error: function(e) {
            console.log(e);
            end_loader();
        }
    });
}
</script>
<div class="modal fade" id="reservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Arial';">Reservation Information
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>
                                    Reservation Number : <br>
                                    <STRONG>
                                        <span class="reserved_no"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Date Reserved : <br>
                                    <STRONG>
                                        <span class="datereserved"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Full Name : <br>
                                    <STRONG>
                                        <span class="fullname"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Number : <br>
                                    <STRONG>
                                        <span class="number"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Email : <br>
                                    <STRONG>
                                        <span class="email"></span>
                                    </STRONG>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>
                                    Room Type : <br>
                                    <STRONG>
                                        <span class="room_type"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Room Name : <br>
                                    <STRONG>
                                        <span class="room_name"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Check-in : <br>
                                    <STRONG>
                                        <span class="checkin"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Check-out : <br>
                                    <STRONG>
                                        <span class="checkout"></span>
                                    </STRONG>
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>
                                    Amount : <br>
                                    <STRONG>
                                        <span class="amount"></span>
                                    </STRONG>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>