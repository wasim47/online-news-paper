<?php
if($sportsUpdate->num_rows()>0){
	foreach($sportsUpdate->result() as $ctD);
	$sport_id=$ctD->sport_id;
	$category=$ctD->category;
	$sport_venue=$ctD->sport_venue;
	$time=$ctD->time;
	$team1 =$ctD->team1;
	$team2 =$ctD->team2;
	$date_time =$ctD->date_time;
	$newstitle='Edit sports';
}
else{
	$sport_id='';
	$category=set_value('category');
	$sport_venue =set_value('sport_venue');
	$time =set_value('time');
	$team1 =set_value('team1');
	$team2 =set_value('team2');
	$date_time =set_value('date_time');
	$newstitle='Add New sports';
}
?>
<style>
.required{
	color:#f00;
}
</style>


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>sports Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/sports_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>sports List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $newstitle;?> </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
    
                                        	<div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Category<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select name="category" class="form-control">
                                                	<option value="Cricket">Cricket</option>
                                                    <option value="Football">Football</option>
                                                </select>
                                           	 </div>
                                            </div>
                                           
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vanue</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="sport_venue" class="form-control" value="<?php echo $sport_venue; ?>">
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Time</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="time" class="form-control" value="<?php echo $time; ?>">
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Team 1</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="team1" class="form-control" value="<?php echo $team1; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Team 2</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="team2" class="form-control" value="<?php echo $team2; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="date" name="date_time" placeholder="YYYY/MM/DD" class="form-control" value="<?php echo $date_time; ?>">
                                            </div>
                                        </div>
                                           
                                           
                                    	  
                                            </div>
                                            
                                        </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        	<input type="hidden" name="dr_id" value="<?php echo $sport_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>

