<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                            <div class="row">
                                <!--LEFT CONTENT-->
                                <div class="col-sm-12 col-md-9">
                                 <div class="newsDetails">
                                 	<div class="row">
                                    <h2><?php echo $cont_details['headline'];?></h2>
                                   
                                    	<?php 
										if(isset($cont_details['image']) && $cont_details['image']!=""){
										?>	
                                        <div style="width:100%; height:auto; float:left">	
                                        <img src="<?php echo base_url();?>asset/uploads/user/<?php echo $cont_details['content_type'].'/'.$cont_details['image'];?>" 
                                        title="<?php echo $cont_details['headline'];?>" alt="<?php echo $cont_details['headline'];?>"/></div>
                                        
                                        <div class="news_image_title"><?php echo $cont_details['headline'];?></div>
										<?php
                                        }
                                        ?>
                                        <p>
										<?php 
										$finaldetails = preg_replace('/font-family.+?;/', "", $cont_details['message']);
										echo $finaldetails;?>
                                        
                                        </p>
                                        </div>
                                    
                                 </div>
                                 
                                
                            
                                 <div class="commentare">
                                 	<div id="fb-root"></div>
										<script>(function(d, s, id) {
                                          var js, fjs = d.getElementsByTagName(s)[0];
                                          if (d.getElementById(id)) return;
                                          js = d.createElement(s); js.id = id;
                                          js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1860109910876505";
                                          fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>
                                        
                                        <div class="fb-comments" data-href="https://www.facebook.com/risingnews24/" data-width="100%" data-numposts="5"></div>
                                 </div>
                                </div>
                                
                               
                               
                               
                               
                                <div class="col-sm-12 col-md-3">
                                    <div class="live_tv">
                                        <img src="<?php echo base_url();?>assets/images/live.jpg" class="img-responsive" alt="live.jpg">
                                    </div>
                                    <div class="add_space">
                                        <img src="<?php echo base_url();?>assets/images/add.jpg" class="img-responsive" alt="add.jpg">
                                    </div>

                                    <div class="social">
                                        <a href="#"><span class="fa fa-facebook"></span>Facebook</a>
                                        <a href="#"><span class="fa fa-twitter"></span>Twitter</a>
                                    </div>
                                    
                                    <div class="add_space">
                                        <img src="<?php echo base_url();?>assets/images/add2.jpg" class="img-responsive" alt="add.jpg">
                                    </div>
                                </div>
                                
                                
                            </div>
						<?php include('video_bottom.php');?>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>