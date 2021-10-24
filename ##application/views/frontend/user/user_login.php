    <div class="container">
    	
        
        <div class="content_area">
		  <div class="col-sm-5 col-sm-offset-3"  style="margin-top:7%;margin-bottom:5%;">
							
							
							<!--<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="#">Forgot password?</a>
									</div>
								</div>
							</div>-->
                             <?php echo form_open('user/userLogin');
								//echo $this->session->flashdata('msg');
							?>
                            <div class="form-group">
                            	<h2 style="font-family:Arial, Helvetica, sans-serif; font-size:30px;margin:0; padding:0">User Login</h2>
                            </div>
                            <div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username');?>">
                                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
								
							</div>
						<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password');?>">
                                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
								
							</div>
							<div class="form-group">
                                <input type="submit" name="login" value="Login" class="btn btn-success" />
							</div>

							 <?php echo form_close();?>
							
							
						</div>
       </div>
 	
    
  </div>
</div>

