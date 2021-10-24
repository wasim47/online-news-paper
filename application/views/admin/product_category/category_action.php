<?php
if($categoryUpdate->num_rows()>0){
	 foreach($categoryUpdate->result() as $categoryData);
		 $cid=$categoryData->cid;
		 $cat_name=$categoryData->cat_name;
		 $catImage=$categoryData->image;
		 $color=$categoryData->color;
		 $page_type=$categoryData->page_type;
		 $menutitle='Edit Category';
}
else{
	$cid='';
	$color=set_value('color');
	$cat_name=set_value('menu_name');
	$page_type=set_value('page_type');
	$catImage='';
	$menutitle='Add New Category';
	}
?>


<style>
.required{
	color:#f00;
}
</style>


<div class="content-health">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Category Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/category_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Category List</span></a>
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
                                                 <h4 class="panel-title"><?php echo $menutitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                         
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Show<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <select name="cat_position" class="form-control">
                                                	<option value="Top">Top Menu</option>
                                                    <option value="Bottom">Bottom Menu</option>
                                                </select>
                                             <?php echo form_error('category_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" name="category_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Category Name' value="<?php echo $cat_name; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Category Name'">
                                             <?php echo form_error('category_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                    
                                                    
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Color<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="color" name="color" required class="form-control col-md-7 col-xs-12" value="<?php echo $color; ?>" >
                                             <?php echo form_error('color', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                            
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Image<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="file" name="catImage" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                          
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Page Structure<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <select name="page_type" class="form-control">
                                                	<option value="<?php echo $page_type; ?>"><?php echo $page_type; ?></option>
                                                    <option value="news" selected="selected">News</option>
                                                    <option value="youtube">Video gallery</option>
                                                    <option value="photo_gallery">Photo gallery</option>
                                                </select>
                                             <?php echo form_error('page_type', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                                        <input type="hidden" name="stillimage" value="<?php echo $catImage; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
