<?php
session_start();
if (isset($_SESSION['customerid']) && $_SESSION['customerid'] != '') {
    $subtotal = '';
    $gst = '';
    $subtotal = ((isset($_GET['subtotal'])) ? $_GET['subtotal'] : '');
    $gst = ((isset($_GET['gst'])) ? $_GET['gst'] : '');
    header("location:../checkout.php?subtotal=$subtotal&gst=$gst");
} else {
    header("location:../login.php");
}
