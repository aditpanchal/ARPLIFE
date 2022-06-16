<?php
require("config/dbconnect.php");
$setadd = $setaddpin = $setaddtype = $setaddcity = $setaddcountry = $setaddstate = '';
        $subtotal=((isset($_REQUEST['subtotal'])) ? $_REQUEST['subtotal'] : '');
        $gst=((isset($_REQUEST['gst'])) ? $_REQUEST['gst'] : '');
        $getcustomerid = ((isset($_REQUEST['customerid'])) ? $_REQUEST['customerid'] : '');
        $qry = "select * from al_addresses where addr_customerid= $getcustomerid";
        $res = mysqli_query($conn, $qry);
        if (mysqli_num_rows($res) > 0) {
            while ($getrow = mysqli_fetch_array($res)) {
                $setaddid = (($getrow['addr_addressid'] != '') ? $getrow['addr_addressid'] : '');
                $setadd = (($getrow['addr_address'] != '') ? $getrow['addr_address'] : '');
                $setaddpin = (($getrow['addr_pincode'] != '') ? $getrow['addr_pincode'] : '');
                $setaddtype = (($getrow['addr_addresstype'] != '') ? $getrow['addr_addresstype'] : '');
                $setaddstate = (($getrow['addr_stateid'] != '') ? $getrow['addr_stateid'] : '');
                $setaddcity = (($getrow['addr_cityid'] != '') ? $getrow['addr_cityid'] : '');
                $setaddcountry = (($getrow['addr_countryid'] != '') ? $getrow['addr_countryid'] : '');
            }
        }
?>

<!doctype html>
<html>
<style>
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
                            <p><a href="index.php">Home |</a> Billing Address</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Checkout area -->
        <section class="contact-area">
            <div class="container-fluid custom-container" style="height:600px ;">
                <div class="row justify-content-center">
                    <!-- BILLING ADDRESS -->
                    <div class="col-lg-8 col-xl-6">
                        <div class="contact-form">
                            <form class="signupform" method="POST" action="functions/checkoutauthenticate.php">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="section-heading pb-30" width="250">
                                            <h3>Billing <span>Address</span> </h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="text" placeholder=" Flat/House/Street*" name="" id="" value=<?= $setadd ?>>

                                    </div>
                                    <div class="col-xl-12">
                                        <input type="number" placeholder="Pincode*" name="" id="" value=<?= $setaddpin ?>>

                                    </div>
                                    <div class="col-xl-6">
                                        <select name="" id="" class="customdropdown" value=<?= $setaddtype ?>>
                                            <option value="">Home</option>
                                            <option value="">Office</option>
                                        </select>
                                        <div class="mydiv">
                                            <p class="Err"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <select name="" id="" class="customdropdown">
                                            <option selected disabled>Country</option>
                                            <option>INDIA</option>

                                        </select>
                                    </div>
                                    <div class="col-xl-6">
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
                                    <div class="col-xl-6">
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
                                    <div class="hidden">
                                        <input type="hidden" name="subtotal" value="<?= $subtotal ?>" >
                                        <input type="hidden" name="gst" value="<?= $gst ?>">
                                        <input type="hidden" name="customerid"  value="<?=$getcustomerid?>">
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="submit" id="btnsubmit" name="addaddress" value="ADD ADDRESS">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            </form>
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