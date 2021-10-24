<?php
	foreach($upcomming_trackDetails->result() as $ctD);
	$t_id=$ctD->t_id;
	$name=$ctD->name;
	$details=$ctD->details;

	$coverphoto =$ctD->coverphoto;
	$newstitle='Edit upcomming_track';
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>upcomming_track Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/upcomming_track_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>upcomming_track List</span></a>
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
                                                        <th width="15%">Name</th>
                                                        <th width="1%">:</th>
                                                        <td width="84%"><?php echo $name;?></td>
                                                  </tr>
                                                    <tr>
                                                        <th>details</th>
                                                        <th>:</th>
                                                        <td><?php echo $details;?></td>
                                                    </tr>
                                                    
                                                     <tr>
                                                        <th>Cover Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                        <a href="<?php echo base_url('asset/uploads/upcomming_track/'.$coverphoto);?>">
                                                        <img src="<?php echo base_url('asset/uploads/upcomming_track/'.$coverphoto);?>" style="width:300px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

