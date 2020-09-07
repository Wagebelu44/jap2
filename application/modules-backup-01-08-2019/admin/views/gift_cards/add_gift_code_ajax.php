<table id="table_gift_code" class="table table-striped table-bordered dt-responsive " style="width:100%">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Gift Codes</th>
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
                        <?php if($gcodes['is_sell_out'] == 0) { ?>
                            <button class="btn btn-danger btn-circle delete_gift_code_btn" data-id="<?php echo $gcodes['id'];?>" type="button"><i class="fa fa-times"></i>
                            </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>