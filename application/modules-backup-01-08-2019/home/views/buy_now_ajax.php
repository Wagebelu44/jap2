
<button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<div class="row no-gutters">
    <div class="col-md-5 gift_card_img_block justify-content-center align-items-center d-flex">
        <div class="gift_card_img text-center text-white" id="change_gift_card">
            <div class="double_img">
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $gift_cards['gift_card_value']?>.png" class="upper_image">
                <img src="<?php echo base_url(); ?>assets/images/envelope.png" />
            </div>
            <p class="card_price"><?php echo CURRENCY.$gift_cards['actual_price']?></p>
        </div>
    </div>
    <div class="col-md-7 gift_card_form">
        <div class="contact-content buy-form">
            <form method="post" id="buy_now_form" action="<?php echo base_url()?>home/make_payment">
                <div class="form-row">
                     <input type="hidden" name="actual_price" id="actual_price" class="form-control" value="<?php echo $gift_cards['actual_price']?>" >

                    <div class="col-md-12 mb-4">
                        <label>Gift Card Amount</label>

                        <div class="btn-group btn-group-toggle w-100 d-flex justify-content-between bg-gray" data-toggle="buttons">
                            
                            <?php foreach ($cards as $card) { ?>

                                <?php if (get_available_voucher($card['id']) > 0) { ?>
                                    <label class="btn <?php if($card['id'] == $gift_cards['id']){ ?> active <?php } ?>">
                                        <input type="radio" class="btn_change_gift_card" name="gift_card" data-id="<?php echo $card['id']; ?>" id="<?php echo $card['id']; ?>" value="<?php echo $card['id']; ?>" autocomplete="off" <?php if($card['id'] == $gift_cards['id']){ ?> checked="checked" <?php } ?> > <?php echo CURRENCY.$card['gift_card_value']?>
                                    </label>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" required="">
                    </div>
                    <div class="col-md-6 mb-4">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" required="">
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="email" class="form-control" name="buyer_email" id="buyer_email" placeholder="Email Address" required="">
                        </div>
                    </div>

                    <div class="col-md-12 mb-4">
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required="">
                    </div>
                    <div class="col-md-12 mb-4">
                        <input type="tel" class="form-control" id="phone_no" name="phone_no" placeholder="Phone No" required="">
                    </div>
                    <div class="col-md-6 mb-4">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required="">
                    </div>
                    <div class="col-md-6 mb-4">
                        <input type="text" class="form-control" id="zip_code"  name="zip_code" placeholder="Zip Code" required="">
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn button btn-block btn-md" type="submit" id="btn_buy_continue_mm">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</div>
