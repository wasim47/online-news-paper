<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                            <div class="row">
                                <!--LEFT CONTENT-->
                                <div class="col-sm-12 col-md-9">
                                    <div class="first_section">
                                        <!--<div class="row">
                                            <div class="col-sm-12 col-md-6 col-xs-12" style="padding:0 5px">
                                                <div class="big_img">
                                                    <a href="#"><img src="<?php echo base_url();?>assets/images/n1.jpg" class="img-responsive" alt="n1.jpg"></a>
                                                    <div class="big_caption">
                                                        <a href="#">Bahubali 2</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3" style="padding:0 5px">
                                                <div class="big_img text-center">
                                                    <a href="#"><img src="<?php echo base_url();?>assets/images/o.jpg" class="img-responsive" alt="o.jpg"></a>
                                                    <div class="small_caption">
                                                        <a href="#">Bahubali 2</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3" style="padding:0 5px">
                                                <div class="big_img text-center">
                                                    <a href="#"><img src="<?php echo base_url();?>assets/images/o.jpg" class="img-responsive" alt="o.jpg"></a>
                                                    <div class="small_caption">
                                                        <a href="#">Bahubali 2</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                        
										<?php 
											$countF = 0;
                                            foreach($firstRowNews->result() as $fRow){
                                            	if($countF == 0){
													$clsF = 'col-sm-12 col-md-6 col-xs-12';
												}
												else{
													$clsF = 'col-sm-12 col-md-3 col-xs-12';
												}
												$countF++;
												$urlf = base_url('news/details/'.$fRow->slug);
										?>
                                            
                                            <div class="<?php echo $clsF;?>" style="padding:0 5px">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urlf;?>"><img src="<?php echo base_url('asset/uploads/news/'.$fRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $fRow->headline;?>" title="<?php echo $fRow->headline;?>"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urlf;?>"><?php echo $fRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
										<?php
                                        }
                                       ?>
                                                
                                       
                                        </div>
                                    </div>
                                    <div class="news_section_1">
                                        <div class="row">
                                          
                                            
                                            
                                            <?php 
											$countS = 0;
                                            foreach($secondRowNews->result() as $sRow){
											$countS++;
											$urls = base_url('news/details/'.$sRow->slug);
										?>
                                            
                                            <div class="col-sm-4 col-md-4" style="padding:0 5px">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urls ;?>"><img src="<?php echo base_url('asset/uploads/news/'.$sRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $sRow->headline;?>" title="<?php echo $sRow->headline;?>"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urls ;?>"><?php echo $sRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
										<?php
                                        }
                                       ?>
                                       
                                       
                                        </div>
                                    </div>
                                    <!--Binodon-->
                                    
                                  
                                  
                                  
                                    <div class="entertainment_section">
                                        <div class="row">
                                            
                                            <?php 
											$countT = 0;
                                            foreach($thirdRowNews->result() as $tRow){
											$countT++;
											$urlt = base_url('news/details/'.$tRow->slug);
										?>
                                            
                                            <div class="col-sm-12 col-md-6" style="padding:0 5px">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urlt;?>"><img src="<?php echo base_url('asset/uploads/news/'.$tRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $tRow->headline;?>" title="<?php echo $tRow->headline;?>"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urlt;?>"><?php echo $tRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
										<?php
                                        }
                                       ?>
                                       
                                            
                                        </div>
                                    </div>
                                    <!--kheladhula-->
                                    <div class="entertainment_section">
                                        <div class="row">
                                            <?php 
											$countFo = 0;
                                            foreach($fourthRowNews->result() as $foRow){
											$countFo++;
											$urlfo = base_url('news/details/'.$foRow->slug);
										?>
                                            
                                            <div class="col-sm-4 col-md-4" style="padding:0 5px">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urlfo ;?>"><img src="<?php echo base_url('asset/uploads/news/'.$foRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $foRow->headline;?>" title="<?php echo $foRow->headline;?>"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urlfo ;?>"><?php echo $foRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
										<?php
                                        }
                                       ?>
                                        </div>
                                    </div>
                                    <!--banjjo-->
                                    
                                    
                                    <div class="entertainment_section">
                                        <div class="row">
                                            
                                             <?php 
											$countFi = 0;
                                            foreach($fifthRowNews->result() as $fiRow){
											$countFi++;
											$urlfi = base_url('news/details/'.$fiRow->slug);
										?>
                                            
                                            <div class="col-sm-12 col-md-6" style="padding:0 5px">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urlfi;?>"><img src="<?php echo base_url('asset/uploads/news/'.$fiRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $fiRow->headline;?>" title="<?php echo $fiRow->headline;?>"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urlfi;?>"><?php echo $fiRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
										<?php
                                        }
                                       ?>
                                        </div>
                                    </div>
                                    <!--economy-->
                                    <div class="entertainment_section">
                                        <div class="row">

                                            <?php 
											$countSi = 0;
                                            foreach($sixthRowNews->result() as $sioRow){
											$countSi++;
											$urlsi = base_url('news/details/'.$sioRow->slug);
										?>
                                            
                                            <div class="col-sm-4 col-md-4" style="padding:0 5px">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urlsi ;?>"><img src="<?php echo base_url('asset/uploads/news/'.$sioRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $sioRow->headline;?>" title="<?php echo $sioRow->headline;?>"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urlsi ;?>"><?php echo $sioRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
										<?php
                                        }
                                       ?>
                                        </div>
                                    </div>
                                    <!--gallery-->
                                    <div class="entertainment_section">
                                        <div class="row">
                                            <div class="title_area color_4">
                                                <a href="#">ফটো গ্যালারি</a>
                                            </div>
                                            <div class="col-sm-12 col-md-4 pl_5">
                                                <div class="gallery_img">
                                                    <a href="#"><img class="img-resposive" src="<?php echo base_url();?>assets/images/g1.jpg" alt="g1.jpg"></a>
                                                    <div class="slide_caption2 text-center"><a href="#">দফদফদ</a></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 pl_5">
                                                <div class="slider_area">
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">দফদফ</div>
                                                    </div>
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">??????</a></div>
                                                    </div>
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">??????</a></div>
                                                    </div>
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">??????</a></div>
                                                    </div>
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">??????</a></div>
                                                    </div>
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">??????</a></div>
                                                    </div>
                                                    <div class="slider_item">
                                                        <a href="#"><img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1.jpg"></a>
                                                        <div class="slide_caption text-center"><a href="#">??????</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--RIGHT CONTENT/WIDGET-->
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
                                    <div class="todays_news">
                                        <div class="news_title">
                                            <h2><span class="fa fa-newspaper-o"></span>আলোচিত সংবাদ</h2>
                                        </div>
                                        <ul class="media-list">
                                        <?php
                                        foreach($popular_news->result() as $pop){
										$urlp = base_url('news/details/'.$pop->slug);
										?>
                                        <li class="media">
                                                <div class="media-left">
                                                    <a href="<?php echo $urlp;?>">
                                                        <img class="media-object" src="<?php echo base_url('asset/uploads/news/'.$pop->image);?>" style="width:100px; height:auto" 
                                                        alt="<?php echo $pop->headline;?>" title="<?php echo $pop->headline;?>">
                                                    </a>
                                                </div>
                                                <div class="media-body">

                                                    <a href="<?php echo $urlp;?>"><?php echo $pop->headline;?></a>
                                                </div>
                                            </li>
                                        <?php
										}
										?>
                                        
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="add_space">
                                        <img src="<?php echo base_url();?>assets/images/add2.jpg" class="img-responsive" alt="add.jpg">
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