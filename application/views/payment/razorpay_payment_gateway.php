<!--paytm gateway addon-->
<?php if(addon_status('razorpay')): ?>
    <div class="row payment-gateway razorpay" onclick="selectedRazorPayGateway()">
        <div class="col-12">
            <img class="tick-icon razorpay-icon" src="<?php echo base_url('assets/payment/tick.png'); ?>">
            <img class="payment-gateway-icon" src="<?php echo base_url('assets/payment/razorpay.png'); ?>">
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript">
function selectedRazorPayGateway() {
    $(".payment-gateway").css("border", "2px solid #D3DCDD");
    $('.tick-icon').hide();
    $('.form').hide();

    $(".razorpay").css("border", "2px solid #00D04F");
    $('.razorpay-icon').show();
    $('.razorpay-form').show();
}
</script>
