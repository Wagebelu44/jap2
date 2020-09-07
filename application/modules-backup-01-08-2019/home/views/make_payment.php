<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Loading | Perfect Money</title>
</head>
<body>


	<form action="https://perfectmoney.is/api/step1.asp" method="POST" class="perfect_money" style="display:none">
		<input type="hidden" name="PAYEE_ACCOUNT" value="U19714370">
		<input type="hidden" name="PAYEE_NAME" value="JAP">
		<input type='hidden' name='PAYMENT_ID' value='<?php echo $payment_id; ?>'>
		

		<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $actual_price; ?>">
		<input type="hidden" name="PAYMENT_UNITS" value="USD">
		<input type="hidden" name="PAYMENT_BATCH_NUM" value="680">
		<input type="hidden" name="STATUS_URL" value="<?php echo base_url();?>home/payment">
		<input type="hidden" name="PAYMENT_URL" value="<?php echo base_url();?>home/success">
		<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
		<input type="hidden" name="NOPAYMENT_URL" value="<?php echo base_url();?>home/cancel">
		<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
		<input type="hidden" name="SUGGESTED_MEMO" value="">
		<input type="hidden" name="BAGGAGE_FIELDS" value="IDENT">
		<input type="submit" name="PAYMENT_METHOD" value="Pay Now!" class="tabeladugme"><br><br>
	</form>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>           
<script>


	$(document).ready(function() { 
		$('.perfect_money').submit();
	});
</script>