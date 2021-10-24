<style>
.required{
	color:#f00;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">	
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>
   
      <div class="col-md-9 col-sm-12" style="margin-top:3%;">
       
         <?php echo form_open('user/myprofile_action/?action='.base64_encode("changepassword"));
		 echo $this->session->flashdata('globalMsg');
		 ?>
         <div class="col-sm-12">
        	<h3 style="font-size:30px; margin-bottom:30px;">  পাসওয়ার্ড পরিবর্তন করুন </h3>
              <div class="col-sm-8 col-sm-offset-1">
               
                   <div class="form-group">
                       <label class="control-label col-md-4"> পুর্বের পাসওয়ার্ড</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control inputForm" name="oldpassword" 
                          value="<?php echo set_value('oldpassword'); ?>" id="disabledinput" placeholder="Old Password" style="margin-bottom:5px;" />
                          <?php echo form_error('oldpassword','<p class="label label-danger">','</p>'); ?>
                        </div>
                       
                    </div>
                   <div class="form-group">
                        <label class="control-label col-md-4">নতুন পাসওয়ার্ড</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control inputForm" name="password" value="<?php echo set_value('password'); ?>"  
                          placeholder="xxxxx" style="margin-bottom:5px;">
                           <?php echo form_error('password','<p class="label label-danger">','</p>'); ?>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="focusedinput" class="control-label col-md-4">পুনঃ পাসওয়ার্ড</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control inputForm" name="confirmpassword" 
                          value="<?php echo set_value('confirmpassword'); ?>" placeholder="xxxxx">
                          <?php echo form_error('confirmpassword','<p class="label label-danger">','</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                        <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                    </div>
              
                </div>
             </div>
        <?php echo form_close();?>
         
      </div>
      </div>
      </div>
    
    
  </div>
</div>
