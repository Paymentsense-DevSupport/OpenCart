<form action="<?php echo $action; ?>" method="post" id="payment">
  <?php foreach ($fields as $key => $value) { ?>
    <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>" />
  <?php } ?>
</form>
<div class="buttons">
    <div class="pull-right">
		
		<a onclick="confirmSubmit();" type="button" class="btn btn-primary"><span><?php echo $button_confirm; ?></span></a>	
	</div>
</div>
<script type="text/javascript"><!--
function confirmSubmit() {
	$.ajax({
		type: 'GET',
		url: 'index.php?route=payment/paymentsense_hosted/confirm',
		beforeSend: function() {
			$('#button-confirm').button('loading');
		},
		success: function() {
			$('#payment').submit();
		}
	});
}
//--></script>

