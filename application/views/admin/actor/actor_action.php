<?php
if($actorUpdate->num_rows()>0){
	foreach($actorUpdate->result() as $ctD);
	$user_id=$ctD->user_id;
	$firstname=$ctD->firstname;
	$lastname=$ctD->lastname;
	$email=$ctD->email;
	$mobile=$ctD->mobile;
	$profile=$ctD->profile;
	$about_details=$ctD->about_details;
	$photo =$ctD->photo;
	$bannr_photo =$ctD->bannr_photo;
	$rankingval	=$ctD->ranking;	
	$ratingVal	=$ctD->ratingVal;	
	$googleplus	=$ctD->googleplus;	
	$twitter	= $ctD->twitter;
	$facebook	= $ctD->facebook;
	$linkedin	= $ctD->linkedin;
	
	$newstitle='Edit actor';
}
else{
	$user_id='';
	$firstname=set_value('firstname');
	$lastname=set_value('lastname');
	$email=set_value('email');
	$mobile=set_value('mobile');
	$profile=set_value('profile');
	$about_details=set_value('about_details');
	$photo ='';
	$bannr_photo='';
	$ratingVal ='';
	$googleplus	='';	
	$twitter	= '';
	$facebook	='';
	$linkedin='';
	$newstitle='Add New actor';
	
	$queryrank = $this->db->query("SELECT MAX(ranking) AS rankval FROM actor ORDER BY ranking DESC");
	$rankrow = $queryrank->row_array();
	$rankingval = intval($rankrow['rankval'] + 1);
}

?>
<style>
.required{
	color:#f00;
}

.rate_widget {
	overflow:   visible;
	position:   relative;
	width:      100%;;
	height:     32px;
}
.ratings_stars {
	background: url(<?php echo base_url('assets/images/star_empty.png');?>) no-repeat;
	float:      left;
	height:     28px;
	padding:    2px;
	width:      32px;
	cursor:pointer;
}

.ratings_over {
	background: url(<?php echo base_url('assets/images/star_highlight.png');?>) no-repeat;
}


</style>
<script src="<?php echo base_url()?>assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ratings_stars').click(function(){
			  $(this).prevAll().andSelf().addClass('ratings_over');
			  var thisval = $(this).attr('title');
			   $('#ratval').val(thisval);
			   $(this).nextAll().removeClass('ratings_over');
		});
    });
	
</script>

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>actor Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/actor_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>actor List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">First Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="firstname" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='First Name' value="<?php echo $firstname; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='First Name'">
                                             	<?php echo form_error('firstname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Last Name</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="lastname" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Last Name' value="<?php echo $lastname; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Last Name'">
                                                <?php echo form_error('lastname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Email</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="email" name="email" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Email' value="<?php echo $email; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Email'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Mobile</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="mobile" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Mobile' value="<?php echo $mobile; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Mobile'">
                                           	 </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Profile</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="profile" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $profile; ?></textarea>
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Biography</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="about_details" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $about_details; ?></textarea>
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="photo">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Banner Photo</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="bannr_photo">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Facebook</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="facebook" class="form-control col-md-7 col-xs-12" value="<?php echo $facebook; ?>">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Twitter</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="twitter" class="form-control col-md-7 col-xs-12" value="<?php echo $twitter; ?>">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Google+</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="googleplus" class="form-control col-md-7 col-xs-12" value="<?php echo $googleplus; ?>">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Linked In</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="linkedin" class="form-control col-md-7 col-xs-12" value="<?php echo $linkedin; ?>">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Ranking</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="number" name="ranking" class="form-control" style="width:20%;" value="<?php echo $rankingval;?>">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8">
                                                    <div class="col-sm-3"><label class="control-label">Your Rating</label></div>
                                                    <div class="col-sm-9">
                                                        <div class='movie_choice'>
                                                            <div id="r1" class="rate_widget">
                                                                <div class="ratings_stars" title="1"></div>
                                                                <div class="ratings_stars" title="2"></div>
                                                                <div class="ratings_stars" title="3"></div>
                                                                <div class="ratings_stars" title="4"></div>
                                                                <div class="ratings_stars" title="5"></div>
                                                                <input type="hidden" id="ratval" name="ratingVal" value="<?php echo $ratingVal;?>" />
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                            <input type="hidden" name="stillImg" value="<?php echo $photo; ?>">
                                            <input type="hidden" name="stillImgB" value="<?php echo $bannr_photo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
