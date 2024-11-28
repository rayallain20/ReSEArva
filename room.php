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
        if (isset($u["user_type"]) && $u["user_type"] == 1){

        }else{
            echo "<script>window.location.href = 'login.php'</script>";
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

    <section class="hero-section" style="background: #dddddd; padding-top:20px">
        <div class="container">

            <div class="widget-content widget-content-area">
                <div class="card" style="border-radius:0px !important">
                    <div class="card-body">
                        <a href="my_account.php">
                            <i class="fa fa-home"></i> Account
                        </a>
                        
                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <span style="color:#dfa974">
                            <i class="fa fa-hotel"></i> Rooms
                        </span>
                        <a href="create_room.php?id-0" class="btn btn-primary btn-sm" style="float:right"><i class="fa fa-plus"></i> Create Room</a>
                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important">
                    <table id="html5-extension" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TYPE</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $account->getRooms(0);
                                $cntr = 0;
                                while($row = $data->fetch_assoc()) { 
                                    ++$cntr                                      
                            ?>
                            <tr>
                                <td><?php echo $cntr; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td>
                                    <a href="create_room.php?id=<?php echo $row["id"]; ?>"
                                        class="btn btn-primary btn-sm viewaddmodal"
                                        style="color:#ffffff; cursor:pointer"><i class="fa fa-edit"></i>
                                        view</a>
                                    <a href="#" data-id="<?php echo $row["id"]; ?>"
                                        class="btn btn-danger btn-sm delete"
                                        style="color:#ffffff; cursor:pointer"><i class="fa fa-trash"></i>
                                        delete</a>
                                </td>
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
    $(".delete").click(function(){
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
            if (isConfirm.dismiss == "cancel"){
            }else{
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