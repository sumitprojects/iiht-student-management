<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase('add_student'); ?>
                        <a href="<?php echo site_url('admin/manage_batch'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_batch_for_student'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_batch/add'); ?>"
                        method="post">
                       
                        <input type="hidden" class="form-control" id="id" name="id" readonly>
                     
                        <div class="form-group">
                            <label for="reasons"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                              <select class="form-control" data-toggle="select2" name="user_id" id="user_id"
                                    required>
                                    <option value="" disabled><?php echo get_phrase('select_a_student'); ?></option>
                                    
                                    <?php foreach ($user_list as $student): ?>
                                    <option value="<?php echo $student['id']; ?>">
                                        <?php echo $student['first_name'].'  '.$student['last_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                         <div class="form-group">
                            <label for="reasons"><?php echo get_phrase('batch'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control" data-toggle="select2" name="batch_id" id="batch_id"
                                    required>
                                    <option value="" disabled><?php echo get_phrase('select_a_batch'); ?></option>
                                    <?php foreach ($batch_lst as $batch): ?>
                                    <option value="<?= $batch['id']; ?>">
                                        <?= $batch['batch_name']; ?></option>
                                    <?php endforeach; ?>
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