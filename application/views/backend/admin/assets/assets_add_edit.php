<?php
$assets = null; 
if(!empty($param2)){
    $assets = $this->crud_model->get_assets($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($assets)?'assets_edit_form':'assets_add_form'); ?>
                        <a href="<?php echo site_url('admin/manage_assets'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_assets_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_assets/'.(!empty($assets)?'assets_edit_form':'assets_add_form')); ?>"
                        method="post">
                        <?php if(!empty($assets)):?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $assets['id']; ?>"
                            readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="asset name"><?php echo get_phrase('asset name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo !empty($assets)?$assets['name']:''?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="price"><?php echo get_phrase('price'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="price" name="price"
                            value="<?php echo !empty($assets)?$assets['price']:''?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="stock"><?php echo get_phrase('stock'); ?><span
                                    class="required">*</span></label>
                            <input type="number" class="form-control" id="stock" name="stock"
                            value="<?php echo !empty($assets)?$assets['stock']:''?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="description"><?php echo get_phrase('description'); ?><span
                                    class="required">*</span></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                                required><?php echo !empty($assets)?$assets['description']:''?>
                            </textarea>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>