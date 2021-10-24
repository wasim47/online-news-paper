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


checked = false;
function checkedAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
	  document.getElementById('form_check').elements[i].checked = checked;
	}
}
function approve(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url('admin');?>/approve?approve_val="+data+"&tablename=serial"+"&id=sr_id"+"&status=status";
			window.location.href=hrefdata;
	}
	
}

function deapprove(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url('admin');?>/deapprove?approve_val="+data+"&tablename=serial"+"&id=sr_id"+"&status=status";
			window.location.href=hrefdata;
	}
	
}

function deletedata(tablename){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
		var b = window.confirm('Are you sure, you want to delete this ?');
		if(b==true){
			var hrefdata ='<?php echo base_url('admin');?>/deleteAllData/'+tablename+'/sr_id/'+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}

</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>serial List</li>
                            <li>Total serial = <?php echo $serial_list->num_rows();?></li>
						</ul>

		  <ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/serial_registration');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-plus-sign"></i><span>Add New</span></a>
								<!--<a href="javascript:void();" onclick="approve('news');" class="btn btn-link btn-float has-text" style="color:#00CC00">
                                <i class="glyphicon glyphicon-record"></i> <span>Approved</span></a>
								<a href="javascript:void();" onclick="deapprove('news');" class="btn btn-link btn-float has-text" style="color:#CC3300" >
                                <i class="glyphicon glyphicon-off"></i> <span>Disapproved</span></a>-->
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
                                         <th>Movie Name</th>
                                         <th>Producer</th>
                                         <th>Director</th>
                                         <th>Main Actor</th>
                                         <th>Budget</th>
                                         <th>Release Date</th>
                                         <th width="12%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($serial_list->result() as $ctD):
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
									$i++;
									?>
                                      <tr>
                                       <td><?php echo $i;?></td>
                                       <td><?php echo $sr_name; ?></td>
                                       <td><?php echo $sr_producer; ?></td>
                                       <td><?php echo $sr_director; ?></td>
                                       <td><?php echo $sr_main_actor; ?></td>
                                       <td><?php echo $sr_episode_budgets 	; ?></td>
                                       <td><?php echo $sr_realese_date; ?></td>
                                         <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/serial_registration/'.$sr_id);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
                                                    <li><a href="<?php echo base_url('admin/serial_list?details='.$sr_id);?>" style="color:#003399">
                                                    <i class="glyphicon glyphicon-file"></i> Details</a></li>
													<li><a href="javascript:void();" onclick="openPage1('<?php echo $sr_id;?>','serial','sr_id');" style="color:#ff0000">
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
