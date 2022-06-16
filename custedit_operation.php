<?php
    session_start();
    $customerid = $_SESSION['customerid'];
require("config/dbconnect.php");

    $fname= strtolower($_POST['fname']) ;
    $lname= strtolower($_POST['lname']) ;
    $dob= strtolower($_POST['dob']) ;
    $gender=$_POST['gender'];
    $mob= strtolower($_POST['mobile']);
    $uname= strtolower($_POST['uname']);
    $pass= strtolower($_POST['pass']);
    $email= strtolower($_POST['email']);
    $editcust="UPDATE customer_master SET cm_firstname='$fname', cm_lastname='$lname' , cm_dob='$dob' ,cm_gender='$gender', cm_mobile=$mob, cm_email='$email',cm_username='$uname',cm_password='$pass' WHERE cm_customerid=$customerid";
    $res=mysqli_query($conn,$editcust);
    if($res){
       header("location:index.php");
       
    }
    
