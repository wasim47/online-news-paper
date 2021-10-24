<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                                <div class="col-sm-12 col-md-9">
                                 	 <div class="row">
                                          <div class="title_area" style="margin-left:20px"><a href="#">Basic Grammer</a></div>
                                          <div class="content-slider">
                                            <ul id="education">
                                        <?php 
                                            if($verb_category->num_rows() > 0){
                                            foreach($verb_category->result() as $vcat)
                                            {
                                             $title=$vcat->headline;
                                             $bid=$vcat->bid;
                                             $image=$vcat->photo;
                                            ?>
                                            <li>
                                                 <div class="big_img">
                                                <a href="<?php echo base_url("vocabulary/details/".$bid);?>">
                                                <img src="<?php echo base_url('asset/uploads/verb_category/'.$image);?>" alt="<?php echo $title;?>" 
                                                title="<?php echo $title;?>" style="width:100%; height:auto; min-height:200px" /></a>
                                                <!--<div class="big_caption">
                                                    <a href="<?php echo base_url("movies/details/".$bid);?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
                                                    <?php echo $title;?></a>
                                                </div>-->
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
                                         <a href="<?php echo base_url('vocabulary/vocabulary_pdf');?>">
                                         <img src="<?php echo base_url();?>assets/images/nv.png" style="width:100%; height:auto; border:4px solid #fff; margin-top:20px"></a>
                                     </div>
                                      
                                </div>
								<div class="col-sm-12 col-md-3">
                                 	<div class="add_space" style="margin-top:60px;">
                                        <img src="<?php echo base_url();?>assets/images/addh.jpg" class="img-responsive" alt="add.jpg" style="margin-bottom:20px;">
                                    </div>
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
                         
                        
                              		<div class="row">
                                    	<div class="col-sm-12">
                                          <div class="title_area" style="margin-left:20px"><a href="<?php echo base_url('movies');?>">Audio Class</a></div>
                                          <div class="content-slider">
                                            <ul id="audioclass">
                                    <?php 
                                        if($audio_class->num_rows() > 0){
                                        foreach($audio_class->result() as $audio)
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
                                        <?php include('video_bottom.php');?>
                                    </div>
                             
                             
                             	<div class="row">
                                   <div class="col-sm-12">
                                   	<div class="userinfo_area">
									 <?php if($sub_category->num_rows() > 0){?>
                                        
                                                <?php 
                                                foreach($sub_category->result() as $row_cat){
                                                    $sub_cat_name=$row_cat->sub_cat_name;
                                                    $sub_cat_slug=$row_cat->sub_cat_slug;
                                                    $sub_cat_id=$row_cat->scid;
                                                    
                                                     $sqlsc = "SELECT * FROM news_manage WHERE sub_category = ?  ORDER BY n_id DESC LIMIT 4";
                                                     $sCatNewsDisplay = $this->db->query($sqlsc, array($sub_cat_id));
                                                ?>
                                                <div class="col-sm-6 col-md-6">
                                                 <div class="title_area" style="margin-left:20px">
                                                 <a href="<?php echo base_url('news/index/'.$category_slug.'/'.$sub_cat_slug);?>"><?php echo $sub_cat_name;?></a></div>
                                                 
                                                 <?php 
                                                    if($sCatNewsDisplay->num_rows() > 0){
                                                        foreach($sCatNewsDisplay->result() as $sctR){
                                                        $urlsc = base_url('news/details/'.$sctR->slug);
                                                    ?>
                                                        
                                                        <div class="col-sm-6 col-md-6">                                                
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
												  ?>
                                                  </div>
                                                  <?php 
                                                      
                                                }
                                               } ?>
                                   </div>
                                </div>
                                </div>
                          
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>
       
