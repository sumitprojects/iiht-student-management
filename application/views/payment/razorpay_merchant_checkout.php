<html>

<head>
  <title>Merchant Check Out Page</title>
</head>

<body>
  <center>
    <h1>Please do not refresh this page...</h1>
  </center>

  <!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
  <form id="razor" name="razor" action="<?=$callback_url?>" method="POST">
    <script
      src="https://checkout.razorpay.com/v1/checkout.js"
      data-key="<?php echo htmlspecialchars(RAZORPAY_KEY)?>"
      data-amount="<?php echo htmlspecialchars($amount_to_pay  * 100)?>"
      data-currency="INR"
      data-name="<?php echo htmlspecialchars($user_details['first_name']. ' '.$user_details['last_name'])?>"
      data-image="<?php echo htmlspecialchars(base_url('uploads/system/'.get_frontend_settings('dark_logo')))?>"
      data-description="<?php echo "Razorpay helps you to pay via All UPIs, Wallets, NetBanking, and Credit/Debit Cards.";?>"
      data-prefill.name="<?php echo htmlspecialchars($user_details['first_name']. ' '.$user_details['last_name'])?>"
      data-prefill.email="<?php echo htmlspecialchars($user_details['email'])?>"
      data-prefill.contact="<?php echo htmlspecialchars($user_details['mob_no'])?>"
      data-notes.shopping_order_id="<?php echo $order_detail['receipt']?>"
      data-order_id="<?php echo $_SESSION['razorpay_order_id']?>"
      <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $amount_to_pay?>" <?php } ?>
      <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $orderData['currency']?>" <?php } ?>
    >
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="<?php echo $order_detail['receipt']?>">
  </form>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type='text/javascript'>
      $(document).ready(function(){
          $('.razorpay-payment-button').trigger('click');  
          
      });
</script>
</html>
