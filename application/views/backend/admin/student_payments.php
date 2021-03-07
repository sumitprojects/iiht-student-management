<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('payments'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('invoice_list'); ?>
                </h4>
                 <div class="table-responsive-sm mt-4">
                <?php if (count($payments) > 0): ?>
                    <table id="payment-datatable" class="table table-striped dt-responsive nowrap" data-filter="2,3,4,6,8"  width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('full_name'); ?></th>
                                <th><?php echo get_phrase('invoice_type'); ?></th>
                                <th><?php echo get_phrase('payment_type'); ?></th>
                                <th><?php echo get_phrase('course_name'); ?></th>
                                <th><?php echo get_phrase('course_price'); ?></th>
                                <th><?php echo get_phrase('branch_name'); ?></th>
                                <th><?php echo get_phrase('amount_recieved'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('action');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payments as $key => $py):?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                        <strong><?php echo ellipsis($py['full_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($py['invoice_type']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($py['payment_type']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($py['title']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($py['final_price']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($py['branch_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($py['amount']); ?></strong><br>
                                    </td>
                                    <td>
                                        <?php if ($py['payment_status'] == 'unpaid' || $py['payment_status'] == 'canceled' || $py['payment_status'] == 'refunded'||$py['payment_status'] == 'pending' ): ?>
                                            <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($py['payment_status']); ?>"><?php echo get_phrase($py['payment_status']); ?></span>
                                        <?php elseif ($py['payment_status'] == 'paid'):?>
                                            <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($py['payment_status']); ?>"><?php echo get_phrase($py['payment_status']); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                            <div class="dropright dropright">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <?php if ($py['payment_status'] == 'paid'):?>
                                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/payments/invoice/'.$py['id']) ?>"><?php echo get_phrase('view'); ?></a></li>
                                                    <?php endif; ?>                                        
                                                    <?php if ($py['payment_status'] == 'unpaid' || $py['payment_status'] == 'pending' || $py['payment_status'] == 'canceled'):?>
                                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/approve/'.$py['id']); ?>');"><?php echo get_phrase('approve'); ?></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($py['payment_status'] == 'paid'):?>
                                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/pending/'.$py['id']); ?>');"><?php echo get_phrase('pending'); ?></a></li>
                                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/cancel/'.$py['id']); ?>');"><?php echo get_phrase('cancel'); ?></a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (count($payments) == 0): ?>
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
