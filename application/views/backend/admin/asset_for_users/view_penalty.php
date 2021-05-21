<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('asset_for_penalty_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($asset_for_penalty) > 0): ?>
                    <table id="assetusers"  data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('Student'); ?></th>
                                <th><?php echo get_phrase('assigned_asset'); ?></th>
                                <th><?php echo get_phrase('price'); ?></th>
                                <th><?php echo get_phrase('date_of_penalty'); ?></th>
                                <th><?php echo get_phrase('remark'); ?></th>
                                <th><?php echo get_phrase('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($asset_for_penalty as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <strong><?php echo ellipsis($br['user_id']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['asset_id']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo date($br['remark']); ?></strong><br>
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
                                                    href="<?php echo site_url('admin/manage_assets_for_penalty/delete/'.$br['id']); ?>"><?php echo get_phrase('delete_this_penalty');?></a>
                                            </li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($assets_for_penalty) == 0): ?>
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

