<?php include('header.php');?>
<script>
$(document).ready(function(){
	$("#winnertab").click(function(){
		$("#nominatedtab").removeClass('active');
		$("#winnertab").addClass('active');
		
		$("#winner_content").show();
		$("#nominated_content").hide();
	});
	$("#nominatedtab").click(function(){
		$("#winnertab").removeClass('active');
		$("#nominatedtab").addClass('active');
		
		$("#winner_content").hide();
		$("#nominated_content").show();
	});
});
</script>
<div class="row">
    <div class="container">
        <div class="actormiddle">
        	<div class="col-sm-9" style="margin:0; padding:0">
            	<div class="middlecon">
                	
                    <div class="col-sm-12">
                    	<div class="awardarea">
                            <div class="col-sm-12">
                                <a href="javascript:void()" class="active" id="winnertab">Winner</a>
                                <a href="javascript:void()" id="nominatedtab">Nominated</a>
                            </div>
                        </div>
                         
                         
                         <div class="awardarea">
                            <div class="col-sm-12">
                                <div id="winner_content">
                                	<ul>
                                	<?php 
									foreach($awards_winner->result() as $awinner){
										$awardtitle=$awinner->award;
										$awardfor=$awinner->awardfor;
									  ?> 
                                          <li>
                                            <h3 itemprop="headline" class="title name">
                                                <span><?php echo $awardtitle;?></span>
                                                
                                                <span class="icon-right-open"></span></h3>
                                            <p class="movie-name"><?php echo $awardfor;?></p>
                                        </li>
								   <?php
                                        }
                                    ?>
                                    </ul>
                                </div>
                                <div  id="nominated_content" style="display:none">
                                	<ul>
                                	<?php 
									foreach($awards_nominated->result() as $anomin){
										$awardtitlen=$anomin->award;
										$awardforn=$anomin->awardfor;
									  ?> 
                                          <li>
                                            <h3 itemprop="headline" class="title name">
                                                <span><?php echo $awardtitlen;?></span>
                                                
                                                <span class="icon-right-open"></span></h3>
                                            <p class="movie-name"><?php echo $awardforn;?></p>
                                        </li>
								   <?php
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
						 
						
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            	<div class="sidebar">
                	<div class="socialmedia">
                    	<ul>
                        	<li><a href="<?php echo $ac_det['facebook'];?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $ac_det['twitter'];?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $ac_det['googleplus'];?>" target="_blank" class="googleplus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $ac_det['linkedin'];?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>