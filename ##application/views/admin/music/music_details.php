<?php
	foreach($musicDetails->result() as $ctD);
	$ms_id=$ctD->ms_id;
	$ms_producer=$ctD->ms_producer;
	$ms_name=$ctD->ms_name;
	$ms_subtitle=$ctD->ms_subtitle;
	$ms_director=$ctD->ms_director;
	$ms_singer=$ctD->ms_singer;
	$ms_budgets 	 =$ctD->ms_budgets;
	$ms_realese_date =$ctD->ms_realese_date;
	$ms_realese_studio =$ctD->ms_realese_studio;
	$ms_details =$ctD->ms_details;
	$ms_cover_photo =$ctD->ms_cover_photo;
	$ms_telecast =$ctD->ms_telecast;
	$newstitle='Edit music';
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>music Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/music_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>music List</span></a>
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
                                                        <td width="84%"><?php echo $ms_name;?></td>
                                                  </tr>
                                                    <tr>
                                                        <th>Sub Title</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_subtitle;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Producer</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_producer;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Director</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_director;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>singer</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_singer;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Episode Budget</th>
                                                      	<th>:</th>
                                                        <td><?php echo $ms_episode_budgets 	;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telecast</th>
                                                      	<th>:</th>
                                                        <td><?php echo $ms_telecast;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Release Date</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_realese_date;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Release Thetre</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_realese_studio ;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $ms_details;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Cover Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                        <a href="<?php echo base_url('asset/uploads/music/'.$ms_cover_photo);?>">
                                                        <img msc="<?php echo base_url('asset/uploads/music/'.$ms_cover_photo);?>" style="width:300px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

