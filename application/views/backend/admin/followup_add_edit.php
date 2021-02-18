<?php
$inquiry = 0;
$followup = null;
if(!empty($param2)){
    // $followup = $this->crud_model->get_followup($param2)->row_array();
    $inquiry = $param2;
}
if(!empty($param3)){
    $followup = $this->crud_model->get_followup($param3)->row_array();   
}
?>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($followup)?'followup_edit_form':'followup_add_form'); ?></h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/followup/'.(!empty($followup)?'edit':'add')); ?>"
                        method="post">
                        <input type="hidden" class="form-control" id="date_added" name="date_added"
                                value="<?php echo !empty($followup)?$followup['date_added']:date('Y-m-d')?>" required>
                        <?php if(!empty($followup)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $followup['id']; ?>">
                        <?php endif;?>
                        <input type="hidden" class="form-control" id="en_id" name="en_id"
                            value="<?php echo $inquiry; ?>">
                        <div class="form-group">
                            <label for="description"><?php echo get_phrase('description'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="<?php echo !empty($followup)?$followup['description']:''; ?>" required>
                            <div class="invalid-feedback"><?=get_phrase('please_provide_a_description')?></div>
                        </div>
                        <div class="form-group">
                            <label for="next_date"><?php echo get_phrase('next_followup_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="next_date" name="next_date" min="<?=date('Y-m-d')?>"
                                value="<?php echo !empty($followup)?$followup['next_date']:date('Y-m-d')?>" required>
                                <div class="invalid-feedback"><?=get_phrase('please_provide_a_valid_date_after')?> <?=date('Y-m-d')?>.</div>
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('followup_status'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="status"
                                data-init-plugin="select2" id="status">
                                <option value="open"
                                    <?=strtolower($followup['status'])=='open'?'selected':''?>>
                                    <?php echo get_phrase('open') ?></option>
                                <option value="closed"
                                    <?=strtolower($followup['status'])=='closed'?'selected':''?>>
                                    <?php echo get_phrase('closed') ?></option>
                                <option value="completed"
                                    <?=strtolower($followup['status'])=='completed'?'selected':''?>>
                                    <?php echo get_phrase('completed') ?></option>
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
<script type="text/javascript">
$(document).ready(function() {
    initSelect2(['#status']);
    <?php if($followup):?>
    $('#status').val('<?=$followup['status']?>'.toLocaleLowerCase());
    $('#status').trigger('change');
    <?php endif;?> 
});
</script>