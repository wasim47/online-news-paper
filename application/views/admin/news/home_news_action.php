

<?php
if($newsUpdate->num_rows()>0){
	foreach($newsUpdate->result() as $news);
	$n_id=$news->id;
	$row1 = $news->row1;
	$row2 = $news->row2;
	$row3 = $news->row3;
	$menutitle='Update News';
	
}
else{
	$n_id='';
	$row1 = set_value('row1');
	$row2 = set_value('row2');
	$row3 = set_value('row3');
	$menutitle='Add New News';
}
?>
<style>
.required{
	color:#f00;
}
</style>


<style>
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>

<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		alert('dsfdfd');
		$.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/autocomplete');?>",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

<div class="content-health">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>News Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/news_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>News List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
							echo $this->session->flashdata('successMsg');
							?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $menutitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        
                                       
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Row 1</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="frmSearch">
                                                    <input type="text" required pattern="^\d{1,8}(,\d{1,8}){0,0}" title="Only One News ID Allow" id="search-box" name="row1" class="form-control col-md-7 col-xs-12" value="<?php echo $row1; ?>">
                                                    <div id="suggesstion-box"></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Row 2</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="row2" required pattern="^\d{1,8}(,\d{1,8}){0,3}" title="Only Four News ID Allow" class="form-control col-md-7 col-xs-12" value="<?php echo $row2; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Row 3</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="row3" required pattern="^\d{1,8}(,\d{1,8}){0,2}" title="Only Three News ID Allow" class="form-control col-md-7 col-xs-12" value="<?php echo $row3; ?>">
                                            </div>
                                        </div>
                                       
                                           
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                            <input type="hidden" name="news_id" value="<?php echo $n_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
