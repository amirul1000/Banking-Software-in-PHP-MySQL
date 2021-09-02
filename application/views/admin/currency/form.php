<a  href="<?php echo site_url('admin/currency/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Currency'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/currency/save/'.$currency['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Code" class="col-md-4 control-label">Code</label> 
          <div class="col-md-8"> 
           <input type="text" name="code" value="<?php echo ($this->input->post('code') ? $this->input->post('code') : $currency['code']); ?>" class="form-control" id="code" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $currency['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Symbol" class="col-md-4 control-label">Symbol</label> 
          <div class="col-md-8"> 
           <input type="text" name="symbol" value="<?php echo ($this->input->post('symbol') ? $this->input->post('symbol') : $currency['symbol']); ?>" class="form-control" id="symbol" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($currency['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			