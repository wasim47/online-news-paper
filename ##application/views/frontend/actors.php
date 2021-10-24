<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' id='bh-icons-css'  href='<?php echo base_url();?>assets/actors/css/bh.css' type='text/css' media='all' />
<link rel='stylesheet' id='bh-style-css'  href='<?php echo base_url();?>assets/actors/css/amp.css' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/underscore.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/backbone.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/main.js'></script>
<script>
$(document).ready(function(){
	$("#tw").click(function(){
		$("#this-week").show(200);
		$("#last-two-week").hide(200);
		$("#last-three-week").hide(200);
		$("#this-month").hide(200);
		$("#all-time-actor").hide(200);
		
		$("#tw").addClass('current');
		$("#l2w").removeClass('current');
		$("#l3w").removeClass('current');
		$("#tm").removeClass('current');
		$("#ata").removeClass('current');
	});
	$("#l2w").click(function(){
		$("#this-week").hide(200);
		$("#last-two-week").show(200);
		$("#last-three-week").hide(200);
		$("#this-month").hide(200);
		$("#all-time-actor").hide(200);
		
		$("#tw").removeClass('current');
		$("#l2w").addClass('current');
		$("#l3w").removeClass('current');
		$("#tm").removeClass('current');
		$("#ata").removeClass('current');
		
	});
	$("#l3w").click(function(){
		$("#this-week").hide(200);
		$("#last-two-week").hide(200);
		$("#last-three-week").show(200);
		$("#this-month").hide(200);
		$("#all-time-actor").hide(200);
		
		$("#tw").removeClass('current');
		$("#l2w").removeClass('current');
		$("#l3w").addClass('current');
		$("#tm").removeClass('current');
		$("#ata").removeClass('current');
	});
	$("#tm").click(function(){
		$("#this-week").hide(200);
		$("#last-two-week").hide(200);
		$("#last-three-week").hide(200);
		$("#this-month").show(200);
		$("#all-time-actor").hide(200);
		
		$("#tw").removeClass('current');
		$("#l2w").removeClass('current');
		$("#l3w").removeClass('current');
		$("#tm").addClass('current');
		$("#ata").removeClass('current');
	});
	$("#ata").click(function(){
		$("#this-week").hide(200);
		$("#last-two-week").hide(200);
		$("#last-three-week").hide(200);
		$("#this-month").hide(200);
		$("#all-time-actor").show(200);
		
		$("#tw").removeClass('current');
		$("#l2w").removeClass('current');
		$("#l3w").removeClass('current');
		$("#tm").removeClass('current');
		$("#ata").addClass('current');
	});

});
</script>
<div class="bh_overlay_wrapper hide" id="bh_overlay_wrapper"></div>
 <div id="bh-page-loader" class="bh-page-loader"></div>
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                        <div class="content_area" style="margin:0; padding-top:0;padding-bottom:0">
                       	   <div class="row" style="background:#fff;">
                        	
                            <div class="col-sm-10 col-md-10 col-md-offset-1  col-sm-offset-1">
                           		
                                	<header class="bh-section-header clearfix" style="margin-top:30px;">
                                                 <h2 style="margin:0; padding:0; font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi; font-size:40px;">জনপ্রিয় তারকা</h2>
                                                <a href="<?php echo base_url('actors/view_ranking');?>" title="All Rankings" style="float:right" class="btn btn-danger">
                                                    View All Rankings				</a>
                                            </header>	 
                                              
                            	<div style=" width:90%; height:auto; margin:5% 5% 0 5%;">
                                    <div id="bh-popular-celebs-section" class="bh-popular-celebs-section">
                                    <div class="row">
                                        <img class="bh-celebs-circle-bg" src="<?php echo base_url();?>assets/actors/img/bg-circle.png" alt="Circle Background" width="1041" height="577">
                                        <main id="bh-celeb-landing" class="bh-celeb-landing" role="main">
                                        <div id="bh-popular-celebs" class="bh-popular-celebs">
                                            
                                        
                                        
                                          <div class="bh-popular-celeb-icons">
                                                  
                                                  <div id="this-week">  
                                                    <?php foreach($actorslist->result() as $act):?>
                                                    <figure class="bh-celeb-icon bh-box bh-celect-icon-<?php echo $act->ranking;?>">
                                                        <a  class="bh-thumb-link" title="<?php echo $act->firstname.' '.$act->lastname;?>">
                                                        <img src="<?php echo base_url();?>assets/actors/img/1x1.trans.gif" width="322" height="322" 
                                                        srcset="<?php echo base_url('asset/uploads/actor/'.$act->photo);?>" 
                                                        title="<?php echo $act->firstname.' '.$act->lastname;?>" alt="<?php echo $act->firstname.' '.$act->lastname;?>"></a>
                                                        <div class="celeb-meta">
                                                            <h4 itemprop="name" class="bh-celeb-icon-title name" data-pjax><?php echo $act->firstname.' '.$act->lastname;?></h4>
                                                            <div class="bh-buttons">
                                                                <a data-pjax href="<?php echo base_url('actors/details/?i='.base64_encode($act->user_id));?>" title="Details" class="btn btn-danger" style="color:#fff;">Details</a>
                                                                <!--<a data-pjax href="#" title="Videos" class="button-red bh-videos">Videos</a>
                                                                <a data-pjax href="#" title="Photos" class="button-red bh-pics">Pics</a>-->
                                                            </div>
                                                        </div>
                                                        <a title="Close" class="bh-close icon-cancel b-close"></a>
                                                    </figure>
                                                    <?php endforeach;?>
                                                  </div> 
                                                  
                                                  <div id="last-two-week" style="display:none">  
                                                   Last Two Week
                                                  </div>
                                                  <div id="last-three-week" style="display:none">  
                                                   Last Three Week
                                                  </div>
                                                  <div id="this-month" style="display:none">  
                                                   This Month
                                                  </div>
                                                  <div id="all-time-actor" style="display:none">  
                                                  All Time Actor
                                                  </div>
                                                
                                            </div>
                                        </div>
                                        </main>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
    
                                    
                                    
                                    <div class="bh-popular-celebs-tabs-row">
                                        <div class="row">
                                            <ul class="bh-popular-tabs no-bullet">
                                                <li class="current" title="This Week" id="tw">This Week</li>
                                                <li title="Last 2 Weeks" id="l2w">Last 2 Weeks</li>
                                                <li title="Past 3 Weeks" id="l3w">Past 3 Weeks</li>
                                                <li title="This Month" id="tm">This Month</li>
                                                <li title="All Time Actor" id="ata">All Time Actor</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>                           
                                    <div id="bh-popup" class="bh-popup">
                                        <div class="bh-inner"></div>
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