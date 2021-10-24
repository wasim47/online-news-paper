<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                <div class="col-sm-12 col-md-9">
                                    <div class="title_area">
                                        <a href="#"><?php echo $categoryName;?></a>
                                    </div>
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
                          	  	<div class="col-sm-12 col-md-9">
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
                          	  	<div class="col-sm-12 col-md-9">
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">বর্তমান টপ খেলোয়াড়</a></div>
                                    	<div class="col-sm-offset-2 userinfo_area" style="text-align:center">
                                        
                                       		<div style="text-align:center; width:100%; margin:auto;">
                                                <div class="playerinfo"> 
                                                   <a href="<?php echo base_url('players/details/?i='.base64_encode($fplr['user_id']));?>"> 
                                                   <img src="<?php echo base_url('asset/uploads/players/'.$fplr['photo']);?>" 
                                                alt="<?php echo $fplr['firstname'].' '.$fplr['lastname'];?>" 
                                                    title="<?php echo $fplr['firstname'].' '.$fplr['lastname'];?>"/></a>
                                                </div>
                                            </div>
                                            
                                            <div style="text-align:center; width:100%; margin:auto;float:left;">
												<div style="text-align:center; width:25%; margin:auto;">
												<?php foreach($splr->result() as $play){ ?>
                                               	<div style="text-align:center; width:50%; margin:1% auto; float:left;">
												<div class="playerinfo"> 
                                                    <a href="<?php echo base_url('players/details/?i='.base64_encode($play->user_id));?>">
                                                    <img src="<?php echo base_url('asset/uploads/players/'.$play->photo);?>" 
                                                alt="<?php echo $play->firstname.' '.$play->lastname;?>" title="<?php echo $play->firstname.' '.$play->lastname;?>"/></a>
                                                </div>
                                                </div>
												<?php }	 ?>
                                            </div>
                                            </div>
                                            <div style="text-align:center; width:100%; margin:auto;float:left;">
                                            	<div style="text-align:center; width:50%; margin:auto;">
												<?php foreach($rplr->result() as $pt){ ?>
                                               		<div style="text-align:center; width:25%; margin:1% auto; float:left;">
                                                    	<div class="playerinfo">
															<a href="<?php echo base_url('players/details/?i='.base64_encode($pt->user_id));?>"><img src="<?php echo base_url('asset/uploads/players/'.$pt->photo);?>" 
                                                alt="<?php echo $pt->firstname.' '.$pt->lastname;?>" title="<?php echo $pt->firstname.' '.$pt->lastname;?>"/></a>
                                                		</div>
                                                    </div>
												<?php }	 ?>
                                            </div>
                                            </div>
                                            <div style="text-align:center; width:100%; margin:auto;float:left;">
                                          	  <div style="text-align:center; width:75%; margin:auto;">
												<?php foreach($fourthdRowNews->result() as $pt1){ ?>
                                               	<div style="text-align:center; width:16.5%; margin:1% auto; float:left;">
													<div class="playerinfo">
															<a href="<?php echo base_url('players/details/?i='.base64_encode($pt1->user_id));?>"><img src="<?php echo base_url('asset/uploads/players/'.$pt1->photo);?>" 
                                                alt="<?php echo $pt1->firstname.' '.$pt1->lastname;?>" title="<?php echo $pt1->firstname.' '.$pt1->lastname;?>"/></a>
                                                		</div>
                                                </div>
												<?php }	 ?>
                                            </div>
                                            </div>
                                            <div style="text-align:center; width:100%; margin:auto;float:left;">
                                          	  <div style="text-align:center; width:100%; margin:auto;">
												<?php foreach($fifthRowNews->result() as $pt2){ ?>
                                               	<div style="text-align:center; width:14%; margin:auto; float:left;">
													<div class="playerinfo">
															<a href="<?php echo base_url('players/details/?i='.base64_encode($pt2->user_id));?>"><img src="<?php echo base_url('asset/uploads/players/'.$pt2->photo);?>" 
                                                alt="<?php echo $pt2->firstname.' '.$pt2->lastname;?>" title="<?php echo $pt2->firstname.' '.$pt2->lastname;?>"/></a>
                                                		</div>
                                                </div>
												<?php }	 ?>
                                            </div>
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
       

