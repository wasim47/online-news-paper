<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo base_url();?>assets/jssor/jssor.js"></script>
<link type="text/css" href="<?php echo base_url();?>assets/jssor/jssor.css" rel="stylesheet">

<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="margin:0; padding:0">        
<h2 class="title_area"><a href="#">ফটো  গাল্যারী</a></h2>
<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;right:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
<!-- Loading Screen -->
<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;right:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo base_url();?>assets/jssor/img/spin.svg" />
</div>
<div data-u="slides" style="cursor:default;position:relative;top:0px;right:240px;width:720px;height:480px;overflow:hidden;">



<?php 
		$i =0;
		
		foreach($picture_gallery->result() as $pic):
			$images = $pic->image;
			$imagetitle = $pic->photogallery_name;
			$photographer_id = $pic->photographer_id;
		$i++;	
		?>
           <div data-p="150.00">
                <img data-u="image" src="<?php echo base_url('asset/uploads/photogallery/'.$images);?>" alt="<?php echo $imagetitle;?>" title="<?php echo $imagetitle;?>" />
                <img data-u="thumb" src="<?php echo base_url('asset/uploads/photogallery/'.$images);?>" />
                <div style="width:100%; height:50px; color:#fff; padding:10px; background:rgba(0,0,0,0.3); 
                position:absolute; bottom:0; float:left; margin-top:-50px"><?php echo $imagetitle;?></div>
            </div>
            
        <?php endforeach; ?>
        
<!--
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/004.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/004-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/005.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/005-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/006.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/006-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/007.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/007-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/008.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/008-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/009.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/009-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/010.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/010-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/013.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/013-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/014.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/014-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/015.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/015-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/016.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/016-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/017.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/017-s99x66.jpg" />
</div>
<div data-p="150.00">
<img data-u="image" src="<?php echo base_url();?>assets/jssor/img/018.jpg" />
<img data-u="thumb" src="<?php echo base_url();?>assets/jssor/img/018-s99x66.jpg" />
</div>-->

</div>
<!-- Thumbnail Navigator -->
<div data-u="thumbnavigator" class="jssort101" style="position:absolute;right:0px;top:0px;width:240px;height:480px;background-color:#000;" data-autocenter="2" data-scale-right="0.75">
<div data-u="slides">
<div data-u="prototype" class="p" style="width:99px;height:66px;">
<div data-u="thumbnailtemplate" class="t"></div>
<svg viewbox="0 0 16000 16000" class="cv">
<circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
<line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
<line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
</svg>
</div>
</div>
</div>
<!-- Arrow Navigator -->
<div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2">
<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
<circle class="c" cx="8000" cy="8000" r="5920"></circle>
<polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
<line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
</svg>
</div>
<div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:270px;" data-autocenter="2">
<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
<circle class="c" cx="8000" cy="8000" r="5920"></circle>
<polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
<line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
</svg>
</div>
</div>
</div>
<script type="text/javascript">jssor_1_slider_init();</script>