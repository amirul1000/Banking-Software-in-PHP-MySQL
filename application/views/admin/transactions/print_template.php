<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Transactions'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of transactions-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Customer</th>
<th>Subject</th>
<th>Description</th>
<th>Currency</th>
<th>Debit</th>
<th>Credit</th>
<th>Reference</th>

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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of transactions//--> 