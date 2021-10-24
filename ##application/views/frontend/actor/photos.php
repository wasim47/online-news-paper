<?php include('header.php');?>

<div class="row">
    <div class="container">
        <div class="actormiddle">
        	<div class="col-sm-9">
            	<div class="middlecon">
                    
                    <div class="col-sm-12">
                    	
                         <?php 
						   foreach($photogallery->result() as $gallery){
									$photo=$gallery->image;
									$photo_name=$gallery->photogallery_name;
							  ?>  
            
                              <div class="col-sm-4"> 
                              	<div class="photos">
                                  <!--<div><?php echo $photo_name;?></div>-->
                                      <a href="<?php echo base_url()?>asset/uploads/photogallery/<?php echo $photo; ?>">
                                      <img alt="<?php echo $photo_name;?>" title="<?php echo $photo_name;?>" 
                                      src="<?php echo base_url()?>asset/uploads/photogallery/<?php echo $photo; ?>" style="width:100%; height:auto"></a>
                                  
                                  	  <div class="photo_caption"><?php echo $photo_name;?></div>
                                  </div>
                              </div>
                                
                             <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            	<div class="sidebar">
                	<div class="socialmedia">
                    	<ul>
                        	<li><a href="<?php echo $ac_det['facebook'];?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $ac_det['twitter'];?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $ac_det['googleplus'];?>" target="_blank" class="googleplus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $ac_det['linkedin'];?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>