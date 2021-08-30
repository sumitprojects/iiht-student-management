<?php
$batch = null; 
if(!empty($param2)){
    $batch = $this->crud_model->get_batch($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($batch)?'edit_batch':'add_batch'); ?>
                        <a href="<?php echo site_url('admin/batch'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_batch_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/batch/'.(!empty($batch)?'edit_batch':'add_batch')); ?>"
                        method="post">
                        <?php if(!empty($batch)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $batch['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="reasons"><?php echo get_phrase('batch_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="batch_name" name="batch_name"
                                value="<?php echo !empty($batch)?$batch['batch_name']:''?>" required>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>