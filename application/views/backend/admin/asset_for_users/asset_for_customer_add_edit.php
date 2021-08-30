<?php
$asset_for_customer = null; 
if(!empty($param2)){
    $asset_for_customer = $this->crud_model->get_asset_for_customer($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($asset_for_customer)?'edit_asset_for_customer':'add_asset_for_customer'); ?>
                        <a href="<?php echo site_url('admin/manage_assets_for_customer'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_asset_for_customer_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_assets_for_customer/'.(!empty($asset_for_customer)?'edit_asset_for_customer':'add_asset_for_customer')); ?>"
                        method="post">
                        <?php if(!empty($asset_for_customer)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $asset_for_customer['id']; ?>" readonly>
                        <?php endif;?>
                        <input type="hidden" class="form-control"  name="asset_id"
                            value="<?php echo $asset_for_customer['asset_id']; ?>" readonly>
                            
                        <div class="form-group">
                            <label for="customer_name"><?php echo get_phrase('customer_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="customer_name"
                                value="<?php echo $asset_for_customer['customer_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="customer_email"><?php echo get_phrase('customer_email'); ?></label>
                            <input type="email" class="form-control" name="customer_email"
                                value="<?php echo $asset_for_customer['customer_email']; ?>" <?php if($asset_for_customer['customer_email']) echo 'readonly';?>>
                        </div>

                        <div class="form-group">
                            <label for="customer_contact"><?php echo get_phrase('customer_contact'); ?><span
                                    class="required">*</span></label>
                            <input type="text" name="customer_contact" class="form-control"
                                value="<?php echo $asset_for_customer['customer_contact']; ?>" <?php if($asset_for_customer['customer_contact']) echo 'readonly';?>> 
                        </div>
                        <?php if(empty($asset_for_customer['customer_type'])): ?>
                        <div class="form-group">
                            <label for="customer_type"><?php echo get_phrase('customer_type'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="customer_type"
                                id="customer_type" required <?php if($asset_for_customer['customer_type']) echo 'readonly';?>>
                                <option value=""><?php echo get_phrase('select_customer_type'); ?></option>
                                <option value="internal"
                                    <?php if($asset_for_customer['customer_type']=='internal') echo 'selected'; ?>>
                                    <?php echo get_phrase('internal'); ?></option>
                                <option value="external"
                                    <?php if($asset_for_customer['customer_type']=='external') echo 'selected'; ?>>
                                    <?php echo get_phrase('external'); ?></option>

                            </select>
                        </div>
                        <?php else: ?>
                            <div class="form-group">
                            <label for="customer_type"><?php echo get_phrase('customer_type'); ?><span
                                    class="required">*</span></label>
                            <input type="text" name="customer_type" class="form-control"
                                value="<?php echo $asset_for_customer['customer_type']; ?>" readonly> 
                        </div>
                        <?php endif; ?>
                        <?php if(empty($asset_for_customer['asset_id'])): ?>
                        <div class="form-group">
                            <label for="asset_name"><?php echo get_phrase('asset_name'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="asset_id" id="asset_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_asset'); ?></option>
                                <?php foreach ($asset_list as $asset): ?>
                                <option value="<?php echo $asset['id']; ?>"
                                    <?php echo !empty($asset)? (($asset_for_customer['asset_id'] == $asset['id'])? 'selected':'') : ''; ?>
                                    data-price="<?=$asset['price']; ?>">
                                    <?php echo $asset['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php else: ?>
                            <div class="form-group mb-3">
                            
                                <?php $asset=$this->crud_model->get_assets($asset_for_customer['asset_id'])->row_array(); ?>
                                <label
                                for="asset_name"><?php echo get_phrase('asset_name'); ?></label>
                            <input type="text" class="form-control"
                                value="<?php echo $asset['name']; ?>" readonly>
                                <input type="hidden" class="form-control"  id="asset_id" readonly name="asset_id"
                                value="<?php echo $asset_for_customer['asset_id']; ?>">
                        </div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                            <label
                                for="price"><?php echo get_phrase('asset_price').' ('.currency_code_and_symbol().')'; ?></label>
                            <input type="number" class="form-control" tabindex="0" id="price" readonly name="price"
                                placeholder="<?php echo get_phrase('enter_asset_price'); ?>" min="0"
                                value="<?php echo $asset_for_customer['price']; ?>" <?php if($asset_for_customer['price']) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group mb-3">
                            <label
                                for="remark"><?php echo get_phrase('remark'); ?></label>
                            <input type="text" class="form-control" id="remark" name="remark"                       value="<?php echo $asset_for_customer['remark']; ?>" <?php if($asset_for_customer['remark']) echo 'readonly'; ?>>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>

                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script>
jQuery(document).ready(function() {

    jQuery('#asset_id').on('change', function() {
        jQuery('[name=price]').val(jQuery(this).select2('data')[0].element.dataset.price);
    });
});
</script>