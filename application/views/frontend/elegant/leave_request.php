<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
$leave_approve= $this->crud_model->get_leave('',$s_id)->result_array();
?>
<section id="hero_in" class="general">
    <div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;">
    </div>
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span><?php echo get_phrase('leave_approve'); ?></h1>
        </div>
    </div>
</section>
<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('leave_approve_list'); ?>
                    <a href="<?php echo site_url('home/student_view'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_student_list'); ?></a>
                    </h4>
                    <div class="table-responsive-sm mt-4">
                        <?php if (count($leave_approve) > 0): ?>
                        <table id="assetusers" data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap"
                            width="100%" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('student'); ?></th>
                                    <th><?php echo get_phrase('start_date'); ?></th>
                                    <th><?php echo get_phrase('end_date'); ?></th>
                                    <th><?php echo get_phrase('reason'); ?></th>
                                    <th><?php echo get_phrase('remark'); ?></th>
                                    <th><?php echo get_phrase('att_status'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($leave_approve as $key => $br):
                                    
                                    ?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                    <?php $user = $this->user_model->get_user($br['user_id'])->row_array();?>
                                        <strong><?php echo ellipsis($user['first_name'].' '. $user['last_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['start_date']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['end_date']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['reason']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['remark']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['att_status']); ?></strong><br>
                                    </td>
                                    <?php if($br['att_status'] != 'approve' && $br['att_status'] != 'reject'): ?>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            
                                                <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/leave_request/approve/'.$br['id']); ?>"><?php echo get_phrase('approve');?></a>
                                                </li>
                                                
                                                <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/leave_request/pending/'.$br['id']); ?>"><?php echo get_phrase('pending');?></a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/leave_request/reject/'.$br['id']); ?>"><?php echo get_phrase('reject');?></a>
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
                        <?php if (count($leave_approve) == 0): ?>
                        <div class="img-fluid w-100 text-center">
                            <img style="opacity: 1; width: 100px;"
                                src="<?php echo base_url('leave_approve/backend/images/file-search.svg'); ?>"><br>
                            <?php echo get_phrase('no_data_found'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>