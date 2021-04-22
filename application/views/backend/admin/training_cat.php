<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('training_category'); ?>
                    <!-- href="<?php //echo site_url('admin/source_form/add_source'); ?>" -->
                    <a href="<?php echo site_url('admin/training/training_cat_add_edit');?>"
                     class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_training_category'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('training_category_list'); ?></h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($source) > 0): ?>
                    <table id="source-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($source as $key => $br):?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                        <strong><?php echo ellipsis($br['title']); ?></strong><br>
                                    </td>
                                    <td>
                                        <?php if ($br['status'] == 0): ?>
                                            <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('disabled'); ?>"><?php echo get_phrase('disabled'); ?></span>
                                        <?php elseif ($br['status'] == 1):?>
                                            <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('active'); ?>"><?php echo get_phrase('active'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                                <?php if ($br['status'] == 1): ?>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/training/training_cat_add_edit/'.$br['id']);?>"><?php echo get_phrase('edit_this_training_category');?></a></li>
                                                <?php endif; ?>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/training/'.(($br['status'] == 1)?'delete':'activate').'/'.$br['id']); ?>');"><?php echo get_phrase(($br['status'] == 1)?'delete':'activate'); ?></a></li>
                                          </ul>
                                      </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($source) == 0): ?>
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
