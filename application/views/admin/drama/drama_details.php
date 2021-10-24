<?php
	foreach($dramaDetails->result() as $ctD);
	$dr_id=$ctD->dr_id;
	$dr_producer=$ctD->dr_producer;
	$dr_name=$ctD->dr_name;
	$dr_subtitle=$ctD->dr_subtitle;
	$dr_director=$ctD->dr_director;
	$dr_main_actor=$ctD->dr_main_actor;
	$dr_actor=$ctD->dr_actor;
	$dr_budget =$ctD->dr_budget;
	$dr_realese_date =$ctD->dr_realese_date;
	$dr_realese_theater =$ctD->dr_realese_theater;
	$dr_details =$ctD->dr_details;
	$dr_cover_photo =$ctD->dr_cover_photo;
	$newstitle='Edit drama';
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>drama Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/drama_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>drama List</span></a>
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
                                                        <td width="84%"><?php echo $dr_name;?></td>
                                                  </tr>
                                                    <tr>
                                                        <th>Sub Title</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_subtitle;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Producer</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_producer;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Director</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_director;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Main Actor</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_main_actor;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>All Actor</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_actor;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Budget</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_budget;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Release Date</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_realese_date;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Release Thetre</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_realese_theater ;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $dr_details;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Cover Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                        <a href="<?php echo base_url('asset/uploads/drama/'.$dr_cover_photo);?>">
                                                        <img src="<?php echo base_url('asset/uploads/drama/'.$dr_cover_photo);?>" style="width:300px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

