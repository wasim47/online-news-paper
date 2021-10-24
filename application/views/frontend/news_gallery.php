<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
   <div class="row">
     <div class="content_area">
          <div class="col-sm-12 col-md-9">
            <div class="entertainment_section">
                    <div class="row">
                     <div class="title_area">
                        <a href="#"><?php echo $categoryName;?></a>
                    </div>
                        <?php
                            foreach($category_topnews->result() as $nat){
                                 $Ttitle=$nat->headline;
                                 $Tslug=$nat->slug;
                                 $Timage=$nat->image;
								 $Tdesc=$nat->full_description;
								 $urlt = base_url('details/'.$Tslug);
                        ?>
                                <div class="col-sm-12 col-md-6" style="margin:0; padding:0 5px;">
                               	 <div class="big_img" style="min-height:310px;">
                                	<?php if($Timage!=""){?>
                                    <a href="<?php echo $urlt;?>">
                                    <img src="<?php echo base_url('asset/uploads/news/'.$Timage);?>" class="img-responsive" 
                                    alt="<?php echo $Ttitle;?>" title="<?php echo $Ttitle;?>"></a>
                                    <div class="big_caption">
                                        <a href="<?php echo $urlt;?>"><?php echo $Ttitle;?></a>
                                    </div>
                                    <?php 
									}
									else{
									 ?>
                                     <div class="big_caption">
                                        <a href="<?php echo $urlt;?>"><?php echo $Ttitle;?></a>
                                    </div>
                                     <div class="big_details">
                                        <p style="text-align:justify">
										<?php 
										$string = strip_tags($Tdesc);
										if (strlen($string) > 1800) {
											$stringCut = substr($string, 0, 1800);
											$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="'.$urlt.'"> বিস্তারিত</a>'; 
										}
										echo $string; ?>
                                        </p>
                                    </div>
                                    <?php } ?>
                                </div>
                        		</div>
                        <?php
                            }
                        ?>
                        
                        
                    </div>
                </div>
           </div>
          <div class="col-sm-12 col-md-3" style="margin:0; padding:0 5px;">
             <div style="margin-top:0;">
                    <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg" 
                    style="margin-bottom:22px;">
                    <img src="<?php echo base_url();?>assets/images/add_small.png" class="img-responsive" alt="add.jpg">
                </div>
                                

                            </div>				
          <div class="row">
                            <div class="col-sm-12 col-md-12" style="margin:0; padding:0 5px;">
                                
                                
                                <!--Health Tips-->
                                <div class="entertainment_section">
                                        <?php 
                                            if($newsgallery->num_rows() > 0){
                                            foreach($newsgallery->result() as $ngallery)
                                            {
                                             $title=$ngallery->headline;
                                             $slug=$ngallery->slug;
                                             $image=$ngallery->image;
                                            ?>
                                             <div class="col-sm-12 col-md-3" style="min-height:200px; margin:0; padding:0 5px">
                                            <div class="big_img">
                                                <a href="<?php echo base_url("details/".$slug);?>">
                                                <img src="<?php echo base_url('asset/uploads/news/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" 
                                                style="width:100%; height:auto" /></a>
                                                <div class="big_caption">
                                                    <a href="<?php echo base_url("details/".$slug);?>"><?php echo $title;?></a>
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
      </div>
   </div>
 </div>