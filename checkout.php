<?php
require("config/dbconnect.php");
$setcouponcode = '';
$subtotal = 0;
$gst = 0;
$setmaxamount = 0;
$setminamount = 0;
$subtotal = ((isset($_GET['subtotal'])) ? $_GET['subtotal'] : 0);
$gst = ((isset($_GET['gst'])) ? $_GET['gst'] : 0);
$setadd = $setaddpin = $setaddtype = $setaddcity = $setaddcountry = $setaddstate = '';
$cpn = 0;
$setallotteddiscount = 0;
if (isset($_REQUEST['customerid']) && $_REQUEST['customerid'] != '') {
    $getcustomerid = ((isset($_REQUEST['customerid'])) ? $_REQUEST['customerid'] : '');

    if ($getcustomerid != '') {
        $qry = "select * from al_addresses where addr_customerid= $getcustomerid";
        $res = mysqli_query($conn, $qry);
        if (mysqli_num_rows($res) > 0) {
            while ($getrow = mysqli_fetch_array($res)) {
                $setadd = (($getrow['addr_address'] != '') ? $getrow['addr_address'] : '');
                $setaddpin = (($getrow['addr_pincode'] != '') ? $getrow['addr_pincode'] : '');
                $setaddtype = (($getrow['addr_addresstype'] != '') ? $getrow['addr_addresstype'] : '');
                $setaddstate = (($getrow['addr_stateid'] != '') ? $getrow['addr_stateid'] : '');
                $setaddcity = (($getrow['addr_cityid'] != '') ? $getrow['addr_cityid'] : '');
                $setaddcountry = (($getrow['addr_countryid'] != '') ? $getrow['addr_countryid'] : '');
            }
        }
    }
}
?>

