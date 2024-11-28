<!DOCTYPE html>
<html lang="en">
<?php
include "classes/accounts.php";
$account = new accounts;
$type = ""; 
        if (isset($_GET["type"])){
            $type = $_GET["type"];
        }
        $account = new accounts;

?>


<head>
    <title>MY ACCOUNT - ACCOUNT LIST</title>

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

    <section class="hero-section" style="background: #dddddd; margin-top:20px">
        <div class="container">

            <div class="widget-content widget-content-area">
                <div class="card" style="border-radius:0px !important">
                    <div class="card-body">
                        <a href="my_account.php">
                            <i class="fa fa-home"></i> Account
                        </a>
                        <i class="fa fa-angle-right" style="#9b9b9b; margin:0 5px"></i>
                        <span style="color:#dfa974">
                            <i class="fa fa-user"></i>
                            <?php echo $type == 1 ? "Admin Lists" : "Customer Lists" ?>
                        </span>
                        <?php if ($type == 1){ ?>
                        <a href="create_admin.php" class="btn btn-primary btn-sm" style="float:right">Create Admin</a>
                        <?php } ?>
                    </div>

                </div>
                <div class="mb-4 mt-4" style="margin-top:0px !important">
                    <table id="html5-extension" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>USERNAME</th>
                                <th>NUMBER</th>
                                <th>EMAIL</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        if ($type !== ""){
                                            $data = $account->getUserByType($type);
                                            $cntr = 0;
                                            while($row = $data->fetch_assoc()) { 
                                                ++$cntr                                      
                                        ?>
                            <tr id='<?php echo (string)$row['userid'] ?>'>
                                <td><?php echo $cntr.'.' ?></td>
                                <td><span class="badge badge-secondary"><i class="fa fa-user"></i>
                                        <?php echo (string)$row['username'] ?></span></td>
                                <td>
                                    <?php echo (string)$row['user_number'] ?>
                                </td>
                                <td>
                                    <span class="badge badge-secondary"><i class="fa fa-envelope"></i>
                                        <?php echo (string)$row['user_email'] ?></span>
                                </td>
                                </td>
                                <td>
                                    <span class="is-blocked">
                                        <span class="span-active">
                                            <a data-id="<?php echo (string)$row["userid"] ?>"
                                                data-status="<?php echo (string)$row["status"] ?>"
                                                style="color: #FFF; cursor: pointer" title="Acitive/Deactivate accounts"
                                                class="badge <?php if ((string)$row["status"] == 1) { echo "badge-success"; } else { echo "badge-danger"; }  ?> toggleActiveDeactivate">
                                                <i
                                                    class="fa fa-<?php if ((string)$row["status"] == 1) { echo "check"; } else { echo "times"; }  ?>"></i>
                                                <?php echo (string)$row["status"] == "1" ? "Active" : "Deactivated"; ?>
                                            </a>
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <a href="edit_profile.php?id=<?php echo (string)$row["userid"] ?>"
                                        class="btn btn-dark btn-sm"> <i class="fa fa-edit"></i> Edit
                                        Profile</a>
                                </td>
                            </tr>

                            <?php
                                        }
                                    } 
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
    <?php
    if (isset($_GET["id"]) && $_GET["id"] > 0){

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



</html>