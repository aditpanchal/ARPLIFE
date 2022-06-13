<!doctype html>
<html>
<style>
    .customdropdown {
        width: 100%;
        height: 56px;
        border: none;
        box-shadow:8px 10px 10px whitesmoke ;
        margin-bottom: 30px;
        padding: 0px 20px;
        -moz-appearance: none;
        -webkit-appearance: none;
        -o-appearance: none;
        appearance: none;
        background: transparent url(media/images/icon/arrow.png) no-repeat scroll 94% 47%;
        color: #7b7b7b;
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding-right: 25px;
    }
</style>
<!-- head-tag -->
<?php include("mainincludes/csslinks.php"); ?>


<body id="home-version-1" class="home-version-1" data-style="default">
    <div class="site-content">


        <!-- header -->
        <?php include("mainincludes/header.php") ?>


        <section class="breadcrumb-area" style="padding: 130px 0 10px;">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bc-inner">
                            <p><a href="index.php">Home |</a> Checkout</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Checkout area -->
        <section class="contact-area" style="padding-bottom:50px ;">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9 col-xl-7" style="padding-left:100px ;">
                        <div class="contact-form login-form">
                            <form class="signupform" method="POST" action="functions/authenticatecustomer.php">
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="section-heading pb-30">
                                            <h3>Billing <span>Address</span></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <input type="text" placeholder="Flat/House/Street*" name="" id="">
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <input type="number" placeholder="Pincode*" name="" id="">
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option value="">Home</option>
                                            <option value="">Office</option>
                                        </select>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option value="">Country</option>
                                        </select>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option value="">State</option>
                                        </select>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option value="">City</option>
                                        </select>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-xl-5" style="padding-right:200px ;">
                        <div class="col-xl-12">
                            <div class="section-heading pb-30">
                                <h3>Your <span>Cart</span></h3>
                            </div>
                        </div>
                        <div class="cart-subtotal">
                            <a href="checkout.php">Place Order</a>
                        </div>
                        <!-- /.cart-subtotal -->
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

    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>

</body>



</html>