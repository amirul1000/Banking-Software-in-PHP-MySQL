<a  href="<?php echo site_url('admin/transactions/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Transactions'); ?></h5>
<!--Data display of transactions with id--> 
<?php
	$c = $transactions;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Customer</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Customer_model');
									   $dataArr = $this->CI->Customer_model->get_customer($c['customer_id']);
									   echo $dataArr['ACC_No'];?>
									</td></tr>

<tr><td>Subject</td><td><?php echo $c['subject']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>Currency</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Currency_model');
									   $dataArr = $this->CI->Currency_model->get_currency($c['currency_id']);
									   echo $dataArr['code'];?>
									</td></tr>

<tr><td>Debit</td><td><?php echo $c['debit']; ?></td></tr>

<tr><td>Credit</td><td><?php echo $c['credit']; ?></td></tr>

<tr><td>Reference</td><td><?php echo $c['reference']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of transactions with id//--> 