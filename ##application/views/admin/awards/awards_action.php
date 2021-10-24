<?php
if($awardsUpdate->num_rows()>0){
	foreach($awardsUpdate->result() as $ctD);
	$aid=$ctD->aid;
	$type=$ctD->type;
	$usertype=$ctD->usertype;
	$userid=$ctD->userid;
	$award=$ctD->award;
	$awardfor=$ctD->awardfor;
	$newstitle='Edit award';
}
else{
	$aid='';
	$type=set_value('type');
	$usertype=set_value('usertype');
	$userid=set_value('userid');
	$award=set_value('award');
	$awardfor=set_value('awardfor');
	$newstitle='Add New award';
}
?>
<style>
.required{
	color:#f00;
}
</style>

<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		return xmlhttp;
	}
	
	function getCategory(strURL) {
		//alert(strURL);		
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
	
	
	
	


</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Award Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/awards_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Awards List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Award Type<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                  <select name="type" class="form-control">
                                                    <option value="Winner">Winner</option>
                                                    <option value="Nominated">Nominated</option>
                                                  </select>
                                             	<?php echo form_error('type', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">User Type<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                  <select name="usertype" class="form-control" 
                                                  onChange="getCategory('<?php echo base_url();?>admin/ajaxData?usertype='+this.value);">
                                                    <option value="<?php echo $usertype;?>"><?php echo $usertype;?></option>
                                                    <option value="Actor">Actor</option>
                                                    <option value="Players">Players</option>
                                                  </select>
                                             	<?php echo form_error('usertype', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">User ID<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                 <div id="citydiv">
                                                 	<select name="userid" class="form-control">
                                                   	 <option value="<?php echo $userid;?>"><?php echo $userid;?></option>                                                   
                                                   </select>
                                                 </div>
                                                 
                                             	<?php echo form_error('usertype', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Award Title</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="award" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Award Title' value="<?php echo $award; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Award Title'">
                                                <?php echo form_error('award', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Award For</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="awardfor" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Award For' value="<?php echo $awardfor; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Award For'">
                                                <?php echo form_error('awardfor', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                        	<input type="hidden" name="aid" value="<?php echo $aid; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
