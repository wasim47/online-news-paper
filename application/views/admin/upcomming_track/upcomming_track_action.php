<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($upcomming_trackUpdate->num_rows()>0){
	foreach($upcomming_trackUpdate->result() as $ctD);
	$t_id=$ctD->t_id;
	$name=$ctD->name;
	$details=$ctD->details;
	$coverphoto =$ctD->coverphoto;
	$auther_name =$ctD->author;
	$newstitle='Edit upcomming_track';
}
else{
	$t_id='';
	$name=set_value('name');
	$details =set_value('details');
	$coverphoto ='';
	$auther_name ='';
	$newstitle='Add New upcomming_track';
}
?>
<style>
.required{
	color:#f00;
}
</style>


<script>
function autherfunc(){
	var autherNameVal= $("#autherNameVal").val();
	if(autherNameVal=='others'){
		$("#auther_name").show('slow');
	}
	else{
	$("#auther_name").hide('slow');
	}
}

</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>upcomming_track Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/upcomming_track_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>upcomming_track List</span></a>
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
                                                <input type="text" name="name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Name' value="<?php echo $name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Name'">
                                             	<?php echo form_error('name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                           <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Author<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="auther_name" id="autherNameVal" class="form-control" style="width:150px;" 
                                            onchange="autherfunc();">
                                            <option value="<?php echo $auther_name;?>"><?php echo $auther_name;?></option>
                                            <option value="অনলাইন ডেস্ক নিউজ">অনলাইন ডেস্ক নিউজ</option>
                                            <option value="স্টাফ">স্টাফ</option>
                                            <option value="প্রতিনিধী">প্রতিনিধী</option>
                                            <option value="বিশেষ প্রতিনিধী">বিশেষ প্রতিনিধী</option>
                                            <option value="কলামিস্ট">কলামিস্ট</option>
                                            <option value="জনপ্রতিনিধী">জনপ্রতিনিধী</option>
                                            <option value="others">অন্যান্য</option>
                                          </select>
                                           <input type="text" name="authername" id="auther_name"value="<?php echo $auther_name; ?>" 
                                           placeholder='Auther name' class="form-control" style="display:none; margin-top:5px;"> 
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">details</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="details" class="form-control ckeditor"><?php echo $details; ?></textarea>
                                            </div>
                                        </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Cover Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="cover_photo">
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
                                        	<input type="hidden" name="dr_id" value="<?php echo $t_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $coverphoto; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>

