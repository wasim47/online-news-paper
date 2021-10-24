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
                                    <div class="entertainment_section">
                                            <?php 
												if($newsgallery->num_rows() > 0){
												foreach($newsgallery->result() as $ngallery)
												{
												 $title=$ngallery->headline;
												 $slug=$ngallery->slug;
												 $image=$ngallery->image;
												?>
                                           		 <div class="col-sm-12 col-md-4" style="min-height:250px;">
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
								<div class="col-sm-12 col-md-3">
                                 <div class="add_space" style="margin-top:60px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg" style="margin-bottom:20px;">
                                        <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg">
                                    </div>
                                 <div class="userinfo_right" style="margin-top:20px">
                                 	<h3>
                                    
                                    <div  style="width:90%; float:left"> আপনার জানা-অজানা</div>
                                    
                                    <div style="width:10%; float:right"><i class="fa fa-upload"></i></div>
                                    </h3>
                                    
                                    <div class="col-sm-12" style="margin:0; padding:0">
                                    	<div class="commetn_list">
                                    	<div class="col-sm-2 pull-left" style="margin:0; padding:0">
                                        <img src="<?php echo base_url('assets/images/default.png');?>" style="width:40px; height:auto;" /></div>
                                        <div class="col-sm-10">
                                        	অনেকদিন পর বৃষ্টি হওয়ায় রাজধানীবাসী পায় প্রশান্তির ছোঁয়া। 
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin:0; padding:0">
                                    	<div class="commetn_list">
                                    	<div class="col-sm-2 pull-left" style="margin:0; padding:0">
                                        <img src="<?php echo base_url('assets/images/default.png');?>" style="width:40px; height:auto;" /></div>
                                        <div class="col-sm-10">
                                        	 স্কুল কলেজের শিক্ষার্থিদের অনেকেই দল বেঁধে নেমে আসে রাস্তায়। 
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin:0; padding:0">
                                    	<div class="commetn_list">
                                    	<div class="col-sm-2 pull-left" style="margin:0; padding:0">
                                        <img src="<?php echo base_url('assets/images/default.png');?>" style="width:40px; height:auto;" /></div>
                                        <div class="col-sm-10">
                                        	অনেককেই বৃষ্টিতে ভিজতে দেখা যায় মনের আনন্দে।
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin:0; padding:0">
                                    	<div class="commetn_list">
                                    	<div class="col-sm-2 pull-left" style="margin:0; padding:0">
                                        <img src="<?php echo base_url('assets/images/default.png');?>" style="width:40px; height:auto;" /></div>
                                        <div class="col-sm-10">
                                        	 স্কুল কলেজের শিক্ষার্থিদের অনেকেই দল বেঁধে নেমে আসে রাস্তায়। 
                                        </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                 </div>

                                </div>
                           
                           
                           
                            
                            
                            <?php if($sub_category->num_rows() > 0){?>
                          <div class="row">
                           <div class="col-sm-12">
                           
                                <div class="col-sm-12 col-md-12 userinfo_area">
                                    <?php 
									foreach($sub_category->result() as $row_cat){
										$sub_cat_name=$row_cat->sub_cat_name;
										$sub_cat_slug=$row_cat->sub_cat_slug;
										$sub_cat_id=$row_cat->scid;
										
										 $sqlsc = "SELECT * FROM news_manage WHERE sub_category = ?  ORDER BY n_id DESC LIMIT 4";
									     $sCatNewsDisplay = $this->db->query($sqlsc, array($sub_cat_id));
									?>
									 <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('news/index/'.$category_slug.'/'.$sub_cat_slug);?>"><?php echo $sub_cat_name;?></a></div>
                                     
                                     <?php 
									 	if($sCatNewsDisplay->num_rows() > 0){
											foreach($sCatNewsDisplay->result() as $sctR){
											$urlsc = base_url('news/details/'.$sctR->slug);
										?>
											
											<div class="col-sm-3 col-md-3">                                                
												<div class="big_img">
													<a href="<?php echo $urlsc ;?>"><img src="<?php echo base_url('asset/uploads/news/'.$sctR->image);?>" class="img-responsive" 
													alt="<?php echo $sctR->headline;?>" title="<?php echo $sctR->headline;?>"></a>
													<div class="big_caption">
														<a href="<?php echo $urlsc ;?>"><?php echo $sctR->headline;?></a>
													</div>
												</div>
											</div>
										<?php
										}
                                      }    
										  
									}
									?>
                                   
                                           
                                    
                                    
                                </div>
                                 
							</div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>