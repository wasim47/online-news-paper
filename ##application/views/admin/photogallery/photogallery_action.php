<?php
if($photogalleryUpdate->num_rows()>0){
	foreach($photogalleryUpdate->result() as $pdata);
	$b_id=$pdata->b_id;
	$photogalleryTitle=$pdata->photogallery_name;
	$image=$pdata->image;
	$usertype=$pdata->usertype;
	$userid=$pdata->userid;
	$category=$pdata->category;
	$ptitle='Edit Photo';
	
	$queryCat = $this->db->query("SELECT * FROM category WHERE cid='".$category."'");
	$crow = $queryCat->row_array();
	$catname = $crow['cat_name'];
}
else{
	$b_id='';
	$photogalleryTitle=set_value('photogallery_name');
	$usertype=set_value('usertype');
	$userid=set_value('userid');
	$category=set_value('category');
	$image='';
	$ptitle='New Photo';
	$catname = '';
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
							<li>Photo Gallery Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/photogallery_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Photo Gallery List</span></a>
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
                                                 <h4 class="panel-title"><?php echo $ptitle;?></h4></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">User Type</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">User ID</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <div id="citydiv">
                                                 	<select name="userid" class="form-control">
                                                   	 <option value="<?php echo $userid;?>"><?php echo $userid;?></option>                                                   
                                                   </select>
                                                 </div>
                                                 
                                             	<?php echo form_error('usertype', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                        
                                         	    
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gallery Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="photogallery_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Caption'  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Caption'"><?php echo $photogalleryTitle; ?></textarea>
                                             <?php echo form_error('photogallery_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Gallery Photo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="file" name="photogalleryPhoto">
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
                                        <input type="hidden" name="b_id" value="<?php echo $b_id; ?>">
                                        <input type="hidden" name="stillimg" value="<?php echo $image; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
