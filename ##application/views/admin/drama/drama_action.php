<?php
if($dramaUpdate->num_rows()>0){
	foreach($dramaUpdate->result() as $ctD);
	$dr_id=$ctD->dr_id;
	$dr_producer=$ctD->dr_producer;
	$dr_name=$ctD->dr_name;
	$dr_subtitle=$ctD->dr_subtitle;
	$dr_director=$ctD->dr_director;
	$dr_main_actor=$ctD->dr_main_actor;
	$dr_actor=$ctD->dr_actor;
	$dr_budget =$ctD->dr_budget;
	$dr_realese_date =$ctD->dr_realese_date;
	$dr_realese_theater =$ctD->dr_realese_theater;
	$dr_details =$ctD->dr_details;
	$dr_cover_photo =$ctD->dr_cover_photo;
	$newstitle='Edit drama';
}
else{
	$dr_id='';
	$dr_producer=set_value('dr_producer');
	$dr_name=set_value('dr_name');
	$dr_subtitle=set_value('dr_subtitle');
	$dr_director=set_value('dr_director');
	$dr_main_actor=set_value('dr_main_actor');
	$dr_actor=set_value('dr_actor');
	$dr_budget =set_value('dr_budget');
	$dr_realese_date =set_value('dr_realese_date');
	$dr_realese_theater =set_value('dr_realese_theater');
	$dr_details =set_value('dr_details');
	$dr_cover_photo ='';
	$newstitle='Add New drama';
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
							<li>drama Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/drama_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>drama List</span></a>
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
                                                <input type="text" name="dr_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Name' value="<?php echo $dr_name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Name'">
                                             	<?php echo form_error('dr_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Sub Title</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="dr_subtitle" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Sub Title' value="<?php echo $dr_subtitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Sub Title'">
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Producer</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="dr_producer" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Producer' value="<?php echo $dr_producer; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Producer'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Director</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="dr_director" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Director' value="<?php echo $dr_director; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Director'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Main Actor</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="dr_main_actor" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Main Actor' value="<?php echo $dr_main_actor; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Main Actor'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">All Actors</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="dr_actor" class="form-control col-md-7 col-xs-12"><?php echo $dr_actor; ?></textarea>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Total Budget</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="dr_budget" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Budget' value="<?php echo $dr_budget; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Budget'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Release Date</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="dr_realese_date" class="form-control datepicker" 
                                                placeholder='Release Date' value="<?php echo $dr_realese_date; ?>"  onFocus="this.placeholder=''" 
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
                                                <input type="text" name="dr_realese_theater" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Release Thetre' value="<?php echo $dr_realese_theater; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Release Thetre'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Details</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="dr_details" class="form-control ckeditor"><?php echo $dr_details; ?></textarea>
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
                                        	<input type="hidden" name="dr_id" value="<?php echo $dr_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $dr_cover_photo; ?>">
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