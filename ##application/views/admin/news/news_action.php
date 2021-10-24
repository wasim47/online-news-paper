<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($newsUpdate->num_rows()>0){
	foreach($newsUpdate->result() as $news);
	$n_id=$news->n_id;
	$news_id=$news->news_id;
	$headline=$news->headline;
	$subHeadline=$news->subHeadline;
	$journalist=$news->journalist;
	$category=$news->category;
	$main_image=$news->image;
	$sub_category=$news->sub_category;
	$auther_name=$news->auther_name;
	$image=$news->image;
	$image_title=$news->image_title;
	$full_description=$news->full_description;
	$status=$news->status;
	$squence=$news->squence;
	$homepage_news=$news->homepage_news;
	$latest_news=$news->latest_news;
	$vedio=$news->vedio;

	$seo_title=$news->seo_title;
	$key_word=$news->key_word;
	$seo_details=$news->seo_details;
	
	$menutitle='Edit News';
	
	$queryCat = $this->db->query("SELECT * FROM category WHERE cid='".$category."'");
	$crow = $queryCat->row_array();
	$catname = $crow['cat_name'];
	
}
else{
	$n_id='';
	$news_id='';
	$vedio='';
	$subHeadline='';
	$headline='';
	$journalist='';
	$category='';
	$catname ='';
	$sub_category='';
	$auther_name='';
	$full_description='';
	$image='';
	$image_title='';
	$status='';
	$squence='';
	$main_image='';
	$homepage_news='';
	$latest_news='';
	
	$seo_title='';
	$key_word='';
	$seo_details='';
	$menutitle='Add New News';
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
	
	function getCity_size(strURL) {		
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv_size').innerHTML=req.responseText;						
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
<div class="content-health">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>News Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/news_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>News List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
							echo $this->session->flashdata('successMsg');
							?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $menutitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">News Category<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="cat_id" id="cat_id" class="form-control col-md-7 col-xs-12"  
                                                onChange="getCategory('<?php echo base_url();?>admin/ajaxData?cat_id='+this.value);"
                                                 required>
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
                                  			 <?php echo form_error('cat_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div id="citydiv">
                                                     <select name="subcat_id" id="subcat_id" class="form-control col-md-7 col-xs-12"> 
                                                                <option value="<?php echo $sub_category;?>"><?php echo $sub_category;?></option>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pre Headline</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="subHeadline" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Pre Headline' value="<?php echo $subHeadline; ?>" 
                                                onFocus="this.placeholder=''" onBlur="this.placeholder='Pre Headline'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Headline<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="headline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='News Title' value="<?php echo $headline; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='News Title'">
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
                                            <option value="প্রতিনিধি">প্রতিনিধি</option>
                                            <option value="বিশেষ প্রতিনিধি">বিশেষ প্রতিনিধি</option>
                                            <option value="কলামিস্ট">কলামিস্ট</option>
                                            <option value="জন প্রতিনিধি">জন প্রতিনিধি</option>
                                            <option value="others">অন্যান্য</option>
                                          </select>
                                           <input type="text" name="authername" id="auther_name"value="<?php echo $auther_name; ?>" 
                                           placeholder='Auther name' class="form-control" style="display:none; margin-top:5px;"> 
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">News Details<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="full_description" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $full_description; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Main Image<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="file" name="main_images" id="main_images">
                                            </div>
                                            <?php
                                            if($main_image!=""){
												?>
                                            <div class="col-md-1 col-sm-1">
                                                <img src="<?php echo base_url()?>asset/uploads/news/<?php echo $main_image;?>"  style="height:auto; width:100%;" />
                                            </div>
                                            <?php
											}
											?>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Images Caption</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="image_title" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Images Caption' value="<?php echo $image_title; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Images Caption'">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="vedio" id="vedio" type="text" class="form-control" value="<?php echo $vedio;?>" style="width:250px;" /><br /><br />
                                                  <!--Top Content&nbsp;: &nbsp;
                                                  <input type="checkbox" name="vedio_top" value="1" />&nbsp;&nbsp;
                                                  Bottom Content&nbsp;: &nbsp;
                                                  <input type="checkbox" name="vedio_bottom" value="1" />&nbsp;&nbsp;-->
                                            </div>
                                        </div>
                                        
                                       
                                       
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Homepage News</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="checkbox" name="homepage_news" value="1" <?php if($homepage_news==1){?> checked="checked" <?php }?>>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Latest News</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="checkbox" name="latest_news" value="1" <?php if($latest_news==1){?> checked="checked" <?php }?>>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="status" class="form-control">
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SEO Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="seo_title" class="form-control col-md-7 col-xs-12" 
                                                placeholder='SEO Title' value="<?php echo $seo_title; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='SEO Title'">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keyword</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="key_word" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Keyword' value="<?php echo $key_word; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Keyword'">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="seo_details" class="form-control ckeditor"><?php echo $seo_details; ?></textarea>
                                            </div>
                                        </div>
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                            <input type="hidden" name="news_id" value="<?php echo $n_id; ?>">
                                            <input type="hidden" name="mainImg" value="<?php echo $main_image; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
