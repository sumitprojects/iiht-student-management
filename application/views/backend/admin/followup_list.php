<?php 
$follow = $this->crud_model->get_followups()->result_array();
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('followup_list'); ?>
                    <?php 
                    if(!empty($follow) &&  !empty($enquiry_status) && $enquiry_status['en_status']!= 'completed'):?>
                        <a class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm" href="<?=site_url('admin/followup/followup_add_edit/'.$param2)?>"><?php echo get_phrase('add_followup');?></a>
                    <?php endif;?>
                    <a href="<?php echo site_url('admin/inquiry'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_inquiry_list'); ?></a>
                </h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($follow) > 0): ?>
                    <table id="followup-datatable" class="table table-striped dt-responsive nowrap" data-filter="1,2,3"  width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('username'); ?></th>
                                <th><?php echo get_phrase('description'); ?></th>
                                <th><?php echo get_phrase('followup_date'); ?></th>
                                <th><?php echo get_phrase('next_date'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach ($follow as $key => $br):
                                $enquiry=$this->crud_model->get_inquiry($br['en_id'])->row_array();
                            //   if($br['status']== 'open'):
                                    $user=$this->user_model->get_user($br['user_id'])->row_array();
                                    $fullname=$this->crud_model->get_inquirys($br['en_id'])->row_array();
                                ?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td><a href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><?php echo ellipsis(strtoupper($fullname['en_name']),15); ?></a></td>
                                    <td>
                                        <strong><?php echo ellipsis($br['description']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ($br['date_added']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ($br['next_date']); ?></strong><br>
                                    </td>
                                    <td>
                                        <?php if (strtolower($br['status']) == 'closed'): ?>
                                            <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['status']); ?>"><?php echo get_phrase($br['status']); ?></span>
                                        <?php elseif (strtolower($br['status']) == 'open'):?>
                                            <span class="badge badge-info-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['status']); ?>"><?php echo get_phrase($br['status']); ?></span>
                                        <?php elseif (strtolower($br['status']) == 'completed'):?>
                                            <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($br['status']); ?>"><?php echo get_phrase($br['status']); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($br['is_delete'] == 1):?>
                                            <span class="badge badge-danger-lighten"><?=get_phrase('inquiry_deleted')?></span>
                                        <?php elseif($br['is_delete'] == 0 && !empty($enquiry_status) && strtolower($enquiry_status['en_status']) != 'completed'): ?>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="<?=site_url('admin/followup/followup_add_edit/'.$br['en_id'].'/'.$br['id'])?>"><?php echo get_phrase('edit_this_followup');?></a></li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/followup/delete/'.$br['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                          </ul>
                                          <?php elseif($br['is_delete'] == 0 && strtolower($br['status']) != 'completed'): ?>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="<?=site_url('admin/followup/followup_add_edit/'.$br['en_id'].'/'.$br['id'])?>"><?php echo get_phrase('edit_this_followup');?></a></li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/followup/delete/'.$br['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                          </ul>
                                          <?php endif;?>
                                          
                                      </div>
                                    </td>
                                </tr>
                                <?php //endif;?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($follow) == 0): ?>
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