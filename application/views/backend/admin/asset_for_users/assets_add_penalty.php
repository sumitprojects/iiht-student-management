<?php
$asset_for_users = null; 
if(!empty($param2)){
    $asset_for_users = $this->crud_model->get_asset_for_users($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase('add_penalty'); ?>
                        <a href="<?php echo site_url('admin/manage_asset_for_users'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_asset_for_users_list'); ?></a>
                    </h4>
                    <form class="required-form" action="<?php echo site_url('admin/manage_asset_for_penalty/add'); ?>"
                        method="post">
                        <?php $asset = $this->user_model->get_asset($asset_for_users['asset_id'])->row_array();?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $asset_for_users['id']; ?>" readonly>

                        <div class="form-group">
                            <?php $user = $this->user_model->get_user($asset_for_users['user_id'])->row_array();?>
                            <label for="student"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control"
                                value="<?php echo $user['first_name'].' '.$user['last_name']; ?>" readonly>
                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                value="<?php echo $asset_for_users['user_id']; ?>" readonly>
                        </div>
                        <div class="form-group">

                            <label for="asset_name"><?php echo get_phrase('asset_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" value="<?php echo $asset['name']; ?>" readonly>
                            <input type="hidden" class="form-control" id="asset_id" name="asset_id"
                                value="<?php echo $asset_for_users['asset_id']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="asset_price"><?php echo get_phrase('asset_price'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="price" id="price"
                                value="<?php echo $asset['price']; ?>" readonly>
                        </div>
                        <!-- <div class="form-group">
                            <label for="penalty"><?php echo get_phrase('penalty'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control"  name="penalty" id="penalty" value="<?php echo $asset['penalty']; ?>">
                        </div> -->
                        <div class="form-group">
                            <label for="date_of_penalty"><?php echo get_phrase('date_of_penalty'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" name="date_of_penalty" id="date_of_penalty">
                        </div>

                        <div class="form-group">
                            <label for="remark"><?php echo get_phrase('remark'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="remark" id="remark">
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>

                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>