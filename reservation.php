<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;


$type = 0;
$page = "";
if (isset($_GET["type"])){
    $type = $_GET["type"];
    if ($type == 0){
        $page = "Reservation - For approval";
    }else if ($type == 0){
        $page = "Reservation - Reserved";
    }else if ($type == 0){
        $page = "Reservation - Cancer";
    }else{
        $page = "Reservation - History";
    }
}else{
    echo "<script>window.location.href = 'my_account.php'</script>";
}
?>


<head>
    <title>MY ACCOUNT - RESERVATION</title>

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
        if (isset($u["user_type"]) && $u["user_type"] == 1){

        }else{
            if ($_GET["type"] < 4){
            echo "<script>window.location.href = 'login.php'</script>";
            }
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

    <section class="hero-section" style="background: #dddddd;">
        <div class="container">

            <div class="widget-content widget-content-area">
                <div class="card" style="border-radius:0px !important">
                    <div class="card-body">
                        <a href="my_account.php">
                            <i class="fa fa-home"></i> Account
                        </a>

                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <span style="color:#dfa974">
                            <i class="fa fa-file"></i> <?php echo $page; ?>
                        </span>
                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important">
                    <table id="html5-extension" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact_#</th>
                                <th>Reserved#</th>
                                <th>Date</th>
                                <th>Checkin/Checkout</th>
                                <th>Room type</th>
                                <th>Room name</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <?php if ($type == 0){ ?>
                                <th>Action</th>
                                <?php } ?>
                                <?php if ($type == 3 || $type == 4){ ?>
                                <th>status</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $data = $account->getreservation($type);
                                $cntr = 0;
                                while($row = $data->fetch_assoc()) { 
                                    ++$cntr                                      
                            ?>
                            <tr>
                                <td><?php echo $cntr; ?></td>
                                <td><?php echo $row["user"]; ?></td>
                                <td><?php echo $row["number"]; ?></td>
                                <td><?php echo $row["reserved_no"]; ?></td>
                                <td><?php echo date('Y-m-d',strtotime($row["datereserved"])); ?></td>
                                <td><?php echo date('Y F, d h:i a',strtotime($row["checkin"])). " <br>to ".date('Y F, d h:i a',strtotime($row["checkout"])); ?>
                                </td>
                                <td><?php echo $row["room_type"]; ?></td>
                                <td><a style="color:blue; text-decoration: underline;"
                                        href="room-details.php?id=<?php echo $row["room_id"]; ?>"
                                        target="_blank"><?php echo $row["room_name"]; ?></a></td>
                                <td><?php echo number_format($row["amount"],2); ?></td>
                                <td>
                                    <?php
                                         $destinationFoleder = 'assets/payment/'.$row["reserved_no"];
                                         if (is_dir($destinationFoleder)){
                                             $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                             $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                             foreach ($files as $f) 
                                             {
                                                 if (is_file($f)) { ?>
                                    <a title="View File" style="padding:5px" class="badge badge-info" href="#"
                                        onclick="window.open('<?php echo str_replace('\\', '/' ,$f); ?>', '_blank', 'fullscreen=yes'); return false;">
                                        <i class="fa fa-eye"></i> view</a>
                                    <?php }
                                             }
                                    }?>
                                </td>
                                <?php if ($type == 0){ ?>
                                <td>
                                    <button data-id="<?php echo $row["id"] ?>"
                                        data-email="<?php echo $row["user_email"] ?>"
                                        data-room="<?php echo $row["room_name"] ?>"
                                        data-ref="<?php echo $row["reserved_no"] ?>"
                                        data-datereserved="<?php echo $row["datereserved"] ?>"
                                        data-room-type="<?php echo $row["room_type"] ?>"
                                        data-checkin="<?php echo date('Y F, d h:i a',strtotime($row["checkin"])) ?>"
                                        data-checkout="<?php echo date('Y F, d h:i a',strtotime($row["checkout"])) ?>"
                                        data-name="<?php echo $row["user"] ?>"
                                        class="btn btn-primary btn-sm approvereserved"
                                        style="color:#ffffff; cursor:pointer"><i class="fa fa-paper-plane"></i>
                                        approve</button>
                                    <button class="btn btn-danger btn-sm cancelreserved"
                                        data-id="<?php echo $row["id"] ?>" data-email="<?php echo $row["user_email"] ?>"
                                        data-room="<?php echo $row["room_name"] ?>"
                                        data-ref="<?php echo $row["reserved_no"] ?>"
                                        style="color:#ffffff; cursor:pointer"><i class="fa fa-trash"></i>
                                        cancel</button>
                                </td>
                                <?php } ?>
                                <?php if ($type == 3 || $type == 4){ ?>
                                <td>
                                    <span class="badge badge-danger" style="padding:5px">
                                        <?php 
                                                if ($row["status"] == 0){
                                                    echo "For approval";
                                                }else if ($row["status"] == 1){
                                                    echo "Reserved";
                                                }else if ($row["status"] == 2){
                                                    echo "Cancelled";
                                                }
                                            ?>
                                    </span>
                                    <?php
                                        date_default_timezone_set('Asia/Manila');
                                        $date = date('Y-m-d'); 
                                        if ($row["status"] != 2 ){
                                            if ($date < date("Y-m-d", strtotime($row["checkout"]))){
                                    ?>
                                        <button class="badge btn-danger btn-sm cancelreserved" style="cursor:pointer"
                                        data-id="<?php echo $row["id"] ?>" data-email="<?php echo $row["user_email"] ?>"
                                        data-room="<?php echo $row["room_name"] ?>"
                                        data-ref="<?php echo $row["reserved_no"] ?>"
                                        style="color:#ffffff; cursor:pointer"><i class="fa fa-trash"></i>
                                        Cancel</button>
                                    <?php }} ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
    <?php if (isset($_GET["id"]) && $_GET["id"] > 0){
        $account->deleterooms($_GET["id"]);
        echo "<script>
        swal({
            title: 'Success',
            text: 'Successfully deleted!',
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3390b9',
            confirmButtonText: 'Ok',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }).then((isConfirm) => {
            if (isConfirm) {
                window.location.href = 'room.php';
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
    $(".delete").click(function() {
        console.log($(this).attr("data-id"));
        swal({
            title: "Warning!",
            text: "Are you sure want to delete this room ?, click yes to continue!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3390b9',
            confirmButtonText: 'Ok',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }).then((isConfirm) => {
            if (isConfirm.dismiss == "cancel") {} else {
                window.location.href = "?id=" + $(this).attr("data-id");
            }
        });
    })

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