
<div class="row">
    <div class="container">
        <div class="actormiddle">
        	<div class="col-sm-12" style="margin:0; padding:0">
            	<div class="middlecon">
                         <div class="awardarea">
                                <div id="winner_content">
                                	<ul>
                                	<?php 
									foreach($vocabulary->result() as $voc){
										$headline=$voc->headline;
										$details=$voc->details;
									  ?> 
                                          <li>
                                            <h3 itemprop="headline" class="title name">
                                                <span><?php echo $headline;?></span>
                                                
                                                <span class="icon-right-open"></span></h3>
                                            <p class="movie-name"><?php echo $details;?></p>
                                        </li>
								   <?php
                                        }
                                    ?>
                                    </ul>
                                </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>