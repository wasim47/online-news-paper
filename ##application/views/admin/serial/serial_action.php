<?php
if($serialUpdate->num_rows()>0){
	foreach($serialUpdate->result() as $ctD);
	$sr_id=$ctD->sr_id;
	$sr_producer=$ctD->sr_producer;
	$sr_name=$ctD->sr_name;
	$sr_subtitle=$ctD->sr_subtitle;
	$sr_director=$ctD->sr_director;
	$sr_main_actor=$ctD->sr_main_actor;
	$sr_actor=$ctD->sr_actor;
	$sr_episode_budgets 	 =$ctD->sr_episode_budgets 	;
	$sr_realese_date =$ctD->sr_realese_date;
	$sr_realese_channel =$ctD->sr_realese_channel;
	$sr_details =$ctD->sr_details;
	$sr_cover_photo =$ctD->sr_cover_photo;
	$sr_telecast =$ctD->sr_telecast;
	$newstitle='Edit serial';
}
else{
	$sr_id='';
	$sr_producer=set_value('sr_producer');
	$sr_name=set_value('sr_name');
	$sr_subtitle=set_value('sr_subtitle');
	$sr_director=set_value('sr_director');
	$sr_main_actor=set_value('sr_main_actor');
	$sr_actor=set_value('sr_actor');
	$sr_episode_budgets 	 =set_value('sr_episode_budgets 	');
	$sr_realese_date =set_value('sr_realese_date');
	$sr_realese_channel =set_value('sr_realese_channel');
	$sr_details =set_value('sr_details');
	$sr_telecast =set_value('sr_telecast');
	$sr_cover_photo ='';
	$newstitle='Add New serial';
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
							<li>serial Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/serial_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>serial List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Name' value="<?php echo $sr_name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Name'">
                                             	<?php echo form_error('sr_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Sub Title</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_subtitle" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Sub Title' value="<?php echo $sr_subtitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Sub Title'">
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Producer</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_producer" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Producer' value="<?php echo $sr_producer; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Producer'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Director</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_director" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Director' value="<?php echo $sr_director; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Director'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Main Actor</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_main_actor" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Main Actor' value="<?php echo $sr_main_actor; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Main Actor'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">All Actors</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="sr_actor" class="form-control col-md-7 col-xs-12"><?php echo $sr_actor; ?></textarea>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Episode Budget</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_episode_budgets" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Budget' value="<?php echo $sr_episode_budgets; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Budget'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Release Date</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_realese_date" class="form-control datepicker" 
                                                placeholder='Release Date' value="<?php echo $sr_realese_date; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Release Date'">
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Cover Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="cover_photo">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Release Thetre</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_realese_channel" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Release Thetre' value="<?php echo $sr_realese_channel; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Release Thetre'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Telecast Channel</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sr_telecast" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Telecast Channel' value="<?php echo $sr_telecast; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Telecast Channel'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Details</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="sr_details" class="form-control ckeditor"><?php echo $sr_details; ?></textarea>
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
                                        	<input type="hidden" name="sr_id" value="<?php echo $sr_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $sr_cover_photo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>


<script>
$(document).ready(function(){
	$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
});

</script>