<!doctype html>
<html>
<style>
    .licontainer {
        display: flex;
        flex-direction: column;
        text-align: left;
        background-color: dimgray;
        color: white;
        padding: 20px;
        margin-top: 20px;

    }


    #couponcode {
        width: 70%;
        height: 56px;
        background: #f2f1f1;
        border: none;
        padding: 0px 20px;
    }

    .customdropdown {
        width: 100%;
        height: 56px;
        border: none;
        box-shadow: 8px 10px 10px whitesmoke;
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


    .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 13.33333px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 40px;
        width: 40px;
        transition: all 0.15s ease-out 0s;
        background: #fff;
        border: 1px solid darkgray;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
    }

    .option-input:hover {
        background: #9faab7;
    }

    .option-input:checked {
        background: dodgerblue;
    }

    .option-input:checked::before {
        width: 40px;
        height: 40px;
        display: flex;
        content: '\f00c';
        font-size: 25px;
        font-weight: bold;
        position: absolute;
        align-items: center;
        justify-content: center;
        font-family: 'Font Awesome 5 Free';
    }

    .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #40e0d0;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }

    .option-input.radio {
        border-radius: 50%;
    }

    .option-input.radio::after {
        border-radius: 50%;
    }

    @keyframes click-wave {
        0% {
            height: 40px;
            width: 40px;
            opacity: 0.35;
            position: relative;
        }

        100% {
            height: 200px;
            width: 200px;
            margin-left: -80px;
            margin-top: -80px;
            opacity: 0;
        }
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
        <section class="contact-area">
            <div class="container-fluid custom-container">
                <div class="row">

                    <!-- BILLING ADDRESS -->
                    <div class="col-sm-9 col-md-9 col-lg-9 col-xl-8">
                        <div class="contact-form login-form">
                            <form class="signupform" method="POST" action="functions/authenticatecustomer.php">
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="section-heading pb-30" width="250">

                                            <h3>Billing <span>Address</span> </h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-7" width="250">
                                        <input type="text" placeholder=" Flat/House/Street*" name="" id="" value=<?= $setadd ?>>

                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <input type="number" placeholder="Pincode*" name="" id="" value=<?= $setaddpin ?>>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown" value=<?= $setaddtype ?>>
                                            <option value="">Home</option>
                                            <option value="">Office</option>
                                        </select>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option selected disabled>Country</option>
                                            <option>INDIA</option>

                                        </select>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option selected disabled value="">State</option>
                                            <?php
                                            $getstateqry = "select * from state_master";
                                            $stateresult = mysqli_query($conn, $getstateqry);
                                            while ($getstate = mysqli_fetch_array($stateresult)) {
                                                $state = strtolower($getstate['sm_statename']);
                                                $stateid = $getstate['sm_stateid'];
                                                if ($stateid == $setaddstate) { ?>
                                                    <option selected value="<?= $stateid ?>"><?= $state ?></option>
                                                <?php  } else { ?>
                                                    <option value="<?= $stateid ?>"><?= $state ?></option>
                                                <?php }
                                                ?>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-7">
                                        <select name="" id="" class="customdropdown">
                                            <option selected disabled value="">City</option>
                                            <?php
                                            $getcityqry = "select * from city_master";
                                            $cityresult = mysqli_query($conn, $getcityqry);
                                            while ($getcity = mysqli_fetch_array($cityresult)) {
                                                $city = $getcity['cty_cityname'];
                                                $cityid = $getcity['cty_cityid'];
                                                if ($cityid == $setaddcity) { ?>
                                                    <option selected value="<?= $cityid ?>"><?= $city ?></option>
                                                <?php  } else { ?>
                                                    <option value="<?= $cityid ?>"><?= $city ?></option>
                                                <?php }
                                                ?>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- CART  -->
                    <div class="col-xl-4">
                        <div class="col-xl-12">
                            <div class="section-heading pb-30" width="250">

                                <h3>Your <span>Cart</span> </h3>
                            </div>
                        </div>
                        <!-- CART TOTAL -->
                        <div class="cart-subtotal">
                            <div class="cart-subtotal">
                                <p>ORDER DETAILS</p>
                                <ul>
                                    <li><span>BAG TOTAL: </span>&#X20B9; <?= $subtotal ?>
                                    </li>
                                    <?php $cpn = $subtotal * $setallotteddiscount / 100;
                                    ?>
                                    <li><span>Coupon Discount :</span>
                                        <h1 id="cpn">&#X20B9;<?= " " . $cpn ?></h1>
                                    </li>
                                    <li><span>GST (+12%):</span> &#X20B9; <?= $gst ?>
                                    </li>
                                    <li><span>TOTAL:</span>&#X20B9; <?= $subtotal + $gst ?>
                                    </li>
                                </ul>
                            </div>
                            <a href="payment.php" id="rzp-button1">Proceed to payment</a><br><br>
                            <p>COUPONS</p>
                            <input type="text" placeholder="Coupon Code" readonly value="" id="couponcode">
                            <a href="checkout.php" name="checkout">APPLY</a>
                            <ul>
                                <?php
                                $qry = "select * from coupons_master";
                                $res = mysqli_query($conn, $qry);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($getrow = mysqli_fetch_array($res)) {
                                        $setcouponcode = (($getrow['cpn_couponcode'] != '') ? $getrow['cpn_couponcode'] : '');
                                        $setallotteddiscount = (($getrow['cpn_allotteddiscount'] != '') ? $getrow['cpn_allotteddiscount'] : '');
                                        $setminamount = (($getrow['cpn_minamount'] != '') ? $getrow['cpn_minamount'] : '');
                                        $setmaxamount = (($getrow['cpn_maxamount'] != '') ? $getrow['cpn_maxamount'] : '');
                                ?>
                                        <li style="text-align:left ;">

                                            <div class="licontainer">

                                                <label><input type="radio" id="couponradio" class="option-input radio" name="coupons" onchange="couponselected('<?= strtoupper($setcouponcode) ?>')" id=""></label>
                                                <label><?= strtoupper($setcouponcode) ?></label>
                                                <label>Get upto <?= $setallotteddiscount ?>% on <?= $setminamount ?> and above.</label>
                                                <label>Maximum Discount : &#X20B9;<?= $setmaxamount ?> </label>
                                            </div>
                                        </li>
                                <?php
                                    }
                                } else {
                                    echo "No Other Coupon Available";
                                }
                                ?>
                            </ul>
                        </div><br>
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
    <script>
        function couponselected(cc) {
            $('#couponcode').val(cc);
        }
    </script>
    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "rzp_test_mSAXwASKMKDLhi", // Enter the Key ID generated from the Dashboard    
            "amount": "500",
            // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise    
            "currency": "INR",
            "name": "ARPLIFE",
            "description": "",
            "image": "https://example.com/your_logo",
            "order_id": "order_JhOlCsOG574mxG", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1   
            "handler": function(response) {
                alert(response.razorpay_payment_id);
                alert(response.razorpay_order_id);
                alert(response.razorpay_signature)
            },
            "prefill": {
                "name": "Customer name",
                "email": "customer.mail@example.com",
                "contact": "9839485784"
            },
            "notes": {
                "address": "arplife.customercare@gmail.com"
            },
            "theme": {
                "color": "#d19e66"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>

</body>



</html>