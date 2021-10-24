
<div class="row">
    <div class="container">
        <div class="actormiddle">
        	<div class="col-sm-12" style="margin:0; padding:0">
                        <div class="middlecon">
                         <div class="awardarea">
                                	<?php 
									foreach($vocabulary->result() as $voc){
										$headline=$voc->headline;
										$pdffile=$voc->pdffile;
									  ?> 
                                     <iframe src="<?php echo base_url('asset/uploads/vocabulary/pdf/'.$pdffile);?>" scrolling="no" frameborder="0" 
                                     style="width:100%; height:800px; padding:0; margin:0;"></iframe> 
								   <?php
                                        }
                                    ?>
                                </div>
                                
                        </div>
                        
                         <?php if($paginationdata){?>
										<div class="row">
                                        	<div id="paginationData" class="tsc_pagination" style="text-align:center">
                                            	<ul class="pagination">
                                                <li><a href="#"><?php echo $paginationdata; ?></a></li>
                                            </ul>
                                           </div>
                                        </div>
                                        <?php } ?>
                </div>
            </div>
            
        </div>
    </div>
</div>