<?php
require("../config/dbconnect.php");
$productid = (isset($_GET["productid"]) ? intval($_GET["productid"]) : '');
$product_method = (isset($_GET["productid"]) ? 'edit' : 'add');
$setsubcategory = $setstatus = $getcategoryforscdropdown = '';
$set_product_category  = $set_product_description =  $set_product_status = '';
if ($product_method == 'edit') {
    $getproductquery = "select * from product_master where pm_productid=$productid ";
    $res = mysqli_query($conn, $getproductquery);
    if (mysqli_num_rows($res) > 0) {
        $getrow = mysqli_fetch_array($res);
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
}
?>
<style>
    .error {
        color: #F00;
        background-color: #FFF;
    }

    .displayimage {
        line-height: 2.65;
        border: 1px solid rgba(0, 0, 0, .15);
        height: 180px;
        width: 45%;
        margin-bottom: 10px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../admin/includes/constants.php"); ?>
<?php include(INCLUDESCOMP_DIR . "csslinks.php"); ?>
<!-- FOR MULTISELECT -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="multiselect-15/fonts/icomoon/style.css">

<link rel="stylesheet" href="multiselect-15/css/jquery.multiselect.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="multiselect-15/css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="multiselect-15/css/style.css">
<!-- FOR MULTISELECT END -->

<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include(INCLUDESCOMP_DIR . "preloader.php"); ?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Logo start
        ***********************************-->
        <?php include(INCLUDESCOMP_DIR . "logo.php"); ?>
        <!--**********************************
            Logo end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <?php include(INCLUDESCOMP_DIR . "header.php"); ?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include(INCLUDESCOMP_DIR . "sidebar.php"); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0" style="background-color:lavender;  ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_DIR . 'index.php' ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">Manage Product</a></li>
                </ol>
            </div>
            <!--Container start-->
            <div class="container-fluid mt-3" style="background-color:lavender ; margin-top:0px !important;  ">
                <div class="col-lg-12">
                    <div class="card" style="margin-bottom: 0px;">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-validation">
                                    <form class="product_frm" method="POST" action="products_operation.php" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_category">Category
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="categorydropdown" name="product_category">
                                                    <option disabled selected value=''>Choose...</option>
                                                    <?php
                                                    $sql = "SELECT * from category_master";
                                                    $res = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($row = mysqli_fetch_array($res)) { ?>
                                                            <?php if ($product_method == 'edit' && $set_product_category == $row['catm_categoryid']) { ?>
                                                                <option value="<?= $row['catm_categoryid'] ?>" selected><?= $row['catm_categoryname'] ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $row['catm_categoryid'] ?>"><?= $row['catm_categoryname'] ?></option>
                                                    <?php  }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_subcategory">Sub Category
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="subcategorydropdown" name="product_subcategory">
                                                    <option disabled selected value="">Choose...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_brand">Brand
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="product_brand">
                                                    <option value="" disabled selected>Choose...</option>
                                                    <?php
                                                    $sql = "SELECT * from brand_master";
                                                    $res = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($row = mysqli_fetch_array($res)) { ?>
                                                            <option value="<?= $row['bm_brandid'] ?>"><?= $row['bm_brandname'] ?></option>
                                                    <?php  }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_name">Product Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="customtext" id="product_name" name="product_name" placeholder="Enter a productname..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_description">Description
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="customtext" id="product_description" name="product_description" rows="5" placeholder="give desired description..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_size">Size
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="product_sizes[]" multiple="multiple" class="3col active form-control">
                                                    <optgroup label="Upperwear">
                                                        <option value="XS">XS</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                        <option value="XXXL">XXXL</option>
                                                    </optgroup>
                                                    <optgroup label="Footwear">
                                                        <option value="5">5</option>
                                                        <option value="5.5">5.5</option>
                                                        <option value="6">6</option>
                                                        <option value="6.5">6.5</option>
                                                        <option value="7">7</option>
                                                        <option value="7.5">7.5</option>
                                                        <option value="8">8</option>
                                                        <option value="8.5">8.5</option>
                                                        <option value="9">9</option>
                                                        <option value="9.5">9.5</option>
                                                        <option value="10">10</option>
                                                        <option value="10.5">10.5</option>
                                                        <option value="11">11</option>
                                                        <option value="11.5">11.5</option>
                                                        <option value="12">12</option>
                                                        <option value="12.5">12.5</option>
                                                        <option value="13">13</option>
                                                        <option value="13.5">13.5</option>
                                                        <option value="14">14</option>
                                                        <option value="14.5">14.5</option>
                                                        <option value="15">15</option>
                                                    </optgroup>
                                                    <optgroup label="Bottomwear">
                                                        <option value="26">26</option>
                                                        <option value="28">28</option>
                                                        <option value="30">30</option>
                                                        <option value="32">32</option>
                                                        <option value="34">34</option>
                                                        <option value="36">36</option>
                                                        <option value="38">38</option>
                                                        <option value="40">40</option>
                                                        <option value="42">42</option>
                                                        <option value="44">44</option>
                                                    </optgroup>
                                                    <optgroup label="Accessories">
                                                    <optgroup label="Bagpack">
                                                        <option value="10-20L">10-20L</option>
                                                        <option value="30-50L">30-50L</option>
                                                        <option value="50-70L">50-70L</option>
                                                        <option value="70L+">70L+</option>
                                                    </optgroup>
                                                    <optgroup label="Watches">
                                                        <option value="36mm">36mm</option>
                                                        <option value="38mm">38mm</option>
                                                        <option value="42mm">42mm</option>
                                                        <option value="44mm">44mm</option>
                                                        <option value="46mm">46mm</option>
                                                    </optgroup>
                                                    </optgroup>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_color">Color
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="product_colors[]" multiple="colors" class="4col active form-control">
                                                    <option value="Red">Red</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Yellow">Yellow</option>
                                                    <option value="Black">Black</option>
                                                    <option value="White">White</option>
                                                    <option value="Orange">Orange</option>
                                                    <option value="Maroon">Maroon</option>
                                                    <option value="Brown">Brown</option>
                                                    <option value="Mustard">Mustard</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Olive">Olive</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_price">Price
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="customtext" id="product_price" name="product_price" placeholder="Enter price..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_discount">Discount
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="product_discount">
                                                    <option value="">Choose...</option>
                                                    <?php
                                                    $sql = "SELECT * from discount_master";
                                                    $res = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($row = mysqli_fetch_array($res)) { ?>
                                                            <option value="<?= $row['dm_discountid'] ?>"><?= $row['dm_discountname'] ?></option>
                                                    <?php  }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_stock">Stock
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="customtext" id="product_stock" name="product_stock" placeholder="Enter stock..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_image">Image
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control-file" name="product_image" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_moreimages">Additional images
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control-file" name="product_additionalimages[]" multiple="" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_gender">Gender
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="product_gender">
                                                    <option value="" selected disabled>Choose...</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <di v class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_status">Status
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="product_status" name="product_status" class="form-control">
                                                    <?php
                                                    if ($setstatus == null) { ?>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="1">Enabled</option>
                                                        <option value="0">Disabled</option>
                                                    <?php } else if ($setstatus == 1) { ?>
                                                        <option value="" disabled>Choose...</option>
                                                        <option selected value="1">Enabled</option>
                                                        <option value="0">Disabled</option>
                                                    <?php } else if ($setstatus == 0) { ?>
                                                        <option value="" disabled>Choose...</option>
                                                        <option value="1">Enabled</option>
                                                        <option selected value="0">Disabled</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                </div>
                                <?php if ($product_method == 'add') { ?>
                                    <button type="submit" id="product_addbtn" name="product_addbtn" class="btn btn-dark">Add</button>
                                <?php } else if ($product_method == 'edit') { ?>
                                    <button type="submit" name="product_editbtn" class="btn btn-dark">Edit</button>
                                <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid end  -->
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <?php include(INCLUDESCOMP_DIR . "footer.php"); ?>
    <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="multiselect-15/js/jquery-3.3.1.min.js"></script>
    <script src="multiselect-15/js/popper.min.js"></script>
    <script src="multiselect-15/js/bootstrap.min.js"></script>
    <script src="multiselect-15/js/jquery.multiselect.js"></script>
    <script src="multiselect-15/js/main.js"></script>
    <script src="multiselect-15/js/color.js"></script>
    <script src="multiselect-15/js/styleSwitcher.js"></script>
    <script src="<?php echo PLUGINS_DIR ?>validation/jquery.validate.min.js"></script>
    <script>
        //jquery validation
        $(document).ready(function() {
            $(document).ready(function() {
                $('#ingredients').multiselect();
            });
            edit_category_id = $('#categorydropdown').val();
            if (edit_category_id) {
                $.ajax({
                    url: "populatesubcategory.php",
                    data: {
                        c_id: edit_category_id
                    },
                    type: 'POST',
                    success: function(response) {
                        var resp = $.trim(response);
                        $("#subcategorydropdown").html(resp);
                    }
                });
            } else {
                $("#subcategorydropdown").html("<option selected disabled value=''>Choose...</option>");
            }

            $("#categorydropdown").change(function() {
                var category_id = $(this).val();
                if (category_id != "") {
                    $.ajax({
                        url: "populatesubcategory.php",
                        data: {
                            c_id: category_id
                        },
                        type: 'POST',
                        success: function(response) {
                            var resp = $.trim(response);
                            $("#subcategorydropdown").html(resp);
                        }
                    });
                } else {
                    $("#subcategorydropdown").html("<option selected disabled value=''>Choose...</option>");
                }
            });
            $("#product_addbtn").click(function() {
                // e.preventDefault();
                jQuery(".product_frm").validate({
                    rules: {
                        product_category: 'required',
                        product_subcategory: 'required',
                        product_brand: 'required',
                        product_name: 'required',
                        product_size: 'required',
                        product_price: 'required',
                        product_stock: 'required',
                        product_image: 'required',
                        product_gender: 'required',
                        product_status: 'required'
                    },
                    messages: {
                        product_category: 'select a category',
                        product_subcategory: 'select a subcategory',
                        product_brand: 'select a brand',
                        product_name: 'product name is required',
                        product_size: ' product size is required',
                        product_price: ' product price is required',
                        product_stock: ' product stock is required',
                        product_image: ' product image is required',
                        product_gender: 'choose the gender',
                        product_status: 'status is required'
                    },
                    highlight: function(element) {
                        $(element).last().addClass('error')
                    },
                    unhighlight: function(element) {
                        $(element).last().removeClass('error')
                    }
                });
            });

        });
    </script>
</body>

</html>