<?php
require("config/dbconnect.php");
$productid = (isset($_GET["productid"]) ? intval($_GET["productid"]) : '');

$setsubcategory = $setstatus = $getcategoryforscdropdown = $set_product_brand = $catid = '';
$set_product_category  = $set_product_description =  $set_product_status = $getbrandid = $getcatid = '';
$getproductquery = "select * from product_master where pm_productid=$productid ";
$res = mysqli_query($conn, $getproductquery);
if (mysqli_num_rows($res) > 0) {
    while ($getrow = mysqli_fetch_array($res)){
    $getcatid = $getrow['pm_categoryid'];
    $getbrandid = $getrow['pm_brandid'];
    $set_product_category = (($getrow['pm_categoryid'] != '') ? $getrow['pm_categoryid'] : '');
    $set_product_subcategory = (($getrow['pm_subcategoryid'] != '') ? $getrow['pm_subcategoryid'] : '');
    $set_product_brand = (($getrow['pm_brandid'] != '') ? $getrow['pm_brandid'] : '');
    $set_product_name = (($getrow['pm_productname'] != '') ? $getrow['pm_productname'] : '');
    $set_product_description = (($getrow['pm_description'] != '') ? $getrow['pm_description'] : '');
    $set_product_price = (($getrow['pm_price'] != '') ? $getrow['pm_price'] : '');
    $set_product_discount = (($getrow['pm_discountid'] != '') ? $getrow['pm_discountid'] : '');
    $set_product_stock = (($getrow['pm_stock'] != '') ? $getrow['pm_stock'] : '');
    $set_product_image = (($getrow['pm_image'] != '') ? $getrow['pm_image'] : '');
    $set_product_type = (($getrow['pm_type'] != '') ? $getrow['pm_type'] : '');
    $set_product_status = (($getrow['pm_isactive'] != '') ? $getrow['pm_isactive'] : '');
?>

<!doctype html>
<html>


<!-- Mirrored from themeim.com/demo/comercio/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 09:09:37 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comercio - Fashion Shop Ecommerce HTML Template</title>

    <!-- Fav Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/fav-icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav-icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/fav-icons/favicon-16x16.png">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="dependencies/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/fontawesome/css/fontawesome-all.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/owl.carousel/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/owl.carousel/css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" href="dependencies/flaticon/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="dependencies/wow/css/animate.css" type="text/css">
    <link rel="stylesheet" href="dependencies/jquery-ui/css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="dependencies/venobox/css/venobox.css" type="text/css">
    <link rel="stylesheet" href="dependencies/slick-carousel/css/slick.css" type="text/css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">




</head>

<body id="home-version-1" class="home-version-1" data-style="default">

    <div class="site-content">


        <!--=========================-->
        <!--=        Header         =-->
        <!--=========================-->



        <!-- Top Bar area start
	============================================= -->


        <header id="header" class="header-area">
            <div class="top-bar">
                <div class="container-fluid custom-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="top-bar-left">
                                <p><i class="far fa-flag"></i><a href="contact.html">Our Location</a></p>

                                <p><i class="far fa-envelope"></i><a href="mailto:comercio@info.com">comercio@info.com</a></p>
                            </div>
                        </div>
                        <!-- Col -->
                        <div class="col-lg-6">
                            <div class="top-bar-right">
                                <div class="social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <a href="login.html" class="my-account">My Account</a>
                            </div>
                            <!--top-bar-right end-->
                        </div>
                        <!-- Col end-->
                    </div>
                    <!--Row end-->
                </div>
                <!--container end-->
            </div>
            <!--top-bar end-->

            <!-- Main Menu
		============================================= -->


            <div class="container-fluid custom-container menu-rel-container">
                <div class="row">
                    <!-- Logo
				============================================= -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="media/images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!--Col end-->

                    <!-- Main menu
				============================================= -->

                    <div class="col-lg-12 col-xl-7 order-lg-3 order-xl-2 menu-container">
                        <div class="mainmenu style-two">
                            <ul id="navigation">
                                <li class="has-child"><a href="index-2.html">home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.html">Home one</a></li>
                                        <li><a href="index-3.html">Home two</a></li>
                                        <li><a href="index-4.html">Home three</a></li>
                                    </ul>
                                </li>
                                <li class="has-child "><a href="collection.html">Collections</a>
                                    <ul class="sub-menu">
                                        <li><a href="collection.html">Collections four grid</a></li>
                                        <li><a href="collection-three-grid.html">Collections three grid</a></li>
                                        <li><a href="collection-two-grid.html">Collections two grid</a></li>
                                    </ul>
                                </li>
                                <li class="has-child"><a href="index-2.html">Men</a>
                                    <div class="mega-menu">
                                        <div class="mega-catagory per-20">
                                            <h4><a class="font-red" href="shop.html">Woman Dresses</a></h4>
                                            <ul class="mega-button">
                                                <li><a href="shop.html">Woman Dresses</a></li>
                                                <li><a href="shop.html">Women & Flowers</a></li>
                                                <li><a href="shop.html">Girl Hat in Sunlights</a></li>
                                                <li><a href="shop.html">Men Watches</a></li>
                                                <li><a href="shop.html">Clothes Fashion</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-catagory per-20">
                                            <h4><a class="font-red" href="shop.html">Clothes Fashion</a></h4>
                                            <ul class="mega-button">
                                                <li><a href="shop.html">Woman Dresses</a></li>
                                                <li><a href="shop.html">Girl Hat in Sunlights</a></li>
                                                <li><a href="shop.html">Men Watches</a></li>
                                                <li><a href="shop.html">Clothes Fashion</a></li>
                                                <li><a href="shop.html">Woman Dresses</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-catagory mega-img per-30">
                                            <a href="#"><img src="media/images/banner/mmb1.jpg" alt=""></a>
                                        </div>
                                        <div class="mega-catagory mega-img per-30">
                                            <a href="#"><img src="media/images/banner/mmb2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-child"><a href="index-2.html">Women</a>
                                    <div class="mega-menu five-col">
                                        <div class="mega-product">
                                            <h4><a class="font-red" href="shop.html">Product Category</a></h4>
                                            <ul class="mega-button">
                                                <li><a href="shop.html">Woman Dresses</a></li>
                                                <li><a href="shop.html">Women & Flowers</a></li>
                                                <li><a href="shop.html">Girl Hat in Sunlights</a></li>
                                                <li><a href="shop.html">Men Watches</a></li>
                                                <li><a href="shop.html">Clothes Fashion</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-product">
                                            <div class="sin-product">
                                                <div class="pro-img">
                                                    <img src="media/images/product/10.jpg" alt="">
                                                </div>
                                                <div class="mid-wrapper">
                                                    <h5 class="pro-title"><a href="product.html">High-Low Dresses</a></h5>
                                                    <span>$60.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mega-product">
                                            <div class="sin-product">
                                                <div class="pro-img">
                                                    <img src="media/images/product/11.jpg" alt="">
                                                </div>
                                                <div class="mid-wrapper">
                                                    <h5 class="pro-title"><a href="product.html">Empire Dresses</a></h5>
                                                    <span>$10.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mega-product">
                                            <div class="sin-product">
                                                <div class="pro-img">
                                                    <img src="media/images/product/12.jpg" alt="">
                                                </div>
                                                <div class="mid-wrapper">
                                                    <h5 class="pro-title"><a href="product.html">Bodycon Dresses</a></h5>
                                                    <span>$40.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mega-product">
                                            <div class="sin-product">
                                                <div class="pro-img">
                                                    <img src="media/images/product/13.jpg" alt="">
                                                </div>
                                                <div class="mid-wrapper">
                                                    <h5 class="pro-title"><a href="product.html">Laptop carry bag</a></h5>
                                                    <span>$70.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-child"><a href="shop.html" class="active">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.html">shop with sidebar</a></li>
                                        <li><a href="shop-four-grid.html">shop four grid</a></li>
                                        <li><a href="shop-without-sidebar.html">shop without sidebar</a></li>
                                        <li><a href="product.html">Product details</a></li>
                                        <li><a href="product-fullwidth.html">Product Fullwidth</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="account.html">Order</a></li>
                                    </ul>
                                </li>
                                <li class="has-child"><a href="blog.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="single.html">Single post</a></li>
                                        <li><a href="blog.html">Blog three grid</a></li>
                                        <li><a href="blog-two-grid.html">Blog two grid</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">CONTACT</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Menu container end-->


                    <div class="col-lg-6 col-xl-2 order-lg-2 order-xl-3">
                        <div class="header-right-menu">
                            <ul>
                                <li class="top-search style-two"><a href="javascript:void(0)"><i class="flaticon-magnifying-glass"></i></a>
                                    <input type="text" class="search-input" placeholder="Search">
                                </li>
                                <li><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="top-cart"><a href="javascript:void(0)"><i class="flaticon-bag"></i><span>2</span></a>

                                    <div class="cart-drop">
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <img alt="" src="media/images/product/car1.jpg">
                                            </div>
                                            <div class="cart-title">
                                                <p><a href="#">Aliquam Consequat</a></p>
                                            </div>
                                            <div class="cart-price">
                                                <p>1 x $500</p>
                                            </div>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <img alt="" src="media/images/product/car2.jpg">
                                            </div>
                                            <div class="cart-title">
                                                <p><a href="#">Quisque In Arcuc</a></p>
                                            </div>
                                            <div class="cart-price">
                                                <p>1 x $200</p>
                                            </div>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="cart-bottom">
                                            <div class="cart-sub-total">
                                                <p>Sub-Total <span>$700</span></p>
                                            </div>
                                            <div class="cart-sub-total">
                                                <p>Eco Tax (-2.00)<span>$7.00</span></p>
                                            </div>
                                            <div class="cart-sub-total">
                                                <p>VAT (20%) <span>$40.00</span></p>
                                            </div>
                                            <div class="cart-sub-total">
                                                <p>Total <span>$244.00</span></p>
                                            </div>
                                            <div class="cart-checkout">
                                                <a href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                            </div>
                                            <div class="cart-share">
                                                <a href="#"><i class="fa fa-share"></i>Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Col end-->
                </div>
                <!--Row end-->
            </div>
            <!--container end-->
        </header>
        <!--Header end-->



        <!--=========================-->
        <!--=        Mobile Header         =-->
        <!--=========================-->



        <header class="mobile-header">
            <div class="container-fluid custom-container">
                <div class="row">

                    <!-- Mobile menu Opener
					============================================= -->
                    <div class="col-4">
                        <div class="accordion-wrapper">
                            <a href="#" class="mobile-open"><i class="flaticon-menu-1"></i></a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="media/images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="top-cart">
                            <a href="javascript:void(0)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> (2)</a>
                            <div class="cart-drop">
                                <div class="single-cart">
                                    <div class="cart-img">
                                        <img alt="" src="media/images/product/car1.jpg">
                                    </div>
                                    <div class="cart-title">
                                        <p><a href="#">Aliquam Consequat</a></p>
                                    </div>
                                    <div class="cart-price">
                                        <p>1 x $500</p>
                                    </div>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="single-cart">
                                    <div class="cart-img">
                                        <img alt="" src="media/images/product/car2.jpg">
                                    </div>
                                    <div class="cart-title">
                                        <p><a href="#">Quisque In Arcuc</a></p>
                                    </div>
                                    <div class="cart-price">
                                        <p>1 x $200</p>
                                    </div>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="cart-bottom">
                                    <div class="cart-sub-total">
                                        <p>Sub-Total <span>$700</span></p>
                                    </div>
                                    <div class="cart-sub-total">
                                        <p>Eco Tax (-2.00)<span>$7.00</span></p>
                                    </div>
                                    <div class="cart-sub-total">
                                        <p>VAT (20%) <span>$40.00</span></p>
                                    </div>
                                    <div class="cart-sub-total">
                                        <p>Total <span>$244.00</span></p>
                                    </div>
                                    <div class="cart-checkout">
                                        <a href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                    </div>
                                    <div class="cart-share">
                                        <a href="#"><i class="fa fa-share"></i>Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row end -->
            </div>
            <!-- /.container end -->
        </header>

        <div class="accordion-wrapper">

            <!-- Mobile Menu Navigation
				============================================= -->
            <div id="mobilemenu" class="accordion">
                <ul>
                    <li class="mob-logo"><a href="index-2.html">
                            <img src="media/images/logo.png" alt="">
                        </a></li>
                    <li><a href="#" class="closeme"><i class="flaticon-close"></i></a></li>
                    <li>
                        <a href="#" class="link">Home<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="index-2.html">Home one</a></li>
                            <li><a href="index-3.html">Home two</a></li>
                            <li><a href="index-4.html">Home three</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" class="link">Collections<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="collection.html">Collections four grid</a></li>
                            <li><a href="collection-three-grid.html">Collections three grid</a></li>
                            <li><a href="collection-two-grid.html">Collections two grid</a></li>
                        </ul>
                    </li>
                    <li class="out-link"><a href="shop.html">Collections</a></li>

                    <li>
                        <a href="shop.html" class="link">Men<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="shop.html">Shop with sidebar</a></li>
                            <li><a href="shop-four-grid.html">Shop four grid</a></li>
                            <li><a href="shop-without-sidebar.html">Shop without sidebar</a></li>
                            <li><a href="product.html">Product details</a></li>
                            <li><a href="product-fullwidth.html">Product Fullwidth</a></li>
                            <li><a href="cart.html">Cart</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="link">Women<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="shop.html">Woman Dresses</a></li>
                            <li><a href="shop.html">Women & Flowers</a></li>
                            <li><a href="shop.html">Girl Hat in Sunlights</a></li>
                            <li><a href="shop.html">Men Watches</a></li>
                            <li><a href="shop.html">Clothes Fashion</a></li>
                            <li><a href="shop.html">Woman Dresses</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="link">Shop<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="shop.html">Shop with sidebar</a></li>
                            <li><a href="shop-four-grid.html">Shop four grid</a></li>
                            <li><a href="shop-without-sidebar.html">Shop without sidebar</a></li>
                            <li><a href="product.html">Product details</a></li>
                            <li><a href="product-fullwidth.html">Product Fullwidth</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="account.html">Order</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="link">Blog<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="single.html">Single post</a></li>
                            <li><a href="blog.html">Blog three grid</a></li>
                            <li><a href="blog-two-grid.html">Blog two grid</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="link">Pages<i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="login.html">Account</a></li>
                            <li><a href="create-account.html">Signup</a></li>
                            <li><a href="account.html">Login</a></li>
                        </ul>
                    </li>


                </ul>
                <div class="mobile-login">
                    <a href="login.html">Log in</a> |
                    <a href="create-account.html">Create Account</a>
                </div>
                <form action="#" id="moble-search">
                    <input placeholder="Search...." type="text">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <!--=========================-->
        <!--=        Breadcrumb         =-->
        <!--=========================-->

        <section class="breadcrumb-area">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bc-inner">
                            <p><a href="#">Home |</a> Shop</p>
                        </div>
                    </div>
                    <!-- /.col-xl-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!--=========================-->
        <!--=        Shop area          =-->
        <!--=========================-->

        <section class="shop-area single-product">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="order-2 order-md-1 col-md-4 col-lg-3 col-xl-3">
                        <div class=" shop-sidebar">
                            <div class="sidebar-widget sidebar-search">
                                <input type="text" placeholder="Search Product....">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                            <div class="sidebar-widget product-widget">
                                <h6>BEST SELLERS</h6>
                                <div class="wid-pro">
                                    <div class="sp-img">
                                        <img src="media/images/product/sb1.jpg" alt="">
                                    </div>
                                    <div class="small-pro-details">
                                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                                        <span>$60</span>
                                        <span class="pre-price">$80</span>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="wid-pro">
                                    <div class="sp-img">
                                        <img src="media/images/product/sb2.jpg" alt="">
                                    </div>
                                    <div class="small-pro-details">
                                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                                        <span>$60</span>
                                        <span class="pre-price">$80</span>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="wid-pro">
                                    <div class="sp-img">
                                        <img src="media/images/product/sb3.jpg" alt="">
                                    </div>
                                    <div class="small-pro-details">
                                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                                        <span>$60</span>
                                        <span class="pre-price">$80</span>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="wid-pro">
                                    <div class="sp-img">
                                        <img src="media/images/product/sb4.jpg" alt="">
                                    </div>
                                    <div class="small-pro-details">
                                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                                        <span>$60</span>
                                        <span class="pre-price">$80</span>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-widget banner-wid">
                                <div class="img">
                                    <img src="media/images/banner/sb1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-xl-3 -->
                    <div class="order-1 order-md-2 col-md-8 col-lg-9 col-xl-9">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
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
                           

                            <div class="col-lg-6 col-xl-6">
                                <div class="product-details">
                                    <h5 class="pro-title"><a href="#"><?= $set_product_name ?></a></h5>
                                    <span class="price">Price:</span>
                                    <span class="price"><?php echo "₹";
                                                        echo $set_product_price ?> </span>
                                    <div class="size-variation">
                                        <span>size :</span>
                                        <select name="size-value">
                                            <?php
                                            $getsizequery = "SELECT * from al_productsize where ps_productid= $productid";
                                            $sizeres = mysqli_query($conn, $getsizequery);
                                            if (mysqli_num_rows($sizeres) > 0) {
                                            while ($getsizerow = mysqli_fetch_array($sizeres)) {    
                                            ?>
                                            <option value="<?php $getsizerow['ps_sizeid']?>"><?=$getsizerow['ps_size'] ?></option>
                                            <?php  }
                                                        }
    }}
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="color-checkboxes">
                                        <h4>Color:</h4>
                                        <input class="color-checkbox__input" id="col-Blue" name="colour" type="radio">
                                        <label class="color-checkbox" for="col-Blue" id="col-Blue-label"></label>
                                        <span></span>

                                        <input class="color-checkbox__input" id="col-Green" value="#8bc34a" name="colour" type="radio">
                                        <label class="color-checkbox" for="col-Green" id="col-Green-label"></label>
                                        <span></span>

                                        <input class="color-checkbox__input" id="col-Yellow" value="#fdd835" name="colour" type="radio">
                                        <label class="color-checkbox" for="col-Yellow" id="col-Yellow-label"></label>
                                        <span></span>

                                        <input class="color-checkbox__input" id="col-Orange" value="#ff9800" name="colour" type="radio">
                                        <label class="color-checkbox" for="col-Orange" id="col-Orange-label"></label>
                                        <span></span>

                                        <input class="color-checkbox__input" id="col-Red" value="#f44336" name="colour" type="radio">
                                        <label class="color-checkbox" for="col-Red" id="col-Red-label"></label>
                                        <span></span>

                                        <input class="color-checkbox__input" id="col-Black" value="#222222" name="colour" type="radio">
                                        <label class="color-checkbox" for="col-Black" id="col-Black-label"></label>
                                        <span></span>
                                    </div>

                                    <div class="add-tocart-wrap">
                                        <!--PRODUCT INCREASE BUTTON START-->
                                        <div class="cart-plus-minus-button">
                                            <input type="text" value="1" name="qtybutton" class="cart-plus-minus">
                                        </div>
                                        <a href="#" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Add to Cart</a>
                                    </div>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>quis nostrud exercitation ullamco</li>
                                        <li>Duis aute irure dolor in reprehenderit</li>
                                    </ul>
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


                            <div class="col-xl-12">
                                <div class="product-des-tab">
                                    <ul class="nav nav-tabs " role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ADDITIONAL INFORMATION</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">REVIEWS (1)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="prod-bottom-tab-sin description">
                                                <h5>Description</h5>
                                                <p>But I must explain to you how all this taken idea of denouncipleasure and praisi pain was born and I will give you a complete accoun syste and expound the actu teachings of the great explorer of tmaster-builder of human happiness. No one rejects,
                                                    dislikes, or avoids pleasure beca pleasure, but because those how.But I must explain to you how all this mistaken idea of denouncipleasure and praisi pain was born and I will give you a complete accoun system, and expound the actu teachings
                                                    of the great explorer of tmaster-builder.</p>
                                                <p>But I must explain to you how all this taken idea of denouncipleasure and praisi pain was born and I will give you a complete accoun syste and expound the actu teachings of the great explorer mistaken idea of denouncipleasure and praisi pain</p>
                                                <ul>
                                                    <li>Lorem ipsum dolor sit amet</li>
                                                    <li>quis nostrud exercitation ullamco</li>
                                                    <li>Duis aute irure dolor in reprehenderit</li>
                                                    <li>Lorem ipsum dolor sit amet</li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet Duis aute irure dolor in denouncipleasure and praisi pain was born.Lorem ipsum dolor sit amet Duis aute irure dolor in denouncipleasure and praisi pain was born.</p>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="prod-bottom-tab-sin">
                                                <h5>Additional information</h5>
                                                <div class="info-wrap">
                                                    <div class="sin-aditional-info">
                                                        <div class="first">
                                                            Brand
                                                        </div>
                                                        <div class="secound">
                                                            ThemeIM
                                                        </div>
                                                    </div>
                                                    <div class="sin-aditional-info">
                                                        <div class="first">
                                                            Manufacturer
                                                        </div>
                                                        <div class="secound">
                                                            ThemeCity
                                                        </div>
                                                    </div>
                                                    <div class="sin-aditional-info">
                                                        <div class="first">
                                                            Colors
                                                        </div>
                                                        <div class="secound">
                                                            Black, Blue, Brown, Gray
                                                        </div>
                                                    </div>
                                                    <div class="sin-aditional-info">
                                                        <div class="first">
                                                            Brand
                                                        </div>
                                                        <div class="secound">
                                                            ThemeIM
                                                        </div>
                                                    </div>
                                                    <div class="sin-aditional-info">
                                                        <div class="first">
                                                            Brand
                                                        </div>
                                                        <div class="secound">
                                                            ThemeIM
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="prod-bottom-tab-sin">
                                                <h5>Review (1)</h5>
                                                <div class="product-review">
                                                    <div class="reviwer">
                                                        <img src="media/images/reviewer.png" alt="">
                                                        <div class="review-details">
                                                            <span>Posted by Tonoy - Published on March 22, 2018</span>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>But I must explain to you how all this mistaken idea of denouncipleasure and praisi pain was born and I will give you a complete.</p>
                                                        </div>
                                                    </div>
                                                    <div class="add-your-review">
                                                        <h6>ADD A REVIEW</h6>
                                                        <p>YOUR RATING* </p>
                                                        <div class="rating">
                                                            <ul>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                        <div class="raing-form">
                                                            <form action="#">
                                                                <input type="text" placeholder="">
                                                                <input type="text">
                                                                <textarea name="rating-form"></textarea>
                                                                <input type="submit">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col-xl-9 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.shop-area -->

        <section class="main-product padding-120">
            <div class="container container-two">
                <div class="section-heading">
                    <h3>related <span>product</span></h3>
                </div>
                <!-- /.section-heading-->
                <div class="row inner-wrapper">
                    <!-- Single product -->
                    <div class="col-sm-6 col-lg-3 col-xl-3">
                        <div class="sin-product">
                            <div class="pro-img">
                                <img src="media/images/product/8.jpg" alt="">
                            </div>
                            <div class="mid-wrapper">
                                <h5 class="pro-title"><a href="product.html">Bandage Dresses</a></h5>
                                <span>$60.00</span>
                            </div>
                            <div class="pro-icon">
                                <ul>
                                    <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                    <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                                    <li><a href="#" class="trigger"><i class="flaticon-zoom-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single product -->
                    <div class="col-sm-6 col-lg-3 col-xl-3">
                        <div class="sin-product">
                            <div class="pro-img">
                                <img src="media/images/product/1.jpg" alt="">
                            </div>
                            <div class="mid-wrapper">
                                <h5 class="pro-title"><a href="product.html">High-Low Dresses</a></h5>
                                <span>$60.00</span>
                            </div>
                            <div class="pro-icon">
                                <ul>
                                    <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                    <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                                    <li><a href="#" class="trigger"><i class="flaticon-zoom-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single product -->
                    <div class="col-sm-6 col-lg-3 col-xl-3">
                        <div class="sin-product">
                            <div class="pro-img">
                                <img src="media/images/product/2.jpg" alt="">
                            </div>
                            <div class="mid-wrapper">
                                <h5 class="pro-title"><a href="product.html">Empire Waist Dresses</a></h5>
                                <span>$60.00</span>
                            </div>
                            <div class="pro-icon">
                                <ul>
                                    <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                    <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                                    <li><a href="#" class="trigger"><i class="flaticon-zoom-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Single product -->
                    <div class="col-sm-6 col-lg-3 col-xl-3">
                        <div class="sin-product">
                            <div class="pro-img">
                                <img src="media/images/product/3.jpg" alt="">
                            </div>
                            <div class="mid-wrapper">
                                <h5 class="pro-title"><a href="product.html">Bodycon Dresses</a></h5>
                                <span>$60.00</span>
                            </div>
                            <div class="pro-icon">
                                <ul>
                                    <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                                    <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                                    <li><a href="#" class="trigger"><i class="flaticon-zoom-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container  -->
        </section>
        <!-- main-product -->

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

        <!--=========================-->
        <!--=   Footer area      =-->
        <!--=========================-->

        <footer class="footer-widget-area style-two">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-widget style-two">
                            <div class="logo">
                                <a href="#">
                                    <img src="media/images/logo.png" alt="">
                                </a>
                            </div>
                            <p>Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat vel illum dolore eu olestie.</p>
                            <div class="time-table">
                                <p>Opening time</p>
                                <span>Monday - Friday ( 8.00 to 18.00 )</span>
                                <span>Saturday ( 8.00 to 18.00 )</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-xl-3 -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget style-two">
                            <h3>Quick shop</h3>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Jewellery</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Collections</a></li>
                                    <li><a href="#">Sale</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-xl-3 -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget style-two">
                            <h3>CUSTOMER SERVICES</h3>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="#">FAQ's</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                    <li><a href="#">Orders and Returns</a></li>
                                    <li><a href="#">Consultant</a></li>
                                    <li><a href="#">Collections</a></li>
                                    <li><a href="#">Support Center</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-xl-3 -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget style-two">
                            <h3>EXPERIENCE</h3>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Returns & Exchanges</a></li>
                                    <li><a href="#">International</a></li>
                                    <li><a href="#">Gift Cards</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-xl-3 -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="footer-widget style-two">
                            <h3>instagram</h3>
                            <div class="footer-instagram">
                                <ul>
                                    <li><a href="#"><img src="media/images/instagram/6.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/instagram/7.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/instagram/8.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/instagram/9.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/instagram/10.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/instagram/11.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-xl-3 -->
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-xl-6 order-2 order-lg-1">
                            <p>Copyright © <span>2018</span> ThemeIM Solution • Designed by <a href="#">ThemeIM</a></p>
                        </div>
                        <!-- /.col-xl-6 -->
                        <div class="col-md-12 col-lg-6 col-xl-6 order-1 order-lg-2">
                            <div class="footer-payment-icon">
                                <ul>
                                    <li><a href="#"><img src="media/images/p1.png" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/p2.png" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/p3.png" alt=""></a></li>
                                    <li><a href="#"><img src="media/images/p4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.col-xl-6 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- container-fluid -->
        </footer>
        <!-- footer-widget-area -->

        <!-- Back to top
	============================================= -->

        <div class="backtotop">
            <i class="fa fa-angle-up backtotop_btn"></i>
        </div>




        <!--=========================-->
        <!--=   Product Quick view area      =-->
        <!--=========================-->

        <!-- Quick View -->
        <div class="modal quickview-wrapper">
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
                            <h5 class="pro-title"><a href="#">Woman fashion dress</a></h5>
                            <span class="price">Price : $387</span>
                            <div class="size-variation">
                                <span>size :</span>
                                <select name="size-value">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
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
                                <a href="#" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Add to Cart</a>
                                <!-- <a href="#"><i class="flaticon-valentines-heart"></i></a> -->
                            </div>

                            <!-- <span>SKU:	N/A</span>
								<p>Tags <a href="#">boys,</a><a href="#"> dress,</a><a href="#">Rok-dress</a></p> -->

                            <p>But I must explain to you how all this mistaken idedenounc pleasure and praisi pain was born and I will give you a complete accosystem, and expound the actu teachings of the great explore tmaster-builder of human happiness. No one rejects, dislikes,
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


<!-- Mirrored from themeim.com/demo/comercio/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 09:09:38 GMT -->

</html>