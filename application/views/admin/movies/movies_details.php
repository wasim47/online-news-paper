<?php
	foreach($moviesDetails->result() as $ctD);
	$mv_id=$ctD->mv_id;
	$mv_producer=$ctD->mv_producer;
	$mv_name=$ctD->mv_name;
	$mv_subtitle=$ctD->mv_subtitle;
	$mv_director=$ctD->mv_director;
	$mv_main_actor=$ctD->mv_main_actor;
	$mv_actor=$ctD->mv_actor;
	$mv_budget =$ctD->mv_budget;
	$mv_realese_date =$ctD->mv_realese_date;
	$mv_realese_theater =$ctD->mv_realese_theater;
	$mv_details =$ctD->mv_details;
	$mv_cover_photo =$ctD->mv_cover_photo;
	$newstitle='Edit Movies';
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Movies Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/movies_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Movies List</span></a>
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
                                                        <td width="84%"><?php echo $mv_name;?></td>
                                                  </tr>
                                                    <tr>
                                                        <th>Sub Title</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_subtitle;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Producer</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_producer;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Director</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_director;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Main Actor</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_main_actor;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>All Actor</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_actor;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Budget</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_budget;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Release Date</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_realese_date;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Release Thetre</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_realese_theater ;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $mv_details;?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Cover Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                        <a href="<?php echo base_url('asset/uploads/movies/'.$mv_cover_photo);?>">
                                                        <img src="<?php echo base_url('asset/uploads/movies/'.$mv_cover_photo);?>" style="width:300px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

