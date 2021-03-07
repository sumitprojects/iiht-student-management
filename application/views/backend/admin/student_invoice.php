<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('invoice'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Invoice Logo-->
                <div class="clearfix">
                    <div class="float-left mb-3">
                        <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo'));?>" alt=""
                            height="60px">
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none"><?php echo get_phrase("invoice"); ?></h4>
                    </div>
                </div>

                <!-- Invoice Detail-->
                <div class="row">
                    <div class="col-sm-6">

                    </div><!-- end col -->
                    <div class="col-sm-4 offset-sm-2">
                        <div class="mt-3 float-sm-right">
                            <p class="font-13"><strong><?php echo get_phrase("requested_date"); ?>: </strong>
                                &nbsp;&nbsp;&nbsp; <?php echo date('D, d-M-Y', $payment['date_added']); ?></p>
                            <p class="font-13"><strong><?php echo get_phrase("payment_status"); ?>: </strong>
                                <?php if ($payment['payment_status'] == 'paid'): ?><span
                                    class="badge badge-success float-right"><?php echo get_phrase($payment['payment_status']); ?></span><?php else: ?><span
                                    class="badge badge-danger float-right"><?php echo get_phrase($payment['payment_status']); ?></span><?php endif; ?>
                            </p>
                            <p class="font-13"><strong><?php echo get_phrase("payment_id"); ?>: </strong>
                                <span class="float-right"><?php echo sprintf('%04d', $payment['id']); ?></span>
                            </p>
                            <p class="font-13"><strong><?php echo get_phrase("payment_type"); ?>: </strong>
                                <span class="float-right"><?php echo $payment['payment_type']; ?></span>
                            </p>
                            <?php if($payment['payment_type'] == 'cheque'):?>
                                <?php 
                                    $payment_detail = json_decode($payment['payment_detail']);    
                                ?>
                                <p class="font-13"><strong><?php echo get_phrase("cheque_number"); ?>: </strong>
                                    <span class="float-right"><?php echo $payment['cheque_number']; ?></span>
                                </p>
                                <p class="font-13"><strong><?php echo get_phrase("bank_name"); ?>: </strong>
                                    <span class="float-right"><?php echo $payment['bank_name']; ?></span>
                                </p>
                            <?php endif;?>
                            <?php if($payment['payment_type'] == 'wallet'):?>
                                <?php 
                                    $payment_detail = json_decode($payment['payment_detail']);    
                                ?>
                                <p class="font-13"><strong><?php echo get_phrase("wallet_name"); ?>: </strong>
                                    <span class="float-right"><?php echo $payment['wallet_name']; ?></span>
                                </p>
                            <?php endif;?>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row mt-4">
                    <div class="col-sm-4">
                        <h6><?php echo get_phrase("student_details"); ?></h6>
                        <address>
                            <?php echo $student_detail['first_name'].' '.$student_detail['last_name']; ?><br>
                            <?php echo $student_detail['mob_no']; ?><br>
                        </address>
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo get_phrase("payment_type"); ?></th>
                                        <th><?php echo get_phrase("course")?></th>
                                        <th><?php echo get_phrase("branch")?></th>
                                        <th><?php echo get_phrase("requested_amount"); ?></th>
                                        <th class="text-right"><?php echo get_phrase("total"); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <b><?php echo get_phrase('payment_request'); ?></b>
                                        </td>
                                        <td><?=$course_detail['title']?></td>
                                        <td><?=$branch_detail['branch_name']?></td>
                                        <td>
                                            <?php echo currency($payment['amount']); ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo currency($payment['amount']); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">

                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="float-right mt-3 mt-sm-0">
                        <div class="table-responsive">
                            <table class="table mt-4">
                                <tr>
                                    <th><?php echo get_phrase("sub_total"); ?>:</th>
                                    <td><?php echo currency($payment['amount']); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo get_phrase("total"); ?>:</th>
                                    <th><?php echo currency($payment['amount']); ?></th>
                                </tr>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div> <!-- end col -->
                </div>
                <!-- end row-->

                <div class="d-print-none mt-4">
                    <div class="text-right">
                        <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i>
                            <?php echo get_phrase('print'); ?></a>
                    </div>
                </div>
                <!-- end buttons -->

            </div> <!-- end card-body-->
        </div> <!-- end card -->
    </div> <!-- end col-->
</div>