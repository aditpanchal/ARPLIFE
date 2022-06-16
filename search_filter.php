<?php
require("config/dbconnect.php");
if(isset($_POST['search'])){
    $search = $_POST['search'];
    $qry = "SELECT * from product_master where pm_productname LIKE '%".$search."%'";
}

$res = mysqli_query($conn, $qry);
    $rowcount = mysqli_num_rows($res);

    if ($rowcount > 0) {
        $output = '';
        while ($row = mysqli_fetch_array($res)) {
            $setimage = $row['pm_image'];
            $setgender = $row['pm_type'];
            if ($setgender == 'M') {
                $setgender = 'Male';
            } else {
                $setgender = 'Female';
            }
            $setpname = $row['pm_productname'];
            $setprice = $row['pm_price'];
            $output = $output . '<div class="col-sm-6 col-xl-4">
        <div class="sin-product style-two">
            <div class="pro-img">
                <img src="admin/images/uploads/' . $setimage . '" height="300rem">
            </div>
            <div class="mid-wrapper">
                <h5 class="pro-title"><a href="product.html">' . $setpname . '</a></h5>
                <p>' . $setgender . '<span> / &#X20B9;' . $setprice . '</span></p>
            </div>
            <div class="icon-wrapper">
                <div class="pro-icon">
                    <ul>
                        <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                    </ul>
                </div>
                <div class="add-to-cart">
                    <a href="#">add to cart</a>
                </div>
            </div>
        </div>
    </div>';
        }
        echo $output;
    } else {
        $output = '<h3>No Data Found</h3>';
    }

?>