<?php
require_once('stripe/init.php');
$stripe = new \Stripe\StripeClient('sk_test_B8yf01OkYC2ylLlyptgutnLw');

$chargeID = $_POST['pagamento'];

$charge = $stripe->charges->retrieve(
  'ch_3JchIZAQGwd6gbxO1jEpTpbW',
);

echo $charge->metadata->customerFullName;
echo $charge->metadata->username;
echo $charge->metadata->customerPhoneNumber;
echo $charge->amount;

?>
