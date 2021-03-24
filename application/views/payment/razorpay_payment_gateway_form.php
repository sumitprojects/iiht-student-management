<!--Paytm payment gateway addon-->
<?php if(addon_status('razorpay')): ?>
    <form action="<?php echo site_url('addons/razorpay/checkout'); ?>" method="post" class="razorpay-form form hidden">
        <hr class="border mb-4">
        <input type="hidden" name="total_price_of_checking_out" value="<?php echo htmlspecialchars($total_price_of_checking_out); ?>">
        <p>Razorpay helps you to pay via All UPIs, Wallets, NetBanking, and Credit/Debit Cards.</p>
        <button type="submit" class="payment-button float-right"><?php echo get_phrase('pay_by_razorpay'); ?></button>
    </form>
<?php endif; ?>
