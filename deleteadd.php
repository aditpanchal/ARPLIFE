<?php
require("config/dbconnect.php");
session_start();
if (isset($_SESSION['profileview']) && $_SESSION['profileview'] == 0) {
    header("location:index.php");
}else{
    session_abort();
}
if (isset($_POST['deletebtn'])) {
    $addid = $_POST['addressid'];
    $custid=$_POST['customerid'];
    $deleqry = "DELETE from al_addresses where addr_addressid=$addid";
    $deleteresult = mysqli_query($conn, $deleqry);
    if ($deleteresult == 1) {
            header("location:address.php?customerid=$custid");
    }
    else
    {
        echo "fail";
    }
}
