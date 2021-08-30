<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('batch_for_student'); ?>
                    
                    <a href="<?php echo site_url('admin/manage_batch/add_student/'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_student'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('batch_wise_student_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($batch_wise_student_list) > 0): ?>
                    <table id="assetusers" data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('student'); ?></th>
                                <th><?php echo get_phrase('batch'); ?></th>
                                <th><?php echo get_phrase('action'); ?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($batch_wise_student_list as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                
                                <td>
                                    <strong>
                                    <?php
                                    $student=$this->user_model->get_user($br['user_id'])->row_array();
                                        
                                        echo ellipsis($student['first_name'].' '.$student['last_name'] );
                                    ?>
                                    </strong><br>
                                </td>
                               
                                <td>
                                    <strong>
                                    <?php $batch=$this->crud_model->get_batch($br['batch_id'])->row_array(); ?>
                                        
                                        <a href="<?php echo site_url('admin/manage_batch/student_view/'.$br['batch_id']); ?>"><?php echo ellipsis($batch['batch_name']); ?></a>
                                    </strong><br>
                                </td>
                                 <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a class="dropdown-item" href="<?php echo site_url('admin/manage_batch/delete/'.$br['id']); ?>"><?php echo get_phrase('delete'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($batch_wise_student_list) == 0): ?>
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