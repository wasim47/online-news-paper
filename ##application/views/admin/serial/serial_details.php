<?php
	foreach($serialDetails->result() as $ctD);
	$sr_id=$ctD->sr_id;
	$sr_producer=$ctD->sr_producer;
	$sr_name=$ctD->sr_name;
	$sr_subtitle=$ctD->sr_subtitle;
	$sr_director=$ctD->sr_director;
	$sr_main_actor=$ctD->sr_main_actor;
	$sr_actor=$ctD->sr_actor;
	$sr_episode_budgets 	 =$ctD->sr_episode_budgets 	;
	$sr_realese_date =$ctD->sr_realese_date;
	$sr_realese_channel =$ctD->sr_realese_channel;
	$sr_details =$ctD->sr_details;
	$sr_cover_photo =$ctD->sr_cover_photo;
	$sr_telecast =$ctD->sr_telecast;
	$newstitle='Edit serial';
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>serial Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/serial_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>serial List</span></a>
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
                                                        <td width="84%"><?php echo $sr_name;?></td>
                                                  </tr>
                                                    <tr>
                                                        <th>Sub Title</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_subtitle;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Producer</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_producer;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Director</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_director;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Main Actor</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_main_actor;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>All Actor</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_actor;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Episode Budget</th>
                                                      	<th>:</th>
                                                        <td><?php echo $sr_episode_budgets 	;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telecast</th>
                                                      	<th>:</th>
                                                        <td><?php echo $sr_telecast;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Release Date</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_realese_date;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Release Thetre</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_realese_channel ;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $sr_details;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Cover Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                        <a href="<?php echo base_url('asset/uploads/serial/'.$sr_cover_photo);?>">
                                                        <img src="<?php echo base_url('asset/uploads/serial/'.$sr_cover_photo);?>" style="width:300px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

