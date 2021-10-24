<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('bangladate.php'); ?>
<div class="container">
  <div class="row">
     <div class="content_area">
            <div class="col-sm-12 col-md-9">
                <div class="entertainment_section">
                 <div class="newsDetails">
                    <div class="row">
                    <div class="branch_title">
                    <a href="<?php echo base_url();?>">হোম &nbsp;&raquo;&nbsp;</a>
                    <a href="<?php echo base_url('news/'.$newsCatSlug);?>"><?php echo $newsCatName;?></a>
                    <div class="br_pro" style="text-align:left; margin:10px 0 0 0;"></div>
                </div>
                    <div class="col-sm-12">
                    
                    <h4 style="margin:10px 0 5px 15px; padding:0;"><?php echo $news_details['subHeadline'];?></h4>
                    <h2 style="margin:5px 0 10px 15px; padding:0;"><?php echo $news_details['headline'];?></h2>
                    <div class="time" style="font-size:15px; margin:0 0 10px 15px; ">                                    
                     <?php 
                        $convdate = date('l, d F Y',strtotime($news_details['count_date']));
                        $convertedDATE = str_replace($engDATE, $bangDATE, $convdate);
                        $convertedtime= str_replace($engDATE, $bangDATE, $news_details['time']);

                       echo 'প্রকাশঃ <i class="fa fa-calendar"></i> '.$convertedDATE.'&nbsp;&nbsp;&nbsp; <i class="fa fa-clock-o"></i> ';?>
                       <?php echo $convertedtime;?></div>
                    </div>
                    
                   <div class="col-sm-12">
                        <?php
                        if(isset($news_details['image']) && $news_details['image']!=""){
                        ?>
                         <div style="width:100%; height:auto; float:left">	
                            <img src="<?php echo base_url();?>asset/uploads/news/<?php echo $news_details['image'];?>" 
                            title="<?php echo $news_details['image_title'];?>" alt="<?php echo $news_details['image_title'];?>"/>
                        </div>
                        <?php if($news_details['image_title']!=""){?>
                        <div class="col-sm-12 news_image_title"><?php echo $news_details['image_title'];?></div>
                        <?php }
                        }
                        ?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12 pull-left">
        <?php echo '<span class="fa fa-user" style="color:#ec2028; margin-left:10px;"></span> '.$news_details['auther_name'];?>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12 pull-right">
                             <div class="sociallink"> 
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_googleplus_large' displayText='Google +'></span>
                                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                <span class='st_email_large' displayText='Email'></span>
                                <span class='st_print_large' displayText='Print'></span>
                                <script type="text/javascript">var switchTo5x=true;</script>
                                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                <script type="text/javascript">
                                stLight.options({publisher: "be113743-6374-48f9-87f3-541903975872", doNotHash: false, doNotCopy: false, hashAddressBar: false});
                                </script>
                            </div>
                         </div>
                
                    <div class="col-sm-12">
                        <p>
                        <?php 
                        $finaldetails = preg_replace('/font-family.+?;/', "", $news_details['full_description']);
                        echo $finaldetails;?>
                        
                        </p>
                     </div>   
                     <div class="col-sm-12">
                        <?php if($news_details['vedio']!=""){
                        ?>
                        <iframe src="https://www.youtube.com/embed/<?php echo $news_details['vedio'];?>?autoplay=1" 
                        frameborder="0" allowfullscreen  style="margin:0px; padding:0; width:100%; height:500px; float:left;"></iframe>
                        <?php 
                        }
                        ?>
                        </div>
                        </div>

                       <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                             <div class="sociallink"> 
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_googleplus_large' displayText='Google +'></span>
                                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                <span class='st_email_large' displayText='Email'></span>
                                <span class='st_print_large' displayText='Print'></span>
                                <script type="text/javascript">var switchTo5x=true;</script>
                                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                <script type="text/javascript">
                                stLight.options({publisher: "be113743-6374-48f9-87f3-541903975872", doNotHash: false, doNotCopy: false, hashAddressBar: false});
                                </script>
                        </div>
                         </div>  
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h2>এই বিভাগের অন্যান্য সংবাদ</h2>
                            <?php 
                                if($rel_news->num_rows() > 0){
                                foreach($rel_news->result() as $ngallery)
                                {
                                 $title=$ngallery->headline;
                                 $slugextra=$ngallery->slug;
                                 $image=$ngallery->image;
                                ?>
                                 <div class="col-sm-12 col-md-3" style="min-height:200px;">
                                    <a href="<?php echo base_url("details/".$slugextra);?>">
                                    <img src="<?php echo base_url('asset/uploads/news/'.$image);?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" 
                                    style="width:100%; height:auto" /></a>
                                    <div class="big_caption" style="margin-top:7px; float:left;">
                                        <a href="<?php echo base_url("details/".$slugextra);?>"><?php echo $title;?></a>
                                    </div>
                            </div>
                             <?php 
                                    }
                                  } 
                               ?>
                  
                </div>
                    </div>
                 </div>
                 <?php include('comment.php');?>  
                </div>
            </div>                    
            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                  <div class="entertainment_section" style="margin-left:10px; width:98%">
             <?php include('right_sidebar_details.php');?>
             </div>
             </div> 
    </div>
  </div>
 </div>
