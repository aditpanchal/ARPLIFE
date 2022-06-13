<?php
require("config/dbconnect.php");
$subcategoryid = (isset($_GET["subcategoryid"]) ? intval($_GET["subcategoryid"]) : '');
$categoryid = (isset($_GET["categoryid"]) ? intval($_GET["categoryid"]) : '');
$brandid = (isset($_GET["brandid"]) ? intval($_GET["brandid"]) : '');
$gender = (isset($_GET["gender"]) ? $_GET["gender"] : '');


?>


<!doctype html>
<html>

<!-- head-tag -->
<?php include("mainincludes/csslinks.php"); ?>

<style>
<<<<<<< HEAD
    .price-range input[type="text"] {
        border: medium none;
        float: none;
        height: 30px;
        letter-spacing: 3px;
        text-align: center;
        width: 56%;
        word-spacing: 7px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 400;
        color: #d19e66;
        line-height: 23px;
    }

=======
>>>>>>> f4758cd22ed3abc87816ca97bee193b41e0e0ca2
    .customul {
        overflow: scroll;
        height: 200px;
    }

    .main-view .facets {
        width: 20%;
        min-height: 1000px;
        float: left;
        padding: 10px;
    }


    button.btn-two {
        font-size: 20px;
        color: #fff;
        background: #1d1b1b;
        padding: 13px 44px;
        border-radius: 0px;
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 700;
        margin-top: 10px;
        position: relative;
        text-transform: uppercase;
    }

    button.btn-two:hover:before {
        width: 100%;
    }

    button.btn-two:hover:after {
        width: 100%;
    }

    button.btn-two::before {
        position: absolute;
        content: '';
        width: 20px;
        height: 66px;
        top: -5px;
        left: -6px;
        border: 2px solid #1d1b1b;
        border-right: none;
        -o-transition: all 0.3s ease-in;
        -webkit-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }

    button.btn-two::after {
        position: absolute;
        content: '';
        width: 20px;
        height: 66px;
        top: -5px;
        right: -6px;
        border: 2px solid #1d1b1b;
        border-left: none;
        -o-transition: all 0.3s ease-in;
        -webkit-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }
