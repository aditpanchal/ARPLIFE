<html>
<?php
session_start();
include("mainincludes/csslinks.php");
require("config/dbconnect.php");
$addresscount = $cid = '';
if (isset($_SESSION['profileview']) && $_SESSION['profileview'] == 0) {
    header("location:index.php");
}else{
    session_abort();
}
?>
<!-- Header -->


<body id="home-version-1" class="home-version-1" data-style="default">
    <style>
        .container {
            box-shadow: 3px 3px 8px darkgrey;
            background-color: whitesmoke;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: start;

            padding: 30px;
        }

        .plus {
            margin: 0 10px 20px 10px;
            background-color: #ddd;
            border: 2px dashed darkgrey;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            width: 30%;
        }

        .plus:hover{
            cursor: pointer;
        }

        .iconbtn {
            padding: 20px;
            padding-top: 23px;
            background: transparent;
            border: none;
        }

        .iconbtn:focus {
            border: none;
            outline: none;
        }

        .plus:hover {
            background-color: lightgray;
        }

        .plus i {
            font-size: 50px;
        }

        .addresses {
            background-color: #ddd;
            margin: 0 10px 20px 10px;
            border: 1px solid darkgrey;
            padding: 20px;
            width: 30%;
        }
    </style>

    <div class="site-content">
        <?php include("mainincludes/header.php"); ?>

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
            <div class="section-heading pb-30">
                <h3>Your <span>Addresses</span></h3>
            </div>
            <div class="container">
                <div class="plus">
                    <form action="addressadd.php" method="POST">
                        <button class="iconbtn" name="addbtn"><i class="fa fa-plus"></i></button>
                    </form>
                </div>
                <?php
                $customerid = ((isset($_POST['customerid'])) ? $_POST['customerid'] : '');
                $_SESSION['customerid'] = $customerid;
                $cid = $_SESSION['customerid'];
                

                $custquery = "SELECT * from al_addresses where addr_customerid=$customerid";
                $res = mysqli_query($conn, $custquery);
                if ($res) {
                    $addresscount = mysqli_num_rows($res);
                }
                if ($addresscount > 0) {
                    while ($getrow = mysqli_fetch_array($res)) {
                        $addressid = $getrow['addr_addressid'];


                        // LOCATION QUERIES
                        $cityid = $getrow['addr_cityid'];
                        $custquery = "SELECT * from city_master where cty_cityid=$cityid";
                        $cityres = mysqli_query($conn, $custquery);
                        if ($cityres) {
                            if (mysqli_num_rows($res) > 0) {
                                $getcitydata = mysqli_fetch_array($cityres);
                                $getcity = $getcitydata['cty_cityname'];
                            }
                        }

                        $stateid = $getrow['addr_stateid'];
                        $custquery = "SELECT * from state_master where sm_stateid=$stateid";
                        $stateres = mysqli_query($conn, $custquery);
                        if ($stateres) {
                            if (mysqli_num_rows($stateres) > 0) {
                                $getstatedata = mysqli_fetch_array($stateres);
                                $getstate = $getstatedata['sm_statename'];
                            }
                        }

                        $countryid = $getrow['addr_countryid'];
                        $custquery = "SELECT * from country_master where cntry_countryid=$countryid";
                        $countryres = mysqli_query($conn, $custquery);
                        if ($countryres) {
                            if (mysqli_num_rows($countryres) > 0) {
                                $getcountrydata = mysqli_fetch_array($countryres);
                                $getcountry = $getcountrydata['cntry_countryname'];
                            }
                        }
                ?>

                        <div class="addresses">
                            <form action="editadd.php" method="POST">
                                <input type="hidden" name="addressid" value="<?= $addressid ?>">
                                <div class="street">
                                    <label for="flat"><?= $getrow['addr_address'] . "," ?></label>
                                </div>

                                <div class="pin">
                                    <label for="flat"><?= $getrow['addr_pincode'] . "," ?></label>
                                </div>

                                <div class="city">
                                    <label for="city"><?= $getcity ?></label>
                                </div>

                                <div class="state">
                                    <label for="state"><?= $getstate ?></label>

                                </div>

                                <div class="country">
                                    <label for="country"><?= $getcountry ?></label>
                                </div>

                                <div class="buttons">
                                    <button type="submit" id="editbtn" class="btn btn-dark" name="editbtn">Edit</button><br>
                    </div>
                                </form>
                            <form action="deleteadd.php" method="POST">
                            <input type="hidden" name="addressid" value="<?= $addressid ?>">
                                <button type="submit" id="deletebtn" class="btn btn-dark" name="deletebtn">Delete</button>
                        </form>
            </div>
    <?php }
                }

    ?>


    </div>


    </section>





</html>