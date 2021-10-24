<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.marqueeElement {
    /*height:58px;
    width:58px;
    color: #ccc;
    border: 1px solid #666;*/
    position:absolute;
	width:100%;
	height:250px;
	float:left;
}
#mholder {
    height: 415px;
    width:100%;
	float:left;
    position: absolute;
    overflow: hidden;
}
</style>
        <h2 style="margin-left:30px; font-size:22px; margin-bottom:10px">
            <a href="#" style="border:none; color:#333">ফটো  গাল্যারী</a>
        </h2>
<div class="col-sm-12 col-md-3" style="margin:0; padding-right:2px;">
       
        <div class="big_img" style="min-height:410px; padding:10px; text-align:justify">
           <a href="#"><img src="<?php echo base_url('asset/uploads/photographer/'.$dpg['photo']);?>" 
            alt="<?php echo $dpg['firstname'];?>" style="width:34%; float:left; margin-right:10px; border:1px solid #ccc"></a>
            <h3 style="margin:0 5px 5px 5px; padding:0 5px 5px 5px; font-size:25px; "><?php echo $dpg['firstname'];?></h3>
            	<div id="selectedPCapt"><?php echo $bigphoto['photogallery_name'];?></div>
        </div>
        
    </div>
    
                                            
<div class="col-sm-12 col-md-9">                                            
    <div class="col-sm-12 col-md-8" style="margin:0; padding:0">
        <img src="<?php echo base_url('asset/uploads/photogallery/'.$bigphoto['image']);?>" alt="<?php echo $bigphoto['photogallery_name'];?>" style="width:100%; height:auto; border:5px solid #fff" id="bigphoto"/>
    </div>
    
    <div class="col-sm-12 col-md-4" style="margin:0; padding:0">
    	
		
        
        <div id="mholder">
        <?php 
		$i =0;
		foreach($picture_gallery->result() as $pic):
			$images = $pic->image;
			$imagetitle = $pic->photogallery_name;
			$photographer_id = $pic->photographer_id;
		$i++;	
		?>
        <div class="marqueeElement">
            <div class="col-sm-12" style="margin-bottom:7px;cursor:pointer;">
                <img src="<?php echo base_url('asset/uploads/photogallery/'.$images);?>" alt="<?php echo $imagetitle;?>" 
                style="width:100%; height:auto;border:5px solid #fff" id="thumbphoto<?php echo $i;?>" onclick="changePhoto('<?php echo $images;?>','<?php echo $i;?>')"/>
                <input type="hidden" name="photocaption" id="photocaption<?php echo $i;?>" value="<?php echo $imagetitle;?>" />
            </div>
        </div>
        <?php endforeach;?>
        
            
        </div>

    </div>
</div>



  <script>
  
  $(document).ready(function() {
    var i = 0;
    $(".marqueeElement").each(function() {
          var $this = $(this);
          $this.css("top", i);
          i += 200;
          doScroll($this);
    });
});

    function doScroll($ele) {
        var top = parseInt($ele.css("top"));
        if(top < -200) {
            top = 180;
            $ele.css("top", top);
        }
        $ele.animate({ top: (parseInt(top)-200) },5000,'linear', function() {doScroll($(this))});
    }
	
  	function changePhoto(imgsrc,id){
		//alert(imgsrc);
			var selected = $("#thumbphoto"+id).attr('src');
			var photocaption = $("#photocaption"+id).val();			
			$("#selectedPCapt").html(photocaption);
			//alert(selected);
			var image = $("#bigphoto");
			image.fadeOut('fast', function () {
				image.attr('src', selected);
				image.fadeIn('fast');
			});
	}   
</script>