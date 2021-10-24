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
			var hrefdata ="<?php echo base_url('admin');?>/approve?approve_val="+data+"&tablename=movies"+"&id=mv_id"+"&status=status";
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
			var hrefdata ="<?php echo base_url('admin');?>/deapprove?approve_val="+data+"&tablename=movies"+"&id=mv_id"+"&status=status";
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
			var hrefdata ='<?php echo base_url('admin');?>/deleteAllData/'+tablename+'/mv_id/'+data;
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
							<li>Movies List</li>
                            <li>Total Movies = <?php echo $movies_list->num_rows();?></li>
						</ul>

		  <ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/movies_registration');?>" class="btn btn-link btn-float has-text">
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
                                    foreach($movies_list->result() as $ctD):
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
									$i++;
									?>
                                      <tr>
                                       <td><?php echo $i;?></td>
                                       <td><?php echo $mv_name; ?></td>
                                       <td><?php echo $mv_producer; ?></td>
                                       <td><?php echo $mv_director; ?></td>
                                       <td><?php echo $mv_main_actor; ?></td>
                                       <td><?php echo $mv_budget; ?></td>
                                       <td><?php echo $mv_realese_date; ?></td>
                                         <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/movies_registration/'.$mv_id);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
                                                    <li><a href="<?php echo base_url('admin/movies_list?details='.$mv_id);?>" style="color:#003399">
                                                    <i class="glyphicon glyphicon-file"></i> Details</a></li>
													<li><a href="javascript:void();" onclick="openPage1('<?php echo $mv_id;?>','movies','mv_id');" style="color:#ff0000">
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
