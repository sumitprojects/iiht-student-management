<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('inquiry'); ?>
                    <a href="<?=site_url('admin/inquiry/inquiry_add_edit/'); ?>"
                     class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_inquiry'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('inquiry_list'); ?></h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($inquiry) > 0): ?>
                    <table id="inquiry-datatable" class="table table-striped dt-responsive nowrap" data-filter="3,4,5" data-nofilter="6,7," width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('inquiry_name'); ?></th>
                                <th><?php echo get_phrase('inquiry_date'); ?></th>
                                <th><?php echo get_phrase('inquiry_course'); ?></th>
                                <th><?php echo get_phrase('inquiry_source'); ?></th>
                                <th><?php echo get_phrase('inquiry_branch'); ?></th>
                                <th><?php echo get_phrase('inquiry_status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inquiry as $key => $br):?>
                                <tr class="<?=($br['is_delete'] == 1)?'text-danger':''?>">
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                        <a data-toggle="tooltip" data-title="<?php echo get_phrase('view_followup');?>" href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><strong><?php echo ellipsis($br['en_name']); ?></strong><br></a>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['en_date']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['title']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['source_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['branch_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <?php if ($br['en_status'] == 'closed'): ?>
                                            <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                        <?php elseif ($br['en_status'] == 'open'):?>
                                            <span class="badge badge-info-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                        <?php elseif ($br['en_status'] == 'completed'):?>
                                            <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                        <?php elseif ($br['en_status'] == 'hold'):?>
                                            <span class="badge badge-warning-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                                <?php if($br['is_delete'] == 0 && $br['en_status'] != 'completed'): ?>
                                                    <li><a class="dropdown-item" href="<?=site_url('admin/inquiry/inquiry_add_edit/'.$br['en_id']); ?>"><?php echo get_phrase('edit_this_inquiry');?></a></li>
                                                    <li><a class="dropdown-item" href="<?=site_url('admin/followup/followup_add_edit/'.$br['en_id'])?>"><?php echo get_phrase('add_followup');?></a></li>
                                                    <li><a class="dropdown-item" href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><?php echo get_phrase('view_followup');?></a></li>
                                                    <li><a class="dropdown-item" href="<?=site_url('admin/user_form/add_edit_from_inquiry/'.$br['en_id'])?>"><?php echo get_phrase('add_admission');?></a></li>
                                                    <li><a class="dropdown-item" href="<?=site_url('admin/user_form/add_edit_from_inquiry_non/'.$br['en_id'])?>"><?php echo get_phrase('add_non_admission');?></a></li>
                                                <?php elseif($br['is_delete'] == 1): ?>
                                                  <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/inquiry/'.(($br['is_delete'] == 0)?'delete':'activate').'/'.$br['en_id']); ?>');"><?php echo get_phrase(($br['is_delete'] == 0)?'delete':'activate'); ?></a></li>
                                                <?php elseif($br['en_status'] == 'completed'): ?>
                                                    <li><a class="dropdown-item" href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><?php echo get_phrase('view_followup');?></a></li>
                                                <?php endif; ?>
                                          </ul>
                                      </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($inquiry) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                      <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                      <?php echo get_phrase('no_data_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
