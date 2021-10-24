<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                <div class="col-sm-12 col-md-9">
                                    <!--<div class="title_area">
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
												 $full_description=$ngallery->full_description;
												 $slug=$ngallery->slug;
												 $image=$ngallery->image;
												
												 
												 $countE++;
												 
												?>
                                           		 <div class="col-sm-12 col-md-6">
                                                    <div class="big_img">
                                                    	<div class="col-sm-6" style="margin:0; padding:0">
                                                        	<a href="<?php echo base_url("news/details/".$slug);?>">
                                                            <img src="<?php echo base_url('asset/uploads/news/'.$image);?>" alt="<?php echo $title;?>" 
                                                            title="<?php echo $title;?>" style="width:95%; height:auto;margin:10px;" /></a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        	<div class="big_caption">
                                                            <a href="<?php echo base_url("news/details/".$slug);?>" style="text-align:left; color:#f79524; font-size:18px; line-height:22px;">
                                                            <?php echo $title;?></a></div>
                                                            <p>
															<?php 
                                                            $stringbottom1s = strip_tags($full_description);
                                                            if (strlen($stringbottom1s) > 350) {
                                                                $stringCuts = substr($stringbottom1s, 0, 350);
                                                                $stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
                                                            }
                                                            echo $stringbottom1s;
                                                            ?>
                                                          </p>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                             <?php 
													}
												  } 
											   ?>

                                        <?php if($paginationdata){?>
										<div class="col-sm-12">
                                        	<div id="paginationData" class="tsc_pagination" style="text-align:right">
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
                                 	 <div class="row">
                                          <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">Horror Movies</a></div>
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
                                      <div class="row">
                                      	<div class="col-sm-6 col-md-6">
                                        	
                                      		<div class="entertainment_section">
                                            <div class="title_area" style="margin-left:20px"><a href="#">Books</a></div>
                                            	<div  style="width:100%; height:auto; max-height:300px; overflow:auto;overflow-x:hidden; ">
												<?php 
                                                    if($booksinfo->num_rows() > 0){
                                                    foreach($booksinfo->result() as $ngallery)
                                                    {
                                                     $books_name=$ngallery->books_name;
                                                     $author=$ngallery->author;
                                                     $publisher=$ngallery->publisher;
                                                     $type=$ngallery->type;
                                                     $details=$ngallery->details;
                                                     $bid=$ngallery->bid;
                                                     $image=$ngallery->photo;
                                                     
                                                    ?>
                                                     <div class="col-sm-12 col-md-12">
                                                     	<a href="<?php echo base_url('index/details/books/'.$bid);?>">
                                                        <div class="big_img">
                                                        	
                                                            <div class="col-sm-4" style="margin:0; padding:0">
                                                                <img src="<?php echo base_url('asset/uploads/books/'.$image);?>" alt="<?php echo $title;?>" 
                                                                title="<?php echo $title;?>" style="width:95%; height:auto;margin:10px;" />
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="big_caption">
                                                                <h2 style="text-align:left; color:#f79524; font-size:18px; line-height:25px;">
                                                                <?php echo $books_name;?></h2>
                                                                
                                                                <div style="text-align:left; color:#999; font-size:14px; width:100%; height:auto; float:left">
                                                                <sm><?php echo ucfirst($type);?></sm><br />
                                                                <?php echo 'Author:'.$author.',&nbsp;&nbsp; Publisher:'.$publisher;?></div>
                                                                </div>
                                                                
                                                                <div style="margin-top:15px; color:#333; font-size:14px;">
                                                                <?php 
                                                                $stringbottom1s = strip_tags($details);
                                                                if (strlen($stringbottom1s) > 80) {
                                                                    $stringCuts = substr($stringbottom1s, 0, 80);
                                                                    $stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
                                                                }
                                                                echo $stringbottom1s;
                                                                ?>
                                                              </div>
                                                            </div>
                                                         
                                                        </div>
                                                         </a>
                                                    </div>
                                                 <?php 
                                                        }
                                                      } 
                                                   ?>
										</div>
                                    </div>
                                    	</div>
                                        <div class="col-sm-6 col-md-6">
                                        	
                                      		<div class="entertainment_section">
                                            <div class="title_area" style="margin-left:20px"><a href="#">Articles</a></div>
                                            	<div  style="width:100%; height:auto; max-height:300px; overflow:auto;overflow-x:hidden; ">
												<?php 
                                                    if($articles->num_rows() > 0){
                                                    foreach($articles->result() as $artc)
                                                    {
                                                     $headline=$artc->headline;
                                                     $detailsAr=$artc->details;
                                                     $bid=$artc->bid;
                                                     $imageAr=$artc->photo;
                                                     
                                                    ?>
                                                     <div class="col-sm-12 col-md-12">
                                                       <a href="<?php echo base_url('index/details/articles/'.$bid);?>">
                                                         <div class="big_img">
                                                            <div class="col-sm-4" style="margin:0; padding:0; background:#CC6600">                                                               
                                                                <img src="<?php echo base_url('asset/uploads/articles/'.$imageAr);?>" alt="<?php echo $headline;?>" 
                                                                title="<?php echo $headline;?>" style="width:92%; height:auto;margin:5px 0 5px 5px;" />
                                                            </div>
                                                            <div class="col-sm-8">
                                                                	 <h2 style="text-align:left; color:#f79524; font-size:18px; padding:5px 0">
                                                                <?php echo $headline;?></h2>
                                                                 <div style="color:#333; font-size:14px;">
                                                                <?php 
                                                                $stringbottom1s = strip_tags($detailsAr);
                                                                if (strlen($stringbottom1s) > 120) {
                                                                    $stringCuts = substr($stringbottom1s, 0, 120);
                                                                    $stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
                                                                }
                                                                echo $stringbottom1s;
                                                                ?>
                                                              </div>
                                                            </div>
                                                          
                                                        </div>
                                                        </a>
                                                    </div>
                                                 <?php 
                                                        }
                                                      } 
                                                   ?>
										</div>
                                    </div>
                                    	</div>
                                    	
                                      </div>
                                </div>
                                
                                
                                 <div class="col-sm-12 col-md-3">
                                    
                                     
                                     <div class="userinfo_right">
                                        <h3>  <div  style="width:80%; float:left"> আপনার ভুতের গল্প </div>                                        
                                        <div style="width:20%; float:right">
                                        
                                        
                                         <?php
                                            if($this->session->userdata('userAccessMail') && $this->session->userdata('userAccessMail')!=""){
                                            ?>
                                            <a href="<?php echo base_url('user/logout');?>" title="Logout" class="loginbtn">
                                            <span class="fa fa-sign-out" style="font-size:15px; margin-bottom:5px;"></span></a>
                                             <a href="javascript:void()" data-toggle="modal" onclick="openModal('story')"
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
                                        <?php foreach($storycontent->result() as $ucon):?>
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
                            
                             <div class="row">
                             	<div class="col-sm-12">
                                  <div class="add_space col-sm-3"><img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg"></div>
                                  <div class="add_space col-sm-3"><img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg"></div>
                                  <div class="add_space col-sm-3"><img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg"></div>
                                  <div class="add_space col-sm-3"><img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg"></div>
								 </div>
                                </div>
                                
                                <div class="row">
                                 <div class="col-sm-12 col-md-12">
                                 	 
                                      <div class="row">
                                      	<div class="col-sm-6 col-md-6">
                                        	
                                      		<div class="entertainment_section">
                                            <div class="title_area" style="margin-left:20px"><a href="#">Interview</a></div>
                                            	<div  style="width:100%; height:auto; max-height:400px; overflow:auto;overflow-x:hidden; ">
												<?php 
                                                    if($interview->num_rows() > 0){
                                                    foreach($interview->result() as $intv)
                                                    {
                                                     $headline=$intv->headline;
                                                     $detailsAr=$intv->details;
                                                     $bid=$intv->bid;
                                                     $imageAr=$intv->photo;
                                                     
                                                    ?>
                                                     <div class="col-sm-12 col-md-12">
                                                     <a href="<?php echo base_url('index/details/interview/'.$bid);?>">
                                                        <div class="big_img">
                                                            <div class="col-sm-4" style="margin:0; padding:0">
                                                                
                                                                <img src="<?php echo base_url('asset/uploads/interview/'.$imageAr);?>" alt="<?php echo $headline;?>" 
                                                                title="<?php echo $headline;?>" style="width:95%; height:auto;margin:10px;" />
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <h2 style="text-align:left; color:#f79524; font-size:18px; padding:5px 0">
                                                                <?php echo $headline;?></h2>
                                                                 <div style="color:#333; font-size:14px;">
                                                                <?php 
                                                                $stringbottom1s = strip_tags($detailsAr);
                                                                if (strlen($stringbottom1s) > 120) {
                                                                    $stringCuts = substr($stringbottom1s, 0, 120);
                                                                    $stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
                                                                }
                                                                echo $stringbottom1s;
                                                                ?>
                                                              </div>
                                                            </div>
                                                          
                                                        </div>
                                                        </a>
                                                    </div>
                                                 <?php 
                                                        }
                                                      } 
                                                   ?>
										</div>
                                    </div>
                                    	</div>
                                        <div class="col-sm-6 col-md-6">
                                        	
                                      		<div class="entertainment_section">
                                            <div class="title_area" style="margin-left:20px"><a href="#">Story</a></div>
                                            	<div  style="width:100%; height:auto; max-height:400px; overflow:auto;overflow-x:hidden; ">
												<?php 
                                                    if($storylist->num_rows() > 0){
                                                    foreach($storylist->result() as $stor)
                                                    {
                                                     $headline=$stor->headline;
                                                     $detailsAr=$stor->details;
                                                     $bid=$stor->bid;
                                                     $imageAr=$stor->photo;
                                                     
                                                    ?>
                                                     <div class="col-sm-12 col-md-12">
                                                     	<a href="<?php echo base_url('index/details/story/'.$bid);?>">
                                                       	 <div class="big_img">
                                                            <div class="col-sm-4" style="margin:0; padding:0">
                                                                
                                                                <img src="<?php echo base_url('asset/uploads/story/'.$imageAr);?>" alt="<?php echo $headline;?>" 
                                                                title="<?php echo $headline;?>" style="width:95%; height:auto;margin:10px;" />
                                                            </div>
                                                            <div class="col-sm-8">
                                                                 <h2 style="text-align:left; color:#f79524; font-size:18px; padding:5px 0"><?php echo $headline;?></h2>
                                                                <div style="color:#333; font-size:14px;">
                                                                <?php 
                                                                $stringbottom1s = strip_tags($detailsAr);
                                                                if (strlen($stringbottom1s) > 120) {
                                                                    $stringCuts = substr($stringbottom1s, 0, 120);
                                                                    $stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
                                                                }
                                                                echo $stringbottom1s;
                                                                ?>
                                                              </div>
                                                            </div>
                                                          
                                                        </div>
                                                        </a>
                                                    </div>
                                                 <?php 
                                                        }
                                                      } 
                                                   ?>
										</div>
                                    </div>
                                    	</div>
                                    	
                                      </div>
                                </div>
                                
                                
                                 
                            </div>
                           <div class="row">
                                <?php include('category_photogallery.php');?>
                            </div>
                            
                            <div class="row">
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>
       
