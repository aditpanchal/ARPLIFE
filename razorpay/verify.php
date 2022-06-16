<?php

require('config.php');
require('../../ARPLIFE/config/dbconnect.php');
session_start();
require_once("../../ARPLIFE/PHPMailer/PHPMailer.php");
require_once("../../ARPLIFE/PHPMailer/SMTP.php");
require_once("../../ARPLIFE/PHPMailer/Exception.php");

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    $flag = 0;
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['tempemail'];
    $finalamount = $_SESSION['tempfinalamount'];
    $customerid = $_SESSION['tempcustomerid'];
    $discount = $_SESSION['tempdiscountamount'];
    $productid = $_SESSION['productidarray'];
    foreach ($productid as $pid) {
        $getproductamt = "SELECT * from product_master where pm_productid=$pid";
        $getproductres = mysqli_query($conn, $getproductamt);
        if (mysqli_num_rows($getproductres) > 0) {
            $getproductamount = mysqli_fetch_array($getproductres);
            $productamt = $getproductamount['pm_price'];
        }
        $orderinsert = "INSERT into al_customerorder(co_customerid,co_productid,co_productamount,co_discountamount,co_amountpaid,co_ordertoken,co_paymentstatus)  values($customerid,$pid,$productamt,$discount,$finalamount,'$razorpay_order_id','paid')";
        if (mysqli_query($conn, $orderinsert)) {
            $flag = 1;
            echo "ordered successfully";
        }
    }
    if ($flag == 1) {
        $deletefromcartquery = "DELETE from al_cart where crt_customerid=$customerid";
        $deleteres = mysqli_query($conn, $deletefromcartquery);

        $title = 'INVOICE';
        $message = $email . '<br> This is your invoice.<br>' . 'Discount received:' . $discount . '.<br>' . 'You paid:' . $finalamount . '.<br>';

        //SMTP SETTINGS
        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "arplife.customercare@gmail.com";
        $mail->Password = "wiinussjmxdhwkpn";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        //EMAIL SETTINGS
        $mail->isHTML(true);
        $mail->setFrom("arplife.customercare@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = ($title);
        $mail->Body = $message;
        if ($mail->send()) {
            header("location:../../ARPLIFE/paymentsuccess.php");
        }
    }
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
