<?php
$source = null; 
if(!empty($param2)){
    $source = $this->crud_model->get_training_cat($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase(!empty($source)?'training_edit_form':'training_add_form'); ?>
                    <a href="<?php echo site_url('admin/source'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_source_list'); ?></a>
                </h4>
                <form class="required-form" action="<?php echo site_url('admin/training/'.(!empty($source)?'edit':'add')); ?>" method="post">
                <?php if(!empty($source)):?>
                    <input type="hidden" class="form-control" id="id" name = "id" value="<?php echo $source['id']; ?>" readonly>
                <?php endif;?>
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" tab-index="0" autofocus class="form-control" id="title" name = "title" value="<?php echo !empty($source)?$source['title']:''?>" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>