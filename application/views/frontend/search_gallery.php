<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area">
                        
                              <div class="row"> 
                                
                                <?php if($searchnewslist->num_rows() > 0){?>
                               		 <div class="col-md-12 col-sm-12">
                                  
                                   
                                   		 <div class="branchmark_archive">
											 <?php
                                                    $engCalalls = array(1,2,3,4,5,6,7,8,9,0);
                                                    $bangCalalls = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
                                                    $searchCount = str_replace($engCalalls, $bangCalalls, $total_pages);
                                                ?>
                                                     
                                                     
                                          <h3><strong class="text-danger">
                                          <?php echo $search_data; ?></strong> - কীওয়ার্ড এর জন্য সর্বোচ্চ 
                                          <span class="text-danger"><?php echo $searchCount;?></span>  টি ফলাফল পায়া গেছে।</h3>
                                        </div>
                                        
                                    
                                            <?php 
                                            $count = 0;
                                            foreach($searchnewslist->result() as $row)
                                            {
                                             $snewstitle=$row->headline;
                                             $newsId=$row->n_id;
                                             $newsSlug=$row->slug;
                                             $date=$row->date;
                                             $time=$row->time;
                                             $newsimage=$row->image;
                                             $auther_name=$row->auther_name;
                                             $short_description_short=$row->full_description;
                                             $news_categorytop=$row->category;
                                             
                                            $dateForm = date("l d F Y", strtotime($date));
                                            include('bangladate.php');
                                            
                                            $read_countNat=$row->read_count;
                                            if($read_countNat!='' || $read_countNat>0){
                                                $totaleadn=$read_countNat;
                                            }
                                            else{
                                                $totaleadn=0;
                                            }
                                    
                                            $busdate = str_replace($engDATE, $bangDATE, $dateForm);
                                            $bustime = str_replace($engDATE, $bangDATE, $time);
                                            $treadn = str_replace($engDATE, $bangDATE, $totaleadn);
                                             ?>
                                             <div class="arvhive_con">
                                                <div class="col-sm-3" style="margin:0; padding:0">
                                                <a href="<?php echo base_url('news/details/'.$newsSlug);?>">
                                                <img src="<?php echo base_url('asset/uploads/news/'.$newsimage);?>" class="img-thumbnail" 
                                                alt="<?php echo $snewstitle; ?>"></a></div>
                                                <div class="col-sm-9"> 
                                                  <div class="sec-info">
                                                    <h3><a href="<?php echo base_url('news/details/'.$newsSlug);?>">
                                                    <h2 style="color:#f79524; font-size:20px;"><?php echo $snewstitle; ?></h2></a></h3>
                                                    <div class="text-danger" style="font-size:13px; margin:5px 0">
                                                      <i class="fa fa-calendar" aria-hidden="true"></i>  
													  <?php echo $busdate;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                      <i class="fa fa-clock-o" aria-hidden="true"></i> 
                                                      <?php echo $bustime;?>&nbsp;&nbsp;&nbsp;
                                                      <?php /*?><i class="fa fa-repeat" aria-hidden="true"></i><?php echo $treadn;?><?php */?>
                                                      
                                                    </div>
                                                  </div>
                                                  <p style="margin-top:10px; line-height:25px;">
                                                    <?php 
                                                            $stringbottom1s = strip_tags($short_description_short);
                                                            if (strlen($stringbottom1s) > 1200) {
                                                                $stringCuts = substr($stringbottom1s, 0, 1200);
                                                                $stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
                                                            }
                                                            ?>
                                                             <?php echo $stringbottom1s; ?>
                                                  </p>
                                                </div>
                                            </div>
								<?php
                                }
                                ?>
                            	  <div class="col-sm-12">
                                    
                                     <div id="paginationData" class="tsc_pagination">
                                        <ul class="pagination"><?php echo "<li>". $paginationdata."</li>"; ?></ul>
                                        <hr>
                                       </div>
                                    </div>
                                    
                                  
                                </div>
                                <?php
                                }
                                else{
                                ?>
                                <div class="col-md-11 col-sm-11">
                                  <div class="row">
                                    <div class="col-sm-16">
                                      <h3>Sorry, we didn't find any result but you can still try:</h3>
                                    </div>
                                    <div class="col-sm-16">
                                      <ul class="icn-list">
                                        <li>Check your spelling.</li>
                                        <li>Try more general words.</li>
                                        <li>Try different words that mean the same thing.</li>
                                        <li><a href="#">Post a request</a> and we will help you.</li>
                                      </ul>
                                      <hr>
                                      <h3>Or you can discover populat topics in:</h3>
                                      <ul class="icn-list">
                                        <li><a href="#">In enim justo.</a></li>
                                        <li><a href="#">Aenean vulputate eleifend tellus.</a></li>
                                        <li><a href="#"> Etiam ultricies nisi vel.</a></li>
                                        <li><a href="#">Nam quam nunc.</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <?php
                                } 
                                ?>
                              
                              </div>
					
                           
                           
                           
                            
                           
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>