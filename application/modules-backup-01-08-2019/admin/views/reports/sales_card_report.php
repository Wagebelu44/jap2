<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/admin_header'); ?>
    <!-- for DataTables -->
    <link href="<?php echo base_url(); ?>admin_assets/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/css/datatable/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <?php $this->load->view('common/admin_sidebar'); ?>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php $this->load->view('common/admin_logoutbar'); ?>  
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-5">
                    <h2>Reports</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo admin_url(); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Gift Cards</strong>
                        </li>

                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Search For Gift Cards Report</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content m-b-sm border-bottom">
                                <form role="form" method="get" id="rooms_report_form" action="<?php echo admin_url()?>reports">
                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="employees">Gift Card</label>
                                                <select class="form-control" name="gift_card" id="gift_card"><?php if($gift_cards['gift_card_value'] == "20") { ?> selected="" <?php } ?>
                                                <option value="">Select Gift Card</option>

                                                <option value="20" <?php if($gift_card == '20') { ?> selected="" <?php } ?> ><?php echo CURRENCY;?>20</option>

                                                <option value="50" <?php if($gift_card == '50') { ?> selected="" <?php } ?> ><?php echo CURRENCY;?>50</option>

                                                <option value="100" <?php if($gift_card == '100') { ?> selected="" <?php } ?> ><?php echo CURRENCY;?>100</option>

                                                <option value="250" <?php if($gift_card == '250') { ?> selected="" <?php } ?> ><?php echo CURRENCY;?>250</option>

                                                <option value="500" <?php if($gift_card == '500') { ?> selected="" <?php } ?> ><?php echo CURRENCY;?>500</option>
                                                <option value="1000" <?php if($gift_card == '1000') { ?> selected="" <?php } ?> ><?php echo CURRENCY;?>1000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="col-form-label" for="status">Date From</label>

                                            <div class="form-group" id="data_3">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_from" id="date_from" class="form-control" <?php if(!empty($date_from)) { ?> value="<?php echo $date_from; ?>" <?php } else { ?>  value="<?php echo date('d/m/Y'); ?>" <?php } ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="col-form-label" for="status">Date To </label>
                                            <div class="form-group" id="data_3">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_to" id="date_to" class="form-control" <?php if(!empty($date_to)) { ?> value="<?php echo $date_to; ?>" <?php } else { ?>  value="<?php echo date('d/m/Y'); ?>" <?php } ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" id="btn_search" type="submit" style="margin-top: 34px;"><i class="fa fa-search" ></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Gift Cards</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">

                                <?php if(!empty($gift_cards)) {
                                    $get_url = $_GET;
                                    $query_string = http_build_query($get_url) . "\n";
                                    ?>

                                    <a href="<?php echo admin_url(); ?>reports/excel_report?<?php echo $query_string; ?>" class="pull-right">
                                        <button class="btn btn-inverse"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to Excel </button>
                                    </a>

                                <?php } ?>

                                <table id="report_table" class="table table-striped table-bordered dt-responsive " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. #</th>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Cards Value</th>
                                            <th>Gift Cards Code</th>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Transaction #</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($gift_cards)){
                                            $i = 1;
                                            foreach ($gift_cards as $report) { ?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo formated_date($report['sell_out_date']);?></td>
                                                    <td><?php echo $report['gift_card_title'];?></td>
                                                    <td><?php echo CURRENCY. $report['gift_card_value'];?></td>
                                                    <td><?php echo $report['gift_card_code'];?></td>
                                                    <td><?php echo $report['first_name']." ".$report['last_name'] ; ?></td>

                                                    <td><?php echo $report['email'];?></td>
                                                    <td><?php echo $report['phone_no'];?></td>
                                                    <td><?php echo $report['trx_id'];?></td>
                                                    <td><?php echo CURRENCY. $report['trx_amount']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>            
            </div>
        </div>

        <?php $this->load->view('common/admin_footer'); ?>

    </div>

</div>
<?php $this->load->view('common/admin_scripts'); ?>

<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/responsive.bootstrap4.min.js"></script>
</body>
</html>

<script>

    $('#report_table').dataTable({ 
        "paging": true,
        "searching": true,
        "responsive": true,
    });

    $('#data_3 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy'
    });

</script>
