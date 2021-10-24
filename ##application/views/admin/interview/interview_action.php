<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($interviewUpdate->num_rows()>0){
foreach($interviewUpdate->result() as $ctD);
	$bid=$ctD->bid;
	$headline=$ctD->headline;
	$details=$ctD->details;
	$photo =$ctD->photo;
	$auther_name =$ctD->author;
	$newstitle='Edit interview';
}
else{
	$bid='';
	$headline=set_value('headline');
	$details=set_value('details');
	$photo ='';
	$auther_name ='';
	$newstitle='Add New interview';
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
							<li>Interview Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/interview_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Interview List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Headline<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="headline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Headline' value="<?php echo $headline; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Headline'">
                                                <?php echo form_error('headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                               <input type="file" name="photo" />
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Details</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea class="form-control ckeditor" name="details" placeholder="Details"><?php echo $details; ?></textarea>
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
                                        	<input type="hidden" name="bid" value="<?php echo $bid; ?>">
                                            <input type="hidden" name="stillimg" value="<?php echo $photo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
