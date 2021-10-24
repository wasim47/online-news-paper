<?php
//ALTER TABLE company_info CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
if($configurationUpdate->num_rows()>0){
	foreach($configurationUpdate->result() as $adminData);
	$user_id=$adminData->id;
	$username=$adminData->company_name;
	$fcontact=$adminData->fcontact;
	$bkash=$adminData->bkash;
	$contactno=$adminData->contact;
	$email=$adminData->email;
	$address=$adminData->address;
	$logo=$adminData->logo;
	$webtitle=$adminData->webtitle;
	$editor=$adminData->editor;
	$subeditor=$adminData->subeditor;
	$facebook=$adminData->facebook;
	$twitter=$adminData->twitter;
	$linkedin=$adminData->linkedin;
	$googleplus=$adminData->googleplus;
	$instagram=$adminData->instagram;
	$youtube=$adminData->youtube;
}
else{
	$user_id='';
	$username=set_value('username');
	$contactno=set_value('contactno');
	$fcontact=set_value('fcontact');
	$bkash=set_value('bkash');
	$email=set_value('email');
	$address=set_value('address');
	$logo='';
	$webtitle=set_value('webtitle');
	$editor=set_value('editor');
	$subeditor=set_value('subeditor');
	$facebook=set_value('facebook');
	$twitter=set_value('twitter');
	$linkedin=set_value('linkedin');
	$googleplus=set_value('googleplus');
	$instagram=set_value('instagram');
	$youtube=set_value('youtube');
	}
?>
<style>
.required{
	color:#f00;
}
</style>
<script>
function userAccess(){
		var userType = document.getElementById('userRoll').value;
		if(userType=='SubAdmin'){
			document.getElementById('user_access').style.display='block';
		}
		else{
			document.getElementById('user_access').style.display='none';	
		}
	}
</script>


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Configuration</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                  <div id="registration_form">	
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                      	  <div class="panel-body">
                                        			  <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" name="username" required class="form-control col-md-7 col-xs-12" 
                                                            placeholder='Username' value="<?php echo $username; ?>"  onFocus="this.placeholder=''" 
                                                            onBlur="this.placeholder='Username'">
                                                         <?php echo form_error('username', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Website Title<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="webtitle" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Website Title' onFocus="this.placeholder=''" value="<?php echo $webtitle; ?>" 
                                                                onBlur="this.placeholder='Website Title'">
                                                                 <?php echo form_error('webtitle', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                    	<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Editor<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="editor" class="form-control col-md-7 col-xs-12" value="<?php echo $editor;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sub Editor<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="subeditor" class="form-control col-md-7 col-xs-12" value="<?php echo $subeditor;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Facebook<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="facebook" class="form-control col-md-7 col-xs-12" value="<?php echo $facebook;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Twitter<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="twitter" class="form-control col-md-7 col-xs-12" value="<?php echo $twitter;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Linked In<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="linkedin" class="form-control col-md-7 col-xs-12" value="<?php echo $linkedin;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Google Plus<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="googleplus" class="form-control col-md-7 col-xs-12" value="<?php echo $googleplus;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Instagram<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="instagram" class="form-control col-md-7 col-xs-12" value="<?php echo $instagram;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Youtube<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="youtube" class="form-control col-md-7 col-xs-12" value="<?php echo $youtube;?>">
                                                            </div>
                                                        </div>
                                                    
                                                    
                                     				  <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                            Admin Contact No.<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="contactno" required class="form-control col-md-7 col-xs-12" 
                                                                placeholder='Contact No' value="<?php echo $contactno; ?>"  
                                                                onFocus="this.placeholder=''" onBlur="this.placeholder='Contact No'">
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                            Others Contact No.<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="fcontact" required class="form-control col-md-7 col-xs-12" 
                                                                placeholder='Footer Contact No' value="<?php echo $fcontact; ?>"  
                                                                onFocus="this.placeholder=''" onBlur="this.placeholder='Contact No'">
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                            bKash No.<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="bkash" required class="form-control col-md-7 col-xs-12" 
                                                                placeholder='bKash No' value="<?php echo $bkash; ?>"  
                                                                onFocus="this.placeholder=''" onBlur="this.placeholder='Contact No'">
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="email" name="email" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Login Email' onFocus="this.placeholder=''" value="<?php echo $email; ?>" onBlur="this.placeholder='Login Email'">
                                                                 <?php echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea name="address" required class="form-control col-md-7 col-xs-12"><?php echo $address;?></textarea>
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Logo<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="logo" class="form-control col-md-7">
                                                                <?php 
																	if($logo!=""){
																		echo '<img src="'.base_url('asset/uploads/company/'.$logo).'" style="width:100px; height:auto" />';
																	}
																?>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                          <div class="ln_solid"></div>
                                   		 <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                            <input type="hidden" name="mainImg" value="<?php echo $logo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                            			</div>
                            		  </div>
                            	</div>
                               <?php echo form_close();?>
					</div>
