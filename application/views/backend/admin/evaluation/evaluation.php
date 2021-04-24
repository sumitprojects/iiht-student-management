<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('evaluation'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('evaluation_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($evaluation) > 0): ?>
                    <table id="evaluation-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('submitted_answer'); ?></th>
                               
                                <th><?php echo get_phrase('marks_gain'); ?></th>
                                <th><?php echo get_phrase('marks'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evaluation as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <?php if($br['submitted_answer']): ?>
                                <td>
                                    <strong><?php echo ellipsis($br['submitted_answer']); ?></strong><br>
                                </td>
                                <?php else: ?>
                                    <td>
                                    <strong><?php echo 'NA'; ?></strong><br>
                                </td> 
                                <?php endif; ?>
                                <td>
                                    <strong><?php echo ellipsis($br['marks_gain']); ?></strong><br>
                                </td>
                                
                                <td>
                                    <strong><?php echo ellipsis($br['marks']); ?></strong><br>
                                </td>
                                <?php if($br['submitted_answer']): ?>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/evaluation/edit_evaluation/'.$br['id']); ?>"><?php echo get_phrase('edit_this_evaluation');?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($evaluation) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;"
                            src="<?php echo base_url('evaluation/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>