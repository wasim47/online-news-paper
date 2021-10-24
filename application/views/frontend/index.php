<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('bangladate.php');?>
<div class="container">
      <div class="row">
         <div class="content_area">
             <div class="col-sm-12 col-md-9">
                <div class="entertainment_section">
                    <div class="row">
           			  <div class="col-sm-12 col-md-12 col-xs-12" style="margin:0; padding:0 5px">
                         <div class="content-slider">
                               <ul id="homeslider">
                                    <?php 
                                        foreach($zeroRowNews->result() as $zRow){
                                        $urlz = base_url('details/'.$zRow->slug);
                                    ?>
                                        <li>
                                             <div class="col-sm-12 col-md-12 col-xs-12" style="margin:0; padding:0">                                                
                                                <div class="big_img">
                                                    <a href="<?php echo $urlz;?>"><img src="<?php echo base_url('asset/uploads/news/'.$zRow->image);?>" class="img-responsive" 
                                                    alt="<?php echo $zRow->headline;?>" title="<?php echo $zRow->headline;?>"  style="min-height:200px;"></a>
                                                    <div class="big_caption">
                                                        <a href="<?php echo $urlz;?>"><?php echo $zRow->headline;?></a>
                                                    </div>
                                                </div>
                                            </div>
                
                                         </li>
                                     <?php 
                                           }
                                       ?>
                                </ul>
                           </div>
                    </div>                      
              		</div>
             		<div class="row">              
						  <?php 
                          $count = 0;
                          foreach($showCategory->result() as $newsCat):
                           $ncategoryId = $newsCat->cid;
                           $newsCatname = $newsCat->cat_name;
                           $catColor = $newsCat->color;
                          $sqlf = "SELECT * FROM news_manage WHERE category = ?  ORDER BY n_id DESC LIMIT 6";
                          $newsDisplay = $this->db->query($sqlf, array($ncategoryId));
                          //$count++;
                          ?>                          
                            <div class="col-sm-12 col-md-12 col-xs-12" style="margin:0; padding:0 5px">              
                                <div class="title_area">
                                    <a href="#"><?php echo $newsCatname;?></a>
                                </div>
                                <div class="row">
                                        
                                      <?php 
                                        $countT = 0;
                                        foreach($newsDisplay->result() as $tRow){
                                        $countT++;
                                        $urlt = base_url('details/'.$tRow->slug);
                                        $n_id[] = $tRow->n_id;
                                    ?>                            
                                        <div class="col-sm-4">                                                
                                            <div class="big_img">
                                                <?php 
                                                    if($tRow->image!=""){
                                                    $limit = 300;
                                                ?>
                                                <a href="<?php echo $urlt;?>">
                                                <img src="<?php echo base_url('asset/uploads/news/'.$tRow->image);?>" class="img-responsive" 
                                                alt="<?php echo $tRow->headline;?>" title="<?php echo $tRow->headline;?>"></a>
                                                <?php 
                                                    }
                                                    else{
                                                        $limit = 1100;
                                                    }
                                                 ?>
                                                <div class="big_caption">
                                                    <a href="<?php echo $urlt;?>"><?php echo $tRow->headline;?></a>
                                                </div>
                                                 <div class="big_details">
                                                    <p>
                                                    <?php 
                                                    $string = strip_tags($tRow->full_description);
                                                    if (strlen($string) > $limit) {
                                                        $stringCut = substr($string, 0, $limit);
                                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="'.$urlt.'"> বিস্তারিত</a>'; 
                                                    }
                                                    echo $string; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                   ?>
                                    </div>
                                </div>                                
                        <?php endforeach;?>  
                        </div>
                    <div class="row">
						<?php include('home_photogallery.php');?>
                    </div>
                </div>
            </div>
             <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                 <div class="entertainment_section" style="margin-left:10px; width:98%">
					 <?php include('right_sidebar.php');?>
                 </div>
              </div>    
        </div>        
    </div>        
</div>
       
       
     
     
     