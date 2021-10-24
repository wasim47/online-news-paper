<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <h2 style="margin:20px 0 10px 30px; font-size:22px">
            <a href="#" style="border:none; color:#333">ভিডিও</a>
        </h2>
    <?php if($vedioGallery->num_rows() > 0){?>
    <div class="regular slider">
    
   <?php
            $vi=0;
          foreach($vedioGallery->result() as $vedio):
             $vedio_id1=$vedio->photo_album_id;
             $vedio_title1=$vedio->photo_album_name;
             $album_ima1 =$vedio->album_ima;
             $youtube_link1=$vedio->vedio_link;
             $vi++;
            
            ?>
            <div>
             <iframe src="https://www.youtube.com/embed/<?php echo $youtube_link1;?>" frameborder="0" allowfullscreen  style="margin:10px; width:95%; height:auto; float:left;"></iframe>
            </div>
    
            <?php endforeach;?>
  </div>
	<?php
    }
    ?>


