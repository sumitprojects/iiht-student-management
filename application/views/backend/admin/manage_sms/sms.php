<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('sms'); ?>
                    <!-- href="<?php //echo site_url('admin/sms_form/add_sms'); ?>" -->
                    <a href="<?php echo site_url('admin/manage_sms/sms_add_edit/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_new_sms'); ?></a>

                    <a href="<?php echo site_url('admin/manage_sms/send_sms/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('send_sms'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('sms_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($sms) > 0): ?>
                    <table id="sms-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('date_added'); ?></th>
                                <th><?php echo get_phrase('sms_template'); ?></th>
                                <th><?php echo get_phrase('type'); ?></th>
                                <th><?php echo get_phrase('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sms as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <strong><?php echo ellipsis($br['date_added']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['sms_template']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['type']); ?></strong><br>
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
                                                    href="<?php echo site_url('admin/manage_sms/sms_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_sms');?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($sms) == 0): ?>
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