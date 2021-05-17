<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('placements'); ?>
                    <!-- href="<?php //echo site_url('admin/placement_form/add_placement'); ?>" -->
                    <a href="<?php echo site_url('admin/manage_placement/placement_add_edit/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_new_placement'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('placement_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($placement) > 0): ?>
                    <table id="placement-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('student'); ?></th>
                                <th><?php echo get_phrase('type'); ?></th>
                                <th><?php echo get_phrase('department'); ?></th>
                                <th><?php echo get_phrase('designation'); ?></th>
                                <th><?php echo get_phrase('salary'); ?></th>
                                <th><?php echo get_phrase('placement_date'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($placement as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <strong><?php echo ellipsis($br['full_name']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['type']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['dpname']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['designation_name']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['tentative_salary']); ?></strong><br>
                                    <strong><?php echo ellipsis($br['placement_salary']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['tentative_date']); ?></strong><br>
                                    <strong><?php echo ellipsis($br['placement_date']); ?></strong><br>
                                </td>
                                <td>
                                    <?php if ($br['status'] == 'pending'): ?>
                                    <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top"
                                        title=""
                                        data-original-title="<?php echo get_phrase('pending'); ?>"><?php echo get_phrase('pending'); ?></span>
                                    <?php elseif ($br['status'] == 'placed'):?>
                                    <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top"
                                        title=""
                                        data-original-title="<?php echo get_phrase('placed'); ?>"><?php echo get_phrase('placed'); ?></span>
                                    <?php else : ?>
                                    <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top"
                                        title=""
                                        data-original-title="<?php echo get_phrase('left'); ?>"><?php echo get_phrase('left'); ?></span>
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
                                            <?php if ($br['status'] == 'pending'): ?>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/manage_placement/placement_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_placement');?></a>
                                            </li>
                                            <?php endif; ?>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="confirm_modal('<?php echo site_url('admin/manage_placement/'.(($br['status'] == 'left')?'placed':'delete').'/'.$br['id']); ?>');"><?php echo get_phrase(($br['status'] == 'left')?'placed':'delete'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($placement) == 0): ?>
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