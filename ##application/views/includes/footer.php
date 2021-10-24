<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    	<div class="container">
        	<div class="row">
            <div class="footer_area">
                
                <div class="col-sm-12 pull-left">
                    	<div class="footer_menu">
                        	<ul>
                            <li><a href="<?php echo base_url();?>">হোম</a></li>
							<?php foreach($newscategory->result() as $ncat):
								$colorCategory = $ncat->color;
								$page_type = $ncat->page_type;
								if($page_type=='news'){
									$urlcat = base_url('news/index/'.$ncat->cat_slug);
								}
								else{
									$urlcat = base_url($page_type);
								}
							
							
							?>
                           
                          <li> <a href="<?php echo $urlcat;?>"> <?php echo $ncat->cat_name;?></a></li>
                  		<?php endforeach;?>
                        
                        
                            
                        </ul>
                        </div>
                </div>
            </div>
            
              <div class="col-sm-12 col-xs-12" style="background:#f5f5f5; border-top:1px solid #ccc; padding-bottom:30px">
            	
                
                 <div class="col-sm-4 col-xs-12">
                	<h2 style="padding:10px 10px 0 10px; margin:10px 10px 2px 0; text-align:center; font-size:20px;"> প্রকাশক </h2>
                    <p style="text-align:center;"> বিপ্লব চন্দ্র চক্রবর্তী</p>
                </div>
                 <div class="col-sm-4 col-xs-12">
                	<h2 style="padding:10px 10px 0 10px; margin:10px 10px 2px 80px; font-size:20px;"> ভারপ্রাপ্ত সম্পাদক </h2>
                    <p style="margin-left:95px;"> মাকসুদুল বারী স্বপন </p>
                </div>
                 <div class="col-sm-4 col-xs-12 pull-right">
                    <div class="f-title">আমাদের সাথে থাকুন</div>
                    <div class="top_menu" style="text-align:center">
                         <a href="https://www.facebook.com/gee24news/" class="facebook" target="_blank"> <span class="fa fa-facebook" style="font-size:20px;"></span></a>
                         <a href="https://twitter.com/geenews24"class="twitter" target="_blank"> <span class="fa fa-twitter" style="font-size:20px;"></span></a>
                         <a href="https://www.youtube.com/channel/UCm759t-3H-4GjqLELuML-Dw" class="youtube" target="_blank"> <span class="fa fa-youtube" style="font-size:20px;"></span></a>
                         <a href="https://plus.google.com/114243222449587713056/" class="gplus" target="_blank"> <span class="fa fa-google-plus" style="font-size:20px;"></span></a>
                         <a href="https://www.instagram.com/#/" class="youtube" target="_blank"><span  class="fa fa-instagram" style="font-size:15px;"></span ></a>
                         <a href="#" class="linkedin" target="_blank"> <span class="fa fa-linkedin" style="font-size:20px;"></span></a>
                 </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-xs-12" style="margin:0; padding:0">
            	<div class="copyright">
            	<div class="col-sm-8 col-xs-12 pull-left">
                    <p style="margin-top:10px;">
                       যোগাযোগ: ২৩৮/১ আউটার সার্কুলার রোড, মারুফ মার্কেট, ৪র্থ তলা, ঢাকা ১২১৭, বাংলাদেশ। 
                       ফোন
                       <span style="font-family:Arial, Helvetica, sans-serif; font-size:16px;">+8802 9351410, 9352102</span> </p>
                       ইমেইল:
                        <span style="font-family:Arial, Helvetica, sans-serif; font-size:16px;"> gee24news@gmail.com </span> </p>
                </div>
                <div class="col-sm-2 col-xs-12 hidden-xs pull-right">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/logo.png');?>" style="width:100%; height:auto" /></a> </div>
            </div>
        </div>
        </div>
 </div>
 <div class="row" style="margin-bottom:30px;">
 <div style="background:rgba(37,37,37,0.7);; padding:8px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#fff">© Copyright 2017 GEE24.NEWS. Designed and developed by GEE IT</a></div>
 </div>
 
 <div class="row" style="width:100%;  background: #7e2020; position:fixed; bottom:0;z-index:200000000; margin:0; padding:0">  
               <div class="col-sm-12 col-lg-1" style="margin:0; padding:0">
               <div class="latnews-title">সদ্য সংবাদ</div></div>
               <div class="col-sm-12 col-lg-11" style="margin:0; padding:0"> 
                    <div id="rollBanner" class="footer_fixed">
                     <p style="margin:0; padding:0;">
                     <?php foreach($latest_news->result() as $resf):?>
                          <a href="<?php echo base_url('news/details/'.$resf->slug);?>"  style="margin-right:10px; font-size:18px;"> &raquo; <?php echo $resf->headline;?></a>
                     <?php endforeach;?>            
                      </p>
                    </div>
               </div>
  	 </div>
 
 
 
 
 
  <script type="text/javascript">
        rollBanner("rollBanner",10);
</script>    
 
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow86.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.fitvids.js"></script>
<script src="<?php echo base_url();?>assets/js/scrpit.js"></script>
</body>
</html>