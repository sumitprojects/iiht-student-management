<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('branch'); ?>
                    <!-- href="<?php //echo site_url('admin/branch_form/add_branch'); ?>" -->
                    <a href="javascript:void(0)"
                     onclick="showAjaxModal('<?php echo base_url();?>modal/popup/branch_add_edit', '<?php echo get_phrase('add_new_branch'); ?>');"
                     class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_branch'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('branch_list'); ?></h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($branch) > 0): ?>
                    <table id="branch-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('branch_name'); ?></th>
                                <th><?php echo get_phrase('branch_code'); ?></th>
                                <th><?php echo get_phrase('branch_status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($branch as $key => $br):?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                        <strong><?php echo ellipsis($br['branch_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['branch_code']); ?></strong><br>
                                    </td>
                                    <td>
                                        <?php if ($br['branch_status'] == 0): ?>
                                            <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('disabled'); ?>"><?php echo get_phrase('disabled'); ?></span>
                                        <?php elseif ($br['branch_status'] == 1):?>
                                            <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('active'); ?>"><?php echo get_phrase('active'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                                <?php if ($br['branch_status'] == 1): ?>
                                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url('modal/popup/branch_add_edit/'.$br['branch_id']); ?>','<?php echo get_phrase('edit_this_branch');?>')"><?php echo get_phrase('edit_this_branch');?></a></li>
                                                <?php endif; ?>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/branch/'.(($br['branch_status'] == 1)?'delete':'activate').'/'.$br['branch_id']); ?>');"><?php echo get_phrase(($br['branch_status'] == 1)?'delete':'activate'); ?></a></li>
                                          </ul>
                                      </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($branch) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                      <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                      <?php echo get_phrase('no_data_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
