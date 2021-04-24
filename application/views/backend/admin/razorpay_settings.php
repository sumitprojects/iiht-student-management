<?php
$razorpay_settings = $this->db->get_where('settings', array('key' => 'razorpay_keys'))->row()->value;
$razorpay = json_decode($razorpay_settings);
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><p><?php echo get_phrase('setup_razorpay_settings'); ?></p></h4>
            <form class="" action="<?php echo site_url('addons/razorpay/update_settings'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label><?php echo get_phrase('RAZORPAY_MODE'); ?></label>
                    <select class="form-control select2" data-toggle="select2" id = "RAZORPAY_MODE" name="RAZORPAY_MODE">
                        <option value="production"> <?php echo get_phrase('Production');?></option>
                        <option value="test"> <?php echo get_phrase('Test');?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('RAZORPAY_KEY'); ?></label>
                    <input type="text" name="RAZORPAY_KEY" class="form-control" value="<?php echo htmlspecialchars($razorpay[0]->RAZORPAY_KEY);?>" required />
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('RAZORPAY_SECRET'); ?></label>
                    <input type="text" name="RAZORPAY_SECRET" class="form-control" value="<?php echo htmlspecialchars($razorpay[0]->RAZORPAY_SECRET);?>" required />
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('RAZORPAY_CURRENCY'); ?></label>
                    <input type="text" name="RAZORPAY_CURRENCY" class="form-control" value="<?php echo htmlspecialchars($razorpay[0]->RAZORPAY_CURRENCY);?>" required />
                </div>

                <div class="row justify-content-md-center">
                    <div class="form-group col-md-6">
                        <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_razorpay_keys'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
