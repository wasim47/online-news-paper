<?php
if($contentUpdate->num_rows()>0){
foreach($contentUpdate->result() as $ctD);
	$id=$ctD->id;
	$content_type=$ctD->content_type;
	$headline=$ctD->headline;
	$message =$ctD->message;
	$image =$ctD->image;
	$newstitle='এডিট '.$retpagt;
}
else{
	$id='';
	$content_type=set_value('content_type');
	$headline=set_value('headline');
	$message=set_value('message');
	$image ='';
	$newstitle='নতুন '.$retpagt;
}
?>
<style>
.required{
	color:#f00;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">		
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
      <div class="col-md-9 col-sm-12" style="margin-top:3%;">
       
         <?php echo form_open_multipart('user/new_content/?c='.base64_encode($originptype));
		 	echo $this->session->flashdata('successMsg');
		 ?>
         <div class="col-sm-12">
        	<h3 style="font-size:30px; margin-bottom:30px;"> <?php echo $newstitle;?> </h3>
            
              <div class="col-sm-7 col-sm-offset-1">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name"> শিরোনাম <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="headline" required class="form-control" 
                    placeholder=' শিরোনাম ' value="<?php echo $headline; ?>"  onFocus="this.placeholder=''"  style="margin-bottom:5px;"
                    onBlur="this.placeholder='শিরোনাম'">
                    <?php echo form_error('headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                 </div>
                </div>
                
              
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name"> বিস্তারিত </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="message" class="form-control"  placeholder='বিস্তারিত' rows="5" cols="40" onFocus="this.placeholder=''"  
                    style="margin-bottom:5px;" onBlur="this.placeholder='বিস্তারিত'"><?php echo $message; ?></textarea>
                 </div>
                </div>
                
               
              <div class="form-group">
                    <label class="control-label col-sm-4">ছবি</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="file" name="photo" class="form-control inputForm" style="width:50%; float:left">
                    <?php if($image!=""){?>
                    <img src="<?php echo base_url('asset/uploads/user/'.$originptype.'/'.$image);?>"  style="width:49%; float:left; height:auto; margin-left:1%" />
                    <?php } ?>
                 </div>
                </div>
            	<div class="form-group">
                    <label class="control-label col-sm-4"></label>
                    <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="stillimg" value="<?php echo $image; ?>">
                    <input type="submit" name="newentry" value="সাবমিট" class="btn btn-success btn-submit" />
                    </div>
                </div>
              
                </div>
             </div>
        <?php echo form_close();?>
         
      </div>
      </div>
      </div>
    
    
  </div>
</div>
