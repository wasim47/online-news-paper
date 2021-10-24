<?php
if($verb_detailsUpdate->num_rows()>0){
foreach($verb_detailsUpdate->result() as $ctD);
	$bid=$ctD->bid;
	$headline=$ctD->headline;
	$details=$ctD->details;
	$newstitle='Edit verb_details';
}
else{
	$bid='';
	$headline=set_value('headline');
	$details=set_value('details');
	$newstitle='Add New verb_details';
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
							<li>verb details Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/verb_details_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>verb details List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                               <select name="category" class="form-control">
                                               		<option>Category</option>
                                                    <?php foreach($verb_category_list->result() as $vct):?>
                                                    	<option value="<?php echo $vct->bid;?>"><?php echo $vct->headline;?></option>
                                                    <?php endforeach;?>
                                               </select>
                                                <?php echo form_error('category', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                           
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Headline<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="headline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Headline' value="<?php echo $headline; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Headline'">
                                                <?php echo form_error('headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
