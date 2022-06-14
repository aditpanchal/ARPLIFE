<?php
session_start();
if (isset($_SESSION['customerid']) && $_SESSION['customerid'] != '') {
    $subtotal = '';
    $gst = '';
    $customerid = '';
    $subtotal = ((isset($_GET['subtotal'])) ? $_GET['subtotal'] : '');
    $gst = ((isset($_GET['gst'])) ? $_GET['gst'] : '');
    $customerid = ((isset($_SESSION['customerid'])) ? $_SESSION['customerid'] : '');

    header("location:../checkout.php?subtotal=$subtotal&gst=$gst&customerid=$customerid");
} else {
    header("location:../login.php");
}
