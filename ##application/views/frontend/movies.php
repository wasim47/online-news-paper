<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' id='bh-icons-css'  href='<?php echo base_url();?>assets/actors/css/bh.css' type='text/css' media='all' />
<link rel='stylesheet' id='bh-style-css'  href='<?php echo base_url();?>assets/actors/css/amp.css' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/underscore.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/backbone.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/actors/js/main.js'></script>
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                
								
                           
                           
                           <div class="row" style="width:96%; margin:2%">
                                <div class="col-sm-12 col-md-12">
                                   
                                   
                                    <div class="row">
                                     <div class="col-sm-12 col-md-12">
                                          <div class="title_area" style="margin-left:20px"><a href="javascript:void()">Theater Movies</a></div>
                                          <div class="content-slider">
                                            <ul id="theatreatres">
                                        <?php 
                                           if($theatre_list->num_rows() > 0){
                                           foreach($theatre_list->result() as $ngallery)
												{
												 $title=$ngallery->mv_name;
												 $mv_director=$ngallery->mv_director;
												 $slug=$ngallery->slug;
												 $category=$ngallery->category;
												 $image=$ngallery->mv_cover_photo;
                                            ?>
                                            <li>
                                                 <div class="big_img">
                                        <a href="<?php echo base_url("movies/details/".$slug);?>">
                                        <img src="<?php echo base_url('asset/uploads/movies/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                        <div class="big_caption">
                                            <a href="<?php echo base_url("movies/details/".$slug);?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
                                            <?php echo $title;?><br />
                                            <span style="font-size:11px;"><?php echo "Directed by ".$mv_director;?></span>
                                            
                                            </a>
                                        </div>
                                    </div>
                                             </li>
                                         <?php 
                                                }
												echo '<div style="width:100%; float:right; text-align:right; margin-right:25px;"> 
											<a href="'.base_url('movies/index/'.$category).'">View All</a> </div>';	
                                             } 
                                           ?>
                                    </ul>
                                          </div>
                                         
                                    </div>
                                    </div>
                            
                          		    <div class="row">
                                     <div class="col-sm-12 col-md-12">
                                          <div class="title_area" style="margin-left:20px"><a href="javascript:void()">Latest Released News</a></div>
                                          <div class="content-slider">
                                            <ul id="recentrealease">
                                        <?php 
                                           if($recentrel_list->num_rows() > 0){
                                           foreach($recentrel_list->result() as $ngallery)
												{
												 $title=$ngallery->mv_name;
												 $mv_director=$ngallery->mv_director;
												 $slug=$ngallery->slug;
												 $category=$ngallery->category;
												 $image=$ngallery->mv_cover_photo;
                                            ?>
                                            <li>
                                                 <div class="big_img">
                                        <a href="<?php echo base_url("movies/details/".$slug);?>">
                                        <img src="<?php echo base_url('asset/uploads/movies/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                        <div class="big_caption">
                                            <a href="<?php echo base_url("movies/details/".$slug);?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
                                            <?php echo $title;?><br />
                                            <span style="font-size:11px;"><?php echo "Directed by ".$mv_director;?></span>
                                            
                                            </a>
                                        </div>
                                    </div>
                                             </li>
                                         <?php 
                                                }
												echo '<div style="width:100%; float:right; text-align:right; margin-right:25px;"> 
											<a href="'.base_url('movies/index/'.$category).'">View All</a> </div>';	
                                             } 
                                           ?>
                                    </ul>
                                          </div>
                                         
                                    </div>
                                    </div>
                                    <div class="row">
                                     <div class="col-sm-12 col-md-12">
                                          <div class="title_area" style="margin-left:20px"><a href="javascript:void()">Upcoming Movies</a></div>
                                          <div class="content-slider">
                                            <ul id="upcomming">
                                        <?php 
                                           if($upcomming_list->num_rows() > 0){
                                           foreach($upcomming_list->result() as $ngallery)
												{
												 $title=$ngallery->mv_name;
												 $mv_director=$ngallery->mv_director;
												 $slug=$ngallery->slug;
												 $category=$ngallery->category;
												 $image=$ngallery->mv_cover_photo;
                                            ?>
                                            <li>
                                                 <div class="big_img">
                                        <a href="<?php echo base_url("movies/details/".$slug);?>">
                                        <img src="<?php echo base_url('asset/uploads/movies/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                        <div class="big_caption">
                                            <a href="<?php echo base_url("movies/details/".$slug);?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
                                            <?php echo $title;?><br />
                                            <span style="font-size:11px;"><?php echo "Directed by ".$mv_director;?></span>
                                            
                                            </a>
                                        </div>
                                    </div>
                                             </li>
                                         <?php 
                                                }
												echo '<div style="width:100%; float:right; text-align:right; margin-right:25px;"> 
											<a href="'.base_url('movies/index/'.$category).'">View All</a> </div>';	
                                             } 
                                           ?>
                                    </ul>
                                          </div>
                                         
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                     <div class="col-sm-12 col-md-9">
                                          <div class="title_area" style="margin-left:20px"><a href="javascript:void()">Popular Movies</a></div>
                                          <div class="content-slider">
                                            <ul id="popularmovies">
                                        <?php 
                                           if($popularnews->num_rows() > 0){
                                           foreach($popularnews->result() as $pop)
												{
												 $title=$pop->mv_name;
												 $mv_director=$pop->mv_director;
												 $slug=$pop->slug;
												 $category=$pop->category;
												 $image=$pop->mv_cover_photo;
                                            ?>
                                            <li>
                                                 <div class="big_img">
                                        <a href="<?php echo base_url("movies/details/".$slug);?>">
                                        <img src="<?php echo base_url('asset/uploads/movies/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                        <div class="big_caption">
                                            <a href="<?php echo base_url("movies/details/".$slug);?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
                                            <?php echo $title;?><br />
                                            <span style="font-size:11px;"><?php echo "Directed by ".$mv_director;?></span>
                                            
                                            </a>
                                        </div>
                                    </div>
                                             </li>
                                         <?php 
                                                }
												echo '<div style="width:100%; float:right; text-align:right; margin-right:25px;"> 
											<a href="'.base_url('movies/index/'.$category).'">View All</a> </div>';	
                                             } 
                                           ?>
                                    </ul>
                                          </div>
                                         
                                    </div>
                                     <div class="col-sm-12 col-md-3">
                                 
                                    <div class="userinfo_right">
                                        <h3>  <div  style="width:70%; float:left"> Movie Review </div>                                        
                                        <div style="width:30%; float:right">
                                        
                                        
                                         <?php
                                            if($this->session->userdata('userAccessMail') && $this->session->userdata('userAccessMail')!=""){
                                            ?>
                                            <a href="<?php echo base_url('user/logout');?>" title="Logout" class="loginbtn">
                                            <span class="fa fa-sign-out" style="font-size:15px; margin-bottom:5px;"></span></a>
                                             
                                             <a href="javascript:void()" data-toggle="modal" onclick="openModal('movie')"
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
                                        <?php foreach($featurecontent->result() as $ucon):?>
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
                                    
                                    
									
                                 
                                    
                            </div>
                            
                            
                            <?php /*?><div class="row" style="background:#fff;">
                        	
                            <div class="col-sm-10 col-md-10 col-md-offset-1  col-sm-offset-1">
                           		
                                	<header class="bh-section-header clearfix" style="margin-top:30px;">
                                                 <h2 style="margin:0; padding:0; font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi; font-size:40px;">জনপ্রিয় মুভি</h2>
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
                                                        <a  class="bh-thumb-link" title="<?php echo $act->mv_name;?>">
                                                        <img src="<?php echo base_url();?>assets/actors/img/1x1.trans.gif" width="322" height="322" 
                                                        srcset="<?php echo base_url('asset/uploads/movies/'.$act->mv_cover_photo);?>" 
                                                        title="<?php echo $act->mv_name;?>" alt="<?php echo $act->mv_name;?>"></a>
                                                        <div class="celeb-meta">
                                                            <h4 itemprop="name" class="bh-celeb-icon-title name" data-pjax><?php echo $act->mv_name;?></h4>
                                                            <div class="bh-buttons">
                                                                <a data-pjax href="#" title="Details" class="btn btn-danger" style="color:#fff;">Details</a>
                                                            </div>
                                                        </div>
                                                        <a title="Close" class="bh-close icon-cancel b-close"></a>
                                                    </figure>
                                                    <?php endforeach;?>
                                                  </div> 
                                                  
                                                 
                                                
                                            </div>
                                        </div>
                                        </main>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
    
                                    
                                    
                                    
                                </div>                           
                                    <div id="bh-popup" class="bh-popup">
                                        <div class="bh-inner"></div>
                                    </div>
                       			 </div>
                                
                            </div>
                        </div><?php */?>
                        
                            <div class="row">
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>