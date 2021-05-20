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
                        <?php echo get_phrase(($asset_for_users)?'edit_asset_for_users':'add_asset_for_users'); ?>
                        <a href="<?php echo site_url('admin/manage_asset_for_users'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_asset_for_users_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_asset_for_users/'.(!empty($asset_for_users)?'edit_asset_for_users':'add_asset_for_users')); ?>"
                        method="post">
                        <?php if(!empty($asset_for_users)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $asset_for_users['id']; ?>" readonly>
                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                        value="<?php echo $asset_for_users['user_id']; ?>" readonly>
                        <input type="hidden" class="form-control" id="asset_id" name="asset_id"
                        value="<?php echo $asset_for_users['asset_id']; ?>" readonly>
                        <?php endif;?>

                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id" <?php echo !empty($asset_for_users)?'disabled':''?>
                                required>
                                <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                                <?php foreach ($user_list as $user): ?>
                                <option value="<?php echo $user['id']; ?>"
                                    <?php echo !empty($asset_for_users)? (($asset_for_users['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asset_name"><?php echo get_phrase('asset_name'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="asset_id[]" id="asset_id" <?php echo !empty($asset_for_users)?'disabled':''?>
                                required multiple>
                                <option value=""><?php echo get_phrase('select_a_asset'); ?></option>
                                <?php foreach ($asset_list as $asset): ?>
                                <option value="<?php echo $asset['id']; ?>"
                                    <?php echo !empty($asset_for_users)? (($asset_for_users['asset_id'] == $asset['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $asset['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php if(!empty($asset_for_users)):?>
                        <div class="form-group">
                            <label for="return_date"><?php echo get_phrase('return_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="return_date" name="return_date"
                                value="<?php echo !empty($asset_for_users)?$asset_for_users['return_date']:''?>" required>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="returnable"><?php echo get_phrase('returnable'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="returnable" id="returnable" 
                                required>
                                <option value=""><?php echo get_phrase('select_a_returnable'); ?></option>
                                <option value="0" <?php if($asset_for_users['returnable'] =='0') echo 'selected';?>>Yes</option>
                                <option value="1" <?php if($asset_for_users['returnable'] =='1') echo 'selected';?>>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('status'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="status" id="status">
                                
                                <option value="Pending" <?php if($asset_for_users['status'] =='Pending') echo 'selected';?> >Pending</option>
                                <option value="Returned" <?php if($asset_for_users['status'] =='Returned') echo 'selected';?>>Returned</option>
                                <option value="Approved" <?php if($asset_for_users['status'] =='Approved') echo 'selected';?>>Approved</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>