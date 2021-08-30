<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('attendance'); ?>
                    <!-- href="<?php //echo site_url('admin/asset_for_users_form/add_asset_for_users'); ?>" -->
                    <a href="<?php echo site_url('admin/manage_attendance/attendance_add_edit/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_new_attendance'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('attendance_list'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($attendance) > 0): ?>
                    <table id="attendance-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('student'); ?></th>
                                <th><?php echo get_phrase('entry_date'); ?></th>
                                <th><?php echo get_phrase('remark'); ?></th>
                                <th><?php echo get_phrase('att_status'); ?></th>
                                <th><?php echo get_phrase('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($attendance as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                 <?php
                                 $enroll=$this->crud_model->get_enrol_data($br['en_id'])->row_array();
                                ?>
                                <strong><?php echo ellipsis($enroll['full_name']); ?></strong><br>
                                        <?php echo ellipsis($enroll['course_name'])?>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['entry_date']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['remark']); ?></strong><br>
                                </td>
                                <td>
                                    <span class="badge badge-info-lighten">
                                        <strong><?php echo strtoupper($br['att_status']); ?></strong><br>
                                    </span>
                                </td>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php if ($br['status'] == 1): ?>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/manage_attendance/attendance_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_attendance');?></a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="confirm_modal('<?php echo site_url('admin/manage_attendance/delete/'.$br['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
                                            </li>
                                            <?php else: ?>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="confirm_modal('<?php echo site_url('admin/manage_attendance/activate/'.$br['id']); ?>');"><?php echo get_phrase('activate'); ?></a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($attendance) == 0): ?>
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