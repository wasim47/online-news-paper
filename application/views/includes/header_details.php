<?php 
include('bangladate.php');
include('tophead_details.php');
include('class.banglaDate.php');
$bn = new BanglaDate(time());
$bn->set_time(time(), 0);
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

<div class="row">
    <div class="top_bar">
        <div class="container">
                <div class="col-sm-12 col-md-8 col-xs-12 pull-left">
                    <div class="top_left_side" style="font-size:14px; text-transform:capitalize">
                          <?php 
                           echo $heading_date.' &nbsp;  | &nbsp;'.$bn->get_date1().' &nbsp; | &nbsp; ';
                           include('hijri_date.php');?>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 pull-right">
                    <!--<div class="col-sm-12 col-md-6 col-xs-12 pull-right">
                            <div class="top_menu">
                             <a href="https://www.facebook.com/risingnews24" class="facebook socialicon" target="_blank"> <span class="fa fa-facebook"></span></a>
                             <a href="https://twitter.com/risingnews24" class="twitter socialicon" target="_blank"> <span class="fa fa-twitter"></span></a>
                             <a href="https://www.youtube.com/channel/UC4oKyL6EzIAmMR2YDSQlcKw" class="youtube socialicon" target="_blank"> <span class="fa fa-youtube"></span></a>
                             <a href="https://plus.google.com/u/0/104896085462222866308" class="gplus socialicon" target="_blank"> <span class="fa fa-google-plus"></span></a>
                             <a href="https://www.instagram.com/risingnews24/" class="youtube socialicon" target="_blank"><span  class="fa fa-instagram"></span ></a>
                             <a href="#" class="linkedin socialicon" target="_blank"> <span class="fa fa-linkedin"></span></a>
                         </div>
                        </div>-->
                            <?php echo form_open('search'); ?>
                                <input type="text" name="search_data" id="search_data" placeholder="??????????????????????????? ????????????..." 
                                style="width:85%; height:auto; float:left; padding:2px; border:1px solid #132c03" />
                                <button type="submit" style="width:15%; border:none; padding:1.7px; margin-top:1px; border-radius:0px; font-size:18px; 
                                background:#fff; color:#132c03; float:left;height:auto;">
                                <i class="fa fa-search"></i></button>
                          <?php echo form_close(); ?>
                </div>
            </div>    
    </div>
    <div class="mainHeader">
        <div class="container">
            <div class="col-sm-12 col-xs-12 col-md-3">
                <div class="logo">
                <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/logo.gif');?>" /></a>
                </div>
            </div>
            <!--<div class="col-sm-12 col-xs-12 col-md-9">
               <h2 style="padding:0; margin:0; color:#fff; font-size:60px; text-align:right; padding:15px; font-family:Arial, Helvetica, sans-serif">The Press</h2>
            </div>-->
        </div>
    </div>
	<div class="menu_area">
           
<div class="responsive_menu_wrap"></div>
 <div class="main_menu">
     <div class="container">
       <ul id="navigation">
        <li><a href="<?php echo base_url();?>" class="activeMenu"><span class="fa fa-home"></span>?????????</a></li>


    <?php 
		foreach($newscategory->result() as $ncat):
			$colorCategory = $ncat->color;
			$page_type = $ncat->page_type;
			$catslug = $ncat->cat_slug;
			if($page_type=='news'){
				$urlcat = base_url('news/'.$catslug);
			}
			else{
				$urlcat = base_url($page_type);
			}

            $sqlC="SELECT * FROM sub_category WHERE cat_id= ? ";
            $subQuery = $this->db->query($sqlC, array($ncat->cid));
            
            if($subQuery->num_rows()>0){
                $span='<span class="fa fa-angle-down"></span>';
            }
            else{
                $span='';
            }
        
        
        ?>
       
      <li> 
      <a href="<?php echo $urlcat;?>" id="mainMenuId<?php echo $ncat->cid;?>"> <?php echo $ncat->cat_name.$span;?></a>
       <?php if($subQuery->num_rows()>0){ ?>
        <ul class="submenu">
       <?php  foreach($subQuery->result() as $scat):
								$page_typeS = $scat->page_type;
								if($page_typeS=='news'){
									$urlscat = base_url('news/'.$catslug.'/'.$scat->sub_cat_slug);
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
        ?>
      </li>
    <?php endforeach;?>
        
    </ul>
    </div>
</div>

</div>		
</div>
