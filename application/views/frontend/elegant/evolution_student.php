<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
$student_evolution= $this->crud_model->get_evaluation('',$s_id)->result_array();
?>
<section id="hero_in" class="general">
    <div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;">
    </div>
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span><?php echo get_phrase('leave_apply'); ?></h1>
        </div>
    </div>
</section>
<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('student_evolution_list'); ?>
                    <a href="<?php echo site_url('home/student_view'); ?>" style="float:right;"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_student_list'); ?></a>
                    </h4>
                    <div class="table-responsive-sm mt-4">
                        <?php if (count($student_evolution) > 0): ?>
                        <table id="assetusers" data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap"
                            width="100%" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('student'); ?></th>
                                    <th><?php echo get_phrase('question'); ?></th>
                                    
                                    <th><?php echo get_phrase('submitted_answre'); ?></th>
                                    <th><?php echo get_phrase('action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 foreach ($student_evolution as $key => $br):
                                 $user = $this->user_model->get_user()->row_array();
                                 $question = $this->crud_model->get_quiz_question_by_id($br['qusetion_id'])->row_array();
                                ?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                    <strong><?php echo ellipsis($user['first_name'].' '. $user['last_name']); ?></strong><br>
                                    </td>
                                    <td>
                                    <strong><?php echo ellipsis($question['title'].'  '.$question['marks']); ?></strong><br>
                                    </td>
                                   <td>
                                    <strong><?php echo ellipsis($br['submitted_answer']); ?></strong><br>
                                    </td>
                                    
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/evolution_student/edit_evolution/'.$br['id']); ?>"><?php echo get_phrase('edit_this_record');?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                            endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                        <?php if (count($student_evolution) == 0): ?>
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
</div>