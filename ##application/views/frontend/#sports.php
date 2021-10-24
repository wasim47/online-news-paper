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
                                 <div class="add_space" style="margin-top:20px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg" style="margin-bottom:22px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg">
                                    </div>
                                    

                                </div>
                           
                           
                           <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    
                                    
                                    <!--Health Tips-->
                                    <div class="entertainment_section">
                                            <?php 
												if($newsgallery->num_rows() > 0){
												$countE = 0;
												foreach($newsgallery->result() as $ngallery)
												{
												 $title=$ngallery->headline;
												 $slug=$ngallery->slug;
												 $image=$ngallery->image;
												
												 
												 $countE++;
												 
												?>
                                           		 <div class="col-sm-12 col-md-3">
                                                    <div class="big_img">
                                                        <a href="<?php echo base_url("news/details/".$slug);?>">
                                                        <img src="<?php echo base_url('asset/uploads/news/'.$image);?>" alt="<?php echo $title;?>" 
                                                        title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                                        <div class="big_caption">
                                                            <a href="<?php echo base_url("news/details/".$slug);?>"><?php echo $title;?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                             <?php 
													}
												  } 
											   ?>

                                        <?php if($paginationdata){?>
										<div class="row">
                                        	<div id="paginationData" class="tsc_pagination" style="text-align:center">
                                            	<ul class="pagination">
                                                <li><a href="#"><?php echo $paginationdata; ?></a></li>
                                            </ul>
                                           </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    
                                    
									
                                 
                                    
                                </div>
                            </div>
                       		
                              <div class="row">
                          	  	<div class="col-sm-12 col-md-12">
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">আপকামিং ম্যাচ</a></div>
                                    <div class="content-slider">
                                        <ul id="upcomming">
                                    <?php 
                                        if($upcommingsports->num_rows() > 0){
                                        foreach($upcommingsports->result() as $ngallery)
                                        {
                                         $sport_venue=$ngallery->sport_venue;
                                         $time=$ngallery->time;
                                         $team1=$ngallery->team1;
                                         $team2=$ngallery->team2;
                                        ?>
                                        <li>
                                        <div class="big_img">                             
                                             <div class="sports_cont_area">
                                                <h2><?php echo $team1.' <strong style="color:#f00">VS</strong> '.$team2;?></h2>
                                                <h3><?php echo $sport_venue;?></h3>
                                                <h3><?php echo 'Time: '.$time;?></h3>
                                            
                                             </div>
                                        </div>
                                        </li>
                                     <?php 
                                            }
                                          } 
                                       ?>
                                    </ul>
                                    </div>
                            
                            </div>
                            	
                           	  </div>
                         
                       		  <div class="row">
                          	  <div class="col-sm-12 col-md-9">
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">এ সপ্তাহের আলোচিত তারকা</a></div>
                                    <div class="content-slider">
                                        <ul id="commonslider">
                                    <?php 
                                        if($top_players->num_rows() > 0){
                                        foreach($top_players->result() as $ply)
                                        {
                                         $playersname=$ply->firstname.' '.$ply->lastname;
                                         $photo=$ply->photo;
                                         $user_id=$ply->user_id;
                                        ?>
                                        <li>
                                        <div class="starinfo">                             
                                            <a href="<?php echo base_url('players/details/?i='.base64_encode($user_id));?>">
                                         <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/players/'.$photo);?>" 
alt="<?php echo $playersname;?>" 
                                                title="<?php echo $playersname;?>"/></div>
                                                <h2><?php echo $playersname;?></h2>
                                        </div>
                                        </li>
                                     <?php 
                                            }
                                          } 
                                       ?>
                                    </ul>
                                    </div>
                            
                            </div>
                              <div class="col-sm-12 col-md-3">
                                
                                 <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">আজকের খেলা</a></div>
                                     <div class="userinfo_right" style="height:170px; overflow:hidden">
                                     	<ul>
                                        <marquee scrollamount="1" scrolldelay="1" dir="ltr" direction="up" behavior="scroll" style="width:100%; height:170px">
                                        	 <?php 
											if($todayamtch->num_rows() > 0){
											foreach($todayamtch->result() as $ngallery)
											{
											 $sport_venue=$ngallery->sport_venue;
											 $time=$ngallery->time;
											 $team1=$ngallery->team1;
											 $team2=$ngallery->team2;
											?>
											<li>
											<div class="big_img">                             
												 <div class="sports_cont_area">
													<h2><?php echo $team1.' <strong style="color:#f00">VS</strong> '.$team2;?></h2>
													<h3><?php echo $sport_venue;?></h3>
													<h3><?php echo 'Time: '.$time;?></h3>
												
												 </div>
											</div>
											</li>
										 <?php 
												}
											  } 
										   ?>
                                           </marquee>
                                        </ul>                                                                            
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
       