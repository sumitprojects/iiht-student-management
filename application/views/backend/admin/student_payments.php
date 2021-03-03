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
                    <table id="payment-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('full_name'); ?></th>
                                <th><?php echo get_phrase('invoice_type'); ?></th>
                                <th><?php echo get_phrase('payment_type'); ?></th>
                                <th><?php echo get_phrase('course_name'); ?></th>
                                <th><?php echo get_phrase('course_price'); ?></th>
                                <th><?php echo get_phrase('branch_name'); ?></th>
                                <th><?php echo get_phrase('amount'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
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
                                        <?php if ($py['enrol_status'] == 'pending'): ?>
                                            <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('pending'); ?>"><?php echo get_phrase('pending'); ?></span>
                                        <?php elseif ($py['enrol_status'] == 'active'):?>
                                            <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('active'); ?>"><?php echo get_phrase('active'); ?></span>
                                        <?php endif; ?>
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
