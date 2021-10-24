<?php include('header.php');?>
 <link href="<?php echo base_url();?>assets/video_lightbox/style.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/video_lightbox/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/video_lightbox/lity.css" rel="stylesheet"/>
<div class="row">
    <div class="container">
        <div class="actormiddle">
        	<div class="col-sm-9">
            	<div class="middlecon">
                    <div class="col-sm-12">
                    	
                         <?php 
								if($videogallery->num_rows() > 0){
								$count = 0;
							   foreach($videogallery->result() as $gallery){
										$vedioTitle=$gallery->photo_album_name;
										$url=$gallery->vedio_link;
										$album_ima=$gallery->album_ima;
								?>
								 <div class="col-sm-12 col-md-4">
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
                </div>
            </div>
            <div class="col-sm-3">
            	<div class="sidebar">
                	<div class="socialmedia">
                    	<ul>
                        	<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="googleplus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/video_lightbox/jquery.js"></script>
<script src="<?php echo base_url();?>assets/video_lightbox/lity.js"></script>