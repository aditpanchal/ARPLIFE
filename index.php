<?php
require("config/dbconnect.php");
?>

<!doctype html>
<html>

<!-- head-tag -->
<?php include("mainincludes/csslinks.php"); ?>


<body id="home-version-1" class="home-version-1" data-style="default">
    <div class="site-content">


        <!-- header -->
        <?php include("mainincludes/header.php") ?>
        <!--=========================-->
        <!--=        Slider         =-->
        <!--=========================-->



        <section class="slider-wrapper">
            <div class="slider-start slider-2 owl-carousel owl-theme">



                <div class="item">
                    <img src="media/images/banner/f5.jpg" alt="">
                    <div class="container-fluid custom-container slider-content">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-8 col-md-8 col-lg-6 ml-auto">
                                <div class="slider-text style-two">
                                    <h1 class="animated fadeIn"><span>Sale Discount Off</span> 50%!</h1>
                                    <p class="animated fadeIn">Here is just a small selection of the work we do, demonstrating how we deliver results for businesses from every sector.</p>
                                    <a class="animated fadeIn btn-two" href="#">shopping now</a>
                                </div>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                </div>

                <div class="item">
                    <img src="media/images/banner/f4.jpg" alt="">
                    <div class="container-fluid custom-container slider-content">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-8 col-md-6 offset-md-1 col-lg-6 offset-xl-2 col-xl-5 mr-auto">
                                <div class="slider-text style-two mob-align-left">
                                    <h1 class="animated fadeIn"><span>Sale Discount Off</span> 50%!</h1>
                                    <p class="animated fadeIn">Here is just a small selection of the work we do, demonstrating how we deliver results for businesses from every sector.</p>
                                    <a class="animated fadeIn btn-two" href="#">shopping now</a>
                                </div>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                </div>

                <div class="item">
                    <img src="media/images/banner/f1.jpg" alt="">
                    <div class="container-fluid custom-container slider-content">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-8 col-md-8 col-lg-6 ml-auto">
                                <div class="slider-text style-two">
                                    <h1 class="animated fadeIn"><span>Sale Discount Off</span> 50%!</h1>
                                    <p class="animated fadeIn">Here is just a small selection of the work we do, demonstrating how we deliver results for businesses from every sector.</p>
                                    <a class="animated fadeIn btn-two" href="#">shopping now</a>
                                </div>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                </div>

            </div>
        </section>
        <!-- Slides end -->




        <!--=========================-->
        <!--= Product banner style two  =-->
        <!--=========================-->

        <section class="product-banner-two-area padding-top-90">
            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="prod-banner-two">
                            <a href="#">
                                <img src="media/images/banner/s1.jpg" alt="">
                                <div class="pb-info">
                                    <p>Woman's Shop</p>
                                    <h6>20% Off</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="prod-banner-two">
                            <a href="#">
                                <img src="media/images/banner/s2.jpg" alt="">
                                <div class="pb-info">
                                    <p>Shoes's Shop</p>
                                    <h6>25% Off</h6>
                                </div>
                            </a>
                        </div>
                        <div class="prod-banner-two">
                            <a href="#">
                                <img src="media/images/banner/s3.jpg" alt="">
                                <div class="pb-info">
                                    <p>Child's Shop</p>
                                    <h6>15% Off</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="prod-banner-two">
                            <a href="#">
                                <img src="media/images/banner/s4.jpg" alt="">
                                <div class="pb-info">
                                    <p>Men Shop</p>
                                    <h6>15% Off</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container-wo -->
        </section>

        <!--=========================-->
        <!--= Product banner style two  =-->
        <!--=========================-->


        <section class="main-product">
            <div class="container container-two">
                <div class="section-heading">
                    <h3>Welcome to <span>product</span></h3>
                </div>
                <!-- /.section-heading-->
                <div class="row">
                    <div class="col-xl-12 ">
                        <div class="pro-tab-filter style-two">
                            <ul class="pro-tab-button">
                                <li class="filter active" data-filter="*">ALL</li>
                                <li class="filter" data-filter=".two">Accessories</li>
                                <li class="filter" data-filter=".three">Men's clothing</li>
                                <li class="filter" data-filter=".four">Kids clothing</li>
                                <li class="filter" data-filter=".five">Women dresses</li>
                            </ul>
                            <div class="grid row">
                                <!-- single product -->
                                <?php
                                $qry = "select * from product_master";
                                $res = mysqli_query($conn, $qry);
                                $rowcount = mysqli_num_rows($res);

                                if ($rowcount > 0) {
                                    while ($row = mysqli_fetch_array($res)) {
                                        $p_id = $row['pm_productid'];
                                ?>
                                        <div class=" grid-item two col-6 col-md-6  col-lg-4 col-xl-3">

                                            <div class="sin-product style-two">
                                                <a href="singleproduct.php?productid=<?= $row['pm_productid'] ?>">
                                                <div class="pro-img">

                                                    <img src="admin/images/uploads/<?= $row['pm_image'] ?>" id="single" height="300rem">
                                                </div>
                                    </a>

                                                <div class="mid-wrapper">
                                                    <h5 class="pro-title"><a href=""><?= $row['pm_productname'] ?></a></h5>
                                                    <div class="color-variation">
                                                        <ul>
                                                            <li><i class="fas fa-circle"></i></li>
                                                            <li><i class="fas fa-circle"></i></li>
                                                            <li><i class="fas fa-circle"></i></li>
                                                            <li><i class="fas fa-circle"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p><?php if ($row['pm_type'] == 'M') echo "Male";
                                                        else echo "Female"; ?> / <span><?= $row['pm_price'] ?></span></p>
                                                </div>

                                                <div class="icon-wrapper">
                                                    <div class="pro-icon">
                                                        <ul>
                                                            <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                            <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                            <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a href="#">add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $sizeqry = "SELECT * from al_productsize where ps_productid = $p_id";
                                        $sizeres = mysqli_query($conn, $sizeqry);
                                        $sizerowcount = mysqli_num_rows($sizeres);
                                        if ($sizerowcount > 0) {
                                            while ($getsizerows = mysqli_fetch_array($sizeres)) {
                                                $sizeid = $getsizerows['ps_sizeid'];
                                        ?>
                                       <?php  }
                                        }
                                        ?>         
                                        
                                        <div class="modal quickview-wrapper" id="modal">
                                            <div class="quickview">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="close-qv">
                                                            <i class="flaticon-close"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Product View Slider -->
                                                        <div class="quickview-slider">
                                                            <div class="slider-for">
                                                                <div class="">
                                                                    <img src="media/images/product/single/b1.jpg" alt="Thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b2.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b3.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b4.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b5.jpg" alt="Thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b1.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b2.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b3.jpg" alt="thumb">
                                                                </div>
                                                            </div>

                                                            <div class="slider-nav">

                                                                <div class="">
                                                                    <img src="media/images/product/single/b1.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b2.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b3.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <div class="">
                                                                        <img src="media/images/product/single/b4.jpg" alt="Thumb">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b5.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b1.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b2.jpg" alt="thumb">
                                                                </div>
                                                                <div class="">
                                                                    <img src="media/images/product/single/b3.jpg" alt="thumb">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.quickview-slider -->
                                                    </div>

                                                    <!-- /.col-xl-6 -->

                                                    <div class="col-md-6">
                                                        <div class="product-details">
                                                            <h5 class="pro-title"><a href=""><?= $row['pm_productname'] ?></a></h5>

                                                            <span class="price">Price : <?= $row['pm_price']; ?></span>
                                                            <div class="size-variation">
                                                                <span>size :</span>
                                                                <select name="size-value">
                                                                <option value="<?= $sizeid = $getsizerows['ps_sizeid'] ?>"><?= $getsizerows['ps_size'] ?></option>  
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="color-variation">
                                                                <span>color :</span>
                                                                <ul>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                    <li><i class="fas fa-circle"></i></li>
                                                                </ul>
                                                            </div>

                                                            <div class="add-tocart-wrap">
                                                                <!--PRODUCT INCREASE BUTTON START-->
                                                                <div class="cart-plus-minus-button">
                                                                    <input type="text" value="1" name="qtybutton" class="cart-plus-minus">
                                                                </div>
                                                                <a href="#" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Add to
                                                                    Cart</a>
                                                                <!-- <a href="#"><i class="flaticon-valentines-heart"></i></a> -->
                                                            </div>

                                                            <!-- <span>SKU:	N/A</span>
								<p>Tags <a href="#">boys,</a><a href="#"> dress,</a><a href="#">Rok-dress</a></p> -->

                                                            <p>But I must explain to you how all this mistaken idedenounc pleasure and praisi pain was
                                                                born and I will give you a complete accosystem, and expound the actu teachings of the
                                                                great explore tmaster-builder of human happiness. No one rejects, dislikes,
                                                                or avoids.</p>

                                                            <div class="product-social">
                                                                <span>Share :</span>
                                                                <ul>
                                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <!-- /.product-details -->
                                                    </div>
                                                    <!-- /.col-xl-6 -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            
            <!-- Container -->
        </section>
        <!-- main-product -->

        <!--=========================-->
        <!--=   Discount Countdown area      =-->
        <!--=========================-->

        <section class="add-area">
            <a href="#"><img src="media/images/banner/add.jpg" alt=""></a>
        </section>

        <!--=========================-->
        <!--=   Product  area with  banner      =-->
        <!--=========================-->

        <section class="banner-product">
            <div class="container-fluid custom-container">
                <div class="section-heading pb-30">
                    <h3>NEW <span>TRENDING</span></h3>
                </div>
                <!-- section-heading-->
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!-- Product baneer-->
                        <div class="prod-banner-two mt-0">
                            <a href="#">
                                <img src="media/images/banner/s5.jpg" alt="">
                                <div class="pb-info">
                                    <p>Woman's Shop</p>
                                    <h6>40% Off</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Col end-->
                    <div class="no-padding col-xl-8 col-lg-8">
                        <div class="prod-carousel owl-carousel owl-theme">
                            <div class="sin-prod-car">
                                <!-- SingleProduct-->
                                <div class="sin-product style-two small">
                                    <div class="pro-img">
                                        <img src="media/images/product/sp8.jpg" alt="">
                                    </div>
                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="product.html">Embellished white dress</a></h5>
                                        <div class="color-variation">
                                            <ul>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                            </ul>
                                        </div>
                                        <p>Woman / <span></span></p>
                                    </div>
                                    <div class="icon-wrapper">
                                        <div class="pro-icon">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product-->
                                <div class="sin-product style-two small">
                                    <div class="pro-img">
                                        <img src="media/images/product/sp9.jpg" alt="">
                                    </div>
                                    <span class="new-tag">NEW!</span>

                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="product.html">Kids small dress</a></h5>
                                        <div class="color-variation">
                                            <ul>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                            </ul>
                                        </div>
                                        <p>Kids / <span>$37</span></p>
                                    </div>
                                    <div class="icon-wrapper">
                                        <div class="pro-icon">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sin-prod-car">
                                <!-- Single Product-->
                                <div class="sin-product style-two small">
                                    <div class="pro-img">
                                        <img src="media/images/product/sp10.jpg" alt="">
                                    </div>
                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="product.html">Womens exclusive shirt </a></h5>
                                        <div class="color-variation">
                                            <ul>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                            </ul>
                                        </div>
                                        <p>Kids / <span>$37</span></p>
                                    </div>
                                    <div class="icon-wrapper">
                                        <div class="pro-icon">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product-->
                                <div class="sin-product style-two small">
                                    <div class="pro-img">
                                        <img src="media/images/product/sp11.jpg" alt="">
                                    </div>
                                    <span class="new-tag">NEW!</span>

                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="product.html">Cotton full sleeve</a></h5>
                                        <div class="color-variation">
                                            <ul>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                            </ul>
                                        </div>
                                        <p>Kids / <span>$37</span></p>
                                    </div>
                                    <div class="icon-wrapper">
                                        <div class="pro-icon">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sin-prod-car">
                                <!-- Single Product-->
                                <div class="sin-product style-two small">
                                    <div class="pro-img">
                                        <img src="media/images/product/sp12.jpg" alt="">
                                    </div>
                                    <span class="new-tag">NEW!</span>

                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="product.html">Men winter dress</a></h5>
                                        <div class="color-variation">
                                            <ul>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                            </ul>
                                        </div>
                                        <p>Kids / <span>$37</span></p>
                                    </div>
                                    <div class="icon-wrapper">
                                        <div class="pro-icon">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product-->
                                <div class="sin-product style-two small">
                                    <div class="pro-img">
                                        <img src="media/images/product/sp12.jpg" alt="">
                                    </div>
                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="product.html">Women shirt top</a></h5>
                                        <div class="color-variation">
                                            <ul>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                                <li><i class="fas fa-circle"></i></li>
                                            </ul>
                                        </div>
                                        <p>Kids / <span>$37</span></p>
                                    </div>
                                    <div class="icon-wrapper">
                                        <div class="pro-icon">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                                <li><a href="#"><i class="flaticon-compare"></i></a></li>
                                                <li><a class="trigger" href="#"><i class="flaticon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Col end-->
                </div>
                <!-- /.row -->
            </div>
            <!-- Container End -->
        </section>
        <!-- main-product End -->

        <!--=========================-->
        <!--=   Subscribe area      =-->
        <!--=========================-->

        <section class="subscribe-area style-two">
            <div class="container container-two">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="subscribe-text">
                            <h6>Join our newsletter</h6>
                        </div>
                    </div>
                    <!-- col-xl-6 -->

                    <div class="col-lg-7">
                        <div class="subscribe-wrapper">
                            <input placeholder="Enter Keyword" type="text">
                            <button type="submit">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-two -->
        </section>
        <!-- subscribe-area -->


        <!-- footer -->
        <?php include("mainincludes/footer.php"); ?>


        <!-- Back to top-->

        <?php include("mainincludes/backtotop.php"); ?>


        <!-- Popup -->

        <?php // include("mainincludes/popup.php"); 
        ?>


    </div>
    <!-- Quick View -->

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