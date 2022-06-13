<?php
 require("../config/dbconnect.php");
function get_Safe_value($con, $str){
    if($str!=''){
        return mysqli_real_escape_string($con, $str);
    }
}
session_start();

if (isset($_POST['btnlogin'])) {
        $email = get_Safe_value($conn, $_POST['email']);
        $pass = get_Safe_value($conn, $_POST['pass']);
        $ipaddr = $_POST['ipaddr'];
        $login_query = "select * from customer_master where cm_password='$pass' AND  cm_email='$email'  ";
        $res = mysqli_query($conn, $login_query);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            $_SESSION['loggedin'] = 'yes';
            $row = mysqli_fetch_assoc($res);
            $customerid = $row['cm_customerid'];
            $log_query = "insert into al_customerlog(cl_customerid , cl_ipaddress) values($customerid , '$ipaddr')";
            if (mysqli_query($conn, $log_query)) {
                $_SESSION['customerid'] = $customerid;
                $_SESSION['customerip'] = $ipaddr;
                header('location:../index.php');
            }
        } else {
            $_SESSION['customerloginerrorflag']=1;
            header('location:../login.php');
        }
    
}

if (isset($_POST['btncreate'])) {
    $getusernames = array();
    $getemails = array();

    $cust_query = "select * from customer_master";
    $cust_result = mysqli_query($conn, $cust_query);
    if (mysqli_num_rows($cust_result) > 0) {
        while ($getdata = mysqli_fetch_array($cust_result)) {
            array_push($getusernames, $getdata['cm_username']);
            array_push($getemails, $getdata['cm_email']);
        }
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = (isset($_POST['gender']) ? $_POST['gender'] : '');
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $flag = $customer_id = '';
    foreach ($getusernames as $usernames) {
        if ($usernames == $uname) {
            $_SESSION['msg'] = 'Username already exists';
            $flag = 1;
            header("location:../create_account.php");
        }
    }

    foreach ($getemails as $emails) {
        if ($emails == $email) {
            $_SESSION['msg'] = 'Account with email already exists';
            $flag = 1;
            header("location:../create_account.php");
        }
    }

    if ($flag == 0 && $mobile != '') {
        $query = "insert into customer_master(cm_firstname , cm_lastname ,cm_dob,cm_gender,cm_mobile, cm_email , cm_username , cm_password) values('$fname' , '$lname' ,'$dob' ,'$gender',$mobile,'$email' , '$uname' , '$pass')";
        $res = mysqli_query($conn, $query);
        $customer_id =  $conn->insert_id;
        $_SESSION['registered']=1;
    } else if ($flag == 0 && $mobile == '') {
        $query = "insert into customer_master(cm_firstname , cm_lastname ,cm_dob,cm_gender, cm_email , cm_username , cm_password) values('$fname' , '$lname' ,'$dob' ,'$gender','$email' , '$uname' , '$pass')";
        $res = mysqli_query($conn, $query);
        $customer_id =  $conn->insert_id;
        
    }
    if($customer_id!=''){
        $visitorid=session_id();
        $checkvisitorquery="SELECT * from al_visitorcart where vc_visitorid='$visitorid'";
        $checkresult=mysqli_query($conn,$checkvisitorquery);
        if(mysqli_num_rows($checkresult) > 0){
            while($getcartdata=mysqli_fetch_array($checkresult)){
                $getproductid=$getcartdata['vc_productid'];
                $getquantity=$getcartdata['vc_quantity'];
                $insertintocart="INSERT into al_cart(crt_customerid , crt_productid ,crt_quantity) values($customer_id,$getproductid,$getquantity)";
                $cartresult=mysqli_query($conn,$insertintocart);
            }
        }
    }
    header("location:../login.php");
}
