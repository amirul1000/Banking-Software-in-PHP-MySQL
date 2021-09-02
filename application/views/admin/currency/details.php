<a  href="<?php echo site_url('admin/currency/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Currency'); ?></h5>
<!--Data display of currency with id--> 
<?php
	$c = $currency;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Code</td><td><?php echo $c['code']; ?></td></tr>

<tr><td>Name</td><td><?php echo $c['name']; ?></td></tr>

<tr><td>Symbol</td><td><?php echo $c['symbol']; ?></td></tr>


</table>
<!--End of Data display of currency with id//--> 