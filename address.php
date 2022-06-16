<html>
<?php
include("mainincludes/csslinks.php");
require("config/dbconnect.php");
$addid = '';
?>
<!-- Header -->


<body id="home-version-1" class="home-version-1" data-style="default">
    <style>
        #btnedit {
            left: 90px;
        }
    </style>

    <div class="site-content">
        <?php include("mainincludes/header.php"); ?>

        <?php include("sidebar.php"); ?>
        <section class="breadcrumb-area" style="padding: 130px 0 10px;">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bc-inner">
                            <p><a href="index.php">Home |</a> Contact</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $customerid = ((isset($_SESSION['customerid'])) ? $_SESSION['customerid'] : '');
            $custquery = "select * from al_addresses where addr_customerid=$customerid";
            $res = mysqli_query($conn, $custquery);
            if (mysqli_num_rows($res) > 0) {
                while ($getrow = mysqli_fetch_array($res)) {
                    $addid = $getrow['addr_addressid'];
                    $stateid = $getrow['addr_stateid'];
                    $cityid = $getrow['addr_cityid'];
                    $countryid = $getrow['addr_countryid'];

            ?>

                    <div class="container-fluid custom-container">
                        <div class="section-heading pb-30">
                            <h3>Your <span>Addresses</span></h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-9 col-md-8 col-lg-6 col-xl-4">
                                <div class="contact-form login-form">
                                    <form class="addform" method="POST" action="">
                                        <div class="row" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;font-size:    x-large;margin:auto;text-align:center;">
                                            <div class="col-xl-12">
                                                <label for="flat"><?= $getrow['addr_address'] . "," ?></label>
                                            </div>
                                            <?php $custquery = "select * from city_master where cty_cityid=$cityid";
                                            $res = mysqli_query($conn, $custquery);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($getcityrow = mysqli_fetch_array($res)) { ?>

                                                    <div class="col-xl-12" style="right: 130 ;">
                                                        <label for="city"><?= $getcityrow['cty_cityname'] . "," ?></label>

                                                    </div>
                                                    <?php $custquery = "select * from state_master where sm_stateid=$stateid";
                                                    $res = mysqli_query($conn, $custquery);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($getstaterow = mysqli_fetch_array($res)) { ?>

                                                            <div class="col-xl-12" style="right: 130 ;">
                                                                <label for="state"><?= $getstaterow['sm_statename'] . "," ?></label>

                                                            </div>
                                                            <?php $custquery = "select * from country_master where cntry_countryid=$countryid";
                                                            $res = mysqli_query($conn, $custquery);
                                                            if (mysqli_num_rows($res) > 0) {
                                                                while ($getcountryrow = mysqli_fetch_array($res)) { ?>

                                                                    <div class="col-xl-12" style="right: 130px">
                                                                        <label for="country"><?= $getcountryrow['cntry_countryname'] . ","  ?></label>

                                                                    </div>

                                                                    <div class="col-xl-12">
                                                                        <a href="editadd.php?customerid=<?=$customerid?>" id="editbtn" name="editbtn" class="btn btn-dark">Edit</a>
                                                                        <a href="deleteadd.php?addressid=<?= $getrow['addr_addressid'] ?>" id="deletebtn" name="deletebtn" class="btn btn-dark">Delete</a>
                                                                    </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>



<?php }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                
?>

</html>