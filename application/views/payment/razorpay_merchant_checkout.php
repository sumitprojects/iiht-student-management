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
  <form action="<?=$CALLBACK_URL?>" method="POST">
    <script
      src="https://checkout.razorpay.com/v1/checkout.js"
      data-key="<?php echo htmlspecialchars()?>"
      data-amount="<?php echo htmlspecialchars($amount_to_pay)?>"
      data-currency="INR"
      data-name="<?php echo htmlspecialchars($user_details['first_name']. ' '.$user_details['last_name'])?>"
      data-image="<?php echo htmlspecialchars($data['image'])?>"
      data-description="<?php echo $data['description']?>"
      data-prefill.name="<?php echo $data['prefill']['name']?>"
      data-prefill.email="<?php echo $data['prefill']['email']?>"
      data-prefill.contact="<?php echo $data['prefill']['contact']?>"
      data-notes.shopping_order_id="3456"
      data-order_id="<?php echo $order_detail['shopping_order_id']?>"
      <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
      <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
    >
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="<?php echo $order_detail['shopping_order_id']?>">
  </form>

</body>

</html>
