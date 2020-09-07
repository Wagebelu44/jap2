<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/admin_header'); ?>

    <link href="<?php echo base_url(); ?>admin_assets/css/plugins/iCheck/custom.css" rel="stylesheet">

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
                <h2>Gift Cards</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo admin_url(); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Gift Cards</strong>
                    </li>

                    <li class="breadcrumb-item active">
                        <strong>Edit Gift Card</strong>
                    </li>

                </ol>
            </div>
            <div class="col-lg-7 text-right">
                <a href="<?php echo admin_url(); ?>gift_cards">
                    <button type="button" class="btn btn-primary t_m_25">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Gift Cards
                    </button>
                </a>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Gift Cards Details</h5>
                        </div>
                        <div class="ibox-content">

                            <form method="post" id="update_form" enctype="multipart/form-data">
                                <input type="hidden" name="gift_card_id" id="gift_card_id" class="form-control" value="<?php echo $gift_cards['id'];?>">

                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">
                                     Title
                                 </label>

                                 <div class="col-sm-10">
                                    <input type="text" name="gift_card_title" id="gift_card_title" class="form-control" value="<?php echo $gift_cards['gift_card_title'];?>">
                                </div>
                            </div>                               

                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">
                                    Gift Card Value
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <div class="input-group-prepend">
                                            <span class="input-group-addon"><?php echo CURRENCY; ?></span>
                                        </div>

                                        <select name="gift_card_value" id="gift_card_value" class="form-control">
                                            <option value="">Select Gift Card Value</option>
                                            <option value="20" <?php if($gift_cards['gift_card_value'] == "20") { ?> selected="" <?php } ?> >20</option>

                                            <option value="50" <?php if($gift_cards['gift_card_value'] == "50") { ?> selected="" <?php } ?>>50</option>

                                            <option value="100" <?php if($gift_cards['gift_card_value'] == "100") { ?> selected="" <?php } ?>>100</option>

                                            <option value="250" <?php if($gift_cards['gift_card_value'] == "250") { ?> selected="" <?php } ?>>250</option>

                                            <option value="500" <?php if($gift_cards['gift_card_value'] == "500") { ?> selected="" <?php } ?>>500</option>
                                            <option value="1000" <?php if($gift_cards['gift_card_value'] == "1000") { ?> selected="" <?php } ?>>1000</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">
                                Actual Price
                            </label>

                            <div class="col-sm-10">
                                <div class="input-group m-b">
                                    <div class="input-group-prepend">
                                        <span class="input-group-addon"><?php echo CURRENCY; ?></span>
                                    </div>
                                    <input type="number" min="0" name="actual_price" id="actual_price" class="form-control" value="<?php echo $gift_cards['actual_price']?>">
                                </div>
                            </div>
                        </div>

                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">
                                    Description
                                </label>

                                <div class="col-sm-10">
                                    <textarea name="description" id="description" class="form-control"><?php echo $gift_cards['description'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white btn-sm" id="cancel_btn" data-url="<?php echo admin_url(); ?>gift_cards">Cancel</button>

                                    <button type="button" class="ladda-button btn btn-primary btn-sm" id="update_btn" data-style="expand-right">
                                        Save Changes
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('common/admin_footer'); ?>

</div>

</div>
<?php $this->load->view('common/admin_scripts'); ?>

<!-- iCheck -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Data picker -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

</body>
</html>

<script>
    $(document).on("click" , "#update_btn" , function() {
        var btn = $(this).ladda();
        btn.ladda('start');
        var formData =  new FormData( $("#update_form")[0] );
        $.ajax({
            url:'<?php echo admin_url(); ?>gift_cards/update',
            type: 'POST',
            data: formData,
            dataType:'json',
            cache: false,
            contentType: false,
            processData: false,
            success:function(status){
                btn.ladda('stop');
                if(status.msg=='success') {
                    toastr.success(status.response,"Success");
                    setTimeout(function(){ location.reload(); }, 2000);
                    window.location.href = '<?php echo admin_url() ?>gift_cards';
                } else if(status.msg == 'error') {
                    toastr.error(status.response,"Error");
                }
            }
        });
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

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>