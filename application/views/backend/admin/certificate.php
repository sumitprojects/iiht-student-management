<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('certificate_list'); ?>
                <a href="<?php echo site_url('admin/generate_certificate'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('generate_certificate'); ?></a>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($certificate) > 0): ?>
                    <table id="placement-datatable" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('student'); ?></th>
                                
                                <th><?php echo get_phrase('course'); ?></th>
                                <th><?php echo get_phrase('certificate'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($certificate as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <?php $student=$this->user_model->get_user($br['student_id'])->row_array(); ?>
                                <td>
                                    <strong><?php echo ellipsis($student['first_name'].' '.$student['last_name']); ?></strong><br>
                                </td>
                                <?php $course=$this->crud_model->get_course($br['course_id'])->row_array(); ?>
                                <td>
                                    <strong><?php echo ellipsis($course['title']); ?></strong><br>
                                </td>
                                <td>
                                    <a class="badge badge-success-lighten" target="_blank" href="<?php echo base_url().'uploads/certificates/'.$br['shareable_url']; ?>"
                                        data-original-title="<?php echo get_phrase('download'); ?>"><?php echo get_phrase('download'); ?></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($certificate) == 0): ?>
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