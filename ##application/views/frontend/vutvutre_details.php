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
                                    <div class="col-sm-8"><h2 style="font-family:Arial, Helvetica, sans-serif"><?php echo $pHeadline;?></h2></div>
                                    <div class="col-sm-4 author">
									
                                    
                                    </div>
                                   
										<?php
										if(isset($pImage) && $pImage!=""){
										?>
										 <div style="width:100%; height:auto; float:left; margin-bottom:20px; "><?php echo $pImage; ?></div>
										<?php 
										}
										?>
                                   		<div class="col-sm-12"><?php echo $pSubHeadline;?></div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12 pull-left" style="margin-top:20px;">
										<?php if($pAuthor!="") echo '<span class="fa fa-user" style="color:#ec2028; margin-left:10px;"></span> '.$pAuthor;?>
                                    	</div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12 pull-right">
                                       		 <div class="sociallink"> 
                                            <span class='st_facebook_large' displayText='Facebook'></span>
                                            <span class='st_twitter_large' displayText='Tweet'></span>
                                            <span class='st_googleplus_large' displayText='Google +'></span>
                                            <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                            <span class='st_email_large' displayText='Email'></span>
                                            <span class='st_print_large' displayText='Print'></span>
                                            <script type="text/javascript">var switchTo5x=true;</script>
                                            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                            <script type="text/javascript">
											stLight.options({publisher: "be113743-6374-48f9-87f3-541903975872", doNotHash: false, doNotCopy: false, hashAddressBar: false});
                                            </script>
                                        </div>
                               			 </div>
                                
                                        <p>
										<?php 
										if($pageDetails!=""){
											$finaldetails = preg_replace('/font-family.+?;/', "", $pageDetails);
											echo $finaldetails;
										}
										?>
                                        </p>
                                        
                                       
                                        </div>
                                         
                                    </div>
                                 
                                
                            
                                 <?php include('vut_comment.php');?>
                                 
                                 
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