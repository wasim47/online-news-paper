<?php
if($singerUpdate->num_rows()>0){
	foreach($singerUpdate->result() as $ctD);
	$user_id=$ctD->user_id;
	$firstname=$ctD->firstname;
	$lastname=$ctD->lastname;
	$email=$ctD->email;
	$mobile=$ctD->mobile;
	$profile=$ctD->profile;
	$about_details=$ctD->about_details;
	$photo =$ctD->photo;
				
	$newstitle='Edit singer';
}
else{
	$user_id='';
	$firstname=set_value('firstname');
	$lastname=set_value('lastname');
	$email=set_value('email');
	$mobile=set_value('mobile');
	$profile=set_value('profile');
	$about_details=set_value('about_details');
	$photo ='';
	$newstitle='Add New singer';
}
?>
<style>
.required{
	color:#f00;
}
</style>


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>singer Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/singer_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>singer List</span></a>
							</div>
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
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $newstitle;?> </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
    
                                        	<div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">First Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="firstname" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='First Name' value="<?php echo $firstname; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='First Name'">
                                             	<?php echo form_error('firstname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Last Name</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="lastname" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Last Name' value="<?php echo $lastname; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Last Name'">
                                                <?php echo form_error('lastname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Email</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="email" name="email" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Email' value="<?php echo $email; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Email'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Mobile</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mobile" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Mobile' value="<?php echo $mobile; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Mobile'">
                                           	 </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Profile</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="profile" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $profile; ?></textarea>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">About Details</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="about_details" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $about_details; ?></textarea>
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="photo">
                                           	 </div>
                                            </div>
                                            
                                        
                                    	  
                                            </div>
                                            
                                        </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $photo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
