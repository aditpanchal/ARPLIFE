<?php
session_start();
require("../config/dbconnect.php");
if(isset($_POST['attribute_editbtn'])){
    $newattributeid=$_POST['attributeid'];
    $newattribute=$_POST['attributename'];
    $newcategory=$_POST['categoryname'];
    $newsubcategory=$_POST['subcategoryname'];

    $editattribute="UPDATE attributes_master SET am_categoryid = $newcategory , am_subcategoryid = $newsubcategory ,am_attributename='$newattribute' WHERE  am_attributeid=$newattributeid ";
    
    if(mysqli_query($conn,$editattribute)){
        header("location:attributes.php");
    }
}
else if(isset($_POST["attribute_addbtn"])){
    session_start();
     $getattributenames = array();
    $getattributenamequery = "SELECT * FROM attributes_master";
    $attributeresult = mysqli_query($conn, $getattributenamequery);
    if (mysqli_num_rows($attributeresult) > 0) {
        while ($getdata = mysqli_fetch_array($attributeresult)) {
            array_push($getattributenames, $getdata['am_attributename']);
        }
    }
        $attribute=$_POST['attributename'];
        $category=$_POST['categoryname'];
        $subcategory=$_POST['subcategoryname'];
        $flag=0;
        foreach($getattributenames as $attributenames){
            if($attributenamattribute==$attributenames){
                $_SESSION['msg']='attribute already exists';
                $flag=1;
                header("location:manage_attributes.php");
            }
        }
        if($flag==0){
            $addattribute_query="insert into attributes_master(am_categoryid,am_subcategoryid,am_attributename) values($category,$subcategory,'$attribute')";
            $res=mysqli_query($conn,$addattribute_query);
            header("location:attributes.php");
        }
        
}
else if(isset($_POST['action_method']) && $_POST['action_method'] == 'delete_attribute'){
    $is_deleted=0;
    $attributeIds=$_POST['attributeid'];
    if(!empty($attributeIds)){
        foreach($attributeIds as $attribute_id){
            $delete_attribute="delete from attributes_master where am_attributeid=$attribute_id";
            if(mysqli_query($conn,$delete_attribute)){
                $is_deleted=1;
            }
            else{
                $is_deleted=0;
                return false;
            }
        }
        if($is_deleted==1){
            echo "success";
        }
        else{
            echo "fail";
        }
    }
}
