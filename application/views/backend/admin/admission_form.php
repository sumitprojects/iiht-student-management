<?php 
if(!empty($enrol['address_detail'])){
    $present_add = json_decode($enrol['address_detail'],true)['present_address'];
    $pemanent_add = json_decode($enrol['address_detail'],true)['permanent_address'];    
}

$payment_details = $this->crud_model->get_enrol_payment_info($enrol['eid'])->row_array();
?>


<!DOCTYPE html>
<html style="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title ?? ''?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min
		.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.10/css/AdminLTE.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    body {
        background: rgb(204, 204, 204);
    }

    #background {
        position: absolute;
        z-index: 0;
        background: white;
        display: block;
        min-height: 50%;
        min-width: 50%;
        color: yellow;
    }

    #bg-text {
        color: lightgrey;
        font-size: 120px;
        transform: rotate(300deg);
        -webkit-transform: rotate(300deg);
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }

    page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
    }

    page[size="A3"][layout="landscape"] {
        width: 42cm;
        height: 29.7cm;
    }

    page[size="A5"] {
        width: 14.8cm;
        height: 21cm;
    }

    page[size="A5"][layout="landscape"] {
        width: 21cm;
        height: 14.8cm;
    }

    .invoice-wrap {
        display: none;
    }

    .invoice {
        margin: 0 !important;
    }

    @media print {

        body,
        page {
            margin: 0px;
            box-shadow: none;
        }

        .invoice {
            marging: 2px;
        }

        .invoice-wrap {
            display: block;
            transform: rotate(-40deg);
            opacity: 0.1;
            top: 30%;
            left: 20%;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: 10;
            height: 500px;
            width: 500px;
            font-size: 100px;
            color: #3d3d3d52;
        }
    }
    </style>
</head>

<body>
    <page size="A4">
        <!--	<div id="background">-->
        <!--		<p id="bg-text">IIHT</p>-->
        <!--	</div>-->
        <div class="wrapper">
            <!-- Main content -->
            <section class="invoice">
                <div class="invoice-wrap">
                    <?=get_settings('system_name')?>
                </div>
                <!-- title row -->
                <!-- info row -->
                <!-- <div class="row invoice-info" style="margin-top:5px">

                </div> -->
                <div class="row">
                    <div class="col-xs-12" style="border-bottom:2px solid #252525">
                        <div class="row" style="margin-bottom:30px;">
                            <div class="col-xs-4">
                                <!--<p class="well well-sm no-shadow"><b>Franchise of Harshad Krupa</b></p>-->
                                <img src="<?=base_url('uploads/system/'.get_frontend_settings('dark_logo'))?>" alt=""
                                    width="100px" style="height:120px !important" />
                            </div>
                            <div class="col-xs-6">
                                <address class="no-shadow">
                                    <strong><?=get_settings('system_title')?></strong><br>
                                    <?=get_settings('address')?><br>
                                    <b>Mobile:</b> <?=get_settings('phone')?><br>
                                    <b>Email:</b><?=get_settings('system_email')?>
                                </address>
                            </div>
                            <div class="col-xs-2" style="">
                                <img src="<?=$this->user_model->get_user_image_url($enrol['user_id']);?>?>" alt=""
                                    width="100px" style="height:120px !important" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:20px">
                        <div class="row">
                            <div class="col-xs-4">
                                <p><b>Program Name:</b><br><small>(As Per Brochure)</small></p>
                            </div>
                            <div class="col-xs-8" style="border-bottom: 1px dotted black"><?=$enrol['title']?></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-12">
                        <p><b>Personal Details</b></p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-4">
                        <p><b>Full Name:</b></p>
                    </div>
                    <div class="col-xs-8" style="border-bottom: 1px dotted black"><?=$enrol['full_name']?></div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-1">
                        <p><b>DOB:</b></p>
                    </div>
                    <div class="col-xs-2" style="border-bottom: 1px dotted black"><?=$enrol['dob']?></div>
                    <div class="col-xs-1">
                        <p><b>Gender:</b></p>
                    </div>
                    <div class="col-xs-1" style="border-bottom: 1px dotted black"><?=strtoupper($enrol['gender'])?>
                    </div>
                    <div class="col-xs-1">
                        <p><b>Email:</b></p>
                    </div>
                    <div class="col-xs-6" style="border-bottom: 1px dotted black"><?=strtolower($enrol['email'])?></div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-2">
                        <p><b>Marital Status:</b></p>
                    </div>
                    <div class="col-xs-2" style="border-bottom: 1px dotted black">
                        <?=strtoupper($enrol['marital_status'])?></div>
                    <div class="col-xs-3">
                        <p><b>UID/Adhaar No:</b></p>
                    </div>
                    <div class="col-xs-5" style="border-bottom: 1px dotted black">
                        <?=strtoupper($enrol['uid_or_adhaar'])?></div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-3">
                        <p><b>Present Address</b></p>
                    </div>
                    <div class="col-xs-9" style="border-bottom: 1px dotted black">
                        <p><?=$present_add?></p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-3">
                        <p><b>Permanent Address</b></p>
                    </div>
                    <div class="col-xs-9" style="border-bottom: 1px dotted black">
                        <p><?=$pemanent_add?></p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-3">
                        <p><b>Telephone No.</b></p>
                    </div>
                    <div class="col-xs-4" style="border-bottom: 1px dotted black">
                        <p><b>(Primary)</b><?=!empty($enrol['mob_no'])?$enrol['mob_no']:'N/A'?></p>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="col-xs-4" style="border-bottom: 1px dotted black">
                        <p><b>(Alternate)</b><?=!empty($enrol['alt_mob'])?$enrol['alt_mob']:'N/A'?></p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-3">
                        <p><b>Education Information:</b></p>
                    </div>
                    <div class="col-xs-9" style="border-bottom: 1px dotted black">
                        <p><b>(Primary)</b><?=!empty($enrol['education_detail'])?$enrol['education_detail']:'N/A'?></p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-12">
                        <p><b>REQUIRED DOCUMENTS</b></p>
                        <ol class="list-inline">
                            <li><b>Proof of E.Q.,</b></li>
                            <li><b>Aadhaar Card,</b></li>
                            <li><b>PAN Card,</b></li>
                            <li><b>2 passport size photographs</b></li>
                        </ol>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-12">
                        <p><b>Rules and Regulation</b></p>
                        <?=get_frontend_settings('invoice_template')?>
                    </div>
                </div>
                <!-- /.col -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-12">
                        <p><b>How did you come to know about the Institue and the Program: <span
                                    style="border-bottom: 2px solid #333"><?=$enrol['source_name']?></span></b></p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-12">
                        <p>I shall follow all the rules & regulations & promise that I shall upload the high principals
                            and objectives of the institute words, actions and deeds.</p>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-xs-4">
                        <p>Place : <?=$enrol['branch_name']?></p>
                        <p>Date : <?=date('Y-m-d',$enrol['date_added'])?></p>
                    </div>
                    <div class="col-xs-4">
                        <p>Course Fees : <?=$enrol['final_price']?></p>
                        <p>Amount Due : <?=$payment_details['amount_due']?></p>
                        <p>Payment Recieved : <?=$payment_details['amount']?></p>
                    </div>
                    <div class="col-xs-4" style="">
                        <p class="d-block"></p>
                        <p style="border-top: 2px solid #333;">Signature of Applicant</p>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row -->
    </page>
    <!-- ./wrapper -->
</body>

</html>