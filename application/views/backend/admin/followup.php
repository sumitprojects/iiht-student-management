<?php 
$followup = "";
if(!empty($param2)){
    $followup = $this->crud_model->get_followup_by_enquiry($param2)->result_array();
}

?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('followup_list'); ?>
                    <?php if(!empty($followup)):?>
                        <a class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm" href="<?=site_url('admin/admission_form/add_admission/'.$param2)?>"><?php echo get_phrase('add_admission');?></a>
                    <?php endif;?>
                    <a href="<?php echo site_url('admin/inquiry'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_inquiry_list'); ?></a>
                </h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($followup) > 0): ?>
                    <table id="followup-datatable" class="table table-striped dt-responsive nowrap" data-filter="1,2,3" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('description'); ?></th>
                                <th><?php echo get_phrase('followup_date'); ?></th>
                                <th><?php echo get_phrase('next_date'); ?></th>
                                <th><?php echo get_phrase('username'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($followup as $key => $br):?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
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
                                        <strong><?php echo ellipsis($br['username']); ?></strong><br>
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
                                        <?php else: ?>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="<?=site_url('admin/followup/followup_add_edit/'.$br['en_id'].'/'.$br['id'])?>"><?php echo get_phrase('edit_this_followup');?></a></li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/followup/delete/'.$br['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                          </ul>
                                      </div>
                                      <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($followup) == 0): ?>
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
