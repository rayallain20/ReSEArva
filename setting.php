<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;


$type = 0;
$page = "";
?>


<head>
    <title>MY ACCOUNT - SETTING</title>

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
                            <i class="fa fa-wrench"></i> Setting
                        </span>
                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important; background:#fff">
                    <div class="row card-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                GCASH QR Code <span style="color:red">*</span><br>
                                <?php                                                
                                    $destinationFoleder = 'assets/qrcode';
                                    if (is_dir($destinationFoleder)){
                                        $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                        foreach ($files as $f) 
                                        {
                                            if (is_file($f)) { ?>
                                    <img src="<?php echo $f; ?>" class="qrimg" style="width:500px">
                                <?php }
                                        }
                                    }?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                Upload GCASH Qr code <span style="color:red">*</span><br>
                                <input type="file" class="qrcode" onchange="readURL(this)" accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-primary uploadfile">UPLOAD QR CODE</button>
                            </div>
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
$(".uploadfile").click(function() {
    if ($(".qrcode")[0].files.length > 0) {
        var formData = new FormData();
        formData.append('qrcodeimg', $(".qrcode")[0].files[0]);
        $.ajax({
            type: 'POST',
            url: 'actions/php/uploadqrcode.php',
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {

            },
            success: function(res) {
                console.log(res);
                if (res.isSuccess) {
                    swal({
                        title: "Submitted",
                        text: "successfully save!",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3390b9",
                        confirmButtonText: "Ok",
                        cancelButtonText: "No",
                        closeOnConfirm: true
                    }).then((isConfirm) => {
                        if (isConfirm) {
                            window.location.reload();
                        }
                    });
                } else {
                    swal("Oops!", "Internet connection error!", "warning");
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    } else {
        swal("Image not found", "please select an image!", "warning");
    }
})
function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('.qrimg').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}
</script>

</html>