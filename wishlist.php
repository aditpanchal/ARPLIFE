<?php
require("config/dbconnect.php");
$getcustomerid = '';

$getcustomerid = (isset($_REQUEST['customerid']) ? $_REQUEST['customerid'] : '');
if ($getcustomerid != '') {
    $displaywishlistquery = "SELECT * from al_wishlist where wl_customerid=$getcustomerid";
    $getwishlistresult = mysqli_query($conn, $displaywishlistquery);
    if ($getwishlistresult) {
        $getwishlistrowcount = mysqli_num_rows($getwishlistresult);
    }
}

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
                            <p><a href="index.php">Home |</a> Wishlist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Wishlist Area -->
        <section class="cart-area">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-table">
                            <table class="tables">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($getwishlistrowcount > 0) {
                                        while ($getwishlistrows = mysqli_fetch_array($getwishlistresult)) {
                                            $getproductdataquery = "SELECT * from product_master where pm_productid=" . $getwishlistrows['wl_productid'];
                                            $getproductdataresult = mysqli_query($conn, $getproductdataquery);
                                            if ($getproductdataresult) {
                                                if (mysqli_num_rows($getproductdataresult) > 0) {
                                                    $getproductdata = mysqli_fetch_array($getproductdataresult);
                                                    $getproductimage = $getproductdata['pm_image'];
                                                    $getproductid = $getproductdata['pm_productid'];
                                                    $getproductname = $getproductdata['pm_productname'];
                                                    $getproductprice = $getproductdata['pm_price'];
                                                    $getstock = $getproductdata['pm_stock'];

                                                }
                                            } ?>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void()">X</a>
                                                </td>
                                                <td>
                                                    <a href="singleproduct.php?productid=<?= $getproductid ?>">
                                                        <div class="product-image">
                                                            <img alt="<?= $getproductimage ?>" height="200rem" src="admin/images/uploads/<?= $getproductimage ?>">
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="product-title">
                                                        <a href="singleproduct.php?productid=<?= $getproductid ?>"><?= $getproductname ?></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="quantity">
                                                        <input type="number" style="width:60% ;"  min="1" max="<?= (($getstock<50) ? $getstock : '50' ) ?>" value="<?= $getcartrows['wl_quantity'] ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <div class="price-box">
                                                                <span class="price"><?= $getproductprice ?></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>


                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="6"><span style="font-weight:500; font-size:15pt ; ">Wishlist is Empty</span></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col-xl-9 -->
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
    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>

</body>



</html>