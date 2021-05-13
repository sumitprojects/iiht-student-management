<?php
$placement = isset($placement)? $placement : null;
?>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($placement)?'placement_edit_form':'placement_add_form'); ?>
                        <a href="<?php echo site_url('admin/manage_placement'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_placement_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_placement/'.(!empty($placement)?'placement_edit_form':'placement_add_form')); ?>"
                        method="post">
                        <?php if(!empty($placement)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $placement['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="type"><?php echo get_phrase('type'); ?><span class="required">*</span></label>
                            <select name="type" id="type" class="form-control">
                                <option disabled selected>---Type---</option>
                                <option value="other" <?php if($placement['type']=='OTHER'){ echo "selected"; }?>>Other</option>
                                <option value="kgk" <?php if($placement['type']=='KGK'){ echo "selected"; }?>>KGK</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary_type"><?php echo get_phrase('salary_type'); ?><span class="required">*</span></label>
                            <select name="salary_type" id="salary_type" class="form-control">
                                <option disabled selected>---Salary Type---</option>
                                <option value="0">Salary</option>
                                <option value="1">No-Salary</option>
                            </select>
                        </div>
                        <div class="form-group" id="ps">
                            <label for="placement salary"><?php echo get_phrase('placement_salary'); ?><span class="required">*</span></label>
                            <input type="text" class="form-control" id="placement_salary" name="placement_salary"
                                value="<?php echo !empty($placement)?$placement['placement_salary']:''?>">
                        </div>
                        <div class="form-group" id="pd">
                            <label for="placement_date"><?php echo get_phrase('placement_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="placement_date" name="placement_date"
                                value="<?php echo !empty($placement)?$placement['placement_date']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hod_id"><?php echo get_phrase('hod'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="hod_id"
                                id="hod_id" required>
                                <option value=""><?php echo get_phrase('select_a_hod'); ?></option>
                                <?php foreach ($departments as $department): ?>
                                     <option value="<?php echo $department['hod_id']; ?>"
                                        <?php echo !empty($hod)? (($hod['hod_id'] == $department['hod_id'])? 'selected':'') : ''; ?>>
                                        <?php echo $department['hod_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('Status'); ?><span
                                    class="required">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option disabled selected>---Status---</option>
                                <option value="placed" <?php if($placement['status'] == "placed"){ echo "selected"; }?>>
                                    Placed</option>
                                <option value="pending" <?php if($placement['status'] == "pending"){ echo "selected"; }?>>Pending</option>
                                <option value="left" <?php if($placement['status'] == "left"){ echo "selected"; }?>>Left</option>
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
<script>
$(function() {
    $('#ps').hide();
    $('#pd').hide();
    $('#td').hide();
    $('#ts').hide();
    $('#salary_type').on('change', function() {
        if (this.value == "Salary") {
            $('#ps').show();
            $('#pd').show();
            $('#td').hide();
            $('#ts').hide();
        } else {
            $('#td').show();
            $('#ts').show();
            $('#ps').hide();
            $('#pd').hide();

        }
    });
});
</script>