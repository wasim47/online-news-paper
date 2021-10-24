<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                
								
                           
                           
                           <div class="row" style="width:96%; margin:2%">
                                <div class="col-sm-12 col-md-12">
                                    
                                    
                                    <!--Health Tips-->
                                    
                                            <?php 
												if($moviesgallery->num_rows() > 0){
												foreach($moviesgallery->result() as $ngallery)
												{
												 $title=$ngallery->mv_name;
												 $mv_director=$ngallery->mv_director;
												 $slug=$ngallery->slug;
												 $image=$ngallery->mv_cover_photo;
												?>
                                           		 <div class="col-sm-12 col-md-3">
                                               		 <div class="big_img" style="margin:15px 10px;">
                                                    <a href="<?php echo base_url("movies/details/".$slug);?>">
                                                    <img src="<?php echo base_url('asset/uploads/movies/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width:100%; height:auto" /></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo base_url("movies/details/".$slug);?>" style="font-family:Arial, Helvetica, sans-serif">
														<?php echo $title;?><br />
                                                        <span style="font-size:13px;"><?php echo "Directed by ".$mv_director;?></span>
                                                        
                                                        </a>
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
                            
                            <div class="row">
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>