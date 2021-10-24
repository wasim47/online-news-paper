<?php include('admin_tophead.php');?>
<body>
	<div class="navbar navbar-default header-highlight" style="background:#fff">
		<div class="navbar-header" style="width:100px; height:auto; background:#fff; border:0; padding:10px;">
			<a href="<?php echo base_url();?>" target="_blank">
            <img src="<?php echo base_url();?>assets/images/logo.gif" alt="" style="width:100%; height:auto"></a>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>asset/admin/images/flags/gb.png" class="position-left" alt="">
						Language
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li><a class="deutsch"><img src="<?php echo base_url();?>asset/admin/images/flags/gb.png" alt=""> English</a></li>
						<li><a class="ukrainian"><img src="<?php echo base_url();?>asset/admin/images/flags/bd.png" alt=""> Bangla</a></li>
					</ul>
				</li>

			

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<!--<img src="<?php echo base_url();?>asset/admin/images/demo/users/face11.jpg" alt="">-->
                        <img src="<?php echo base_url('asset/uploads/admin/'.$this->session->userdata('userAccessPhoto'));?>" alt="<?php echo $this->session->userdata('userAccessName');?>">
						<span><?php echo $this->session->userdata('userAccessName');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<!--<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>-->
						<li><a href="<?php echo base_url('admin/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="page-container">
		<div class="page-content">
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<?php /*?><!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left">
                                <img src="<?php echo base_url('asset/uploads/admin/'.$this->session->userdata('userAccessPhoto'));?>" alt="<?php echo $this->session->userdata('userAccessName');?>"></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $this->session->userdata('userAccessName');?></span>
									
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu --><?php */?>


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
                        	<ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Setting</span></a></li>
								
								 <li>
                                    <a href="#"><i class="icon-user"></i> <span>Administration</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/administration_registration');?>"><i class="icon-user-plus"></i> Admin Registration</a></li>
                                        <li><a href="<?php echo base_url('admin/administration_list');?>"><i class="icon-list"></i> Admin List</a></li>
                                    </ul>
                                </li>
                                 <li>
                                        <a href="#"><i class="icon-sync"></i> <span>Configuration</span></a>
                                        <ul>
                                        	<li><a href="<?php echo base_url('admin/configuration');?>"><i class="icon-gear"></i> General Setting</a></li>
                                            <li><a href="<?php echo base_url('admin/passwordChange');?>"><i class="icon-alert"></i> Change Password</a></li>
                                        </ul>
                                    </li>
                              
							</ul>
                            <ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="<?php echo base_url('admin/dashboard');?>" 
                                style="background:#fff; color:#ec2028; font-size:17px; font-weight:bold"><i class="glyphicon glyphicon-globe"></i> <span>Dashboard</span></a></li>
							</ul>
							<ul class="navigation navigation-main navigation-accordion">
                                <li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>News Mangement</span></a></li>
                               <li>
                                    <a href="#"><i class="icon-copy"></i> <span>News Category</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/category_action');?>">Add New Category</a></li>
                                        <li><a href="<?php echo base_url('admin/category_list');?>">Category List</a></li>
                                        <li><a href="<?php echo base_url('admin/sub_category_action');?>">Add New Sub Category</a></li>
                                        <li><a href="<?php echo base_url('admin/sub_category_list');?>">Sub Category List</a></li>
                                        <!--<li><a href="<?php echo base_url('admin/last_category_action');?>">Add New Last Category</a></li>
                                        <li><a href="<?php echo base_url('admin/last_category_list');?>">Last Category List</a></li>-->
                                    </ul>
                                </li>
                                
                                 <li>
                                    <a href="#"><i class="icon-droplet2"></i> <span>News</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/news_action');?>">Add New News</a></li>
                                        <li><a href="<?php echo base_url('admin/homepage_news');?>">Home Page News</a></li>
                                        <li><a href="<?php echo base_url('admin/news_list');?>">News List</a></li>
                                    </ul>
                                </li>
                                 
                        
                        </ul>
                            
                            
                            
                            <ul class="navigation navigation-main navigation-accordion">
                                <li class="active" id="galleryclk"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Gallery Mangement</span></a></li>           
                               <!-- <div id="galleryarea">-->
                                
                                <li>
                                    <a href="#"><i class="icon-stack"></i> <span>Photo Gallery</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/photogallery_registration');?>">New Photo Gallery</a></li>
                                        <li><a href="<?php echo base_url('admin/photogallery_list');?>">Photo Gallery List</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-stack"></i> <span>Homepage Photo Gallery</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/homephoto_registration');?>">New Photo</a></li>
                                        <li><a href="<?php echo base_url('admin/homephoto_list');?>">Photo List</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-stack2"></i> <span>Video Gallery</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/video_registration');?>">New Video</a></li>
                                        <li><a href="<?php echo base_url('admin/home_video');?>">Live Video</a></li>
                                        <li><a href="<?php echo base_url('admin/video_list');?>">Video List</a></li>
                                    </ul>
                                </li>
                            <!--</div>-->
                            </ul>
                            <ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Website Mangement</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Menu</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/menu_registration');?>">Add New Menu</a></li>
										<li><a href="<?php echo base_url('admin/menu_list');?>">Menu List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-stack2"></i> <span>Content</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/content_registration');?>">Add New Content</a></li>
										<li><a href="<?php echo base_url('admin/content_list');?>">Content List</a></li>
									</ul>
								</li>
							
							</ul>
					  </div>
				  </div>
					<!-- /main navigation -->

				</div>
			</div>