<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
     
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                               
                                <div class="col-sm-12 col-md-9">
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
                                    <div class="title_area" style="margin-left:20px"><a href="javascript:void()"> Upcoming Track</a></div>
                                    <div class="content-slider">
                                        <ul id="upcomming_track">
                                    <?php 
                                        if($upcomming_track->num_rows() > 0){
                                        foreach($upcomming_track->result() as $ngallery)
                                        {
                                         $tname=$ngallery->name;
                                         $t_id=$ngallery->t_id;
                                         $coverphoto=$ngallery->coverphoto;
                                        ?>
                                        <li>
                                            <div class="starinfo">   
                                            	<a href="<?php echo base_url('index/details/upcomming_track/'.$t_id);?>">                            
                                               	 <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/upcomming_track/'.$coverphoto);?>" alt="<?php echo $tname;?>" 
                                                    title="<?php echo $tname;?>"/></div>
                                                    <h2><?php echo $tname;?></h2>
                                                </a>
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
                                    <div class="title_area" style="margin-left:20px"><a href="javascript:void()">Upcoming Album</a></div>
                                    <div class="content-slider">
                                        <ul id="upcomming_album">
                                    <?php 
                                        if($upcomming_album->num_rows() > 0){
                                        foreach($upcomming_album->result() as $upal)
                                        {
                                         $aname=$upal->name;
                                         $a_id=$upal->t_id;
                                         $coverphoto=$upal->coverphoto;
                                        ?>
                                        <li>
                                            <div class="starinfo"> 
                                            	<a href="<?php echo base_url('index/details/upcomming_album/'.$a_id);?>">                            
                                                  <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/upcomming_album/'.$coverphoto);?>" alt="<?php echo $aname;?>" 
                                                    title="<?php echo $aname;?>"/></div>
                                                  <h2><?php echo $aname;?></h2>
                                                </a>
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
                                    <div class="title_area" style="margin-left:20px"><a href="javascript:void()">Audio Track</a></div>
                                    <div class="content-slider">
                                        <ul id="audio_track">
                                    <?php 
                                        if($audio_track->num_rows() > 0){
                                        foreach($audio_track->result() as $audio)
                                        {
                                         $ms_name=$audio->ms_name;
                                         $ms_id=$audio->ms_id;
                                         $ms_cover_photo=$audio->ms_cover_photo;
										 $ms_file=$audio->ms_file;
                                        ?>
                                        <li>
                                            <div class="starinfo">                             
                                                <div> <img src="<?php echo base_url('asset/uploads/music/'.$ms_cover_photo);?>" alt="<?php echo $ms_name;?>" 
                                                    title="<?php echo $ms_name;?>" style="width:100%; height:auto; height:200px; margin:auto; padding:0; border-radius:0; text-align:center"/></div>
                                                  <audio id="player" controls autoplay="false">
                                                    <source src="<?php echo base_url('asset/uploads/music/file/'.$ms_file);?>" type='audio/ogg'>
                                                    <source src="<?php echo base_url('asset/uploads/music/file/'.$ms_file);?>" type='audio/mpeg'>
                                                </audio>
                                                    <h2><?php echo $ms_name;?></h2>
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
                                <?php /*?><div style="height: 40px; width:50%; display: -webkit-box;position:fixed;background: rgba(237,28,36,0.7); bottom:0; z-index: 10000;">
        <div style=" width:100%; height:auto; float:left; display:  -webkit-box">
            <div class="playpause" style="margin-top:10px; width:20%; float:left">
                <img src="<?php echo base_url();?>assets/images/pause.png" id="button">
            </div>
            <div id="equalizer" style="width:60%; float:left">
                <audio id="player" controls loop style="display:none" autoplay="true">
                    <source src="http://118.179.219.244:8000/;" type='audio/ogg'>
                    <source src="http://118.179.219.244:8000/;" type='audio/mpeg'>
                </audio>
            </div>
            <div class="pvolume" style="width:20%; float:left">
                <div>
                    <img src="<?php echo base_url();?>assets/images/Audio-volume.png" id="pmute">
                </div>
                <div>
                    <input class='range-input' value="0.5" id="volume" min="0" max="1" step="0.1" type="range" onChange="setVolume()"/>
                </div>


            </div>

        </div>
    </div><?php */?>
                                <?php include('video_bottom.php');?>
                            </div>
                         	    <div class="row">
                          	  <div class="col-sm-12 col-md-12">
                                    <div class="title_area" style="margin-left:20px"><a href="javascript:void()">গানের ভুবনের তারকা</a></div>
                                    <div class="content-slider">
                                        <ul id="theatre_person">
                                    <?php 
                                        if($singer_list->num_rows() > 0){
                                        foreach($singer_list->result() as $singe)
                                        {
                                         $playersname=$singe->firstname.' '.$singe->lastname;
                                         $photo=$singe->photo;
                                        ?>
                                        <li>
                                        <div class="starinfo">                             
                                            <div class="imgarea"> <img src="<?php echo base_url('asset/uploads/singer/'.$photo);?>" alt="<?php echo $playersname;?>" 
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
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>
       


    
    