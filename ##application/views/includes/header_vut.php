<?php 
include('tophead_vut.php');
/*include('class.banglaDate.php');
$bn = new BanglaDate(time());
$bn->set_time(time(), 0);*/
$hour = gmdate('H');
$minute = gmdate('i');
$seconds = gmdate('s');

$day = gmdate('d');
$month = gmdate('m');
$year = gmdate('Y');
$hour = $hour + 6;
$ShowBangladeshTime = date("H:i", mktime ($hour,$minute));
$currentDate = date("D d M Y", mktime ($hour,$minute,$seconds,$month,$day,$year));
?>


<div class="top_bar">
		<div class="container">
            <div class="col-sm-12 col-md-5 col-xs-12 pull-left">
                <div class="top_left_side" style="font-size:14px; text-transform:capitalize">
                    
                       <span style="font-size:16px; font-family:Arial, Helvetica, sans-serif; padding-right:10px;">{{theTime}}</span>
                       |&nbsp;&nbsp;
                       <?php 
                       //echo $heading_date.' &nbsp;  | &nbsp;'.$bn->get_date1().' &nbsp; | &nbsp; ';
                       //include('hijri_date.php'); 
					   echo $currentDate;?>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-7 pull-right">
            	<div class="col-sm-12 col-xs-12 col-md-6" style="margin:0; padding:0">
                        <div class="searchArea">
                                <?php echo form_open('search'); ?>
                                    <input type="text" name="search_data" id="search_data" placeholder="অনুসন্ধান করুন..." class="form-control" />
                                    <button type="submit" class="sbtn" id="searchBtn"><i class="fa fa-search"></i></button>
                              <?php echo form_close(); ?>
                        </div>
                    </div>
               <div class="col-sm-12 col-md-6 col-xs-12 pull-right" style="margin:0; padding:0">
            	<div class="top_menu">
                     <div class="col-sm-7 col-xs-7" style="margin:0; padding:0">
                         <a href="https://www.facebook.com/risingnews24" class="facebook" target="_blank"> <span class="fa fa-facebook" style="font-size:15px;"></span></a>
                         <a href="https://twitter.com/risingnews24" class="twitter" target="_blank"> <span class="fa fa-twitter" style="font-size:15px;"></span></a>
                         <a href="https://www.youtube.com/channel/UC4oKyL6EzIAmMR2YDSQlcKw" class="youtube" target="_blank"> <span class="fa fa-youtube" style="font-size:15px;"></span></a>
                         <a href="https://plus.google.com/u/0/104896085462222866308" class="gplus" target="_blank"> <span class="fa fa-google-plus" style="font-size:15px;"></span></a>
                         <a href="https://www.instagram.com/risingnews24/" class="youtube" target="_blank">
