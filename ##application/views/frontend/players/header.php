<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.required{
	color:#f00;
}

.rate_widget {
	overflow:   visible;
	position:   relative;
	width:      100%;;
	height:     32px;
}
.ratings_stars {
	background: url(<?php echo base_url('assets/images/star_highlight.png');?>) no-repeat;
	float:      left;
	height:     28px;
	padding:    2px;
	width:      32px;
	cursor:pointer;
}

.ratings_over {
	float:      left;
	height:     28px;
	padding:    2px;
	width:      32px;
	cursor:pointer;
	background: url(<?php echo base_url('assets/images/star_full.png');?>) no-repeat;
}


</style>
<script src="<?php echo base_url()?>assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ratings_stars').click(function(){
			  $(this).prevAll().andSelf().addClass('ratings_over');
			  var thisval = $(this).attr('title');
			   $('#ratval').val(thisval);
			   $(this).nextAll().removeClass('ratings_over');
		});
    });
	
</script>

<div class="row">
		<div class="actors_wrapper">
    		<div class="actors_banner_area" style="background:url(<?php echo base_url('asset/uploads/actor/banner/'.$ac_det['bannr_photo']);?>)">
            
            <div class="actors-profile">
            	<div class="col-sm-3 col-md-3">
                <img src="<?php echo base_url('asset/uploads/actor/'.$ac_det['photo']);?>" class="roundImg"
                title="<?php echo $ac_det['firstname'].' '.$ac_det['lastname'];?>" alt="<?php echo $ac_det['firstname'].' '.$ac_det['lastname'];?>">
                <div id="r1" class="rate_widget" style="position:absolute; margin-top:130px; margin-left:60px">
                    
                    <?php if($ac_det['ratingVal']==5){?>
                      <div class="ratings_over" title="1"></div>
                      <div class="ratings_over" title="2"></div>
                      <div class="ratings_over" title="3"></div>
                      <div class="ratings_over" title="4"></div>
                      <div class="ratings_over" title="5"></div>
                    <?php 
					}
					elseif($ac_det['ratingVal']==4){
					?>
                     <div class="ratings_over" title="1"></div>
                      <div class="ratings_over" title="2"></div>
                      <div class="ratings_over" title="3"></div>
                      <div class="ratings_over" title="4"></div>
                      <div class="ratings_stars" title="5"></div>
                    <?php 
					}
					elseif($ac_det['ratingVal']==3){
					?>
                     <div class="ratings_over" title="1"></div>
                      <div class="ratings_over" title="2"></div>
                      <div class="ratings_over" title="3"></div>
                      <div class="ratings_stars" title="4"></div>
                      <div class="ratings_stars" title="5"></div>
                    <?php 
					}
					elseif($ac_det['ratingVal']==2){
					?>
                     <div class="ratings_over" title="1"></div>
                      <div class="ratings_over" title="2"></div>
                      <div class="ratings_stars" title="3"></div>
                      <div class="ratings_stars" title="4"></div>
                      <div class="ratings_stars" title="5"></div>
                    <?php 
					}
					elseif($ac_det['ratingVal']==1){
					?>
                     <div class="ratings_over" title="1"></div>
                      <div class="ratings_stars" title="2"></div>
                      <div class="ratings_stars" title="3"></div>
                      <div class="ratings_stars" title="4"></div>
                      <div class="ratings_stars" title="5"></div>
                    <?php 
					}
					?>
                    
                    
                    
                    <input type="hidden" id="ratval" name="ratingVal" value="<?php //echo $ratingVal;?>" />
                </div>
            </div>
            <div class="col-sm-3 col-md-3 pull-left"><h2><?php echo $ac_det['firstname'].' '.$ac_det['lastname'];?></h2></div>
            <div class="col-sm-3 col-md-3 pull-right"><h2><?php //echo $pagetitle;?></h2></div>
            </div>
    </div>
    	</div>
</div>
<div class="row">
		<div class="bottom_menu">
        	<div class="container">
            <div class="col-sm-9 col-sm-offset-3">
            	<ul>
                	<li><a href="<?php echo base_url('players/details/?i='.base64_encode($playersid).'&&p='.base64_encode('biography'));?>">Biography</a></li>
                    <li><a href="<?php echo base_url('players/details/?i='.base64_encode($playersid).'&&p='.base64_encode('photos'));?>">Photos</a></li>
                    <li><a href="<?php echo base_url('players/details/?i='.base64_encode($playersid).'&&p='.base64_encode('videos'));?>">Videos</a></li>
                    <li><a href="<?php echo base_url('players/details/?i='.base64_encode($playersid).'&&p='.base64_encode('awards'));?>">Awards</a></li>
                </ul>
            </div>
            </div>
            
    </div>
</div>