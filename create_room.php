<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;
$id = 0;
$type = "";
$name = "";
$price = "";
$description = "";
$amenities = "";
$reservationfee = 0;
if (isset($_GET["id"]) && $_GET["id"] > 0){
    $rooms = $account->getRooms($_GET["id"]);
    $r = $rooms->fetch_assoc();
    $id = $r["id"];
    $type = $r["type"];
    $name = $r["name"];
    $price = $r["price"];
    $description = $r["description"];
    $amenities = $r["amenities"];
    $reservationfee = $r["reservedfee"];
}

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

    .nice-select ul {
        width: 100%;
    }

    .nice-select form-control {
        padding-top: 0px !important;
    }
    </style>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="css/old_bootstrap.css" rel="stylesheet">
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
                        <a href="room.php">
                            <i class="fa fa-hotel"></i> Rooms
                        </a>
                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <span style="color:#dfa974">
                            <i class="fa fa-bed"></i> <?php echo $id > 0 ? "Update room" : "Create Room" ?>
                        </span>
                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important; background:white">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="actions/php/addupdaterooms.php" onSubmit="start_loader()"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    Room Type : <span style="color:red">*</span>
                                                    <select class="form-control" name="type">
                                                        <option value="Kubo"
                                                            <?php echo $type == "Kubo" ? "selected='selected'" : "" ?>>
                                                            Kubo</option>
                                                        <option value="Simple"
                                                            <?php echo $type == "Simple" ? "selected='selected'" : "" ?>>
                                                            Simple</option>
                                                        <option value="Deluxe"
                                                            <?php echo $type == "Deluxe" ? "selected='selected'" : "" ?>>
                                                            Deluxe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    Room Name : <span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Enter room name..." value="<?php echo $name; ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    Price : <span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="price"
                                                        placeholder="Enter room price..." value="<?php echo $price; ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group" style="margin-bottom:15px">
                                                    Reservation fee : <span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="reservedfee"
                                                        placeholder="Enter room reservation fee..."
                                                        value="<?php echo $reservationfee; ?>" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    Images : <span style="color:red">* (Reselect file to reset all
                                                        selected image.)</span>
                                                    <input type="file" class="form-control" name="images[]" multiple
                                                        accept="image/*" onchange="readURL(this);">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div id="imgcon" style="overflow:auto; height:160px; text-align:center">
                                                    <?php
                                                    $destinationFoleder = 'assets/rooms/'.$id;
                                                    if (is_dir($destinationFoleder)){
                                                        $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                                        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                                        foreach ($files as $f) 
                                                        {
                                                            if (is_file($f)) { ?>
                                                    <img src="<?php echo $f; ?>"
                                                        style="width:155px; height:155px; padding:2px 5px">
                                                    <?php }
                                                        }
                                                    }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" style="    margin-top: 30px;">
                                            360 Image : <span style="color:red">*</span>
                                            <input type="file" class="form-control" name="images360[]" multiple
                                                accept="image/*" onchange="readURL360(this);">
                                            <div class="row" id="img360con"
                                                style="overflow:auto; height:160px; text-align:center; margin-bottom:30px">
                                                <?php
                                            $destinationFoleder = 'assets/360/'.$id;
                                            if (is_dir($destinationFoleder)){
                                                $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                                $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                                foreach ($files as $f) 
                                                {
                                                    if (is_file($f)) { ?>
                                                <div class="col-sm-4">
                                                    <img src="<?php echo $f; ?>"
                                                        style="width:100%; height:250px; padding:2px 5px; margin-top:15px">
                                                </div>
                                                <?php }
                                                }
                                            }?>
                                            </div>
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            Description : <span style="color:red">*</span>
                                            <textarea name="description" class="form-control summernote" rows="5"
                                                required>
                                            <?php echo $description; ?>
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            Amenities : <span style="color:red">*</span>
                                            <textarea name="amenities" class="form-control summernote" rows="7"
                                                required>
                                            <?php echo $amenities; ?>
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" style="margin-top:30px"
                                            type="submit"><?php echo $id > 0 ? "UPDATE ROOM" : "CREATE ROOM" ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php if (isset($_GET["id"]) && $_GET["id"] > 0){

    echo "<script>
    swal({
        title: $isActivate == 1 ? 'Activation Completed!' : 'User not found!',
        text: $isActivate == 1 ? 'Your account has been activated, you can now use your acccount!' :
            'users not found in our system!',
        type: $isActivate == 1 ? 'success' : 'warning',
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
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="actions/js/app.js"></script>

<script src="assets/table/datatable/datatables.js"></script>
<script src="assets/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="assets/table/datatable/button-ext/jszip.min.js"></script>
<script src="assets/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="assets/table/datatable/button-ext/buttons.print.min.js"></script>

<script src="assets/sweetalerts/sweetalert2.min.js"></script>
<script src="assets/sweetalerts/custom-sweetalert.js"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript',
                'clear'
            ]],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
            ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
        ]
    })
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