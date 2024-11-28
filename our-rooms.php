<!DOCTYPE html>
<html lang="en">
<?php 
include "classes/userLogin.php";
$account = new user_login;


$pageno = 1;
if (isset($_GET["pageno"])){
    $pageno = $_GET["pageno"];
}


$no_of_records_per_page = 15;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages = round($account->countrooms() / $no_of_records_per_page);
?>

<head>
    <title>ReSEArva</title>

    <!-- Google Font -->
    <?php include "includes/cssContainer.php" ?>
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
        width: 65px;
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

    .hoverbutton a {
        margin: 10px 0;
    }

    .roomcontainer:hover .hoverbutton {
        opacity: 1;
    }

    .roomcontainer:hover .room-item {
        opacity: 0.2;
    }

    .btn-success {
        border: 2px solid #000;
    }

    .btn-success:hover {
        border: 2px solid #000;
    }

    .btn-success i {
        vertical-align: baseline;
    }


    .card .img-top {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    </style>

</head>

<body>
    <?php include "includes/menuheader.php" ?>
    <style>
    .roomcontainer:hover .img-top {
        display: inline;
    }
    </style>
    <section class="rooms-section spad" style="margin-top:30px">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>OUR ROOMS</span>
                        
                        <style>
                        .pagination {
                            display: inline-block;
                            padding-left: 0;
                            margin: 20px 0;
                            border-radius: 4px
                        }

                        .pagination>li {
                            display: inline
                        }

                        .pagination>li>a,
                        .pagination>li>span {
                            position: relative;
                            float: left;
                            padding: 6px 12px;
                            margin-left: -1px;
                            line-height: 1.42857143;
                            color: #337ab7;
                            text-decoration: none;
                            background-color: #fff;
                            border: 1px solid #ddd;
                            color: #606060;
                        }

                        .pagination>li:first-child>a,
                        .pagination>li:first-child>span {
                            margin-left: 0;
                            border-top-left-radius: 4px;
                            border-bottom-left-radius: 4px
                        }

                        .pagination>li:last-child>a,
                        .pagination>li:last-child>span {
                            border-top-right-radius: 4px;
                            border-bottom-right-radius: 4px
                        }

                        .pagination>li>a:focus,
                        .pagination>li>a:hover,
                        .pagination>li>span:focus,
                        .pagination>li>span:hover {
                            z-index: 2;
                            color: #fff;
                            background-color: #1F995A;
                            border-color: #ddd

                        }

                        .pagination>.active>a,
                        .pagination>.active>a:focus,
                        .pagination>.active>a:hover,
                        .pagination>.active>span,
                        .pagination>.active>span:focus,
                        .pagination>.active>span:hover {
                            z-index: 3;
                            color: #fff;
                            cursor: default;
                            background-color: #337ab7;
                            border-color: #337ab7
                        }

                        .pagination>.disabled>a,
                        .pagination>.disabled>a:focus,
                        .pagination>.disabled>a:hover,
                        .pagination>.disabled>span,
                        .pagination>.disabled>span:focus,
                        .pagination>.disabled>span:hover {
                            color: #777;
                            cursor: not-allowed;
                            background-color: #fff;
                            border-color: #ddd
                        }

                        .pagination-lg>li>a,
                        .pagination-lg>li>span {
                            padding: 10px 16px;
                            font-size: 18px;
                            line-height: 1.3333333
                        }

                        .pagination-lg>li:first-child>a,
                        .pagination-lg>li:first-child>span {
                            border-top-left-radius: 6px;
                            border-bottom-left-radius: 6px
                        }

                        .pagination-lg>li:last-child>a,
                        .pagination-lg>li:last-child>span {
                            border-top-right-radius: 6px;
                            border-bottom-right-radius: 6px
                        }

                        .pagination-sm>li>a,
                        .pagination-sm>li>span {
                            padding: 5px 10px;
                            font-size: 12px;
                            line-height: 1.5
                        }

                        .pagination-sm>li:first-child>a,
                        .pagination-sm>li:first-child>span {
                            border-top-left-radius: 3px;
                            border-bottom-left-radius: 3px
                        }

                        .pagination-sm>li:last-child>a,
                        .pagination-sm>li:last-child>span {
                            border-top-right-radius: 3px;
                            border-bottom-right-radius: 3px
                        }
                        </style>
                        <div style="text-align:center">
                            <ul class="pagination">
                                <li><a href="?pageno=1">First</a></li>
                                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                    <a
                                        href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                                </li>
                                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                    <a
                                        href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                                </li>
                                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                            </ul>
                        </div>
                        <!-- <h2>Discover Some of Our Features Services</h2> -->
                    </div>
                </div>
                <?php 
                    $rooms = $account->getRooms(0, $offset, $no_of_records_per_page);
                    $cntr = 0;
                    while($row = $rooms->fetch_assoc()){
                ?>
                <div class="col-lg-4 col-md-6 roomcontainer" style="position:relative;">
                    <div class="room-item widget-content widget-content-area">
                        <div class="card">
                            <?php
                                $destinationFoleder = 'assets/rooms/'.$row["id"];
                                if (is_dir($destinationFoleder)){
                                    $dir  = new RecursiveDirectoryIterator($destinationFoleder, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
                                    $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
                                    $counterimage = 0;
                                    foreach ($files as $f) 
                                    {
                                        if (is_file($f) && $counterimage == 0) { ?>
                            <img src="<?php echo $f; ?>" alt="Card Back">
                            <?php }else if (is_file($f) && $counterimage == 1){ ?>
                            <img src="<?php echo $f; ?>" class="img-top" alt="Card Front">
                            <?php }
                                        $counterimage++;
                                    }
                                 }?>
                        </div>
                        <style>
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

                        <div class="ri-text" style="padding: 5px 24px 30px 15px;border: 0px solid #ebebeb;">
                            <div class="rating">
                                <div class="rating-upper" style="width: <?php echo ((int)$row["avr"] * 100) / 5; ?>%">
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
                            <h3 style="margin-bottom:0px !important;font-size: 26px;">
                                <?php echo $row["type"]." - ".$row["name"]; ?></h3>
                            <h3 style="font-size:18px; margin-bottom:5px">
                                <?php echo number_format($row["price"], 2); ?><span> / Per day</span></h3>

                            <?php echo $row["amenities"]; ?>
                            <div
                                style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin-bottom:20px">
                                <?php echo strip_tags($row["description"]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="hoverbutton">
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
                        <!-- <a class="btn btn-success"><i class="fa fa-bed"></i> Book now</a> -->
                        <a href="room-details.php?id=<?php echo $row["id"]; ?>" class="btn btn-success" style="background: #222736;color: #aaaab3;"><i
                                class="fa fa-search-plus"></i> View more</a>
                        <a class="btn btn-success view360" data-image="<?php echo $img360; ?>"style="background: #222736;color: #aaaab3;> <i
                                class="fa fa-camera-retro"></i> 360° view</a>
                    </div>
                    <div class="conatinerButtonHover"></div>
                </div>
                <?php } ?>


                <div class="col-lg-12" style="text-align:center">
                    <!-- <div class="room-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div> -->

                    <ul class="pagination">
                        <li><a href="?pageno=1">First</a></li>
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a
                                href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                        </li>
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a
                                href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include "includes/footer.php" ?>
    <?php include "includes/jscontainer.php" ?>
</body>

</script>

</html>