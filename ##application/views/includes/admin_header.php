<?php include('admin_tophead.php');?>
<meta charset="utf-8">
<body>
	<div class="navbar navbar-default header-highlight" style="background:#fff">
		<div class="navbar-header" style="width:100px; height:auto; background:#fff; border:0; padding:10px;">
			<a href="<?php echo base_url();?>" target="_blank">
            <img src="<?php echo base_url();?>assets/images/logo.png" alt="" style="width:100%; height:auto"></a>
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

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<!--<span class="badge bg-warning-400">2</span>-->
					</a>
					
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<!--<img src="<?php echo base_url();?>asset/admin/images/demo/users/face11.jpg" alt="">-->
                        <i class="icon-user"></i>
						<span><?php echo $this->session->userdata('userAccessName');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><!--<span class="badge bg-teal-400 pull-right">58</span>--> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
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

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><i class="icon-user"></i></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $this->session->userdata('userAccessName');?></span>
									
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
                        	<!--<ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Administration</span></a></li>
								
								 <li>
                                        <a href="#"><i class="icon-user"></i> <span>Administration</span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('admin/administration_registration');?>"><i class="icon-user-plus"></i> Admin Registration</a></li>
                                            <li><a href="<?php echo base_url('admin/administration_list');?>"><i class="icon-list"></i> Admin List</a></li>
                                        </ul>
                                    </li>
                                 
                              
							</ul>-->
							<ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>News Mangement</span></a></li>
								
								
                               <li>
									<a href="#"><i class="icon-copy"></i> <span>News Category</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/category_action');?>">Add New Category</a></li>
										<li><a href="<?php echo base_url('admin/category_list');?>">Category List</a></li>
                                        <li><a href="<?php echo base_url('admin/sub_category_action');?>">Add New Sub Category</a></li>
										<li><a href="<?php echo base_url('admin/sub_category_list');?>">Sub Category List</a></li>
                                       <!-- <li><a href="<?php echo base_url('admin/last_category_action');?>">Add New Last Category</a></li>
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
                                
                                 <?php /*?><li>
									<a href="#"><i class="icon-droplet2"></i> <span>Actor</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/actor_registration');?>">Add New Actor</a></li>
										<li><a href="<?php echo base_url('admin/actor_list');?>">Actor List</a></li>
									</ul>
								</li>
                                
                                  <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Players</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/players_registration');?>">Add New Players</a></li>
										<li><a href="<?php echo base_url('admin/players_list');?>">Players List</a></li>
									</ul>
								</li>
                                
                                
                                 <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Movies</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/movies_registration');?>">Add New Movie</a></li>
										<li><a href="<?php echo base_url('admin/movies_list');?>">Movies List</a></li>
									</ul>
								</li>
                               
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Drama</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/drama_registration');?>">Add New Drama</a></li>
										<li><a href="<?php echo base_url('admin/drama_list');?>">Drama List</a></li>
									</ul>
								</li>
                                
                                 <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Serial</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/serial_registration');?>">Add New Serial</a></li>
										<li><a href="<?php echo base_url('admin/serial_list');?>">Serial List</a></li>
									</ul>
								</li>
                                
                                 <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Music</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/music_registration');?>">Add New Music</a></li>
										<li><a href="<?php echo base_url('admin/music_list');?>">Music List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Upcomming Track</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/upcomming_track_registration');?>">Add New Track</a></li>
										<li><a href="<?php echo base_url('admin/upcomming_track_list');?>">Track List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Upcomming Album</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/upcomming_album_registration');?>">Add New Album</a></li>
										<li><a href="<?php echo base_url('admin/upcomming_album_list');?>">Album List</a></li>
									</ul>
								</li>
                                
                                 <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Sports</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/sports_registration');?>">Add New Sports</a></li>
										<li><a href="<?php echo base_url('admin/sports_list');?>">Sports List</a></li>
									</ul>
								</li>
                                
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Theatre</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/theatre_registration');?>">Add New Theatre</a></li>
										<li><a href="<?php echo base_url('admin/theatre_list');?>">Theatre List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Theatre Person</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/theatre_person_registration');?>">Add New Theatre Person</a></li>
										<li><a href="<?php echo base_url('admin/theatre_person_list');?>">Theatre Person List</a></li>
									</ul>
								</li>
                                
                                
                                 <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Singer</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/singer_registration');?>">Add New Singer</a></li>
										<li><a href="<?php echo base_url('admin/singer_list');?>">Singer List</a></li>
									</ul>
								</li>
                                
                                 <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Health Tips</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/healthtips_registration');?>">Add New Health Tips</a></li>
										<li><a href="<?php echo base_url('admin/healthtips_list');?>">Health Tips List</a></li>
									</ul>
								</li>
                                
                                 <li>
									<a href="#"><i class="icon-stack2"></i> <span>Awards</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/awards_registration');?>">New Awards</a></li>
										<li><a href="<?php echo base_url('admin/awards_list');?>">Awards List</a></li>
									</ul>
								</li>
                                
                                
                                
                                 <li>
									<a href="#"><i class="icon-stack2"></i> <span>Books</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/books_registration');?>">New Books</a></li>
										<li><a href="<?php echo base_url('admin/books_list');?>">Books List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-stack2"></i> <span>Articles</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/articles_registration');?>">New Articles</a></li>
										<li><a href="<?php echo base_url('admin/articles_list');?>">Articles List</a></li>
									</ul>
								</li>
                                
                                 <li>
									<a href="#"><i class="icon-stack2"></i> <span>Story</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/story_registration');?>">New Story</a></li>
										<li><a href="<?php echo base_url('admin/story_list');?>">Story List</a></li>
									</ul>
								</li>
                                
                                
                                 <li>
									<a href="#"><i class="icon-stack2"></i> <span>Interview</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/interview_registration');?>">New Interview</a></li>
										<li><a href="<?php echo base_url('admin/interview_list');?>">Interview List</a></li>
									</ul>
								</li>
                                
                                
                               <li>
									<a href="#"><i class="icon-stack2"></i> <span>Vocabulary</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/vocabulary_registration');?>">New Vocabulary</a></li>
										<li><a href="<?php echo base_url('admin/vocabulary_list');?>">Vocabulary List</a></li>
									</ul>
								</li>
                                
                               <li>
									<a href="#"><i class="icon-stack2"></i> <span>Verb</span></a>
									<ul>
										<li><a href="javascript:void()">Category</a>
                                        	<ul>
                                                <li><a href="<?php echo base_url('admin/verb_category_registration');?>">New Category</a></li>
                                                <li><a href="<?php echo base_url('admin/verb_category_list');?>">Category List</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void()">Verb Content</a>
                                        	<ul>
                                                <li><a href="<?php echo base_url('admin/verb_details_registration');?>">New Vocabulary</a></li>
                                                <li><a href="<?php echo base_url('admin/verb_details_list');?>">Vocabulary List</a></li>
                                            </ul>
                                        </li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Photo Grapher</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/photographer_registration');?>">Add New Photo Grapher</a></li>
										<li><a href="<?php echo base_url('admin/photographer_list');?>">Photo Grapher List</a></li>
									</ul>
								</li><?php */?>
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Advertisement</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/advertisement_registration');?>">Add New Advertisement</a></li>
										<li><a href="<?php echo base_url('admin/advertisement_list');?>">Advertisement List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-stack"></i> <span>Photo Gallery</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/photogallery_registration');?>">New Photo Gallery</a></li>
										<li><a href="<?php echo base_url('admin/photogallery_list');?>">Photo Gallery List</a></li>
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
                              
							</ul>
                           <!-- <ul class="navigation navigation-main navigation-accordion">
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
								
                               
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Events</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/events_registration');?>">Add New Events</a></li>
										<li><a href="<?php echo base_url('admin/events_list');?>">Events List</a></li>
									</ul>
								</li>
                               
                         
                          
                                
                                
                                
                                
								
							</ul> -->
					  </div>
				  </div>
					<!-- /main navigation -->

				</div>
			</div>