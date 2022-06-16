<?php
require("config/dbconnect.php");
if (isset($_POST['action'])) {
    $flag = 0;
    $category = '';
    $brand = '';
    $subcategory = '';

    if (isset($_POST['gender'])) {
        $gen = $_POST['gender'];
        if (isset($_POST['category']) && $_POST['category'] != 0) {
            $category = $_POST['category'];
        } else if (isset($_POST['subcategory']) && $_POST['subcategory'] != 0) {
            $subcategory = $_POST['subcategory'];
        } else if (isset($_POST['brand']) && $_POST['brand'] != 0) {
            $brand = $_POST['brand'];
        }
    }

    $qry = "SELECT DISTINCT(pm_productid), pm_productname , pm_image , pm_price , pm_type from product_master, al_productcolor, al_productsize where pm_productid=pc_productid and pm_productid=ps_productid and pm_isactive=1 and pm_type='$gen'";

    //Search Filter
    if(isset($_POST['searchstr']) && !empty($_POST['searchstr']) ){
        echo "here";
    }

    //Category Filter
    if (isset($_POST['categories'])) {
        $flag = 1;
        $category_filter = implode(',', $_POST['categories']);
        $qry .= " AND pm_categoryid IN($category_filter)";
        // $qry .= " ,category_master where pm_categoryid=catm_categoryid and pm_type='$gen' and pm_isactive=1 and catm_categoryid IN($category_filter)";
    }

    //Price Filter
    if (isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])) {
        $flag=1;
        $qry .= "AND pm_price between '" . $_POST['minimum_price'] . "' AND '" . $_POST['maximum_price'] . "' and pm_type='$gen' and pm_isactive=1";
    }

    //Brand Filter
    if (isset($_POST['brands'])) {
        $flag = 1;
        $brand_filter = implode(',', $_POST['brands']);
        $qry .= " AND pm_brandid IN($brand_filter)";
        // $qry .= " ,brand_master where pm_brandid=bm_brandid and pm_type='$gen' and pm_isactive=1 and bm_brandid IN($brand_filter)";
    }

    //Color Filter
    if (isset($_POST['color'])) {
        $flag = 1;
        $color_filter = implode("','", $_POST['color']);
        $qry .= " AND pc_colorname IN('" . $color_filter . "')";
        // $qry .= ", al_productcolor where pm_productid=pc_productid and pm_type='$gen' and pm_isactive=1 and pc_colorname IN('" . $color_filter . "')";
    }

    //Size Filter
    if (isset($_POST['size'])) {
        $flag = 1;
        $size_filter = implode("','", $_POST['size']);
        $qry .= "AND ps_size IN('" . $size_filter . "')";
        // $qry .= ", al_productsize where pm_productid=ps_productid and pm_type='$gen' and pm_isactive=1 and ps_size IN('" . $size_filter . "')";
    }

    //Discount Filter
    if (isset($_POST['discount'])) {
        $flag=1;
        $discount_filter = implode(',', $_POST['discount']);
        $qry .= " AND pm_discountid IN($discount_filter)";
        // $qry .= " ,discount_master where pm_discountid=dm_discountid and pm_type='$gen' and pm_isactive=1 and dm_discountid IN($discount_filter)";
    }

    if ($flag == 0 && $category != '') {
        $qry = "SELECT pm_productname , pm_image , pm_price , pm_type from product_master where pm_type='$gen' and pm_categoryid=$category  ";
    } else if ($flag == 0 && $subcategory != '') {
        $qry = "SELECT pm_productname , pm_image , pm_price , pm_type from product_master where pm_type='$gen' and  pm_subcategoryid=$subcategory  ";
    } else if ($flag == 0 && $brand != '') {
        $qry = "SELECT pm_productname , pm_image , pm_price , pm_type from product_master where pm_type='$gen' and pm_brandid=$brand ";
    }
    // echo $qry;die;
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
}
