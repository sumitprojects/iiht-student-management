<?php
$event_schedule = null; 
if(!empty($param2)){
    $event_schedule = $this->crud_model->get_event_schedule($param2,true)->row_array();
}

?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($event_schedule)?'event_schedule_edit_form':'event_schedule_add_form'); ?>
                        <a href="<?php echo site_url('admin/event_schedule'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_event_schedule_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/event_schedule/'.(!empty($event_schedule)?'event_schedule_edit_form':'event_schedule_add_form')); ?>"
                        method="post" enctype="multipart/form-data">
                        <?php if(!empty($event_schedule)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $event_schedule['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="event_title"><?php echo get_phrase('event_title'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="event_title" name="event_title"
                                value="<?php echo !empty($event_schedule)?$event_schedule['event_title']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="event_presentor"><?php echo get_phrase('event_presentor'); ?><span
                                    class="required">*</span></label>
                            <?php $pres = ($event_schedule['event_presentor']); ?>
                             <input type="text" class="form-control" id="event_presentor" name="event_presentor"
                                value="<?php echo !empty($event_schedule)?$event_schedule['event_presentor']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="event_description"><?php echo get_phrase('event_description'); ?></label>
                            <textarea class="form-control" id="event_description" name="event_description"><?php echo !empty($event_schedule)?$event_schedule['event_description']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_link"><?php echo get_phrase('event_link'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="event_link" name="event_link"
                                value="<?php echo !empty($event_schedule)?$event_schedule['event_link']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="event_date"><?php echo get_phrase('event_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="event_date" name="event_date"
                                value="<?php echo !empty($event_schedule)?$event_schedule['event_date']:''?>" min="<?=date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label for="event_time"><?php echo get_phrase('event_time'); ?><span
                                    class="required">*</span></label>
                            <input type="time" class="form-control" id="	event_date" name="event_time"
                                value="<?php echo !empty($event_schedule)?$event_schedule['event_time']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="event_image"><?php echo get_phrase('event_image'); ?></label>

                            <input type="file" class="form-control" id="event_image" name="event_image"
                                value="<?php echo !empty($event_schedule)?$event_schedule['event_image']:''?>">
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('status'); ?><span
                                    class="required">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" selected>pending</option>
                                <option value="cancelled"
                                    <?php if($event_schedule['status']=='cancelled'){ echo "selected"; }?>>cancelled</option>
                                <option value="schedule"
                                    <?php if($event_schedule['status']=='schedule'){ echo "selected"; }?>>schedule</option>
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
  $(document).ready(function () {
    initSummerNote(['#event_description']);
  });
</script>