<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "rzp_test_mSAXwASKMKDLhi", // Enter the Key ID generated from the Dashboard    
        "amount": "500",
        // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise    
        "currency": "INR",
        "name": "ARPLIFE",
        "description": "",
        "image": "https://example.com/your_logo",
        "order_id": "order_JhOfHQOXWP8MYW", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1   
        "handler": function(response) {
            alert(response.razorpay_payment_id);
            alert(response.razorpay_order_id);
            alert(response.razorpay_signature)
        },
        "prefill": {
            "name": "Customer name",
            "email": "customer.mail@example.com",
            "contact": "9839485784"
        },
        "notes": {
            "address": "arplife.customercare@gmail.com"
        },
        "theme": {
            "color": "#d19e66"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    });
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
</script>