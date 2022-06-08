<?php
require("../config/dbconnect.php");
$attributeid = (isset($_GET["attributeid"]) ? intval($_GET["attributeid"]) : '');
$attribute_method = (isset($_GET["attributeid"]) ? 'edit' : 'add');

$setattributename = $setcategoryname = $setsubcategoryname = '';
if ($attribute_method == 'edit' && $attributeid != '') {
    $getattributequery = "SELECT * from attributes_master where am_attributeid=$attributeid ";
    $res = mysqli_query($conn, $getattributequery);
    if (mysqli_num_rows($res) > 0) {
        $getrow = mysqli_fetch_array($res);
        $setattributename = $getrow['am_attributename'];
        $setcategoryname = $getrow['am_categoryid'];
        $setsubcategoryname = $getrow['am_subcategoryid'];
    }
}
?>

<style>
    .error {
        color: #F00;
        background-color: #FFF;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../admin/includes/constants.php"); ?>
<?php include(INCLUDESCOMP_DIR . "csslinks.php"); ?>

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
            <div class="row page-titles mx-0" style="background-color:lavender;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_DIR . 'index.php' ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">Manage Attribute</a></li>
                </ol>
            </div>
            <!--Container start-->
            <div class="container-fluid mt-3" style="background-color:lavender ; margin-top:0px !important; height: 830px ;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-validation">
                                    <form class="manageattribute_frm" method="POST" action="attributes_operation.php">

                                        <!-- HIDDEN FIELD FOR ATTRIBUTEID -->
                                        <input type="hidden" name="attributeid" value="<?php echo $attributeid ?>">



                                        <div class="form-row">
                                            <label class="col-lg-4 col-form-label" for="attributename">Attribute
                                            </label>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="attributename" value="<?php echo $setattributename ?>" id="attributename" class="customtext">
                                                <p class="error"></p>

                                                </select>
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="category">Category
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="categorydropdown" name="categoryname">
                                                    <option disabled selected value=''>Choose...</option>
                                                    <?php
                                                    $sql = "SELECT * from category_master";
                                                    $res = mysqli_query($conn, $sql);
                                                    $row = mysqli_num_rows($result);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($row = mysqli_fetch_array($res)) { ?>
                                                            <?php if ($attribute_method == 'edit' && $setcategoryname == $row['catm_categoryid']) { ?>
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
                                            <label class="col-lg-4 col-form-label" for="subcategoryname">Sub Category
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="subcategorydropdown" name="subcategoryname">
                                                    <option disabled selected value="">Choose...</option>
                                                </select>
                                            </div>
                                        </div>

                                        <?php if ($attribute_method == 'add') { ?>
                                            <button type="submit" id="attribute_addbtn" name="attribute_addbtn" class="btn btn-dark">Add</button>
                                        <?php } else if ($attribute_method == 'edit') { ?>
                                            <button type="submit" name="attribute_editbtn" class="btn btn-dark">Edit</button>
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
    <script src="js/styleSwitcher.js"></script>
    <script src="<?php echo PLUGINS_DIR ?>validation/jquery.validate.min.js"></script>
    <script>
        //jquery validation
        $(document).ready(function() {
            var editcategory_id = $("#categorydropdown").val();
            if (editcategory_id != '') {
                $.ajax({
                    url: "populatesubcategory.php",
                    data: {
                        c_id: editcategory_id,
                        product_method: 'edit'
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

            $("#attribute_addbtn").click(function() {
                // e.preventDefault();
                jQuery(".manageattribute_frm").validate({
                    rules: {
                        attributename: 'required',
                        categoryname: 'required',
                        subcategoryname: 'required'
                    },
                    messages: {
                        attributename: 'Attribute Name is required',
                        categoryname: 'Category name is required',
                        subcategoryname: 'Subcategory name is required'
                    },
                    highlight: function(element) {
                        $(element).last().addClass('error')
                    },
                    unhighlight: function(element) {
                        $(element).last().removeClass('error')
                    },

                });
            });
        });
    </script>
</body>

</html>