<div class="row">
<div class="userinfo_right">
    <ul class="nav nav-tabs nav-justified" role="tablist">
    <li class="active"><a href="#recent" role="tab" data-toggle="tab">সর্বশেষ সংবাদ</a></li>
    <li><a href="#popular" role="tab" data-toggle="tab">সর্বোচ্চ পঠিত</a></li>
     
    </ul>
    <div class="tab-content">
    
    <div class="tab-pane active" id="recent">
      <ul class="list-unstyled">
        <?php
        foreach($latest_news->result() as $latestn):
            $titlenatl=$latestn->headline;
            $newsIdl=$latestn->n_id;
            $image_title_shortnatl=$latestn->image_title;
            $full_descriptionl=$latestn->full_description;
            $image_shortnatl=$latestn->image;
            $intslugl= $latestn->slug;
            $datebl = date('l d F Y', strtotime($latestn->date));
            
            $read_countNatl=$latestn->read_count;
            if($read_countNatl!='' || $read_countNatl>0){
                $totaleadnl=$read_countNatl;
            }
            else{
                $totaleadnl=0;
            }
            $treadl = str_replace($engDATE, $bangDATE, $totaleadnl);
            $newsdatel = str_replace($engDATE, $bangDATE, $datebl);
        ?>
        
        
            <li> 
                <div class="col-sm-4 col-md-4" style="margin:0; padding:0">
                    <img src="<?php echo base_url();?>asset/uploads/news/<?php echo $image_shortnatl; ?>" alt="<?php echo $titlenatl; ?>" class="img-thumbnail"/> 
                </div>
                <div class="col-sm-8 col-md-8">
                  <h4><a href="<?php echo base_url();?>news/details/<?php echo $intslugl;?>"><?php echo $titlenatl; ?></a></h4>
                  <div class="newsdate">
                      <?php echo $newsdatel;?><br>
                      <?php echo $treadl;?>
                  </div>
                </div>
            </li>
          
       <?php endforeach;?>
        
      </ul>
    </div>
    <div class="tab-pane" id="popular">
      <ul class="list-unstyled">
        <?php
        foreach($popular_news->result() as $popular):
            $titlenat=$popular->headline;
            $newsIdnat=$popular->n_id;
            $image_title_shortnat=$popular->image_title;
            $full_description=$popular->full_description;
            $image_shortnat=$popular->image;
            $intslug= $popular->slug;
            $dateb = date('l d F Y', strtotime($popular->date));
            
            $read_countNat=$popular->read_count;
            if($read_countNat!='' || $read_countNat>0){
                $totaleadn=$read_countNat;
            }
            else{
                $totaleadn=0;
            }
            $treadn = str_replace($engDATE, $bangDATE, $totaleadn);
            $newsdate = str_replace($engDATE, $bangDATE, $dateb);
        ?>
        <li> 
            <div class="col-sm-4 col-md-4" style="margin:0; padding:0">
                <img src="<?php echo base_url();?>asset/uploads/news/<?php echo $image_shortnat; ?>" alt="<?php echo $titlenat; ?>" class="img-thumbnail"/> 
            </div>
            <div class="col-sm-8 col-md-8">
              <h4><a href="<?php echo base_url();?>news/details/<?php echo $intslug;?>"><?php echo $titlenat; ?></a></h4>
              <div class="newsdate">
                  <?php echo $newsdate;?><br>
                  <?php echo $treadn;?>
              </div>
            </div>
          </li>
       <?php endforeach;?>
      </ul>
    </div>
    

    </div>
</div>

<div class="userinfo_right"><?php include('archaive_right.php');?></div>
<div class="add_space">
    <img src="<?php echo base_url();?>assets/images/addh.jpg" style="width:100%; height:auto">
</div>
<?php //include('socialmedia.php');?>
</div>