<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('event_schedule'); ?>
                    <!-- href="<?php //echo site_url('admin/event_schedule_form/add_event_schedule'); ?>" -->
                    <a href="<?php echo site_url('admin/event_schedule/event_schedule_add_edit/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_new_event_schedule'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('event_schedule_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($event_schedule) > 0): ?>
                    <table id="event_schedule-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('event_title'); ?></th>
                                <th><?php echo get_phrase('event_presentor'); ?></th>
                                <th><?php echo get_phrase('event_link'); ?></th>
                                <th><?php echo get_phrase('event_date'); ?></th>

                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($event_schedule as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <strong><?php echo ellipsis($br['event_title']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['event_presentor']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['event_link']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['event_date']); ?></strong><br>
                                </td>
                                <td>
                                    <?php if ($br['status'] == 'pending'): ?>
                                    <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top"
                                        title=""
                                        data-original-title="<?php echo get_phrase('pending'); ?>"><?php echo get_phrase('pending'); ?></span>
                                    <?php elseif ($br['status'] == 'schedule'):?>
                                    <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top"
                                        title=""
                                        data-original-title="<?php echo get_phrase('schedule'); ?>"><?php echo get_phrase('schedule'); ?></span>
                                    <?php else : ?>
                                    <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top"
                                        title=""
                                        data-original-title="<?php echo get_phrase('cancelled'); ?>"><?php echo get_phrase('cancelled'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/event_schedule/event_schedule_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_event_schedule');?></a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="confirm_modal('<?php echo site_url('admin/event_schedule/'.(($br['status'] == 'cancelled')?'schedule':'delete').'/'.$br['id']); ?>');"><?php echo get_phrase(($br['status'] == 'cancelled')?'schedule':'cancelled'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($event_schedule) == 0): ?>
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