</style>

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
            <div class="container-fluid custom-container" style="margin-right: 10px;">
                <div class=" row loadmorediv">
                    <div class="order-2 order-lg-1 col-lg-3 col-xl-3">
                        <div class=" shop-sidebar left-side">
                            <div class="sidebar-widget category-widget">

                                <div style="font-size: 30px;">
                                    <h1>Refine By</h1>
                                </div><span></span>

                                <div>
                                    <input type="text" placeholder="Search Product....">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                                </br>

                                <div>
                                    <h6>GENDER</h6>
                                    <ul>
                                        <li><input type="checkbox" id="box"> Male</li>
                                        <li><input type="checkbox"> Female</li>
                                    </ul>
                                </div>
                                </br>

                                <div>
                                    <h6> PRODUCT CATEGORIES</h6>
                                    <?php
                                    $getcatquery = "SELECT * from category_master";
                                    $getcatresult = mysqli_query($conn, $getcatquery);
                                    if (mysqli_num_rows($getcatresult) > 0) {
                                        while ($getcat = mysqli_fetch_array($getcatresult)) {
                                            $setcat = $getcat['catm_categoryname']; ?>
                                            <ul>
                                                <li><a href="#">
                                                        <input type="checkbox" value=" <?php $getcat['catm_categoryid'] ?> "> &nbsp;
                                                        <a href="#"><?= strtoupper($getcat['catm_categoryname']) ?></a>
                                                    </a> <span></span></li>

                                            </ul>

                                    <?php }
                                    }

                                    ?>
                                </div>
                                </br>
                                <!-- </div> -->

                                <!-- <div class="sidebar-widget range-widget"> -->
                                <div>
                                    <h6><u>SEARCH BY PRICE</u></h6>
                                    <div class="price-range">
                                        <div id="slider-range"></div>
                                        <span>Price :</span>
                                        <input type="text" id="amount">
                                    </div>
                                </div>
                                </br>
                                <!-- </div> -->

                                <!-- <div class="sidebar-widget category-widget"> -->

                                <div>
                                    <h6>Brands</h6>
                                    <ul class="customul">
                                        <?php
                                        if ($categoryid != '') {
                                            $getbrandquery = "SELECT DISTINCT(bm_brandname) from brand_master where bm_categoryid=$categoryid ";
                                        } elseif ($subcategoryid != '') {
                                            $getbrandquery = "SELECT DISTINCT(bm_brandname) from brand_master , product_master  where pm_subcategoryid=$subcategoryid and pm_brandid=bm_brandid ";
                                        } else {
                                            $getbrandquery = "SELECT DISTINCT(bm_brandname) from brand_master , product_master where pm_type='$gender'";
                                        }
                                        $getbrandresult = mysqli_query($conn, $getbrandquery);
                                        if (mysqli_num_rows($getbrandresult) > 0) {
                                            while ($getbrand = mysqli_fetch_array($getbrandresult)) {
                                                $setbrand = $getbrand['bm_brandname']; ?>
                                                <li><a href="#">
                                                        <input type="checkbox" value=" <?php $getbrand['bm_brandid'] ?>"> &nbsp;
                                                        <a href="#"><?= strtoupper($getbrand['bm_brandname']) ?></a>
                                                    </a> <span></span></li>


                                        <?php }
                                        }

                                        ?>
                                    </ul>

                                </div>
                                </br>
                                <!-- </div>
                                    </br>
                                <div class="sidebar-widget color-widget"> -->
                                <div>
                                    <h6><u>PRODUCT COLOR</u></h6>
                                    <ul>
                                        <?php
                                        if ($subcategoryid != '') {
                                            $getcolorsquery = "SELECT DISTINCT(pc_colorname) from al_productcolor  , product_master   where pm_productid=pc_productid  and pm_subcategoryid= $subcategoryid ";
                                        } elseif ($categoryid != '') {
                                            $getcolorsquery = "SELECT DISTINCT(pc_colorname) from al_productcolor  , product_master   where pm_productid=pc_productid  and pm_categoryid=$categoryid ";
                                        } else {
                                            $getcolorsquery = "SELECT DISTINCT(pc_colorname) from al_productcolor , product_master where pm_type='$gender'";
                                        }
                                        $getcolorresult = mysqli_query($conn, $getcolorsquery);
                                        if (mysqli_num_rows($getcolorresult) > 0) {
                                            while ($getcolors = mysqli_fetch_array($getcolorresult)) {
                                                $setcolor = $getcolors['pc_colorname']; ?>
                                                <li>

                                                    <input type="checkbox" onclick="" value="<?= $setcolor ?>">
                                                    <a style="color:<?= $setcolor ?>;  " href="#">
                                                        <?= $setcolor ?>
                                                    </a>
                                                </li>
                                        <?php }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                </br>

                                <div>
                                    <h6><u>SIZE & FIT</u></h6>
                                    <ul class="customul">

                                        <?php
                                        if ($subcategoryid != '') {
                                            $getsizequery = "SELECT DISTINCT(ps_size) from al_productsize , product_master  where pm_productid=ps_productid and pm_subcategoryid=$subcategoryid ";
                                        } elseif ($categoryid != '') {
                                            $getsizequery = "SELECT DISTINCT(ps_size) from al_productsize , product_master  where pm_productid=ps_productid and pm_categoryid=$categoryid ";
                                        } else {
                                            $getsizequery = "SELECT DISTINCT(ps_size) from al_productsize , product_master where pm_type='$gender'";
                                        }

                                        $sizeres = mysqli_query($conn, $getsizequery);
                                        if (mysqli_num_rows($sizeres) > 0) {
                                            while ($getsizerow = mysqli_fetch_array($sizeres)) { ?>
                                                <li><a href="#">
                                                        <input type="checkbox" value="<?php $getsrow['ps_sizeid'] ?>"> &nbsp;
                                                        <a href="#"><?= $getsizerow['ps_size'] ?></option>

                                                        </a> <span></span></li>



                                        <?php  }
                                        }

                                        ?>
                                    </ul>
                                </div>
                                </br>

                                <!-- </div>


                                <div class="sidebar-widget discount-widget"> -->
                                <h6>Discount</h6>
                                <?php
                                $getdiscountquery = "SELECT * from discount_master";
                                $getdiscountresult = mysqli_query($conn, $getdiscountquery);
                                if (mysqli_num_rows($getdiscountresult) > 0) {
                                    while ($getdiscount = mysqli_fetch_array($getdiscountresult)) {
                                        $setdiscount = $getdiscount['dm_discountname']; ?>
                                        <ul>
                                            <li><a href="#">
                                                    <input type="checkbox" value="<?php $getdiscount['dm_discountid'] ?>"> &nbsp;
                                                    <a href="#"><?= strtoupper($getdiscount['dm_discountname']) ?></a>
                                                </a> <span></span></li>

                                        </ul>


                                <?php }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 order-lg-2 col-lg-9 col-xl-9">
                        <div style="text-align: center; font-size: 30px; font-family:Verdana, Geneva, Tahoma, sans-serif; color: #d19e66;">
                            <h1><u>PRODUCTS </h1></u> <br>
                        </div>
                        <!-- Showing Products -->
                        <div class="shop-content ">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row loadmorediv">
                                        <?php

                                        if ($categoryid != '') {
                                            $qry = "SELECT * from product_master where pm_categoryid=$categoryid and pm_type='$gender'";
                                        } elseif ($subcategoryid != '') {
                                            $qry = "SELECT * from product_master where pm_subcategoryid=$subcategoryid and pm_type='$gender'";
                                        } elseif ($brandid != '') {
                                            $qry = "SELECT * from product_master where pm_brandid=$brandid and pm_type='$gender'";
                                        } elseif ($gender == 'F') {
                                            $qry = "SELECT * from product_master where pm_type='$gender'";
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
                                                                else echo "Woman"; ?> / <span>&#X20B9;<?= $row['pm_price'] ?></span></p>
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

    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="dependencies/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="assets/js/btnloadmore.js"></script>

    <script>
        $('#box').on('change', function() {
            if ($(this).prop('unchecked')) {
                alert("here")
            }
        })
        var html = `<input class="color-checkbox__input" id="avail_colors" name="colour" type="radio">
                    <label class="color-checkbox" for="avail_colors" id="col-Black-label"></label>
                    <span></span>`;
        var jqueryarray = JSON.parse('<?php echo json_encode($colors); ?>');
        $.each(jqueryarray, function(index, val) {
            $('#col-' + val + '-label').css("background-color", val);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.loadmorediv').btnLoadmore({
                showItem: 12,
                whenClickBtn: 6,
                textBtn: 'Load more',
                classBtn: 'btn-two'
            });
        });
    </script>
    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>

</body>



</html>