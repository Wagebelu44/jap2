<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/admin_header'); ?>
    
    <link href="<?php echo base_url(); ?>admin_assets/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>admin_assets/css/datatable/responsive.bootstrap4.min.css" rel="stylesheet"> 

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

                </ol>
            </div>
            <div class="col-lg-7 text-right">
                <a href="<?php admin_url(); ?>gift_cards/add">
                    <button type="button" class="btn btn-primary t_m_25">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Gift Card
                    </button>
                </a>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">

                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table id="coupon_table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr #</th>
                                            <th>Gift Cards Title</th>
                                            <th>Gift Cards Value</th>
                                            <th>Actual Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1; 
                                        foreach ($gift_cards as $gift_card) { ?>
                                            <tr class="gradeX">
                                                <td>
                                                    <?php echo $i++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $gift_card['gift_card_title']; ?>
                                                </td>
                                                <td>
                                                    <?php echo CURRENCY.$gift_card['gift_card_value']; ?>
                                                </td>

                                                <td>
                                                    <?php echo CURRENCY.$gift_card['actual_price']; ?>
                                                </td>
                                                <td>

                                                    <a href="<?php echo admin_url(); ?>gift_cards/edit/<?php echo $gift_card['id']; ?>">
                                                        <button class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <button class="btn btn-success btn-sm" data-id="<?php echo $gift_card['id'];?>" type="button" id="view_gift_codes_btn" data-placement="top" title="View">
                                                        Add & View Codes
                                                    </button>


                                                    

                                                </td>

                                            </tr>  
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal inmodal show fade" id="view_gift_code_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content animated flipInY" id="view_gift_code_modal_body">

                    </div>
                </div>
            </div>

        </div>

        <?php $this->load->view('common/admin_footer'); ?>
    </div>
</div>
<?php $this->load->view('common/admin_scripts'); ?>

<script src="<?php echo base_url(); ?>admin_assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/datatable/responsive.bootstrap4.min.js"></script>


</body>
</html>

<script>

    $('#coupon_table').dataTable({
        "paging": true,
        "searching": true,
        "bInfo":true,
        "responsive": true,
        "columnDefs": [
        { "responsivePriority": 1, "targets": 0 },
        { "responsivePriority": 2, "targets": -1 },
        ]
    });
    
    $(document).on("click" , "#view_gift_codes_btn" , function() 
    {
        var gift_card_id = $(this).attr('data-id');
        $.ajax({
            url:'<?php echo admin_url(); ?>gift_cards/get_gift_codes',
            type: 'POST',
            dataType:'json',
            data: {gift_card_id: gift_card_id},
            success:function(status){
                $("#view_gift_code_modal_body").html(status.response);
                $("#view_gift_code_modal").modal('show');
            }
        });
    });


    $(document).on("click" , ".delete_gift_code_btn" , function(){
        var id = $(this).attr('data-id');
        if(id > 0) {
            var id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You want to delete gift code!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, please!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url:'<?php echo admin_url(); ?>gift_cards/delete_gift_codes',
                        type:'post',
                        data:{id:id},
                        dataType:'json',
                        success:function(status){
                            if(status.msg == 'success'){
                                swal({title: "Success!", text: status.response, type: "success"},
                                    function(data){
                                        $("#tr"+id).remove();
                                    });
                            } else if(status.msg=='error'){
                                swal("Error", status.response, "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "", "error");
                }
            });
        } else { 
            toastr.error("No selected field found.","Error");
        }
    });


    $(document).on("click" , "#btn_add_gift_code" , function() {
        var gift_id = $(this).attr('data-id');
        var gift_card_code = $('#gift_card_code').val();
        if(gift_card_code == ""){
            toastr.error("Gift Code field is required");
            return FALSE;
        }
        $.ajax({
            url:'<?php echo admin_url(); ?>gift_cards/add_gift_codes',
            type: 'POST',
            dataType:'json',
            data: {gift_card_code: gift_card_code, gift_id: gift_id},
            success:function(status){
                if(status.msg=='success'){
                    $('#add_new_gift_form')[0].reset();
                    swal({title: "Success!", text: status.response, type: "success"},
                        function(){
                            $("#table_gift_code").html(status.table_response);
                            setTimeout(function(){ location.reload(); }, 2000);
                        });
                } else if(status.msg=='error'){
                    swal("Error", status.response, "error");
                }
            }
        });
    });

</script>