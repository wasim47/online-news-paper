<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="mobile-menu-left-overlay"></div>
 <nav class="side-menu hidden-sm hidden-xs">
                       <ul>
                          <li>
                             <a href="javascript:void();" class="close">&times</a>
                          </li>
                          <li><a href="<?php echo base_url('user/dashboard');?>" class='active' style="font-size:20px"><i class="fa fa-home"></i>ড্যাশবোর্ড</a> </li>
                          <li class="titleD">আমার প্রোফাইল</li>
                          <li><a href="#"><i class="fa fa-file"></i>  প্রোফাইল দেখুন</a></li>
                          <li><a href="<?php echo base_url('user/myprofile/?pages='.base64_encode("updateprofile"));?>" ><i class="fa fa-edit"></i> এডিট প্রোফাইল</a></li>
                          <li><a href="#"><i class="fa fa-trash"></i> ডিলেট অ্যাকাউন্ট</a></li>
                          
                          <li class="titleD">আমার ফিচার</li>
                          <li><a href="<?php echo base_url('user/new_content/?c='.base64_encode("feature"));?>"><i class="fa fa-plus"></i> নতুন এন্ট্রি</a></li>
                          <li><a href="<?php echo base_url('user/content_list/?c='.base64_encode("feature"));?>"><i class="fa fa-list"></i>লিস্ট</a></li>
                          
                          <li class="titleD">আমার ভুতের গল্প</li>
                          <li><a href="<?php echo base_url('user/new_content/?c='.base64_encode("story"));?>"><i class="fa fa-plus"></i> নতুন এন্ট্রি</a></li>
                          <li><a href="<?php echo base_url('user/content_list/?c='.base64_encode("story"));?>"><i class="fa fa-list"></i>লিস্ট</a></li>
                          <li class="divider"></li>
                          
                           <li class="titleD">আমার মতামত</li>
                          <li><a href="<?php echo base_url('user/new_content/?c='.base64_encode("comment"));?>"><i class="fa fa-plus"></i> নতুন এন্ট্রি</a></li>
                          <li><a href="<?php echo base_url('user/content_list/?c='.base64_encode("comment"));?>"><i class="fa fa-list"></i>লিস্ট</a></li>
                          <li class="divider"></li>
                         
                        
                         
                         <li class="titleD">স্বাস্থ্য কথা</li>
                          <li><a href="<?php echo base_url('user/new_content/?c='.base64_encode("health"));?>"><i class="fa fa-plus"></i> নতুন এন্ট্রি</a></li>
                          <li><a href="<?php echo base_url('user/content_list/?c='.base64_encode("health"));?>"><i class="fa fa-list"></i>লিস্ট</a></li>
                          <li class="divider"></li>
                          
                          
                          <li class="titleD">সাংবাদিকতা</li>
                          <li><a href="<?php echo base_url('user/new_content/?c='.base64_encode("journalism"));?>"><i class="fa fa-plus"></i> নতুন এন্ট্রি</a></li>
                          <li><a href="<?php echo base_url('user/content_list/?c='.base64_encode("journalism"));?>"><i class="fa fa-list"></i>লিস্ট</a></li>
                          <li class="divider"></li>
                          
                        <li><a href="<?php echo base_url('user/myprofile/?pages='.base64_encode("changepassword"));?>"><i class="icon-switching"></i> পাসওয়ার্ড পরিবর্তন করুন</a></li>
                        <li><a href="<?php echo base_url('user/logout');?>" class=''><i class="icon-sign-out"></i> লগ আউট</a></li>
                       
                       </ul>
                    </nav>