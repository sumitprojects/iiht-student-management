<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('manage_career'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('application_list'); ?></h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($applications) > 0): ?>
                    <table id="inquiry-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('full_name'); ?></th>
                                <th><?php echo get_phrase('mob_no'); ?></th>
                                <th><?php echo get_phrase('email'); ?></th>
                                <th><?php echo get_phrase('document'); ?></th>
                                <th><?php echo get_phrase('date_added'); ?></th>
                                <th class="notexport"><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications as $key => $br):?>
                                <tr class="<?=($br['status'] == 0)?'text-danger':''?>">
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                        <strong><?php echo ellipsis($br['first_name']); ?> <?php echo ellipsis($br['last_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['mob_no']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['email']); ?></strong><br>
                                    </td>
                                    <td>
                                        <?php if($br['document']):?>
                                        <a href="<?=base_url()?>uploads/document/<?=$br['document']?>"><?php echo get_phrase('download'); ?></a><br>
                                        <?php else:?>
                                            <span class="badge badge-danger">N/A</span>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['date_added']); ?></strong><br>
                                    </td>
                                    <td class="notexport">
                                        <?php if($br['status']==1):?>
                                        <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?=site_url('admin/manage_careers/delete/'.$br['id'])?>"><?php echo get_phrase('delete');?></a></li>
                                          </ul>
                                         </div>
                                      <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($applications) == 0): ?>
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
