<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
        <div class="content_area" style="padding:20px">
             <div class="col-sm-12">
        
				 <?php 
                   foreach($actorslist->result() as $rank){
                            $actorimg=$rank->photo;
							$ranking=$rank->ranking;
                            $actor_name=$rank->firstname.''.$rank->lastname;
                      ?>  
        
                      <div class="col-sm-3"> 
                          <!--<div><?php //echo $photo_name;?></div>-->
                          <div class="big_img" style="margin-bottom:20px">
                              <a href="<?php echo base_url('actors/details/?i='.base64_encode($rank->user_id));?>">
                              <img alt="<?php echo $actor_name;?>" title="<?php echo $actor_name;?>" 
                              src="<?php echo base_url()?>asset/uploads/actor/<?php echo $actorimg; ?>" style="width:100%; height:auto"></a>
                              <div style="width:35px; height:35px; border-radius:50%; background:#FF6600; position:absolute;float:right; margin:-40px 0 0 230px; padding-top:4px; font-size:20px; text-align:center; color:#fff"><?php echo $ranking;?></div>                          
                              <div class="photo_caption" style="text-align:center; padding:10px; font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:bold">
							  <?php echo $actor_name;?></div>
                              </div>
                      </div>
                        
                     <?php
                    }
                ?>
                
             </div>
      </div>
</div>
