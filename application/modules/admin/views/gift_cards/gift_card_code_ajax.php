<link href="<?php echo base_url(); ?>admin_assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
<style type="text/css">
    .bootstrap-tagsinput {
        width: 80% !important;
        border-radius: unset !important;
        border: 1px solid #e5e6e7 !important;
        padding: 6px 6px !important;
    }

</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title" id="exampleModalLabel">Gift Codes For <span style="color: red;"><?php echo ucwords(get_gift_card_title($gift_id['gift_card_id'])); ?></span></h5>
</div>
<div class="modal-body">
    <div class="field_wrapper form-group">
        <div class="table-responsive">
            <table id="table_gift_code" class="table table-striped table-bordered dt-responsive " style="width:100%">
                <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Gift Card Codes</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($gift_cards)){
                        $i = 1;
                        foreach ($gift_cards as $gcodes) { ?>
                            <tr id="tr<?php echo $gcodes['id'];?>">
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $gcodes['gift_card_code']; ?>
                                </td>
                                <td>
                                    <?php if($gcodes['is_sell_out'] == 1) { ?>
                                        <span class="label label-primary"> Sold Out </span>
                                    <?php } else { ?> 
                                        <span class="label label-success"> Available </span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($gcodes['is_sell_out'] == 0) { ?>
                                      <button class="btn btn-danger btn-circle delete_gift_code_btn" data-id="<?php echo $gcodes['id'];?>" type="button"><i class="fa fa-times"></i>
                                      <?php } ?>
                                  </button>
                              </td>
                          </tr>
                      <?php } ?>
                  <?php } ?>
              </tbody>
          </table>
      </div>
  </div>

  <form method="post" id="add_new_gift_form">
    <div class="form-group  row">
        <label class="col-sm-4 col-form-label">
            Add New Code
        </label>
        <div class="input-group col-sm-12">
            <input class="tagsinput form-control" name="gift_card_code" id="gift_card_code" type="text">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" data-id="<?php echo $gift_id['gift_card_id'];?>" id="btn_add_gift_code">Add Code</button>
            </div>
        </div>
    </div>
</form>

</div>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.tagsinput').tagsinput({
            tagClass: 'label label-primary'
        });
    });

</script>