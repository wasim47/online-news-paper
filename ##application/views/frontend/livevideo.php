<?php if($home_video->num_rows() > 0){
  	 $hmv = $home_video->row_array();
	 $vedio_title1=$hmv['photo_album_name'];
	 $youtube_link1=$hmv['vedio_link'];	
	?>
   <iframe src="https://www.youtube.com/embed/<?php echo $youtube_link1;?>" title="<?php echo $vedio_title1;?>" frameborder="0" allowfullscreen  style="width:100%; height:250px; float:left; margin-bottom:10px;"></iframe>
	<?php
    }
    ?>


