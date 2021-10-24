<?php
	$c_id=$update['user_id'];
	$username=$update['username'];
	$phone=$update['mobile'];
	$email=$update['email'];
?>
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
       
         <?php echo form_open('user/myprofile_action/?action='.base64_encode("editprofile"));?>
         <div class="col-sm-12">
        	<h3 style="font-size:30px; margin-bottom:30px;">  এডিট প্রোফাইল </h3>
            
              <div class="col-sm-7 col-sm-offset-1">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">আপনার নাম<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="username" required class="form-control inputForm" 
                    placeholder='আপনার নাম' value="<?php echo $username; ?>"  onFocus="this.placeholder=''"  style="margin-bottom:5px;"
                    onBlur="this.placeholder='আপনার নাম'">
                    <?php echo form_error('username', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                 </div>
                </div>
                
              
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">মোবাইল</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="phone" class="form-control inputForm" 
                    placeholder='মোবাইল' value="<?php echo $phone; ?>"  onFocus="this.placeholder=''"  style="margin-bottom:5px;"
                    onBlur="this.placeholder='মোবাইল'">
                 </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">ইমেইল </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="email" class="form-control inputForm" 
                    placeholder='ইমেইল' value="<?php echo $email; ?>"  onFocus="this.placeholder=''"  style="margin-bottom:5px;"
                    onBlur="this.placeholder='ইমেই'">
                    <small style="font-size:12px;">(এটি লগইন করার জন্য ব্যবহৃত ইমেইল ) </small>
                 </div>
                </div>
               
              <div class="form-group">
                    <label class="control-label col-sm-4">ছবি</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="file" name="cv_upload" class="form-control inputForm">
                 </div>
                </div>
            <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <button type="submit" class="btn btn-success btn-submit">সাবমিট</button></div>
                                        </div>
              
                </div>
             </div>
        <?php echo form_close();?>
         
      </div>
      </div>
      </div>
    
    
  </div>
</div>
