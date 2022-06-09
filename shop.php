<?php
require("config/dbconnect.php");
$subcategoryid = (isset($_GET["subcategoryid"]) ? intval($_GET["subcategoryid"]) : '');
$categoryid = (isset($_GET["categoryid"]) ? intval($_GET["categoryid"]) : '');
$brandid = (isset($_GET["brandid"]) ? intval($_GET["brandid"]) : '');
$gender = (isset($_GET["gender"]) ? ($_GET["gender"]) : '');

// echo $subcategoryid;
// echo $categoryid;
// echo $brandid;
// echo $gender;
?>


<!doctype html>
<html>

<!-- head-tag -->
<?php include("mainincludes/csslinks.php"); ?>


<body id="home-version-1" class="home-version-1" data-style="default">
    <div class="site-content">


        <!-- header -->
        <?php include("mainincludes/header.php") ?>

        <!-- Breadcrumb -->
        <section class="breadcrumb-area" style="padding: 130px 0 10px;">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bc-inner">
                            <p><a href="index.php">Home |</a> Shop</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Shop Area -->
        <section class="shop-area">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="order-1 order-lg-2 col-lg-9 col-xl-9">
                        <div class="shop-sorting-area row">
                            <div class="col-4 col-sm-4 col-md-6">
                                <ul class="nav nav-tabs shop-btn" id="myTab" role="tablist">
                                    <li class="nav-item ">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="flaticon-menu"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="flaticon-list"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-->
                            <div class="col-12 col-sm-8 col-md-6">
                                <div class="sort-by">
                                    <span>Sort by :</span>
                                    <select class="orderby" name="orderby">
                                        <option value="menu_order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option selected="selected">Best Selling</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- /.shop-sorting-area -->

                        <!-- Showing Products -->
                        <div class="shop-content">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <?php
                                        if($subcategoryid == '' && $brandid == ''){
                                            $qry = "select * from product_master where pm_categoryid=$categoryid and pm_type='$gender'";
                                        } elseif($categoryid == '' && $brandid == ''){
                                            $qry = "select * from product_master where pm_subcategoryid=$subcategoryid and pm_type='$gender'";
                                        } elseif($categoryid == '' && $subcategoryid == ''){
                                            $qry = "select * from product_master where pm_brandid=$brandid and pm_type='$gender'";
                                        }
                                        $res = mysqli_query($conn, $qry);
                                        $rowcount = mysqli_num_rows($res);

                                        if ($rowcount > 0) {
                                            while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                                <div class="col-sm-6 col-xl-4">
                                                    <div class="sin-product style-two">
                                                        <div class="pro-img">
                                                            <img src="admin/images/uploads/<?= $row['pm_image'] ?>" height="300rem">
                                                        </div>
                                                        <div class="mid-wrapper">
                                                            <h5 class="pro-title"><a href="product.html"><?= $row['pm_productname'] ?></a></h5>
                                                            <div class="color-variation">
                                                                <ul>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                </ul>
                                                            </div>
                                                            <p><?php if ($row['pm_type'] == "M") echo "Man";
                                                                else echo "Woman"; ?> / <span><?= $row['pm_price'] ?></span></p>
                                                        </div>
                                                        <div class="icon-wrapper">
                                                            <div class="pro-icon">
                                                                <ul>
                                                                    <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                                    <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                                    <li><a href="#" class="trigger"><i class="flaticon-eye"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="add-to-cart">
                                                                <a href="#">add to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.sin-product -->
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo "No product found";
                                        }
                                        ?>
                                        <!-- /.col- -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.tab-pane-->
                        </div>
                        <!-- /.tab-content -->
                        <div class="load-more-wrapper">
                            <a href="create-account.html" class="btn-two">Load More</a>
                        </div>
                        <!-- /.load-more-wrapper -->

                    </div>
                    <!-- /.shop-content -->
                </div>
            </div>
    </div>
    </section>

    <!-- footer -->
    <?php include("mainincludes/footer.php"); ?>


    <!-- Back to top-->

    <?php include("mainincludes/backtotop.php"); ?>


    <!-- Popup -->

    <?php // include("mainincludes/popup.php"); 
    ?>


    </div>
    <!-- /#site -->

    <!-- Dependency Scripts -->
    <script src="dependencies/jquery/jquery.min.js"></script>
    <script src="dependencies/popper.js/popper.min.js"></script>
    <script src="dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="dependencies/owl.carousel/js/owl.carousel.min.js"></script>
    <script src="dependencies/wow/js/wow.min.js"></script>
    <script src="dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
    <script src="dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
    <script src="dependencies/jquery.countdown/js/jquery.countdown.min.js"></script>
    <script src="dependencies/gmap3/js/gmap3.min.js"></script>
    <script src="dependencies/venobox/js/venobox.min.js"></script>
    <script src="dependencies/slick-carousel/js/slick.js"></script>
    <script src="dependencies/headroom/js/headroom.js"></script>
    <script src="dependencies/jquery-ui/js/jquery-ui.min.js"></script>
    <!--Google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsBrMPsyNtpwKXPPpG54XwJXnyobfMAIc"></script>


    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>

</body>



</html>