<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                <div class="col-sm-12 col-md-9">
                                    <!--<div class="title_area">
                                        <a href="#"><?php echo $categoryName;?></a>
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
                         
                         
                           <!-- <div class="row">
                            <div class="col-sm-12 col-md-12">
                            <div class="userinfo_area">
                          	  <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">Movies</a></div>
                              
                            </div> 
                            
                            
                            
                           
    
    
            <!--<ul id="content-slider" class="content-slider">
                <li>
                    <h3>1</h3>
                </li>
                <li>
                    <h3>2</h3>
                </li>
                <li>
                    <h3>3</h3>
                </li>
                <li>
                    <h3>4</h3>
                </li>
                <li>
                    <h3>5</h3>
                </li>
                <li>
                    <h3>6</h3>
                </li>
            </ul>
                            </div>
                           </div>-->
                             
                             <div class="row">
                             <div class="col-sm-12 col-md-12">
                             	  <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">Movies Review</a></div>
                                  <div class="content-slider">
                            	  	<ul id="commonslider">
							 	<?php 
                                    if($moviesgallery->num_rows() > 0){
                                    foreach($moviesgallery->result() as $ngallery)
                                    {
                                     $title=$ngallery->mv_name;
                                     $mv_director=$ngallery->mv_director;
                                     $slug=$ngallery->slug;
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
                                     } 
                                   ?>
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
       
