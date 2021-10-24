 <link href="<?php echo base_url();?>assets/video_lightbox/style.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/video_lightbox/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/video_lightbox/lity.css" rel="stylesheet"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                        	
                        
                            <div class="row">
                           	<div class="title_area" style="margin-left:40px;"><h2>ইউটিউব</h2></div>
                                <div class="col-sm-12 col-md-9">
                                   
                                    <div class="entertainment_section">
                                        <div class="row">
                                            <?php
                                            	foreach($toptwo_videos->result() as $tv){
													 $tvTitle=$tv->photo_album_name;
													 $tvurl=$tv->vedio_link;
													 $vCover=$tv->album_ima;
											?>
                                                    <div class="col-sm-12 col-md-6">
                                                <div class="big_img">
                                                   <a class="btn" href="https://www.youtube.com/watch?v=<?php echo $tvurl;?>" data-lity>
                                                    <img src="<?php echo base_url('asset/uploads/video_gallery/'.$vCover);?>" alt="<?php echo $tvTitle;?>" 
                                                    title="<?php echo $tvTitle;?>" style="width:100%; height:auto" /></a>
                                                    <div class="big_caption">
                                                        <a href="#"><?php echo $tvTitle;?></a>
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
                                 <div class="add_space">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg" style="margin-bottom:20px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg">
                                    </div>
                                    

                                </div>
                             </div>
                           <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    
                                    
                                    <!--Health Tips-->
                                    <div class="entertainment_section">
                                        <div class="">
                                            <?php 
												if($videogallery->num_rows() > 0){
												$count = 0;
											   foreach($videogallery->result() as $gallery){
														$vedioTitle=$gallery->photo_album_name;
														$url=$gallery->vedio_link;
														$album_ima=$gallery->album_ima;
												?>
                                           		 <div class="col-sm-12 col-md-3">
                                                <div class="big_img" style="margin:15px 0px">
                                                    <a class="btn" href="https://www.youtube.com/watch?v=<?php echo $url;?>" data-lity>
                                                    <img src="<?php echo base_url();?>asset/uploads/video_gallery/<?php echo $album_ima;?>" 
                                                    alt="<?php echo $vedioTitle;?>" title="<?php echo $vedioTitle;?>" style="width:100%; height:auto" /></a>
                                                    <div class="big_caption" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; text-align:center"><?php echo $vedioTitle;?></div>
                                                </div>
                                            </div>
                                             <?php 
													}
												  } 
											   ?>
                                        </div>
                                        <?php if($paginationdata){?>
										<div class="row">
                                        	<div id="paginationData" class="tsc_pagination">
                                            	<ul class="pagination">
                                                <li><a href="#"><?php echo $paginationdata; ?></a></li>
                                            </ul>
                                           </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    
                                    
									
                                 
                                    
                                </div>
                            </div>
							
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>
       
       
<script src="<?php echo base_url();?>assets/video_lightbox/jquery.js"></script>
<script src="<?php echo base_url();?>assets/video_lightbox/lity.js"></script>