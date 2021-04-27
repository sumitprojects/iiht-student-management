<?php
$register_user=$this->user_model->get_register_users($event_id)->result_array();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
            <h4 class="mb-3 header-title">
            <?php echo get_phrase('registered_user'); ?>
            <a href="<?php echo site_url('admin/event_schedule'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_event_schedule_list'); ?>
            </a>
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('register_user_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($register_user) > 0): ?>
                    <table id="event_schedule-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('fullname'); ?></th>
                                <th><?php echo get_phrase('organization_name'); ?></th>
                                <th><?php echo get_phrase('phone_number'); ?></th>
                                <th><?php echo get_phrase('email'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($register_user as $key => $br):
                                
                                ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <strong><?php echo ellipsis($br['fullname']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['organization_name']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['phone_number']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['email']); ?></strong><br>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($register_user) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;"
                            src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>