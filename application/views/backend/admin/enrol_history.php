<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('enrol_history'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title"><?php echo get_phrase('enrol_histories'); ?></h4>
              <div class="row justify-content-md-center">
                  <div class="col-xl-6">
                      <form class="form-inline" action="<?php echo site_url('admin/enrol_history/filter_by_date_range') ?>" method="get">
                          <div class="col-xl-10">
                              <div class="form-group">
                                  <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                      <i class="mdi mdi-calendar"></i>&nbsp;
                                      <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                                  </div>
                                  <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                              </div>
                          </div>
                          <div class="col-xl-2">
                              <button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="table-responsive mt-4">
                  <?php if (count($enrol_history->result_array()) > 0): ?>
                      <table id="enrol_history" class="table table-striped table-centered mb-0" data-filter="3,4,7" data-nofilter="8,">
                          <thead>
                              <tr>
                                  <th><?php echo get_phrase('photo'); ?></th>
                                  <th><?php echo get_phrase('user_name'); ?></th>
                                  <th><?php echo get_phrase('enrolled_course'); ?></th>
                                  <th><?php echo get_phrase('admission_type'); ?></th>
                                  <th><?php echo get_phrase('enrolment_date'); ?></th>
                                  <th><?php echo get_phrase('course_fees')?></th>
                                  <th><?php echo get_phrase('payment_recieved')?></th>
                                  <th><?php echo get_phrase('amount_due')?></th>
                                  <th><?php echo get_phrase('enrolment_status'); ?></th>
                                  <th><?php echo get_phrase('actions'); ?></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($enrol_history->result_array() as $enrol):
                                  $user_data = $this->db->get_where('users', array('id' => $enrol['user_id']))->row_array();
                                  $course_data = $this->db->get_where('course', array('id' => $enrol['course_id']))->row_array();?>
                                  <tr class="gradeU">
                                      <td>
                                          <img src="<?php echo $this->user_model->get_user_image_url($enrol['user_id']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                      </td>
                                      <td>
                                          <b><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></b><br>
                                          <small><?php echo get_phrase('email').': '.$user_data['email']; ?></small><br>
                                          <small><?php echo get_phrase('mob_no').': '.$user_data['mob_no']; ?></small>
                                        
                                      </td>
                                      <td><strong><a href="<?php echo site_url('admin/course_form/course_edit/'.$course_data['id']); ?>" target="_blank"><?php echo $course_data['title']; ?></a></strong></td>
                                      <td><span class="badge badge-primary"><?php echo $enrol['is_training'] == 1? get_phrase('Admission'):get_phrase('Non Admission'); ?></span></td>
                                      <td><?php echo date('D, d-M-Y', $enrol['date_added']); ?></td>
                                      <td><?=$enrol['final_price']?></td>
                                      <td><?=$enrol['total_payment']??'N/A'?></td>
                                      <?php if($enrol['amount_due']>0 && $enrol['total_payment']>0):?>
                                        <td><?=$enrol['amount_due']?></td>
                                      <?php elseif($enrol['amount_due'] == 0 && $enrol['total_payment']==$enrol['final_price']):?>
                                        <td><span class="badge badge-info"><?=get_phrase('payment_completed')?></span></td>
                                      <?php else:?>
                                        <td><span class="badge badge-danger"><?=get_phrase('payment_pending')?></span></td>
                                      <?php endif;?>
                                      <td><span class="badge badge-info"><?=get_phrase($enrol['enrol_status'])?></span></td>
                                      <td>
                                      <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                                <?php if($enrol['enrol_status'] != 'disable'):?>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/payments/'.$enrol['id']); ?>"><?=get_phrase('view_payments')?></a></li>                                                        
                                                    <li><a class="dropdown-item" href="javascript::void(0)" onclick="confirm_modal('<?php echo site_url('admin/enrol_history_delete/'.$enrol['id']); ?>');"><?=get_phrase('delete')?></a></li>
                                                    <?php if($enrol['amount_due'] >= 0 && $enrol['total_payment'] > 0):?>
                                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/admission_form/'.$enrol['id']); ?>"><?=get_phrase('view_admission_form')?></a></li>                                                        
                                                    <?php endif;?>
                                                    <?php if(!empty($enrol['amount_due']) || $enrol['amount_due'] == NULL ):?>
                                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/add_payment/'.$enrol['id']); ?>"><?=get_phrase('make_payment')?></a></li>
                                                    <?php endif; endif; ?>
                                                <?php if($enrol['enrol_status'] == 'disable'):?>
                                                    <li><a class="dropdown-item" href="javascript::void(0)" onclick="confirm_modal('<?php echo site_url('admin/enrol_history_activate/'.$enrol['id']); ?>');"><?=get_phrase('activate')?></a></li>
                                                <?php endif;?>
                                          </ul>
                                      </div>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php endif; ?>
                  <?php if (count($enrol_history->result_array()) == 0): ?>
                      <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                      </div>
                  <?php endif; ?>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
    function update_date_range()
    {
        var x = $("#selectedValue").html();
        $("#date_range").val(x);
    }
</script>
