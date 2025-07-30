<?php
include 'db.php';
$uid = $_GET['uid'];
$result = $conn->query("SELECT * FROM subscribers WHERE id = $uid");
$user = $result->fetch_assoc();
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form id="razorpay-form">
  <button id="pay-btn">Pay with Razorpay</button>
</form>

<script>
var options = {
    "key": "rzp_test_S3u85H1h6FgdL4",
    "amount": 10000, // Rs. 100 in paise
    "currency": "INR",
    "name": "<?php echo $user['name']; ?>",
    "description": "Newsletter Subscription",
    "handler": function (response){
        window.location.href = "payment_callback.php?uid=<?php echo $uid; ?>&pid=" + response.razorpay_payment_id;
    },
    "prefill": {
        "email": "<?php echo $user['email']; ?>"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp = new Razorpay(options);
document.getElementById('pay-btn').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
