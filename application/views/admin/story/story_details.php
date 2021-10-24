<?php
	foreach($storyDetails->result() as $ctD);
	$bid=$ctD->bid;
	$headline=$ctD->headline;
	$details=$ctD->details;
	$photo =$ctD->photo;
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>story Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/story_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>story List</span></a>
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
                                                        <th>Headline</th>
                                                        <th>:</th>
                                                        <td><?php echo $headline;?></td>
                                                    </tr>
                                                   
                                                  	<tr>
                                                        <th>Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $details;?></td>
                                                    </tr>
                                                    
                                                     <tr>
                                                        <th>Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                       <a href="<?php echo base_url('asset/uploads/story/'.$photo);?>">
                                             			<img src="<?php echo base_url('asset/uploads/story/'.$photo);?>" style="width:250px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

