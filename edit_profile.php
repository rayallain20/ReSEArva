<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;

if (isset($_GET["id"]) && !empty($_GET["id"])){
    $data = $account->getUser($_GET["id"]);
    $row = $data->fetch_assoc();
}else{
    header("Location: my_account.php");
}
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
                            <i class="fa fa-user"></i> My profile
                        </span>

                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" id="updateAccount">

                                <div class="form-group mb-4">
                                    <input type="hidden" name="id" value="<?php echo (string)$row["userid"]; ?>"
                                        class="userid">
                                    <input type="text" name="username" value="<?php echo (string)$row["username"]; ?>"
                                        class="form-control username" placeholder="Player Username" readonly />
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="first_name"
                                        value="<?php echo (string)$row["first_name"]; ?>" class="form-control fname"
                                        placeholder="First Name" />
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="last_name" value="<?php echo (string)$row["last_name"]; ?>"
                                        class="form-control lname" placeholder="Last Name" required />
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="phone" value="<?php echo (string)$row["user_number"]; ?>"
                                        class="form-control phone" placeholder="Phone/Mobile" required />
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="email" value="<?php echo (string)$row["user_email"]; ?>"
                                        class="form-control email" placeholder="Email" required />
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="new_password" class="form-control pass"
                                        placeholder="Assign New Password" />
                                    <small class="text-danger">Leave blank if you don't wish to change/reset.</small>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    Update Profile
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>



</html>