<?php
	foreach($booksDetails->result() as $ctD);
	$bid=$ctD->bid;
	$books_name=$ctD->books_name;
	$author=$ctD->author;
	$publisher=$ctD->publisher;
	$type=$ctD->type;
	$details=$ctD->details;
	$photo =$ctD->photo;
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Books Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/books_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Books List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                            	<table class="table table-bordered" width="100%">
                                                	
                                                    <tr>
                                                        <th>Books Name</th>
                                                        <th>:</th>
                                                        <td><?php echo $books_name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Author</th>
                                                        <th>:</th>
                                                        <td><?php echo $author;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <th>:</th>
                                                        <td><?php echo $publisher;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Book Type</th>
                                                        <th>:</th>
                                                        <td><?php echo $type;?></td>
                                                    </tr>
                                                  	<tr>
                                                        <th>Book Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $details;?></td>
                                                    </tr>
                                                    
                                                     <tr>
                                                        <th>Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                       <a href="<?php echo base_url('asset/uploads/books/'.$photo);?>">
                                             			<img src="<?php echo base_url('asset/uploads/books/'.$photo);?>" style="width:250px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

