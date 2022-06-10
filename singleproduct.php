<!doctype html>
<html>

<!-- head-tag -->
<?php include("mainincludes/csslinks.php"); ?>


<body id="home-version-1" class="home-version-1" data-style="default">
    <div class="site-content">


        <!-- header -->
        <?php include("mainincludes/header.php") ?>

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
                    <!-- /.col-xl-3 -->
                    <div class="order-1 order-md-2 col-md-8 col-lg-9 col-xl-9">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <!-- Product View Slider -->
                                <div class="quickview-slider">
                                    <div class="slider-for">
                                        <div class="">
                                            <img src="admin/images/uploads/hehe.jpeg" alt="Thumb">
                                        </div>
                                    </div>

                                    <div class="slider-nav">

                                        <div class="">
                                            <img src="admin/images/uploads/hehe.jpeg" alt="thumb">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.quickview-slider -->
                            </div>
                            <!-- /.col-xl-6 -->

                            <div class="col-lg-6 col-xl-6">
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