<script type="text/javascript">

function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>admin/deleteData/'+tablename+'/'+colid,
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
			var hrefdata ="<?php echo base_url();?>admin/approve?approve_val="+data+"&tablename=news_manage"+"&id=n_id"+"&status=status";
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
			var hrefdata ="<?php echo base_url();?>admin/deapprove?approve_val="+data+"&tablename=news_manage"+"&id=n_id"+"&status=status";
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
			var hrefdata ='<?php echo base_url()?>admin/deleteAllData/'+tablename+'/m_id/'+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}

</script>
<div class="content-health">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>News List</li>
                            <li>Total News = <?php echo $adminnews_list->num_rows();?></li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/news_action');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-plus-sign"></i><span>Add New</span></a>
								<a href="javascript:void();" onclick="approve('news_manage');" class="btn btn-link btn-float has-text" style="color:#00CC00">
                                <i class="glyphicon glyphicon-record"></i> <span>Approved</span></a>
								<a href="javascript:void();" onclick="deapprove('news_manage');" class="btn btn-link btn-float has-text" style="color:#CC3300" >
                                <i class="glyphicon glyphicon-off"></i> <span>Disapproved</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						

						<?php echo form_open('','id="form_check"');?>

							<table class="table datatable-show-all" width="100%">
									<thead>
                                        <tr>
                                          <th width="2%">ID</th>
                                          <th width="2%"><input name="checkbox" onclick='checkedAll();' type="checkbox" /></th>
                                          <th width="22%">News Category</th>
                                          <th width="41%">News Title</th>
                                          <th width="9%">Total Read</th>
                                          <th width="9%">Status</th>
                                          <th width="15%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php
										$i=0;
										foreach($adminnews_list->result() as $news):
											$news_id=$news->n_id;
											$headline=$news->headline;
											$category=$news->category;
											$active=$news->status;
											$read_count=$news->read_count;
											if($active==1){
												$status = '<span class="label label-success">Active</span>';
											}
											else{
												$status = '<span class="label label-default">Inactive</span>';
											}
											
											$queryCat = $this->db->query("SELECT * FROM category WHERE cid='".$category."'");
											$crow = $queryCat->row_array();
										$i++;
										?>
										  
                                        <tr>
											<td><?php echo $news_id;?></td>
                                            <td><input type="checkbox"  name="summe_code[]" id="summe_code<?php echo $i; ?>"  
                                            value="<?php echo $news_id;?>" /></td>
											<td><?php echo $crow['cat_name']; ?></td>
                                            <td><?php echo $headline; ?></td>
											<td><?php echo $read_count; ?></td>
											<td><?php echo $status; ?></td>											 
                                             <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>                                                        </a>
        
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="<?php echo base_url('admin/news_action/'.$news_id);?>" style="color:#EDBB0E">
                                                            <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
                                                            <li><a href="javascript:void();" 
                                                            onclick="openPage1('<?php echo $news_id;?>','news_manage','n_id');" style="color:#ff0000">
                                                            <i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>											</td>
										  </tr>
                                         <?php
										endforeach;
										?>  
                                    </tbody>
                                </table>
                      <?php echo form_close();?>
					</div>
