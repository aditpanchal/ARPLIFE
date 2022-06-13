<?php
    session_start();
    if(isset($_SESSION['customerid']) && $_SESSION['customerid']!='' ){
        header("location:../checkout.php");
    }
    else{
        header("location:../login.php");
    }
?>