<span  class="fa fa-instagram" style="font-size:15px;"></span ></a>
                         <a href="#" class="linkedin" target="_blank"> <span class="fa fa-linkedin" style="font-size:15px;"></span></a>
                     </div>
                     <div class="col-sm-5 col-xs-5" style="margin:0; padding:0">
                         
                           <?php
							if($this->session->userdata('userAccessMail') && $this->session->userdata('userAccessMail')!=""){
							?>
                            <a href="<?php echo base_url('user/logout');?>" title="Logout" class="loginbtn">
                         <span class="fa fa-sign-out" style="font-size:15px; margin-bottom:5px;"></span></a>
                         
							<?php
							}
							else{
						?>
						 <a href="javascript:void()" data-toggle="modal" data-target="#userLogin" class="loginbtn">
                         <span class="fa fa-sign-in" style="font-size:15px; margin-bottom:5px;"></span></a>
                        <a href="javascript:void()" data-toggle="modal" data-target="#userReg" class="registbtn">
                        <span class="fa fa-user" style="font-size:15px; margin-bottom:5px;"></span></a>
						 <?php
						 }
						 ?> 
                         
                     </div>
                 </div>
               </div>
            </div>
        </div>    
        </div>

		
			<div class="mainHeader">
            	<div class="container">
                    <div class="col-sm-12 col-xs-12 col-md-3">
                        <div class="logo">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/logo.png');?>" style="width:100%; height:auto" /></a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-7 pull-right">
                        <div class="row"><img src="<?php echo base_url("assets/images/15208136598164270157.gif");?>"  style="width:100%; height:auto;margin-top:3%" /></div>
                    </div>
        		</div>
        </div>
        <div class="menu_area">
           
                    <div class="responsive_menu_wrap"></div>
                     <div class="main_menu">
                    	 <div class="container">
                      	   <ul id="navigation">
                            <li><a href="<?php echo base_url();?>" class="activeMenu"><span class="fa fa-home"></span>হোম</a></li>


						<?php foreach($newscategory->result() as $ncat):
						
								$colorCategory = $ncat->color;
								$page_type = $ncat->page_type;
								if($page_type=='news'){
									$urlcat = base_url('news/index/'.$ncat->cat_slug);
								}
								else{
									$urlcat = base_url($page_type);
								}
							/*$sqlC="SELECT * FROM sub_category WHERE cat_id= ? ";
							$subQuery = $this->db->query($sqlC, array($ncat->cid));
							
							if($subQuery->num_rows()>0){
								$span='<span class="fa fa-angle-down"></span>';
								$urlcat = 'javascript:void(0)';
								$dropdown = 'class="dropdown"';
							}
							else{
								$span='';
								$dropdown='';
								$page_type = $ncat->page_type;
								if($page_type=='news'){
									$urlcat = base_url('news/index/'.$ncat->cat_slug);
								}
								else{
									$urlcat = base_url($page_type);
								}
							}
							*/
							
							?>
                           
                          <li style="border-bottom:2px solid <?php echo $colorCategory;?>;"> 
                          <a href="<?php echo $urlcat;?>" id="mainMenuId<?php echo $ncat->cid;?>"
                          onmouseover="document.getElementById('mainMenuId'+<?php echo $ncat->cid;?>).style.backgroundColor='<?php echo $colorCategory;?>'"
                          onmouseout="document.getElementById('mainMenuId'+<?php echo $ncat->cid;?>).style.backgroundColor='transparent'"> 
						  <?php echo $ncat->cat_name;?></a>
                           <?php /*?><?php if($subQuery->num_rows()>0){ ?>
                            <ul class="submenu">
                            <?php  foreach($subQuery->result() as $scat):
								$page_typeS = $scat->page_type;
								if($page_typeS=='news'){
									$urlscat = base_url('news/index/'.$scat->sub_cat_slug);
								}
								else{
									$urlscat = base_url($page_typeS);
								}
							?>
                              <li><a href="<?php echo $urlscat;?>">
                              <span class="ion-ios7-arrow-right nav-sub-icn"></span><?php echo $scat->sub_cat_name;?></a></li>
                              <?php endforeach;?>
                           </ul>
                            <?php 
							}
							?><?php */?>
                          </li>
                  		<?php endforeach;?>
                        
                        
                            
                        </ul>
                    	</div>
                </div>

            </div>
            
            
<div class="container " style="text-align:center"><img src="<?php echo base_url("assets/images/13053109604031398642.gif");?>"  style="width:100%; height:auto" /></div>


<div class="container">
<?php if(isset($categoryname) && $categoryname!=""){?>
<h2 style="width:100%; font-size:30px; padding:10px; float:left; background:#eaeaea; margin:5px 0"><?php echo $categoryname;?></h2>
<?php } ?>
<?php if(isset($sub_category) && $sub_category->num_rows() > 0){ ?>
	<div class="sub_category">
        <ul>
			<?php 
            foreach($sub_category->result() as $row_cat){
                $sub_cat_name=$row_cat->sub_cat_name;
                $sub_cat_slug=$row_cat->sub_cat_slug;
				$pageType=$row_cat->page_type;
				if($pageType=='news'){
					$urlsub = base_url('news/index/'.$category_slug.'/'.$sub_cat_slug);
				}
				else{
					$urlsub = base_url($pageType);
				}
				if($subcat == $sub_cat_slug){
					$cls = 'class="active_submenu"';
				}
				else{
					$cls = '';
				}

				
				
            ?>
            <li><a href="<?php echo $urlsub;?>" <?php echo $cls;?>><?php echo $sub_cat_name;?></a></li>
            <?php
            }
            ?>
      </ul>        
  </div>
<?php } ?>
  </div>
  
  
  
<?php if(isset($newscategory_disable) && $newscategory_disable->num_rows() > 0){ ?>
	<div class="container">
<h2 style="width:100%; font-size:30px; padding:10px; float:left; background:#eaeaea; margin:5px 0"><?php echo $categoryname;?></h2>
<div class="sub_category">
        <ul>
			<?php 
            foreach($newscategory_disable->result() as $row_cat){
                $cat_name=$row_cat->cat_name;
                $cat_slug=$row_cat->cat_slug;
				$pageType=$row_cat->page_type;
				if($pageType=='news'){
					$urlsub = base_url('news/index/'.$cat_slug);
				}
				else{
					$urlsub = base_url($pageType);
				}
				if($subcat == $cat_slug){
					$cls = 'class="active_submenu"';
				}
				else{
					$cls = '';
				}
				
				
            ?>
            <li><a href="<?php echo $urlsub;?>" <?php echo $cls;?>><?php echo $cat_name;?></a></li>
            <?php
            }
            ?>
      </ul>        
  </div>
  </div>
<?php } ?>