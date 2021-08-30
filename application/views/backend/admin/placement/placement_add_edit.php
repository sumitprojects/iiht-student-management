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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                Tentative Date and Salary will be taken if Non-Salary option is selected. 
                            </div>
                        </div>
                    </div>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_placement/'.(!empty($placement)?'placement_edit_form':'placement_add_form')); ?>"
                        method="post">
                        <?php if(!empty($placement)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $placement['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_student'); ?></option>
                                <?php foreach ($user_list as $user): ?>
                                <option value="<?php echo $user['id']; ?>"
                                    <?php echo !empty($placement)? (($placement['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name']." ".$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type"><?php echo get_phrase('type'); ?><span class="required">*</span></label>
                            <select name="type" id="type" class="form-control" required>
                                <option disabled selected>---Type---</option>
                                <option value="other" <?php if($placement['type']=='OTHER'){ echo "selected"; }?>>Other
                                </option>
                                <option value="kgk" <?php if($placement['type']=='KGK'){ echo "selected"; }?>>KGK
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary_type"><?php echo get_phrase('salary_type'); ?><span
                                    class="required">*</span></label>
                            <select name="salary_type" id="salary_type" class="form-control" required>
                                <option disabled selected>---Salary Type---</option>
                                <option value="0" <?php if($placement['salary_type']=='0'){ echo "selected"; }?>>Salary
                                </option>
                                <option value="1" <?php if($placement['salary_type']=='1'){ echo "selected"; }?>>
                                    No-Salary</option>
                            </select>
                        </div>
                        <?php 
                        if(isset($placement['tentative_date'])):?>
                        <div class="form-group" id="ps">
                            <label for="placement salary"><?php echo get_phrase('tentative_salary'); ?><span
                                    class="required">*</span></label>
                            <input type="number" class="form-control" id="tentative_salary" name="tentative_salary" readonly
                                min="0" value="<?php echo !empty($placement)?$placement['tentative_salary']:''?>"
                                required>
                        </div>
                        <div class="form-group" id="pd">
                            <label for="placement_date"><?php echo get_phrase('tentative_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="tentative_date" name="tentative_date"
                                value="<?php echo !empty($placement)?$placement['tentative_date']:''?>" max="<?=date('Y-m-d')?>" required readonly>
                        </div>
                        <?php endif;?>

                        <div class="form-group" id="ps">
                            <label for="placement salary"><?php echo get_phrase('placement_salary'); ?><span
                                    class="required">*</span></label>
                            <input type="number" class="form-control" id="placement_salary" name="placement_salary"
                                min="0" value="<?php echo !empty($placement)?$placement['placement_salary']:''?>"
                                required>
                        </div>
                        <div class="form-group" id="pd">
                            <label for="placement_date"><?php echo get_phrase('placement_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="placement_date" name="placement_date" max="<?=date('Y-m-d')?>"
                                value="<?php echo !empty($placement)?$placement['placement_date']:''?>" required>
                        </div>
                        <div class="form-group" id="hod_x">
                            <label for="hod_id"><?php echo get_phrase('hod'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="hod_id" id="hod_id">
                                <option value=""><?php echo get_phrase('select_a_hod'); ?></option>
                                <?php foreach ($hod_list as $hod): ?>
                                <option value="<?php echo $hod['hod_id']; ?>"
                                    <?php echo !empty($placement)? (($hod['hod_id'] == $placement['hod_id'])? 'selected':'') : ''; ?>>
                                    <?php echo $hod['hod_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" id="department_x">
                            <label for="department"><?php echo get_phrase('department'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="department" id="department">
                                <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                                <?php foreach ($department_list as $department): ?>
                                <option value="<?php echo $department['dpid']; ?>"
                                    <?php echo !empty($placement)? (($department['dpid'] == $placement['department'])? 'selected':'') : ''; ?>>
                                    <?php echo $department['dpname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="designation"><?php echo get_phrase('designation'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="designation"
                                id="designation" required>
                                <option value=""><?php echo get_phrase('select_a_designation'); ?></option>
                                <?php foreach ($designation_list as $designation): ?>
                                <option value="<?php echo $designation['id']; ?>"
                                    <?php echo !empty($placement)? (($designation['id'] == $placement['designation'])? 'selected':'') : ''; ?>>
                                    <?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('Status'); ?><span
                                    class="required">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option disabled selected>---Status---</option>
                                <option value="placed" <?php if($placement['status'] == "placed"){ echo "selected"; }?>>
                                    Placed</option>
                                <option value="pending"
                                    <?php if($placement['status'] == "pending"){ echo "selected"; }?>>Pending</option>
                                <option value="left" <?php if($placement['status'] == "left"){ echo "selected"; }?>>Left
                                </option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" value="submit"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<script type="text/javascript">
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
jQuery(document).ready(function() {
    jQuery('#type').change(function(){
        if(jQuery(this).val()== 'other'){
            jQuery('#hod_x').hide();
            jQuery('#department_x').hide();
        }
        else{
            jQuery('#hod_x').show();
            jQuery('#department_x').show();
        }
    })
  
});
</script>