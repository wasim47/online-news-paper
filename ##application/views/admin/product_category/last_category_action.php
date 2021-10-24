<?php
if($last_categoryUpdate->num_rows()>0){
	 foreach($last_categoryUpdate->result() as $last_categoryData);
		 $id=$last_categoryData->id;
		 $cat_name=$last_categoryData->lastcat_name;
		 $catImage=$last_categoryData->image;
		 $cat_id=$last_categoryData->cat_id;
		 $scat_id=$last_categoryData->subcat_id;
		 $short_desc=$last_categoryData->short_desc;
		  $journalist=$last_categoryData->journalist;
}
else{
	$id='';
	$cat_name=set_value('menu_name');
	$catImage='';
	$short_desc='';
	$cat_id='';
	$scat_id='';
	$short_desc='';
	 $journalist='';
	}
?>
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
	
	function getSubCategory(strURL) {		
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('lastcat').innerHTML=req.responseText;
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
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Menu Registration Details</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Admin Registraion Form</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title">
                                                   last_category Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
                                                <div class="form-group">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">journalist Shop<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php
                                          $queryImg=$this->Index_model->getAllItemTable('journalist','user_id',$journalist,'','','user_id','desc');
												if($queryImg->num_rows() > 0){
													foreach($queryImg->result() as $row_scat);
													$journalistusername=$row_scat->username;
													 $bouUpdateId=$row_scat->user_id;
										}
										else{
											$journalistusername='yesbangla';
											$bouUpdateId='yesbangla';
										}
											?>
                                                <select name="journalist" id="journalist" class="form-control col-md-7 col-xs-12" required>
                                                <option value="<?php echo $bouUpdateId;?>"><?php echo $journalistusername;?></option>
                                                 <option value="yesbangla">yesbangla</option>
                                                <?php
                                                   foreach($journalistList->result() as $boutiRow){
                                                   $bouId=$boutiRow->user_id;
                                                   $shopname=$boutiRow->username;
                                                ?>
                                                    <option value="<?php echo $bouId; ?>"><?php echo $shopname; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                  			 <?php echo form_error('cat_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Category Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" name="last_category_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='last_category Name' value="<?php echo $cat_name; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='last_category Name'">
                                             <?php echo form_error('last_category_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        				<div class="form-group">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Category<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <select name="cat_id" id="cat_id" class="form-control col-md-7 col-xs-12"  
                                                onChange="getCategory('<?php echo base_url();?>admin/ajaxCategory?cat_id='+this.value);" required>
                                                <option value="<?php echo $cat_id;?>"><?php echo $cat_id;?></option>
                                                <?php
                                                foreach($allcategory->result() as $row){
                                                $caegory_title=$row->caegory_title;
                                                $cat_name=$row->cat_name;
                                                ?>
                                                    <option value="<?php echo $caegory_title; ?>"><?php echo $cat_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                  			 <?php echo form_error('cat_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                      					<div class="form-group">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div id="citydiv">
                                                     <select name="subcat_id" id="subcat_id" class="form-control col-md-7 col-xs-12"> 
                                                                <option value="<?php echo $scat_id;?>"><?php echo $scat_id;?></option>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                        				
                                                        
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">last_category Image<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="file" name="catImage" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-3 col-xs-12">
                                               <textarea name="short_desc" class="form-control"><?php echo $short_desc;?></textarea>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-3 col-xs-12">
                                                <select name="status" class="form-control  col-md-7 col-xs-12">
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
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
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="stillimage" value="<?php echo $catImage; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               