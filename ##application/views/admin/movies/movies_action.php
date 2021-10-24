<?php
if($moviesUpdate->num_rows()>0){
	foreach($moviesUpdate->result() as $ctD);
	$mv_id=$ctD->mv_id;
	$mv_producer=$ctD->mv_producer;
	$mv_name=$ctD->mv_name;
	$mv_subtitle=$ctD->mv_subtitle;
	$mv_director=$ctD->mv_director;
	$mv_main_actor=$ctD->mv_main_actor;
	$mv_actor=$ctD->mv_actor;
	$mv_budget =$ctD->mv_budget;
	$mv_realese_date =$ctD->mv_realese_date;
	$mv_realese_theater =$ctD->mv_realese_theater;
	$mv_details =$ctD->mv_details;
	$mv_cover_photo =$ctD->mv_cover_photo;
	$mv_banner =$ctD->mv_banner;
	$category =$ctD->category;
	$newstitle='Edit Movies';
}
else{
	$mv_id='';
	$mv_producer=set_value('mv_producer');
	$mv_name=set_value('mv_name');
	$mv_subtitle=set_value('mv_subtitle');
	$mv_director=set_value('mv_director');
	$mv_main_actor=set_value('mv_main_actor');
	$mv_actor=set_value('mv_actor');
	$mv_budget =set_value('mv_budget');
	$mv_realese_date =set_value('mv_realese_date');
	$mv_realese_theater =set_value('mv_realese_theater');
	$mv_details =set_value('mv_details');
	$category =set_value('category');
	$mv_cover_photo ='';
	$mv_banner ='';
        $category ='';
	$newstitle='Add New Movies';
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
							<li>Movies Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/movies_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Movies List</span></a>
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
                                               <select name="category" class="form-control" required>
                                               		<option value="<?php echo $category;?>"><?php echo $category ;?></option>
                                                    <option value="Archive">Archive</option>
                                                    <option value="Theatres">Theatres</option>
                                                    <option value="Recent Realese">Recent Realese</option>
                                                    <option value="Upcomming">Upcomming</option>
 <option value="Movie Review">Movie Review</option>
                                                    <option value="Popular">Popular</option>
                                               </select>
                                             	<?php echo form_error('category', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                        	<div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Name' value="<?php echo $mv_name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Name'">
                                             	<?php echo form_error('mv_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Sub Title</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_subtitle" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Sub Title' value="<?php echo $mv_subtitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Sub Title'">
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Producer</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_producer" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Producer' value="<?php echo $mv_producer; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Producer'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Director</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_director" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Director' value="<?php echo $mv_director; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Director'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Main Actor</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_main_actor" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Main Actor' value="<?php echo $mv_main_actor; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Main Actor'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">All Actors</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="mv_actor" class="form-control col-md-7 col-xs-12"><?php echo $mv_actor; ?></textarea>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Total Budget</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_budget" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Budget' value="<?php echo $mv_budget; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Budget'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Release Date</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_realese_date" class="form-control datepicker" 
                                                placeholder='Release Date' value="<?php echo $mv_realese_date; ?>"  onFocus="this.placeholder=''" 
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Banner Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="banner_photo">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Release Thetre</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mv_realese_theater" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Release Thetre' value="<?php echo $mv_realese_theater; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Release Thetre'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Details</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="mv_details" class="form-control ckeditor"><?php echo $mv_details; ?></textarea>
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
                                        	<input type="hidden" name="mv_id" value="<?php echo $mv_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $mv_cover_photo; ?>">
                                            <input type="hidden" name="stillImgBanner" value="<?php echo $mv_banner; ?>">
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