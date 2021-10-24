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
							<li>Award List</li>
                            <li>Total Award = <?php echo $books_list->num_rows();?></li>
						</ul>

		  <ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/books_registration');?>" class="btn btn-link btn-float has-text">
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
                                         <th>Book name</th>
                                         <th>Author</th>
                                         <th>Publisher</th>
                                         <th>Book Type</th>
                                         <th width="12%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($books_list->result() as $ctD):
										$bid=$ctD->bid;
										$books_name=$ctD->books_name;
										$author=$ctD->author;
										$publisher=$ctD->publisher;
										$type=$ctD->type;
										$details=$ctD->details;
										$photo =$ctD->photo;
				
									$i++;
									?>
                                      <tr>
                                       <td><?php echo $i;?></td>
                                       <td><?php echo $books_name; ?></td>
                                       <td><?php echo $author; ?></td>
                                       <td><?php echo $publisher; ?></td>
                                       <td><?php echo $type; ?></td>
                                         <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/books_registration/'.$bid);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
                                                    
													<li><a href="javascript:void();" onclick="openPage1('<?php echo $bid;?>','books','bid');" style="color:#ff0000">
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
