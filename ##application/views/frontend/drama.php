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
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">আপকামিং নাটক</a></div>
                                    <div class="content-slider">
                                        <ul id="upcomming">
                                    <?php 
                                        if($upcommingdrama->num_rows() > 0){
                                        foreach($upcommingdrama->result() as $ngallery)
                                        {
                                         $dr_name=$ngallery->dr_name;
                                         $slug=$ngallery->slug;
                                         $dr_cover_photo=$ngallery->dr_cover_photo;
                                        ?>
                                        <li>
                                            <div class="starinfo">                             
                                                <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/drama/'.$dr_cover_photo);?>" alt="<?php echo $dr_name;?>" 
                                                    title="<?php echo $dr_name;?>"/></div>
                                                    <h2><?php echo $dr_name;?></h2>
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
                          	  <div class="col-sm-12 col-md-12">
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">থিয়েটার</a></div>
                                    <div class="content-slider">
                                        <ul id="theatre_info">
                                    <?php 
                                        if($theatreinfo->num_rows() > 0){
                                        foreach($theatreinfo->result() as $ply)
                                        {
                                         $t_name=$ply->t_name;
                                         $photo=$ply->coverphoto;
                                        ?>
                                        <li>
                                        <div class="starinfo">                             
                                            <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/theatre/'.$photo);?>" alt="<?php echo $t_name;?>" 
                                                title="<?php echo $t_name;?>"/></div>
                                                <h2><?php echo $t_name;?></h2>
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
                          	  <div class="col-sm-12 col-md-12">
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">থিয়েটারের মানুষ</a></div>
                                    <div class="content-slider">
                                        <ul id="theatre_person">
                                    <?php 
                                        if($theatre_person->num_rows() > 0){
                                        foreach($theatre_person->result() as $ply)
                                        {
                                         $playersname=$ply->firstname.' '.$ply->lastname;
                                         $photo=$ply->photo;
                                        ?>
                                        <li>
                                        <div class="starinfo">                             
                                            <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/theatre_person/'.$photo);?>" alt="<?php echo $playersname;?>" 
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
                              
                           </div>
                             <div class="row">
                          	  <div class="col-sm-12 col-md-12">
                                    <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">আলোচিত নাটক</a></div>
                                    <div class="content-slider">
                                        <ul id="popular_drama">
                                    <?php 
                                        if($populardrama->num_rows() > 0){
                                        foreach($populardrama->result() as $pdr)
                                        {
                                         $dr_name=$pdr->dr_name;
                                         $slug=$pdr->slug;
                                         $dr_cover_photo=$pdr->dr_cover_photo;
                                        ?>
                                        <li>
                                            <div class="starinfo">                             
                                                <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/drama/'.$dr_cover_photo);?>" alt="<?php echo $dr_name;?>" 
                                                    title="<?php echo $dr_name;?>"/></div>
                                                    <h2><?php echo $dr_name;?></h2>
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
                          	  <div class="col-sm-12 col-md-12">
                                    <div class="title_area" style="margin-left:20px"><a href="#">আলোচিত সিরিয়াল</a></div>
                                    <div class="content-slider">
                                        <ul id="popular_serial">
                                    <?php 
                                        if($popularserial->num_rows() > 0){
                                        foreach($popularserial->result() as $ply)
                                        {
                                         $sr_name=$ply->sr_name;
                                         $sr_cover_photo=$ply->sr_cover_photo;
                                        ?>
                                        <li>
                                        <div class="starinfo">                             
                                            <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/serial/'.$sr_cover_photo);?>" alt="<?php echo $sr_name;?>" 
                                                title="<?php echo $sr_name;?>"/></div>
                                                <h2><?php echo $sr_name;?></h2>
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
       
