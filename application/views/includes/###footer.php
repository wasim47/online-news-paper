<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    	<div class="container">
        	<div class="row">
            <div class="footer_area">
                <div class="col-sm-12 col-xs-12 pull-left">
                    	<div class="footer_menu">
                        	<ul>
                                <li><a href="<?php echo base_url();?>">হোম</a></li>
                                <?php foreach($newscategory->result() as $ncat):
                                    $colorCategory = $ncat->color;
                                    $page_type = $ncat->page_type;
                                    if($page_type=='news'){
                                        $urlcat = base_url('news/'.$ncat->cat_slug);
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
                	<h2 style="padding:10px 10px 0 10px; margin:10px 10px 2px 10px; font-size:20px">সম্পাদক </h2>
                    <p> কাজী এম আনিছুল ইসলাম</p>
                </div>
                 <div class="col-sm-4 col-xs-12">
                	<h2 style="padding:10px 10px 0 10px; margin:10px 10px 2px 10px; font-size:20px;"> ভারপ্রাপ্ত প্রকাশক </h2>
                    <p style="margin-left:30px;"> মোঃ আব্দুল হামিদ </p>
                </div>
                 <div class="col-sm-4 col-xs-12 pull-right">
                    <div class="f-title">আমাদের সাথে থাকুন</div>
                    <div class="top_menu" style="text-align:center">
                         <a href="https://www.facebook.com/risingnews24" class="facebook" target="_blank"> <span class="fa fa-facebook" style="font-size:20px;"></span></a>
                         <a href="https://twitter.com/risingnews24" class="twitter" target="_blank"> <span class="fa fa-twitter" style="font-size:20px;"></span></a>
                         <a href="https://www.youtube.com/channel/UC4oKyL6EzIAmMR2YDSQlcKw" class="youtube" target="_blank"> <span class="fa fa-youtube" style="font-size:20px;"></span></a>
                         <a href="https://plus.google.com/u/0/104896085462222866308" class="gplus" target="_blank"> <span class="fa fa-google-plus" style="font-size:20px;"></span></a>
                         <a href="https://www.instagram.com/risingnews24/" class="youtube" target="_blank">
<span  class="fa fa-instagram" style="font-size:15px;"></span ></a>
                         <a href="#" class="linkedin" target="_blank"> <span class="fa fa-linkedin" style="font-size:20px;"></span></a>
                 </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-xs-12" style="margin:0; padding:0">
            	<div class="copyright">
            	<div class="col-sm-4 col-xs-12 pull-left">
                    <p style="margin-top:10px;">
                        বাড়ি # সপ্নীল, রোড # ০৭, মহল্লা # আলি ও নুর রিয়াল স্ট্যাট, মোহাম্মাদপুর, ঢাকা ১২০৭ ফোন: ০১৬৭৭২৬৬৩৪৯, ইমেইল: 
                        <span style="font-family:Arial, Helvetica, sans-serif; font-size:16px;"> info@risingnews24.com </span> </p>
                </div>
                <div class="col-sm-2 col-xs-12 pull-right">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/logo.png');?>" style="width:100%; height:auto" /></a>                </div>
            </div>
        </div>
  
  
  
 
 </div>
 </div>
 <div class='scrolltop'>
    <div class='scroll icon'><i class="fa fa-4x fa-angle-up"></i></div>
</div>
 
 
 
<div id="userLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="width:50%; float:left; color:#fff; font-family:Arial, Helvetica, sans-serif">User Login</h4>
            </div>
             <?php echo form_open('user/userLogin');?> 
                <div class="modal-body">
                    <div class="row" style="padding:0 20px 20px 20px">
                    
                                                
                    <div class="form-group">
                        <label class="control-label col-sm-4 arialfont"> Email<span class="require">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="username" required placeholder="Email Address" class="form-control"  style="margin-bottom:10px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 arialfont"> Password<span class="require">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" name="password" required  class="form-control"  placeholder="Password"/>
                        </div>
                    </div>
                    
                    
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="login" value="Login" class="btn btn-success pull-right" />
                  </div>
             <?php echo form_close();?>
        </div>
    </div>
</div>
<div id="upsateContent" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="width:50%; float:left; color:#fff; font-family:Arial, Helvetica, sans-serif">নতুন সংবাদ</h4>
            </div>
             <?php echo form_open_multipart('user/new_content_home/');
		 	echo $this->session->flashdata('successMsg');
		 ?> 
                <div class="modal-body">
                    <div class="row" style="padding:0 20px 20px 20px">
                    
            
             			 <div class="col-sm-11 col-sm-offset-1">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="event-name"> শিরোনাম <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="hidden" name="pagetype" id="pagetype" class="form-control" />
                            <input type="text" name="headline" required class="form-control" 
                            placeholder=' শিরোনাম ' onFocus="this.placeholder=''"  style="margin-bottom:5px;"
                            onBlur="this.placeholder='শিরোনাম'">
                            <?php echo form_error('headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                         </div>
                        </div>
                        
                      
                        
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="event-name"> বিস্তারিত </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea name="message" class="form-control"  placeholder='বিস্তারিত' rows="5" cols="40"  style="margin-bottom:5px;"
                             onFocus="this.placeholder=''" onBlur="this.placeholder='বিস্তারিত'"></textarea>
                         </div>
                        </div>
                        
                       
                      <div class="form-group">
                            <label class="control-label col-sm-4">ছবি</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="file" name="photo" class="form-control inputForm">
                         </div>
                        </div>
                        
                      
                        </div>
                    
                    
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="newentry" value="সাবমিট" class="btn btn-success pull-right" />
                  </div>
             <?php echo form_close();?>
        </div>
    </div>
</div>
<?php if($this->session->flashdata('errormsg') && $this->session->flashdata('errormsg')!=""){
?>

<script>
$(document).ready(function(){
	$("#regModal").trigger("click");
});
</script>
<?php
}
?>

<div id="regModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="width:50%; float:left; color:#fff; font-family:Arial, Helvetica, sans-serif">New Account</h4>
            </div>
             <?php echo form_open_multipart('user/registration');?> 
                <div class="modal-body">
                    <div class="row" style="padding:0 20px 20px 20px">
                    
                                                
                   <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="fullname" required placeholder="Full Name" class="form-control"  style="margin-bottom:5px;"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="phone" required  placeholder="Phone Number" class="form-control"  style="margin-bottom:5px;"/>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="email" name="email" required placeholder="E-mail Address" class="form-control"  style="margin-bottom:5px;"/>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" name="password" required  class="form-control"  placeholder="Password" style="margin-bottom:5px;"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" required name="confirmpassword" class="form-control"  placeholder="Re-type Password" style="margin-bottom:5px;"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                    <input type="file" name="photo[]" class="file" style="margin-bottom:5px;">                                                    
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="col-sm-12" style="margin-top:10px;">
                                <input type="checkbox" required name="agree"/>
                                <label style="font-size:11px;">I Agree to the risingnews24.com <a href="#">Terms & Conditions.</a></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4"></label>
                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                            <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                        </div>-->
                     </div> 
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="login" value="Login" class="btn btn-success pull-right" />
                  </div>
             <?php echo form_close();?>
        </div>
    </div>
</div>

<?php /*?><div id="regModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#0194e8">
                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="width:50%; float:left; color:#fff">New Acocunt</h4>
            </div>
                <?php echo form_open('user/registration');?>
            <div class="modal-body">                            	
                <div class="col-sm-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="fullname" required placeholder="Full Name" class="form-control inputForm" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="phone" required  placeholder="Phone Number" class="form-control inputForm" />
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="email" name="email" required placeholder="E-mail Address" class="form-control inputForm" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="username" required placeholder="User Name" class="form-control inputForm" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" required name="confirmpassword" class="form-control inputForm"  placeholder="Re-type Password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                    <input type="file" name="photo[]" class="file">                                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12" style="margin-top:10px;">
                                <input type="checkbox" required name="agree"/>
                                <label style="font-size:11px;">I Agree to the risingnews24.com <a href="#">Terms & Conditions.</a></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4"></label>
                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                            <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                        </div>
                     </div>                               
            </div>
             <?php echo form_close();?>
            <div class="modal-footer" style="border:none;">
                
            </div>
        </div>
    </div>
</div><?php */?>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/arrow.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.fitvids.js"></script>
<script src="<?php echo base_url();?>assets/js/scrpit.js"></script>-->

</body>

</html>





