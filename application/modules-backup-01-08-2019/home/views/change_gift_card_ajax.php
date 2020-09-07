<div class="gift_card_img text-center text-white" id="change_gift_card">
	<div class="double_img">
		<img src="<?php echo base_url(); ?>assets/images/<?php echo $gift_cards['gift_card_value']?>.png" class="upper_image">
		<img src="<?php echo base_url(); ?>assets/images/envelope.png" />
	</div>
	<p class="card_price"><?php echo CURRENCY.$gift_cards['actual_price']; ?></p>
</div>