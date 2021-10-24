<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                <div class="col-sm-12 col-md-9">
                                    <!-- <div class="title_area">
                                        <a href="#"><?php //echo $categoryName;?></a>
                                    </div>-->
                                    <div class="entertainment_section">
                                        <div class="row">
                                            <?php
                                            	foreach($category_topnews->result() as $nat){
													 $Ttitle=$nat->headline;
													 $Tslug=$nat->slug;
													 $Timage=$nat->image;
											?>
                                                    <div class="col-sm-12 col-md-6">
                                                <div class="big_img">
                                                   <a href="<?php echo base_url("news/details/".$Tslug);?>">
                                                    <img src="<?php echo base_url('asset/uploads/news/'.$Timage);?>" alt="<?php echo $Ttitle;?>" 
                                                    title="<?php echo $Ttitle;?>" style="width:100%; height:auto" /></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo base_url("news/details/".$Tslug);?>"><?php echo $Ttitle;?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
												}
											?>
                                            
                                            
                                        </div>
                                    </div>
                                    
									
                                 
                                    
                                </div>
								<div class="col-sm-12 col-md-3">
                                 <div class="add_space" style="margin-top:60px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg" style="margin-bottom:20px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg">
                                    </div>
                                    

                                </div>
                           
                           
                           <div class="row">
                                <div class="col-sm-12 col-md-12">
                            
                                    <div class="entertainment_section">
                                            <?php 
												if($newsgallery->num_rows() > 0){
												foreach($newsgallery->result() as $ngallery)
												{
												 $title=$ngallery->headline;
												 $slug=$ngallery->slug;
												 $image=$ngallery->image;
												?>
                                           		 <div class="col-sm-12 col-md-3" style="min-height:250px;">
                                                <div class="big_img">
                                                    <a href="<?php echo base_url("news/details/".$slug);?>">
                                                    <img src="<?php echo base_url('asset/uploads/news/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo base_url("news/details/".$slug);?>"><?php echo $title;?></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <?php 
													}
												  } 
											   ?>

                                       
                                    </div>
                                    
                                </div>
                            </div>
                            
                             <?php if($paginationdata){?>
										<div class="row">
                                        	<div id="paginationData" class="tsc_pagination" style="text-align:center">
                                            	<ul class="pagination">
                                                <li><a href="#"><?php echo $paginationdata; ?></a></li>
                                            </ul>
                                           </div>
                                        </div>
                                        <?php } ?>
                            
                          <div class="row">
                           <div class="col-sm-12">
                           
                                <div class="col-sm-12 col-md-9">
                                    <div class="userinfo_area">
                                    <div class="title_area">
                                                <a href="#">আপনার ডাক্তার</a>
                                            </div>
                                            <?php 
												if($healthtips_list->num_rows() > 0){
												foreach($healthtips_list->result() as $doc)
												{
												 $user_id=$doc->bid;
												 $name=$doc->headline;
												 $photo=$doc->photo;
												?>
                                           		 <div class="col-sm-12 col-md-3 thumnailUser">
                                                    <a href="<?php echo base_url('index/details/healthtips/'.$user_id);?>">
                                                        <img src="<?php echo base_url('asset/uploads/healthtips/'.$photo);?>" alt="<?php echo $name;?>" 
                                                        title="<?php echo $name;?>" />
                                                        <div class="userinfo"><?php echo $name;?></div>
                                                    </a>
                                            </div>
                                             <?php 
													}
												  } 
											   ?>
                                    
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-3">
                                
                                 
                                 
                                 
                                 <div class="userinfo_right">
                                 	<h3>
                                    
                                    <div  style="width:80%; float:left"> আপনার মতামত </div>
                                    
                                    <div style="width:20%; float:right">
                                    
                                    
                                     <?php
										if($this->session->userdata('userAccessMail') && $this->session->userdata('userAccessMail')!=""){
										?>
										<a href="<?php echo base_url('user/logout');?>" title="Logout" class="loginbtn">
									 	<span class="fa fa-sign-out" style="font-size:15px; margin-bottom:5px;"></span></a>
                                         <a href="javascript:void()" data-toggle="modal" onclick="openModal('comment')"
                                          title="Upload" class="loginbtn"><i class="fa fa-upload"></i></a>
									 
										<?php
										}
										else{
										?>
										 <a href="javascript:void()" data-toggle="modal" data-target="#userLogin"  title="Login" class="loginbtn">
										<i class="fa fa-sign-in"></i></a>
										 <?php
										 }
										 ?> 
                                    
                                    </div>
                                    </h3>
                                    
                                    <?php foreach($usercontent->result() as $ucon):?>
                                    
                                    <div class="col-sm-12" style="margin:0; padding:0">
                                    	<div class="commetn_list">
                                    	<div class="col-sm-2 pull-left" style="margin:0; padding:0">
                                        <img src="<?php echo base_url('asset/uploads/user/'.$ucon->content_type.'/'.$ucon->image);?>" style="width:40px; height:auto;" /></div>
                                        <div class="col-sm-10">
                                        	<a href="<?php echo base_url('index/content_details/'.$ucon->id);?>" style="color:#1a672e"><?php echo $ucon->headline;?></a>
                                        </div>
                                        </div>
                                    </div>
                                  <?php endforeach;?>
                                    
                                    
                                    
                                    
                                    
                                 </div>
                                 
                                 
                                 </div>
							</div>
                            </div>
                            <div class="row">
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>
       
       
       
       