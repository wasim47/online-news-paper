<?php
if($booksUpdate->num_rows()>0){
foreach($booksUpdate->result() as $ctD);
	$bid=$ctD->bid;
	$books_name=$ctD->books_name;
	$author=$ctD->author;
	$publisher=$ctD->publisher;
	$type=$ctD->type;
	$details=$ctD->details;
	$photo =$ctD->photo;
	$newstitle='Edit award';
}
else{
	$bid='';
	$type=set_value('type');
	$books_name=set_value('books_name');
	$author=set_value('author');
	$publisher=set_value('publisher');
	$details=set_value('details');
	$photo ='';
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
								<a href="<?php echo base_url('admin/books_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>books List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Book Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="books_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Book Name' value="<?php echo $books_name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Book Name'">
                                                <?php echo form_error('books_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Author</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="author" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Author' value="<?php echo $author; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Author'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Publisher</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="publisher" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Publisher' value="<?php echo $publisher; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Publisher'">
                                           	 </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Book Type</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="type" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Book Type' value="<?php echo $type; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Book Type'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Details</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea class="form-control" name="details" placeholder="Details"><?php echo $details; ?></textarea>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                               <input type="file" name="photo" />
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
