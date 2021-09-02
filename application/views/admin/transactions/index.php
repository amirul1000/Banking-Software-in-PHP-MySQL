<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Transactions'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<div class="row">
	<div class="col-md-12">
      <?php
	    
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Customer_model');
        $customer = $this->CI->Customer_model->get_customer($_SESSION['selected_customer_id']);
      
	  ?>
  <table align="center" width="100%" border="1">
    <tr>
        <td align="center">
        <?php echo $customer['ACC_No']; ?><br>
		<?php echo $customer['first_name']; ?> <?php echo $customer['last_name']; ?><br>
        <?php echo $customer['email']; ?><br>
        <?php echo $customer['phone']; ?><br>
        <?php
			if(is_file(APPPATH.'../public/'.$customer['file_picture'])&&file_exists(APPPATH.'../public/'.$customer['file_picture']))
			{
		 ?>
		  <img src="<?php echo base_url().'public/'.$customer['file_picture']?>" class="picture_50x50">
		  <?php
			}
			else
			{
		?>
		<img src="<?php echo base_url()?>public/uploads/no_image.jpg" class="picture_50x50">
		<?php		
			}
		  ?>	<br>
	  
        <?php echo $customer['dob']; ?><br>
        <?php echo $customer['address']; ?><br>
        </td>
       </tr>
       </table>
	</div>
</div>
<div class="row">
	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>

				<h4 class="card-title">Balance</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?php
    echo $this->customlib->get_balance($_SESSION['selected_customer_id']);
    ?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/transactions/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>

				<h4 class="card-title">Total Credited</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?php
    echo $this->customlib->get_transactions_credit($_SESSION['selected_customer_id']);
    ?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/transactions/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>

				<h4 class="card-title">Total Debited</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?php
    echo $this->customlib->get_transactions_debit($_SESSION['selected_customer_id']);
    ?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/transactions/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/transactions/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/transactions/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/transactions/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//--> 
   
<!--Data display of transactions-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Customer</th>
<th>Subject</th>
<th>Description</th>
<th>Currency</th>
<th>Debit</th>
<th>Credit</th>
<th>Reference</th>

		<th>Actions</th>
    </tr>
	<?php foreach($transactions as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Customer_model');
									   $dataArr = $this->CI->Customer_model->get_customer($c['customer_id']);
									   echo $dataArr['ACC_No'];?>
									</td>
<td><?php echo $c['subject']; ?></td>
<td><?php echo $c['description']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Currency_model');
									   $dataArr = $this->CI->Currency_model->get_currency($c['currency_id']);
									   echo $dataArr['code'];?>
									</td>
<td><?php echo $c['debit']; ?></td>
<td><?php echo $c['credit']; ?></td>
<td><?php echo $c['reference']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/transactions/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/transactions/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/transactions/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of transactions//--> 

<!--No data-->
<?php
	if(count($transactions)==0){
?>
 <div align="center"><h3>Data is not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
