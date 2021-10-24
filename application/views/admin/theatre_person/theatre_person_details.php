<?php
	foreach($theatre_personDetails->result() as $ctD);
	$user_id=$ctD->user_id;
	$firstname=$ctD->firstname;
	$lastname=$ctD->lastname;
	$email=$ctD->email;
	$mobile=$ctD->mobile;
	$profile=$ctD->profile;
	$about_details=$ctD->about_details;
	$created_date=$ctD->created_date;
	$photo =$ctD->photo;
?>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>theatre_person Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/theatre_person_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>theatre_person List</span></a>
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
                                                        <td width="84%"><?php echo $firstname.''.$lastname;?></td>
                                                  </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th>:</th>
                                                        <td><?php echo $email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile</th>
                                                        <th>:</th>
                                                        <td><?php echo $mobile;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Profile</th>
                                                        <th>:</th>
                                                        <td><?php echo $profile;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>About Details</th>
                                                        <th>:</th>
                                                        <td><?php echo $about_details;?></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <th>Create Date</th>
                                                        <th>:</th>
                                                        <td><?php echo $created_date;?></td>
                                                    </tr>
                                                    
                                                     <tr>
                                                        <th>Photo</th>
                                                        <th>:</th>
                                                        <td>
                                                       <a href="<?php echo base_url('asset/uploads/theatre_person/'.$photo);?>">
                                             			<img src="<?php echo base_url('asset/uploads/theatre_person/'.$photo);?>" style="width:250px; height:auto" /></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                
					</div>

