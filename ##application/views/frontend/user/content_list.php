<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">	
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
   
    
   

      <div class="col-md-9 col-sm-12">
       
         <div class="my-stats" style="margin-top:10px;">
            <div class="panel">
               <div style="background-color: #f5f5f5; color: #68aa47;font-size:20px" class="panel-heading" >
               <i class="glyphicon glyphicon-list-alt icon-padding"></i> <?php echo 'আমার '.$retpagt; ?>
               </div>
               <div class="panel-body">
                	<table class="table datatable-show-all" width="100%">
                                    <thead>
                                      <tr>
                                         <th width="4%">ক্রমিক</th>
                                         <th width="29%">শিরোনাম</th>
                                         <th width="48%">বিস্তারিত</th>
                                         <th width="10%">ছবি</th>
                                        <th width="9%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($contentUpdate->result() as $ctD):
										$id=$ctD->id;
										$content_type=$ctD->content_type;
										$headline=$ctD->headline;
										$message =$ctD->message;
										$image =$ctD->image;
									if($i%2!=0){
										$col = '#fff';
									}
									else{
										$col = '#eaeaea';
									}
				
									$i++;
									?>
                                      <tr style="background:<?php echo $col;?>">
                                       <td><?php echo $i;?></td>
                                       <td><?php echo $headline; ?></td> 
                                       <td><?php echo $message; ?></td>                                     
                                       <td><img src="<?php echo base_url('asset/uploads/user/'.$originptype.'/'.$image);?>" style="width:80px; height:auto" /></td>
                                         
                                         
                                         <td class="text-center">
                                         
                                         <a href="<?php echo base_url('user/new_content/?c='.base64_encode($originptype).'&id='.base64_encode($id));?>" 
                                         style="color:#EDBB0E"><i class="glyphicon glyphicon-edit"></i></a>
                                         <a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','user_content','id');" 
                                         style="color:#ff0000"> <i class="glyphicon glyphicon-trash"></i></a>        
										
									</td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
               </div>
            </div>
         </div>
         
      </div>
      </div>
      </div>
    
    
  </div>
</div>
