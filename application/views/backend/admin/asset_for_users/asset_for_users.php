<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('asset_for_users'); ?>
                    <!-- href="<?php //echo site_url('admin/asset_for_users_form/add_asset_for_users'); ?>" -->
                    <a href="<?php echo site_url('admin/manage_asset_for_users/asset_for_users_add_edit/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_new_asset_for_users'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('asset_for_users_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($asset_for_users) > 0): ?>
                    <table id="assetusers"  data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('Student'); ?></th>
                                <th><?php echo get_phrase('assigned_asset'); ?></th>
                                <th><?php echo get_phrase('assigned_date'); ?></th>
                                <th><?php echo get_phrase('return_date'); ?></th>
                                <th><?php echo get_phrase('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($asset_for_users as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <strong><?php echo ellipsis($br['full_name']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['name']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo date($br['asset_date']); ?></strong><br>
                                </td>
                                <td>
                                    <?php if($br['returnable']=='0' && !empty($br['return_date'])):?>
                                        <strong><?php echo date($br['asset_date']); ?></strong>
                                    <?php elseif($br['returnable']=='1' && empty($br['return_date'])): ?>
                                        <span class="badge badge-danger-lighten"><?php echo get_phrase('asset_not_retuned'); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-info-lighten"><?php echo get_phrase('NA'); ?></span>
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
                                <?php if($br['returnable']=='1' && empty($br['return_date'] && $br['return_date']=='NA')): ?>

                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/manage_asset_for_users/asset_for_users_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_asset_for_users');?></a>
                                            </li>
                                            <?php endif; ?>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/manage_asset_for_penalty/assets_add_penalty/'.$br['id']); ?>"><?php echo get_phrase('add_penalty');?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/manage_asset_for_users/delete/'.$br['id']); ?>"><?php echo get_phrase('delete_this_user');?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/manage_asset_for_penalty/view_penalty/'.$br['asset_id'].'/'.$br['user_id']); ?>"><?php echo get_phrase('view_penalty');?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($asset_for_users) == 0): ?>
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

