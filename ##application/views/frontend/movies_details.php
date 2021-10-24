<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main_wrapper_bg">

                       

                        <div class="content_area" style="margin-top:0; padding-top:0">
                            <div class="row">
                                 <div class="col-sm-12 col-md-12" style="margin:0; padding:0 5px">
                                 <img src="<?php echo base_url('asset/uploads/movies/'.$movies_details['mv_banner']);?>" style="width:100%; height:auto;" /></div>
                                
                                <div class="col-sm-12 col-md-12">
                                	<div class="movie_details">
                                		<h3><?php echo $movies_details['mv_name'];?><br />
                                        <small style="font-size:14px;"><?php echo $movies_details['mv_subtitle'];?></small>
                                        </h3>
                                        <h5><?php echo 'Producer: '.$movies_details['mv_producer'];?></h5>
                                        <h5><?php echo 'Director: '.$movies_details['mv_director'];?></h5>
                                        <h5><?php echo 'Main Actor: '.$movies_details['mv_main_actor'];?></h5>
                                        <h5><?php echo 'Actors: '.$movies_details['mv_actor'];?></h5>
                                        <h5><?php echo 'Budget: '.$movies_details['mv_budget'];?></h5>
                                        <h5><?php echo 'Realese Date: '.$movies_details['mv_realese_date'];?></h5>
                                        <h5><?php echo 'Realese Thetre: '.$movies_details['mv_realese_theater'];?></h5>
                                        <p style="margin-top:20px;"><?php echo $movies_details['mv_details'];?></p>
                                    </div>
                                </div>
                                
                            </div>

                           <div class="row">
                                <?php include('video_bottom.php');?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
       </div>