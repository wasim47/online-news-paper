<script type="text/javascript">

function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('admin');?>/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}

</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>photographer List</li>
                            <li>Total photographer = <?php echo $photographer_list->num_rows();?></li>
						</ul>

		  <ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/photographer_registration');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-plus-sign"></i><span>Add New</span></a>
							</div>
						</ul>
					</div>
</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<!--<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>

			                	</ul>
		                	</div>-->
						</div>

						<?php echo form_open('','id="form_check"');?>

						<table class="table datatable-show-all" width="100%">
                                    <thead>
                                      <tr>
                                         <th>SI</th>
                                         <th>photographer Name</th>
                                         <th>Email</th>
                                         <th>Mobile</th>
                                         <th>Photo</th>
                                         <th>Create Date & Time</th>
                                         <th width="12%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($photographer_list->result() as $ctD):
									$user_id=$ctD->user_id;
									$firstname=$ctD->firstname;
									$lastname=$ctD->lastname;
									$email=$ctD->email;
									$mobile=$ctD->mobile;
									$photo=$ctD->photo;
									$created_date=$ctD->created_date;
									$i++;
									?>
                                      <tr>
                                       <td><?php echo $i;?></td>
                                       <td><?php echo $firstname.' '.$lastname; ?></td>
                                       <td><?php echo $email; ?></td>
                                       <td><?php echo $mobile; ?></td>
                                       <td> <a href="<?php echo base_url('asset/uploads/photographer/'.$photo);?>">
                                             <img src="<?php echo base_url('asset/uploads/photographer/'.$photo);?>" style="width:150px; height:auto" /></a></td>
                                       <td><?php echo $created_date; ?></td>
                                         <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/photographer_registration/'.$user_id);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
                                                    <li><a href="<?php echo base_url('admin/photographer_list?details='.$user_id);?>" style="color:#003399">
                                                    <i class="glyphicon glyphicon-file"></i> Details</a></li>
													<li><a href="javascript:void();" onclick="openPage1('<?php echo $user_id;?>','photographer','user_id');" style="color:#ff0000">
                                                    <i class="glyphicon glyphicon-trash"></i> Delete</a></li>
												</ul>
											</li>
										</ul>
									</td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                        <?php echo form_close();?>
					</div>
