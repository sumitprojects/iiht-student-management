<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('payment_requets'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('list_of_payments'); ?></h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#pending-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block"><?php echo get_phrase('pending_payments'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#approved-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block"><?php echo get_phrase('approved_payments'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#cancled-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block"><?php echo get_phrase('cancled_payments'); ?></span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="pending-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="pending-application" class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('invoice_type'); ?></th>
                                        <th><?php echo get_phrase('payment_type'); ?></th>
                                        <th><?php echo get_phrase('course'); ?></th>
                                        <th><?php echo get_phrase('requested_amount'); ?></th>
                                        <th><?php echo get_phrase('status');?></th>
                                        <th><?php echo get_phrase('action');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $key => $pending_application):
                                        if($pending_application['payment_status'] == 'pending'):?>
                                        <tr class="gradeU">
                                            <td>
                                                <?php echo ++$key; ?>
                                            </td>
                                            <td>
                                                <?php echo $pending_application['full_name']; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['invoice_type']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['payment_type']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['title']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['amount']); ?></strong><br>
                                            </td>
                                            <td style="text-align: center;">
                                                <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($pending_application['payment_status']); ?>"><?php echo get_phrase($pending_application['payment_status']); ?></span>
                                            </td>
                                            <td>
                                                <div class="dropright dropright">
                                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/approve/'.$pending_application['id']); ?>');"><?php echo get_phrase('approve'); ?></a></li>
                                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/cancel/'.$pending_application['id']); ?>');"><?php echo get_phrase('cancel'); ?></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="approved-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="approved-application" class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('invoice_type'); ?></th>
                                        <th><?php echo get_phrase('payment_type'); ?></th>
                                        <th><?php echo get_phrase('course'); ?></th>
                                        <th><?php echo get_phrase('requested_amount'); ?></th>
                                        <th><?php echo get_phrase('status');?></th>
                                        <th><?php echo get_phrase('action');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($payments as $key => $pending_application):
                                        if($pending_application['payment_status'] == 'paid'):?>
                                        <tr class="gradeU">
                                            <td>
                                                <?php echo ++$key; ?>
                                            </td>
                                            <td>
                                                <?php echo $pending_application['full_name']; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['invoice_type']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['payment_type']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['title']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['amount']); ?></strong><br>
                                            </td>
                                            <td style="text-align: center;">
                                                <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($pending_application['payment_status']); ?>"><?php echo get_phrase($pending_application['payment_status']); ?></span>
                                            </td>
                                            <td>
                                                <div class="dropright dropright">
                                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/payments/invoice/'.$pending_application['id']) ?>"><?php echo get_phrase('view'); ?></a></li>
                                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/pending/'.$pending_application['id']); ?>');"><?php echo get_phrase('pending'); ?></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="cancled-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="cancled-application" class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('invoice_type'); ?></th>
                                        <th><?php echo get_phrase('payment_type'); ?></th>
                                        <th><?php echo get_phrase('course'); ?></th>
                                        <th><?php echo get_phrase('requested_amount'); ?></th>
                                        <th><?php echo get_phrase('status');?></th>
                                        <th><?php echo get_phrase('action');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($payments as $key => $pending_application):
                                        if($pending_application['payment_status'] == 'canceled'):?>
                                        <tr class="gradeU">
                                            <td>
                                                <?php echo ++$key; ?>
                                            </td>
                                            <td>
                                                <?php echo $pending_application['full_name']; ?>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['invoice_type']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['payment_type']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['title']); ?></strong><br>
                                            </td>
                                            <td>
                                                <strong><?php echo ellipsis($pending_application['amount']); ?></strong><br>
                                            </td>
                                            <td style="text-align: center;">
                                                <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($pending_application['payment_status']); ?>"><?php echo get_phrase($pending_application['payment_status']); ?></span>
                                            </td>
                                            <td>
                                                <div class="dropright dropright">
                                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/payments/pending/'.$pending_application['id']); ?>');"><?php echo get_phrase('pending'); ?></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initDataTable(['#pending-application', '#approved-application','#cancled-application']);
    });
</script>
