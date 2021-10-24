<?php
if($musicUpdate->num_rows()>0){
	foreach($musicUpdate->result() as $ctD);
	$ms_id=$ctD->ms_id;
	$ms_name=$ctD->ms_name;
	$ms_subtitle=$ctD->ms_subtitle;
	$ms_singer=$ctD->ms_singer;
	$ms_realese_date = $ctD->ms_realese_date;
	$ms_details = $ctD->ms_details;
	$ms_cover_photo = $ctD->ms_cover_photo;
	$ms_file = $ctD->ms_file;
	$category=$ctD->category;
	$newstitle='Edit music';
	
	$queryCat = $this->db->query("SELECT * FROM category WHERE cid='".$category."'");
	$crow = $queryCat->row_array();
	$catname = $crow['cat_name'];
}
else{
	$ms_id='';
	$category ='';
	$catname = '';
	$ms_producer=set_value('ms_producer');
	$ms_name=set_value('ms_name');
	$ms_subtitle=set_value('ms_subtitle');
	$ms_singer=set_value('ms_singer');
	$ms_director=set_value('ms_director');
	$ms_budget 	 =set_value('ms_budget');
	$ms_realese_date =set_value('ms_realese_date');
	$ms_realese_studio =set_value('ms_realese_studio');
	$ms_details =set_value('ms_details');
	$ms_cover_photo ='';
	$ms_file ='';
	$newstitle='Add New music';
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
							<li>music Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/music_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>music List</span></a>
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
                                                
    
    										<div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">News Category</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="cat_id" id="cat_id" class="form-control col-md-7 col-xs-12">
                                                <option value="<?php echo $category;?>"><?php echo $catname;?></option>
                                                <?php
                                                foreach($allcategory->result() as $row){
                                                $caegory_title=$row->cat_slug;
                                                $cat_name=$row->cat_name;
												$cid=$row->cid;
                                                ?>
                                                    <option value="<?php echo $cid; ?>"><?php echo $cat_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        	<div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="ms_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Name' value="<?php echo $ms_name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Name'">
                                             	<?php echo form_error('ms_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Sub Title</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="ms_subtitle" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Sub Title' value="<?php echo $ms_subtitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Sub Title'">
                                           	 </div>
                                            </div>
                                            
                                         
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Singer</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="ms_singer" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Singer' value="<?php echo $ms_singer; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Singer'">
                                           	 </div>
                                            </div>
                                           
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Release Date</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="ms_realese_date" class="form-control datepicker" 
                                                placeholder='Release Date' value="<?php echo $ms_realese_date; ?>"  onFocus="this.placeholder=''" 
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Music File</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="ms_file">
                                                <small>Upload mp3, M4a and others audio file</small>
                                           	 </div>
                                            </div>
                                            
                                            
                                            
                                          
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Details</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="ms_details" class="form-control ckeditor"><?php echo $ms_details; ?></textarea>
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
                                        	<input type="hidden" name="ms_id" value="<?php echo $ms_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $ms_cover_photo; ?>">
                                            <input type="hidden" name="stillmsFile" value="<?php echo $ms_file; ?>">
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