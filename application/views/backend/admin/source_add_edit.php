<?php
$source = null; 
if(!empty($param2)){
    $source = $this->crud_model->get_source($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase(!empty($source)?'source_edit_form':'source_add_form'); ?></h4>
                <form class="required-form" action="<?php echo site_url('admin/source/'.(!empty($source)?'edit':'add')); ?>" method="post">
                <?php if(!empty($source)):?>
                    <input type="hidden" class="form-control" id="source_id" name = "source_id" value="<?php echo $source['source_id']; ?>" readonly>
                <?php endif;?>
                    <div class="form-group">
                        <label for="source_name"><?php echo get_phrase('source_name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="source_name" name = "source_name" value="<?php echo !empty($source)?$source['source_name']:''?>" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>