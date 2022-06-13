<?php
require("config/dbconnect.php");
$productid = $_GET['productid'];
$setsubcategory = $setstatus = $getcategoryforscdropdown = $set_product_brand = $catid = $checkrowcount = '';
$set_product_category  = $set_product_description =  $set_product_status = $getbrandid = $getcatid = '';
$getproductquery = "select * from product_master where pm_productid=$productid ";
$res = mysqli_query($conn, $getproductquery);
if (mysqli_num_rows($res) > 0) {
    while ($getrow = mysqli_fetch_array($res)) {
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
    }
    if ($set_product_brand != '') {
        $getbrandquery = "SELECT bm_brandname from brand_master where bm_brandid=$set_product_brand";
        $brandresult = mysqli_query($conn, $getbrandquery);
        $getbrandrow = mysqli_fetch_array($brandresult);
        $getbrand = $getbrandrow['bm_brandname'];
    }
    if ($set_product_stock > 0) {
        $available = 1;
    } else {
        $available = 0;
    }
}
?>
<!doctype html>
<html>

<!-- head-tag -->
<?php include("mainincludes/csslinks.php"); ?>
<style>
    .color-checkboxes #col-Purple-label {
        background: purple;
    }
</style>

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
                                            <img height="500rem" src="admin/images/uploads/<?= $set_product_image ?>" alt="<?= $set_product_image ?>">
                                        </div>
                                        <?php
                                        $customerid = '';
                                        $customerid = ((isset($_SESSION['customerid'])) ? $_SESSION['customerid'] : '');
                                        if ($customerid != '') {
                                            $checkcartproductquery = "SELECT * from al_cart where crt_productid=$productid ";
                                        } else {
                                            $checkcartproductquery = "SELECT * from al_visitorcart where vc_productid=$productid ";
                                        }
                                        $checkcartproductresult = mysqli_query($conn, $checkcartproductquery);
                                        if ($checkcartproductresult) {
                                            $checkrowcount = mysqli_num_rows($checkcartproductresult);
                                        }
                                        $getimages = "SELECT * from al_productimages where pi_productid=$productid";
                                        $imgres = mysqli_query($conn, $getimages);
                                        if (mysqli_num_rows($imgres) > 0) {
                                            while ($getrow = mysqli_fetch_array($imgres)) { ?>
                                                <div class="">
                                                    <img height="500rem" src="admin/images/uploads/<?= $getrow['pi_imagename'] ?>" alt="<?= $getrow['pi_imagename'] ?>">
                                                </div>
                                        <?php }
                                        }
                                        ?>
                                    </div>

                                    <div class="slider-nav">
                                        <div class="">
                                            <img height="150rem" src="admin/images/uploads/<?= $set_product_image ?>" alt="<?= $set_product_image ?>">
                                        </div>
                                        <?php
                                        $getimages = "SELECT * from al_productimages where pi_productid=$productid";
                                        $imgres = mysqli_query($conn, $getimages);
                                        if (mysqli_num_rows($imgres) > 0) {
                                            while ($getrow = mysqli_fetch_array($imgres)) { ?>
                                                <div class="">
                                                    <img height="150rem" src="admin/images/uploads/<?= $getrow['pi_imagename'] ?>" alt="<?= $getrow['pi_imagename'] ?>">
                                                </div>
                                        <?php }
                                        }
                                        ?>

                                    </div>
                                </div>
                                <!-- /.quickview-slider -->
                            </div>
                            <!-- /.col-xl-6 -->

                            <div class="col-lg-6 col-xl-6">
                                <div class="product-details">
                                    <h5 class="pro-title"><a href="javascript:void()"><?= strtoupper($getbrand) ?></a></h5>
                                    <h5 class="pro-title"><a href="javascript:void()"><?= $set_product_name ?></a></h5>
                                    <span class="price">Availibility: <span style="<?= ($available != 1) ? 'color:red; font-size:large;' : 'font-size:large;' ?> "><?= ($available) == 1 ? 'In stock' : 'Out of stock' ?></span></span><span class="price">|</span>
                                    <span class="price">Price : &#X20B9;<?= $set_product_price ?><?= $set_product_discount ?></span>
                                    <div class="size-variation">
                                        <span>size :</span>
                                        <select name="productsizes" class="productsizes" id="sizedropdown">
                                            <option value="choose" selected disabled>Choose</option>
                                            <?php
                                            $getsizequery = "SELECT * from al_productsize where ps_productid= $productid";
                                            $sizeres = mysqli_query($conn, $getsizequery);
                                            if (mysqli_num_rows($sizeres) > 0) {
                                                while ($getsizerow = mysqli_fetch_array($sizeres)) {
                                            ?>
                                                    <option id="productsize" value="<?= $getsizerow['ps_sizeid'] ?>"><?= $getsizerow['ps_size'] ?></option>
                                            <?php  }
                                            }

                                            ?>
                                        </select>
                                        <p id="err"></p>
                                    </div>
                                    <div class="color-checkboxes">
                                        <h4>Color:</h4>
                                        <?php
                                        $getcolorsquery = "SELECT * from al_productcolor where pc_productid=$productid";
                                        $getcolorresult = mysqli_query($conn, $getcolorsquery);
                                        $colors = array();
                                        if (mysqli_num_rows($getcolorresult) > 0) {
                                            while ($getcolors = mysqli_fetch_array($getcolorresult)) {
                                                array_push($colors, $getcolors['pc_colorname']); ?>
                                                <input class="color-checkbox__input" id="avail_colors" name="colour" type="radio">
                                                <label class="color-checkbox" for="avail_colors" id="col-<?= $getcolors['pc_colorname'] ?>-label"></label>
                                                <span></span>
                                        <?php }
                                        }
                                        ?>
                                        <div class="printcolors" id="printcolors"></div>
                                    </div>

                                    <div class="add-tocart-wrap">
                                        <?php
                                        if ($available == 1) {
                                            if ($checkrowcount > 0) { ?>
                                                <a href="cart.php?customerid=<?= $customerid ?>" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Go to Cart</a>
                                            <?php } else { ?>
                                                <a href="javascript:void()" id="cartbtn" onclick="cartinsertion(<?= $productid ?>,<?= $customerid ?>)" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Add to Cart</a>
                                            <?php }
                                            ?>
                                        <?php } else { ?>
                                            <a href="javascript:void()" style="text-decoration:line-through ;" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Add to Cart</a>
                                        <?php }
                                        ?>

                                    </div>

                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>quis nostrud exercitation ullamco</li>
                                        <li>Duis aute irure dolor in reprehenderit</li>
                                    </ul> -->
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
    <script src="admin/plugins/validation/jquery.validate.min.js"></script>
    <script>
        $('#sizedropdown').change(function(){
            $('#err').css("color","white");
        })
        function cartinsertion(pid, cid) {
            if (pid != '' && cid != '' && cid != undefined) {
                getsize = $('#sizedropdown').val();
                if (getsize!=null ) {
                    $.ajax({
                        url: "cartinsertion.php",
                        data: {
                            productid: pid,
                            customerid: cid,
                            mode: 'insert'
                        },
                        type: 'POST',
                        success: function(response) {
                            $('#cartcount').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i>' + response);
                            $('.add-to-cart').html('<i class="flaticon-shopping-purse-icon"></i>' + 'Go to Cart');
                            $('.add-to-cart').attr("href", "cart.php?customerid=<?= $customerid ?>");
                            $(".add-to-cart").prop("onclick", null).off("click");
                            alert("Added to cart");

                        }
                    });
                } else {
                    $('#err').css("color","red");
                    $('#err').html("Please select a size");
                }
            } else if (pid != '') {
                getsize = $('#sizedropdown').val()
                if (getsize!=null ) {
                    $.ajax({
                        url: "visitorcartinsertion.php",
                        data: {
                            productid: pid,
                            mode: 'insert'
                        },
                        type: 'POST',
                        success: function(response) {
                            $('#cartcount').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i>' + response);
                            $('.add-to-cart').html('<i class="flaticon-shopping-purse-icon"></i>' + 'Go to Cart');
                            $('.add-to-cart').attr("href", "cart.php");
                            $(".add-to-cart").prop("onclick", null).off("click");
                            alert("Added to cart");

                        }
                    });

                }else{
                    $('#err').css("color","red");
                    $('#err').html("Please select a size");
                }
            }
        }

        var html = `<input class="color-checkbox__input" id="avail_colors" name="colour" type="radio">
                    <label class="color-checkbox" for="avail_colors" id="col-Black-label"></label>
                    <span></span>`;
        var jqueryarray = JSON.parse('<?php echo json_encode($colors); ?>');
        $.each(jqueryarray, function(index, val) {
            $('#col-' + val + '-label').css("background-color", val);
        });
    </script>
    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>

</body>



</html>