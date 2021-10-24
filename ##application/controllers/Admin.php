<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
$this->load->library('Xml_writer');
		$this->load->library("pagination");
		$this->load->helper('Xml');
	}
	
	


/////////////////////// Admin Login Part ////////////////////////////////	 
	
	
	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['title']="GEE 24 News | Bangladesh Leargest Online Job";
        $this->load->view('admin/index',$data);
	}
	
	public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('admin');
          }
          else
          {
                    $usr_result = $this->Index_model->get_userLogin($username, $password);
                    if($usr_result > 0) //active user record is present
                    {
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("admin/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('admin');
                    }
          }
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'userAccessMail'=>'',
				'userAccessName'=> '',
				'userAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('admin', 'refresh');
  }
  	
	
	function dashboard()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Dashboard GEE 24 News | Bangladesh Leargest Online Job";
		$data['totalinst'] = $this->Index_model->getTable('news_manage','n_id','desc');
		$data['totalstd'] = $this->Index_model->getTable('category','cid','desc');
		$data['totalphoto'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['totalvideo'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		
		$data['main_content']="admin/dashboard";
        $this->load->view('admin_template',$data);
	}


/////////////////////// Configuration Part ////////////////////////////////	

public function general()
	{
		
			$data['title'] =  'General Setting | Raisingbd24';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$data['adminUpdate'] = $this->Index_model->getAllItemTable('configuration','','','','','id','desc');
				
				if($this->input->post('registration') && $this->input->post('registration')!=""){
						$config['allowed_types'] = '*';
						$config['remove_spaces'] = true;
						$config['max_size'] = '1000000';
						$config['upload_path'] = './asset/uploads/default/';
						$config['charset'] = "UTF-8";
						$new_name = "Banner_".time();
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
							if (isset($_FILES['userphoto']['name']))
							{
								if($this->upload->do_upload('userphoto')){
									$upload_data	= $this->upload->data();
									$save['logo']	= $upload_data['file_name'];
								}
								else{
									$upload_data	=  $this->input->post('stillimg');
									$save['logo']	= $upload_data;	
								}
							}
						
						
						if($this->input->post('userAccess')!=""){
						$userAccess = $this->input->post('userAccess');
							//print_r($userAccess);
						$impaccess=implode(',',$userAccess);
						}
						else{
						 $impaccess='';
						}
						
						$save['username']	    = $username;
						$save['userid']	    	= $institute_id;
						$save['idcard']	    	= $this->input->post('idcard');
						$save['eseba']	    	= $this->input->post('eseba');
						$save['menu']	    	= $this->input->post('menu');
						$save['def_title']	    	= $this->input->post('def_title');
						$save['fContent']	    	= $this->input->post('fContent');
						$save['features']		= $impaccess;
						$save['created_on']	    = date('Y-m-d');
						$save['active']	    	= 1;
						
						if($this->input->post('user_id')!=""){
							$user_id=$this->input->post('user_id');
							$this->Index_model->update_table('configuration','id',$user_id,$save);
							$s='Updated';
						}
						else{
							$query = $this->Index_model->inertTable('configuration', $save);
							$s='Inserted';
							}
						$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
						redirect('admin/general', 'refresh');
				}
				else{
					$data['main_content']="admin/configuration/general_setting";
					$this->load->view('admin_template', $data);
				}
	}
	
	
	
	
	
	
	public function passwordChange()
	{
			$data['title'] =  'Passwored Change | Raisingbd24';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				if($this->input->post('changePassword')){
					$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$old_password = sha1($this->input->post('oldpassword'));
					$usId = $this->session->userdata('instituteAccessId');
					
					$queryCheck = $this->Index_model->checkOldPass('admin_users',$old_password,$usId);
					//echo $queryCheck->num_rows();
					if($queryCheck->num_rows() >0 ){
						if($this->form_validation->run() != false){
							$password =sha1($this->input->post('password'));
							$passwordHints =$this->input->post('password');
							$dataUpdate = array(
								'password'		=> $password,
								'pass_hints'	=> $passwordHints,
								'active'		=> 1,
								'update_date'	=> date('Y-m-d H:i:s')
							);
							
							$query = $this->Index_model->updateTable('admin_users','id',$usId,$dataUpdate);
							if($query){
								$this->session->set_flashdata('globalMsg','<div class="alert alert-success">Password Change Successfully </div>');
								redirect($_SERVER['HTTP_REFERER'],'refresh');
							}
						}
						else{
							$data['main_content']="admin/configuration/change_password";
							$this->load->view('admin_template', $data);
						}
					}
					else{
						$this->session->set_flashdata('globalMsg', '<div class="alert alert-danger">Old Password not match </div>');
						redirect($_SERVER['HTTP_REFERER'],'refresh');
					}
				}
				else{
					$data['main_content']="admin/configuration/change_password";
					$this->load->view('admin_template', $data);
				}
	}
	
	
	public function profileUpdate()
	{
		
			$data['title'] =  'Profile Update | Raisingbd24';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				    $data['instituteUpdate'] = $this->Index_model->getAllItemTable('institute','uni_id',$institute_id,'','','uni_id','desc');
					$data['countryAll']= $this->Index_model->getDataById('countryall','parent_id','0','name','asc','');
					$data['division_list']= $this->Index_model->getDataById('divisions','','','name','asc','');
					
					if($this->input->post('registration') && $this->input->post('registration')!=""){
						$this->form_validation->set_rules('institute_name', 'Institute name', 'trim|required');
						$this->form_validation->set_rules('inst_type', 'Institute Type', 'trim|required');
			
						if($this->form_validation->run() != false){
							$config['allowed_types'] = '*';
							$config['remove_spaces'] = true;
							$config['max_size'] = '1000000';
							$config['upload_path'] = './asset/uploads/institute/';
							$config['charset'] = "UTF-8";
							$new_name = "institute_".time();
							$config['file_name'] = $new_name;
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
								if (isset($_FILES['logo']['name']))
								{
									if($this->upload->do_upload('logo')){
										$upload_data	= $this->upload->data();
										$save['logo']	= $upload_data['file_name'];
									}
									else{
										$upload_data	= $this->input->post('stillImage');
										$save['logo']	= $upload_data;	
									}
								}	
							
							$clstype = $this->input->post('class_type');
							$arrayvalctype = join(',',$clstype);
							$save['name']	    = $this->input->post('institute_name');
							$expval=explode(' ',$this->input->post('institute_name'));
							$impval=implode('-',$expval);
							$save['slug']	    	= addslashes(strtolower($impval));
							$save['banglanam']	    = $this->input->post('banglanam');
							$save['subtitle']	    = $this->input->post('subtitle');
							$save['inst_type']	    = $this->input->post('inst_type');
							$save['class_type']	    = $arrayvalctype;
							$save['inst_code']	    = $this->input->post('einno');
							$save['noofstd']	    = $this->input->post('noofstd');
							$save['branchno']	    = $this->input->post('branchno');
							$save['email']	   		= $this->input->post('email');
							$save['contact']	    = $this->input->post('contact');

							$save['telephone']	    = $this->input->post('telephone');
							$save['fax']	    	= $this->input->post('fax');
							$save['division']	    = $this->input->post('division');
							$save['district']	    = $this->input->post('city');
							$save['thana']	    	= $this->input->post('thana');
							$save['street']	    	= $this->input->post('street');
											
							$save['institute_details']	    = $this->input->post('details');
							$save['address']	    = $this->input->post('address');
							$save['date']	    = date('Y-m-d');
							$save['active']	    	= 1;
							
							
							if($this->input->post('uni_id')!=""){
								$uni_id=$this->input->post('uni_id');
								$this->Index_model->update_table('institute','uni_id',$uni_id,$save);
								$s='Updated';
							}
							else{
								$query = $this->Index_model->inertTable('institute', $save);
								$s='Inserted';
							}
								
							
							$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
							redirect(base_url('admin/profileUpdate'), 'refresh');
						}
						else{
							$data['main_content']="admin/configuration/update_profile";
							$this->load->view('admin_template', $data);
						}
					}
					else{
						$data['main_content']="admin/configuration/update_profile";
						$this->load->view('admin_template', $data);
					}
		}
	
/////////////////////// Admin Modification Part ////////////////////////////////	 
	
	function administration_list()
	{
			$data['title'] =  'Admin List | Raisingbd24';

			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$data['title']="Admin List | Raisingbd24";
				$data['admin_list'] = $this->Index_model->getAllItemTable('admin_users','','','','','id','desc');
				
				$data['main_content']="admin/administration/admin_list";
				$this->load->view('admin_template',$data);
	} 
	
	function administration_registration()
	{
		
			$data['title'] =  'Admin Registration | Raisingbd24';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$data['title']="Admin Registration | Raisingbd24";
				$userId=$this->uri->segment(3);
				$data['adminUpdate'] = $this->Index_model->getAllItemTable('admin_users','id',$userId,'','','id','desc');
				
				if($this->input->post('registration') && $this->input->post('registration')!=""){
					if($userId!=''){
						$original_value = $this->db->query("SELECT email FROM admin_users WHERE id = ".$userId)->row()->email;
						if($this->input->post('email') != $original_value) {
						   $is_unique =  '|is_unique[admin_users.email]';
						} else {
						   $is_unique =  '';
						}
						
						$original_value = $this->db->query("SELECT userid FROM admin_users WHERE id = ".$userId)->row()->userid;
						if($this->input->post('userid') != $original_value) {
						   $is_unique1 =  '|is_unique[admin_users.userid]';
						} else {
						   $is_unique1 =  '';
						}
					}
					else{
						$is_unique =  '|is_unique[admin_users.email]';	
						$is_unique1 =  '|is_unique[admin_users.userid]';	
					}
					
					$this->form_validation->set_rules('username', 'Admin Name', 'trim|required');
					//$this->form_validation->set_rules('userid', 'User ID', 'trim|required'.$is_unique1);
					$this->form_validation->set_rules('email', 'Login Email', 'trim|required'.$is_unique);
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					
					if($this->form_validation->run() != false){
						$config['allowed_types'] = '*';
						$config['remove_spaces'] = true;
						$config['max_size'] = '1000000';
						$config['upload_path'] = './asset/uploads/admin/';
						$config['charset'] = "UTF-8";
						$new_name = "admin_".time();
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
							if (isset($_FILES['userphoto']['name']))
							{
								if($this->upload->do_upload('userphoto')){
									$upload_data	= $this->upload->data();
									$save['photo']	= $upload_data['file_name'];
								}
								else{
									$upload_data	=  $this->input->post('stillimg');
									$save['photo']	= $upload_data;	
								}
							}
						
						
						if($this->input->post('userAccess')!=""){
						$userAccess = $this->input->post('userAccess');
							//print_r($userAccess);
						$impaccess=implode(',',$userAccess);
						}
						else{
						 $impaccess='';
						}
						$save['username']	    = $this->input->post('username');
						$save['urlname']	    = $this->input->post('userUrl');
						$save['userid']	    	= $this->input->post('userid');
						$save['contactno']	    = $this->input->post('contactno');
						$save['admin_type']	    = $this->input->post('admintype');
						$save['admin_access']	= $impaccess;
						$save['email']	    	= $this->input->post('email');
						$save['password']	    = sha1($this->input->post('password'));
						$save['pass_hints']	    = $this->input->post('password');
						$save['created_on']	    = date('Y-m-d');
						$save['active']	    	= 1;
						
						if($this->input->post('user_id')!=""){
							$user_id=$this->input->post('user_id');
							$this->Index_model->update_table('admin_users','id',$user_id,$save);
							$s='Updated';
						}
						else{
							$query = $this->Index_model->inertTable('admin_users', $save);
							$s='Inserted';
							}
						$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
						redirect('admin/administration_list', 'refresh');
						
					}
					else{
						$data['main_content']="admin/administration/admin_registration";
						$this->load->view('admin_template', $data);
						}
				}
				else{
					$data['main_content']="admin/administration/admin_registration";
					$this->load->view('admin_template', $data);
				}
	}
	


	
	
/////////////////////// menu ////////////////////////////////	 
	function menu_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Menu List | GEE 24 News";
		$data['menu_list'] = $this->Index_model->getTable('menu','m_id','desc');
		$data['main_content']="admin/menu/menu_list";
        $this->load->view('admin_template',$data);
	} 
	 
  
	
	function menu_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		$data['menuUpdate'] = $this->Index_model->getAllItemTable('menu','m_id',$artiId,'','','m_id','desc');
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','root_id',0,'','','menu_name','asc');
		if(!$artiId){
			$data['title']="menu Registration | GEE 24 News";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required');
		}
		else{
			$data['title']="menu Update | GEE 24 News";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
			$expval=explode(' ',$this->input->post('menu_name'));
			$impval=implode('-',$expval);
				$save['menu_name']	    = addslashes($this->input->post('menu_name'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['menu_type']	    = $this->input->post('menu_type');
				$save['root_id']	    = $this->input->post('root_id');
				$save['sroot_id']	    = $this->input->post('sroot_id');
				$save['page_structure']	    = $this->input->post('page_structure');
				$save['external_link']	    = $this->input->post('externallink');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('menu','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('menu', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/menu_list', 'refresh');
			}
			else{
				$data['main_content']="admin/menu/menu_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/menu/menu_action";
        $this->load->view('admin_template', $data);
	}
	
	
	
	function ajaxData()
	{
		if($this->input->get('root_id')!=""){
			$rid=$this->input->get('root_id');
			$url=base_url()."'/admin/ajaxData?sroot_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('menu','root_id',$rid,'','','menu_name','asc');
			$svar='<select name="sroot_id" class="form-control" style="width:60%;" onChange="getSubMenu('.$url.')">
								<option value="">Sub Menu</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->m_id.'">'.$rootmenu->menu_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('div_id')!=""){
			$rid=$this->input->get('div_id');
			$url="'".base_url()."admin/ajaxData?district_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('districts','division_id',$rid,'','','name','asc');
			$svar='<select name="city" id="city" class="form-control" onChange="getLocation('.$url.')" style="width:30%">
								<option value="">Districts</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->id.'">'.$rootmenu->name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('district_id')!=""){
			$rid=$this->input->get('district_id');
			$sroot_menu = $this->Index_model->getAllItemTable('upazilas','district_id',$rid,'','','name','asc');
			$svar='<select name="thana" id="thana" class="form-control" style="width:30%">
								<option value="">Thana</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->id.'">'.$rootmenu->name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;			
		}
		elseif($this->input->get('cat_id')!=""){
			$rid=$this->input->get('cat_id');
			//$url="'".base_url()."admin/ajaxCategory?subcat_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('sub_category','cat_id',$rid,'','','sub_cat_name','asc');
			$svar='<select name="subcat_id" id="subcat_id" class="form-control">
								<option value="">Sub Categories</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->scid.'">'.$rootmenu->sub_cat_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('usertype')!=""){
			$rid=$this->input->get('usertype');
			if($rid=='Actor'){
				$table = 'actor';
			}
			elseif($rid=='Players'){
				$table = 'players';
			}
			
			$sroot_menu = $this->Index_model->getAllItemTable($table,'','','','','user_id','asc');
			$svar='<select name="userid" id="userid" class="form-control">
					<option value="">Select User</option>';
					 foreach($sroot_menu->result() as $rootmenu):
						$svar .= '<option value="'.$rootmenu->user_id.'">'.$rootmenu->firstname.' '.$rootmenu->lastname.'</option>';
					endforeach;
				$svar .= '</select>';
			echo $svar;
		}
	}


/////////////////////// content ////////////////////////////////	 
	function content_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="content List | GEE 24 News";
		$data['content_list'] = $this->Index_model->getTable('article_manage','a_id','desc');
		$data['main_content']="admin/content/content_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function content_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','','','','','menu_name','asc');
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="content Registration | GEE 24 News";
		}
		else{
			$data['title']="content Update | GEE 24 News";
		}
		$data['contentUpdate'] = $this->Index_model->getAllItemTable('article_manage','a_id',$artiId,'','','a_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('headline', 'content Headline', 'trim|required');
			$this->form_validation->set_rules('details', 'content Details', 'trim|required');
			
			if($this->form_validation->run() != false){
				$save['menu_title']	    = $this->input->post('root_id');
				$save['headline']	    = $this->input->post('headline');
				$save['details']	    	= $this->input->post('details');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('a_id')!=""){
					$a_id=$this->input->post('a_id');
					$this->Index_model->update_table('article_manage','a_id',$a_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('article_manage', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/content_list', 'refresh');
			}
			else{
				$data['main_content']="admin/content/content_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/content/content_action";
        $this->load->view('admin_template', $data);
	}
	
	/////////////////////// banner ////////////////////////////////	 
	function banner_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="banner List | GEE 24 News";
		$data['banner_list'] = $this->Index_model->getTable('banner','b_id','desc');
		$data['main_content']="admin/banner/banner_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function banner_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="Banner Registration | GEE 24 News";
		}
		else{
			$data['title']="Banner Update | GEE 24 News";
		}
		$data['bannerUpdate'] = $this->Index_model->getAllItemTable('banner','b_id',$artiId,'','','b_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('banner_name', 'banner name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/banner/';
			$config['charset'] = "UTF-8";
			$new_name = "Banner_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['bannerPhoto']['name']))
				{
					if($this->upload->do_upload('bannerPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['banner_name']	    = $this->input->post('banner_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('banner','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('banner', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/banner_list', 'refresh');
			}
			else{
				$data['main_content']="admin/banner/banner_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/banner/banner_action";
        $this->load->view('admin_template', $data);
	}


/////////////////////// advertisement ////////////////////////////////	 
	function advertisement_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="advertisement List | GEE 24 News";
		$data['advertisement_list'] = $this->Index_model->getTable('advertisement','b_id','desc');
		$data['main_content']="admin/advertisement/advertisement_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function advertisement_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="advertisement Registration | GEE 24 News";
		}
		else{
			$data['title']="advertisement Update | GEE 24 News";
		}
		$data['advertisementUpdate'] = $this->Index_model->getAllItemTable('advertisement','b_id',$artiId,'','','b_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('advertisement_name', 'advertisement name', 'trim|required');
			
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/advertisement/';
				$config['charset'] = "UTF-8";
				$new_name = "Advertisement_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['ad_photo']['name']))
					{
						if($this->upload->do_upload('ad_photo')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}	
				
				$save['advertisement_name']	    = $this->input->post('advertisement_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('advertisement','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('advertisement', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/advertisement_list', 'refresh');
			}
			else{
				$data['main_content']="admin/advertisement/advertisement_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/advertisement/advertisement_action";
        $this->load->view('admin_template', $data);
	}
	
	
	
	

/////////////////////// Job category ////////////////////////////////	 
	/*function category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="category List | Raisingbd24";
		$data['category_list'] = $this->Index_model->getTable('category','cid','desc');
		$data['main_content']="admin/job_category/category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function category_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$cate=$this->input->post('category');
		$data['categoryUpdate'] = $this->Index_model->getAllItemTable('category','scid',$artiId,'','','scid','desc');
		$data['category_list'] = $this->Index_model->getTable('jobtype','cid','desc');
		if(!$artiId){
			$data['title']="category Registration | Raisingbd24";
		     $this->form_validation->set_rules('category_name', 'category name', 'trim|required');
			//$this->form_validation->set_rules('category_name', 'Sub Category name', 'callback_subcategory_check['.$bouid.','.$cate.']');
		}
		else{
			$data['title']="category Update | Raisingbd24";
			$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				
				$expval=explode(' ',$this->input->post('category_name'));
				$impval=implode('-',$expval);
				$save['cat_id']	    = $cate;
				$save['sub_cat_name']	    = addslashes($this->input->post('category_name'));
				$save['sub_cat_slug']	    = addslashes(strtolower(str_replace('/','_',$impval)));
				$save['create_date']	    = date('Y-m-d');
				$save['status']	    = $this->input->post('status');
				
				if($this->input->post('scid')!=""){
					$scid=$this->input->post('scid');
					$this->Index_model->update_table('category','scid',$scid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/category_list', 'refresh');
			}
			else{
				$data['main_content']="admin/job_category/category_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/job_category/category_action";
        $this->load->view('admin_template', $data);
	}
	
	

	public function subcategory_check($str,$journalist,$catid)
	{
		$value = $this->Index_model->subcategory_exist($str,$journalist,$catid);		
		if ($value->num_rows() > 0)
		{
			$this->form_validation->set_message('subcategory_check', 'The %s already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	
	function ajaxCatData()
	{
		if($this->input->get('root_id')!=""){
			$rid=$this->input->get('root_id');
			$url="'".base_url()."admin/ajaxData?sroot_id='+this.value+''";
			$sroot_category = $this->Index_model->getAllItemTable('category','root_id',$rid,'','','category_name','asc');
			$svar='<select name="sroot_id" class="form-control" style="width:60%;" onChange="getSubcategory('.$url.')">
								<option value="">Sub category</option>';
								 foreach($sroot_category->result() as $rootcategory):
									$svar .= '<option value="'.$rootcategory->cid.'">'.$rootcategory->category_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('sroot_id')!=""){
			$rid=$this->input->get('sroot_id');
			$sroot_category = $this->Index_model->getAllItemTable('category','sroot_id',$rid,'','','category_name','asc');
			$svar='<select name="lroot_id" class="form-control" style="width:60%;">
								<option value="">Last category</option>';
								 foreach($sroot_category->result() as $rootcategory):
									$svar .= '<option value="'.$rootcategory->cid.'">'.$rootcategory->category_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
	}
*/
	
	
	
	
	
	/////////////////////// Category ////////////////////////////////	 
	function category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Category List | Geenews24";
		$data['category_list'] = $this->Index_model->getTable('category','cid','desc');
		$data['main_content']="admin/product_category/category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function category_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$data['categoryUpdate'] = $this->Index_model->getAllItemTable('category','cid',$artiId,'','','cid','desc');
		if(!$artiId){
			$data['title']="category Registration | Geenews24";
			$this->form_validation->set_rules('category_name', 'category name', 'callback_category_check');
		}
		else{
			$data['title']="category Update | Geenews24";
			$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
		}
		
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/product_category/category/';
				$config['charset'] = "UTF-8";
				$new_name = "Banner_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['catImage']['name']))
					{
						if($this->upload->do_upload('catImage')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimage');
							$save['image']	= $upload_data;	
						}
					}	
				
				
				$expval=explode(' ',$this->input->post('category_name'));
				$impval=implode('-',$expval);
				$save['cat_name']	    = addslashes($this->input->post('category_name'));
				$save['menuPosition']	= $this->input->post('cat_position');
				$save['color']	    = addslashes($this->input->post('color'));
				$save['page_type']	    = addslashes($this->input->post('page_type'));
				$save['cat_slug']	    = addslashes(strtolower($impval));
				$save['create_date']	= date('Y-m-d');
				$save['status']	    = $this->input->post('status');
				
				if($this->input->post('cid')!=""){
					$cid=$this->input->post('cid');
					$this->Index_model->update_table('category','cid',$cid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/category_list', 'refresh');
			}
			else{
				$data['main_content']="admin/product_category/category_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/product_category/category_action";
			$this->load->view('admin_template', $data);
		}
	}
	

	public function category_check($str)
	{
		$value = $this->Index_model->category_exist($str);		
		if ($value->num_rows() > 0)
		{
			$this->form_validation->set_message('username_check', 'The %s already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

/////////////////////// sub_category ////////////////////////////////	 
	function sub_category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="sub_category List | Geenews24";
		$data['sub_category_list'] = $this->Index_model->getTable('sub_category','scid','desc');
		$data['main_content']="admin/product_category/sub_category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function sub_category_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$cate=$this->input->post('category');
		$data['sub_categoryUpdate'] = $this->Index_model->getAllItemTable('sub_category','scid',$artiId,'','','scid','desc');
		$data['category_list'] = $this->Index_model->getTable('category','cid','desc');
		if(!$artiId){
			$data['title']="sub_category Registration | Geenews24";
		     $this->form_validation->set_rules('sub_category_name', 'sub_category name', 'trim|required');
			//$this->form_validation->set_rules('sub_category_name', 'Sub Category name', 'callback_subcategory_check['.$bouid.','.$cate.']');
		}
		else{
			$data['title']="sub_category Update | Geenews24";
			$this->form_validation->set_rules('sub_category_name', 'sub_category name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/product_category/sub_category/';
				$config['charset'] = "UTF-8";
				$new_name = "Banner_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['catImage']['name']))
					{
						if($this->upload->do_upload('catImage')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimage');
							$save['image']	= $upload_data;	
						}
					}	
				
				
				$expval=explode(' ',$this->input->post('sub_category_name'));
				$impval=implode('-',$expval);
				$save['cat_id']	    = $cate;
				$save['sub_cat_name']	    = addslashes($this->input->post('sub_category_name'));
				$save['sub_cat_slug']	    = addslashes($impval);
				$save['page_type']	    = addslashes($this->input->post('page_type'));
				$save['create_date']	    = date('Y-m-d');
				$save['status']	    = $this->input->post('status');
				
				if($this->input->post('scid')!=""){
					$scid=$this->input->post('scid');
					$this->Index_model->update_table('sub_category','scid',$scid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('sub_category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/sub_category_list', 'refresh');
			}
			else{
				$data['main_content']="admin/product_category/sub_category_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/product_category/sub_category_action";
        $this->load->view('admin_template', $data);
	}

	public function subcategory_check($str,$journalist,$catid)
	{
		$value = $this->Index_model->subcategory_exist($str,$journalist,$catid);		
		if ($value->num_rows() > 0)
		{
			$this->form_validation->set_message('subcategory_check', 'The %s already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	/////////////////////// last_category ////////////////////////////////	 
	function last_category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="last_category List | Geenews24";
		$data['last_category_list'] = $this->Index_model->getTable('last_category','id','desc');
		$data['main_content']="admin/product_category/last_category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function last_category_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$bouid=$this->input->post('journalist');
		$cate=$this->input->post('cat_id');
		$scate=$this->input->post('subcat_id');
		$data['journalistList']		= $this->Index_model->getDataById('journalist','','','username','asc','');
		$data['last_categoryUpdate'] = $this->Index_model->getAllItemTable('last_category','id',$artiId,'','','id','desc');
		$data['allcategory']		= $this->Index_model->getDataById('category','','','cat_name','asc','');
		if(!$artiId){
			$data['title']="last_category Registration | Geenews24";
			//$this->form_validation->set_rules('last_category_name', 'last_category name', 'trim|required|is_unique[last_category.lastcat_name]');
			$this->form_validation->set_rules('last_category_name', 'last_category name', 'trim|required');
		}
		else{
			$data['title']="last_category Update | Geenews24";
			$this->form_validation->set_rules('last_category_name', 'last_category name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/product_category/last_category/';
				$config['charset'] = "UTF-8";
				$new_name = "Banner_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['catImage']['name']))
					{
						if($this->upload->do_upload('catImage')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimage');
							$save['image']	= $upload_data;	
						}
					}	
				
				$save['journalist']	    = $bouid;
				$save['cat_id']	    = $cate;
				$save['subcat_id']	    = $scate;
				$expval=explode(' ',$this->input->post('last_category_name'));
				$impval=implode('-',$expval);
				$save['lastcat_name']	    = addslashes($this->input->post('last_category_name'));
				$save['last_cat_title']	    = addslashes(strtolower($impval));
				$save['short_desc']	    = addslashes($this->input->post('short_desc'));
				$save['create_date']	    = date('Y-m-d');
				$save['status']	    = $this->input->post('status');
				
				if($this->input->post('id')!=""){
					$id=$this->input->post('id');
					$this->Index_model->update_table('last_category','id',$id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('last_category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/last_category_list', 'refresh');
			}
			else{
				$data['main_content']="admin/product_category/last_category_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/product_category/last_category_action";
        $this->load->view('admin_template', $data);
	}
	
	
	
	function ajaxCatData()
	{
		if($this->input->get('root_id')!=""){
			$rid=$this->input->get('root_id');
			$url="'".base_url()."admin/ajaxData?sroot_id='+this.value+''";
			$sroot_category = $this->Index_model->getAllItemTable('category','root_id',$rid,'','','category_name','asc');
			$svar='<select name="sroot_id" class="form-control" style="width:60%;" onChange="getSubcategory('.$url.')">
								<option value="">Sub category</option>';
								 foreach($sroot_category->result() as $rootcategory):
									$svar .= '<option value="'.$rootcategory->cid.'">'.$rootcategory->category_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('sroot_id')!=""){
			$rid=$this->input->get('sroot_id');
			$sroot_category = $this->Index_model->getAllItemTable('category','sroot_id',$rid,'','','category_name','asc');
			$svar='<select name="lroot_id" class="form-control" style="width:60%;">
								<option value="">Last category</option>';
								 foreach($sroot_category->result() as $rootcategory):
									$svar .= '<option value="'.$rootcategory->cid.'">'.$rootcategory->category_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
	}


	/////////////////////// news ////////////////////////////////	 
	
	function news_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="News List | Raising News24";
		$data['adminnews_list'] = $this->Index_model->getDataById('news_manage','','','n_id','desc','');
		
		$data['main_content']="admin/news/news_list";
        $this->load->view('admin_template',$data);
	} 
	 
	function homepage_news()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="News List | Raising News24";
		$data['news_list'] = $this->Index_model->getAllItemTable('homepage_news','','','','','id','desc');
		$data['main_content']="admin/news/homepage_top_news";
        $this->load->view('admin_template',$data);
	} 
	
function srss()
    {
	   $sector_heading = 'gee24news';
		
       $this->data['feed_name'] = base_url();
       //$this->data['encoding'] = 'iso-8859-1';
	   $this->data['encoding'] = 'utf-8';
       $this->data['feed_url'] = base_url();
       $this->data['page_language'] = 'en';
       $this->data['page_description'] = 'GEE 24 News';
       $query = $this->Index_model->get_all_news();
        $xml = new Xml_writer;
		
		$str ='<?xml version="1.0" encoding="utf-8" ?>';		
		$str .='<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">';
		  $str .='<channel>';
		   	$str .='<title>'.$this->data['feed_name'].'</title>';
		   	$str .='<link>'.$this->data['feed_url'].'</link>' ;
		   	$str .='<description>'.$this->data['page_description'].'</description>';
			$str .='<language>'.$this->data['page_language'].'</language>';		
			$str .='<atom:link href="'.base_url().'application/views/frontend/feeds/'.$sector_heading.'.xml" rel="self" type="application/rss+xml"/>';
			
				foreach($query as $row){
					//$sbuzz_image = $row->image;
					$sbuzz_image = $row->image;
					$sbid = $row->n_id;
					$category_id = $row->category;
					$sbuzz_name = $row->headline;
					$sbuzz_description = $row->full_description;
					$stringdet = strip_tags($sbuzz_description);
					
					if (strlen($stringdet) > 500) {
						$stringCut = substr($stringdet, 0, 500);
						$stringdet = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
					}

					 $str .='<item>';
					 $str .='<title>'.xml_convert(stripslashes($sbuzz_name)).'</title>';  
					  //$str .='<link>'.base_url().'index.php/'.$sbid.'</link>'; 
					   /*$str .='<link>'.base_url().'index/news_details_facebook?id='.$sbid.'</link>';   
						$str .='<description>'.'<![CDATA['.stripslashes($sbuzz_description).']]'.'></description>';*/ 

				$str .='<link>'.base_url().'index/news_details_facebook?id='.$sbid.'&amp;&amp;cat_id='.$category_id.'</link>';   
				$str .='<description>'.'<![CDATA['.stripslashes($stringdet).']]'.'></description>'; 	
			

			  $str .='<guid isPermaLink="false">'.$sbid.'</guid>';
					  $str .='<media:thumbnail width="92" height="52" url="'.base_url().'asset/uploads/news/thumnail/'.$sbuzz_image.'"/>'; 
					$str .='</item>';   
					
				}
		
		
			 $str .='</channel>';
			$str .='</rss>';
				if(!write_file('./application/views/frontend/feeds/'.$sector_heading.'.xml', $str))
				{
				}
				else
				{
				redirect('admin/news_list','');
				}  
				
    }

function home_news_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="Homepage News Insert | Gee 24 News";
		}
		else{
			$data['title']="Homepage News Update | Gee 24 News";
		}
		$data['newsUpdate'] = $this->Index_model->getAllItemTable('homepage_news','id',$artiId,'','','id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			
			$save['row1']	= $this->input->post('row1');
			$save['status']	= 1;
				
				if($this->input->post('news_id')!=""){
					$b_id=$this->input->post('news_id');
					$query = $this->Index_model->update_table('homepage_news','id',$b_id,$save);
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Updated</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				else{
					$query = $this->Index_model->inertTable('homepage_news', $save);
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully to Inserted</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
		}
		else{
			$data['main_content']="admin/news/home_news_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	function autocomplete()
	{
		$data['datasource']=$this->input->post('keyword');
		$this->load->view('admin/news/home_news_action', $data);
	} 
	
	function news_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="News Insert | Raising News24";
		}
		else{
			$data['title']="News Update | Raising News24";
		}
		$data['newsUpdate'] = $this->Index_model->getAllItemTable('news_manage','n_id',$artiId,'','','n_id','desc');
		$data['allcategory']		= $this->Index_model->getDataById('category','','','cat_name','asc','');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
		
		$this->form_validation->set_rules('cat_id', 'News Category', 'trim|required');
		$this->form_validation->set_rules('headline', 'News Title', 'trim|required');
		if ($this->form_validation->run() != FALSE){
			ini_set( 'memory_limit', '200M' );
			ini_set('max_input_time', 3600);  
			ini_set('max_execution_time', 3600);
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			//$config['max_width']  = '700';
			//$config['max_height']  = '440';
			$config['upload_path'] = './asset/uploads/news/';
			$config['charset'] = "UTF-8";
			$new_name = "news_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (isset($_FILES['main_images']['name']))
			{
				if($this->upload->do_upload('main_images')){
					$upload_data	= $this->upload->data();
					$save['image']	= $upload_data['file_name'];
					//$this->_CreatePageThumbnail($upload_data['file_name'], $config['upload_path'],300,189);			
					//$save['thumb'] = $upload_data['raw_name']. '_thumb' .$upload_data['file_ext'];
				}
				else{
					$upload_data	= $this->input->post('mainImg');
					//$save['thumb']=$this->input->post('thumbImg');
					$save['image']	= $upload_data;	
				}
			}	
					
				$proTitle = explode(' ',$this->input->post('headline'));
				
				
				$proUrl = implode("-",$proTitle);
				//$save['slug']		= str_replace('/', '_', $proUrl);
				$save['slug']		= str_replace(array(':', '\\', '/', '*','?'), ' ', $proUrl);
				
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['auther_name']	= $autherName;
				}
				else{
					$save['auther_name']	= $auther_name;
				}
			
			//if(isset($value12)){
				$value12= $this->Index_model->get_newsId();
				foreach($value12 as $val):
				$news_id = $val->news_id;
				endforeach;
					if($news_id!=0 || $news_id!=""){
						$finalnewsId=$news_id+1;
					}
					else{
						$finalnewsId=1;
					}
			$save['news_id']		= $finalnewsId;
			$save['user_id']		= $this->session->userdata('user_id');
			$save['subHeadline']	= $this->input->post('subHeadline');
			$save['headline']		= $this->input->post('headline');
			$save['category']		= $this->input->post('cat_id');
			$save['sub_category']	= $this->input->post('subcat_id');
			$save['image_title']	    = $this->input->post('image_title');
			$save['vedio']	    = $this->input->post('vedio');
			//$save['vedio_top']	    = $this->input->post('vedio_top');
			//$save['vedio_bottom']	    = $this->input->post('vedio_bottom');

			$save['short_description']		= $this->input->post('short_description');
			$save['full_description']		= $this->input->post('full_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$hour = gmdate('H');
			$minute = gmdate('i');
			$seconds = gmdate('s');
			
			$day = gmdate('d');
			$month = gmdate('m');
			$year = gmdate('Y');
			$hour = $hour + 6;
			$ShowBangladeshTime = date("H:i", mktime ($hour,$minute));
	
			$currentDate = date("Y-m-d", mktime ($hour,$minute,$seconds,$month,$day,$year));
			$save['date']	    = $currentDate;
			$save['count_date']	    = date("Y-n-j");
			$save['time']		= $ShowBangladeshTime;
			$save['homepage_news']		= $this->input->post('homepage_news');
			$save['latest_news']		= $this->input->post('latest_news');
			$save['status']		= $this->input->post('status');
				
				
				if($this->input->post('news_id')!=""){
					$b_id=$this->input->post('news_id');
					$query = $this->Index_model->update_table('news_manage','n_id',$b_id,$save);
					$this->srss();
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Updated</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				else{
					$query = $this->Index_model->inertTable('news_manage', $save);
					$this->srss();
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully to Inserted</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				
			}
			else{
				$data['main_content']="admin/news/news_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/news/news_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	/////////////////////// Events ////////////////////////////////	 
	function events_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="events List | Raisingbd24";

			$data['events_list'] = $this->Index_model->getAllItemTable('events','','','','','m_id','desc');
			
			$data['main_content']="admin/events/events_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function events_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
		$data['eventsUpdate'] = $this->Index_model->getAllItemTable('events','m_id',$artiId,'','','m_id','desc');
		if(!$artiId){
			$data['title']="Events Registration | Raisingbd24";
			$this->form_validation->set_rules('events_name', 'events name', 'trim|required|is_unique[events.events_name]');
		}
		else{
			$data['title']="Events Update | Raisingbd24";
			$this->form_validation->set_rules('events_name', 'events name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/event/';
				$config['charset'] = "UTF-8";
				$new_name = "Advertisement_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['ad_photo']['name']))
					{
						if($this->upload->do_upload('ad_photo')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}
					
					
			$expval=explode(' ',$this->input->post('events_name'));
			$impval=implode('-',$expval);
				$save['events_name']	    = addslashes($this->input->post('events_name'));
				$save['events_details']	    = addslashes($this->input->post('details'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['upcomming_id']	    = $this->input->post('upcomming');
				$save['latest_id']	    = $this->input->post('latest');
				$save['status']	    = 1;
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('events','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('events', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/events_list', 'refresh');
			}
			else{
				$data['main_content']="admin/events/events_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/events/events_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	/////////////////////// Movies ////////////////////////////////	 
	function movies_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="movies List | Raisingbd24";

			$data['movies_list'] = $this->Index_model->getAllItemTable('movies','','','','','mv_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['moviesDetails'] = $this->Index_model->getAllItemTable('movies','mv_id',$details,'','','mv_id','desc');
				$data['main_content']="admin/movies/movies_details";
			}
			else{
				$data['main_content']="admin/movies/movies_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function movies_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['moviesUpdate'] = $this->Index_model->getAllItemTable('movies','mv_id',$artiId,'','','mv_id','desc');
			$data['title']="Movies Update | Raisingbd24";
			$this->form_validation->set_rules('mv_name', 'Movies Name', 'trim|required');
			$this->form_validation->set_rules('category', 'Category', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/movies/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['mv_cover_photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['mv_cover_photo']	= $upload_data;	
						}
					}
					
					
				$config2['allowed_types'] = '*';
				$config2['remove_spaces'] = true;
				$config2['max_size'] = '1000000';
				$config2['upload_path'] = './asset/uploads/movies/';
				$config2['charset'] = "UTF-8";
				$new_name = "banner_photo_".time();
				$config2['file_name'] = $new_name;
				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
					if (isset($_FILES['banner_photo']['name']))
					{
						if($this->upload->do_upload('banner_photo')){
							$upload_data	= $this->upload->data();
							$save['mv_banner']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImgBanner');
							$save['mv_banner']	= $upload_data;	
						}
					}	
                $expval=explode(' ',$this->input->post('mv_name'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['category']=$this->input->post('category');
				$save['mv_name']=$this->input->post('mv_name');
				$save['mv_subtitle']=$this->input->post('mv_subtitle');
				$save['mv_producer']=$this->input->post('mv_producer');
				$save['mv_director']=$this->input->post('mv_director');
				$save['mv_main_actor']=$this->input->post('mv_main_actor');
				$save['mv_actor']=$this->input->post('mv_actor');
				$save['mv_budget']=$this->input->post('mv_budget');
				$save['mv_realese_date']=$this->input->post('mv_realese_date');
				$save['mv_realese_theater']=$this->input->post('mv_realese_theater');
				$save['mv_details']=$this->input->post('mv_details');
				
				
				if($this->input->post('mv_id')!=""){
					$mv_id=$this->input->post('mv_id');
					$this->Index_model->update_table('movies','mv_id',$mv_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('movies', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/movies_list', 'refresh');
			}
			else{
				$data['main_content']="admin/movies/movies_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/movies/movies_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	


	
	/////////////////////// drama ////////////////////////////////	 
	function drama_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="drama List | Raisingbd24";

			$data['drama_list'] = $this->Index_model->getAllItemTable('drama','','','','','dr_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['dramaDetails'] = $this->Index_model->getAllItemTable('drama','dr_id',$details,'','','dr_id','desc');
				$data['main_content']="admin/drama/drama_details";
			}
			else{
				$data['main_content']="admin/drama/drama_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function drama_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['dramaUpdate'] = $this->Index_model->getAllItemTable('drama','dr_id',$artiId,'','','dr_id','desc');
			$data['title']="drama Update | Raisingbd24";
			$this->form_validation->set_rules('dr_name', 'drama Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/drama/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['dr_cover_photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['dr_cover_photo']	= $upload_data;	
						}
					}
					
                $expval=explode(' ',$this->input->post('dr_name'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['dr_name']=$this->input->post('dr_name');
				$save['dr_subtitle']=$this->input->post('dr_subtitle');
				$save['dr_producer']=$this->input->post('dr_producer');
				$save['dr_director']=$this->input->post('dr_director');
				$save['dr_main_actor']=$this->input->post('dr_main_actor');
				$save['dr_actor']=$this->input->post('dr_actor');
				$save['dr_budget']=$this->input->post('dr_budget');
				$save['dr_realese_date']=$this->input->post('dr_realese_date');
				$save['dr_realese_theater']=$this->input->post('dr_realese_theater');
				$save['dr_details']=$this->input->post('dr_details');
				$save['popular']=1;
				
				if($this->input->post('dr_id')!=""){
					$dr_id=$this->input->post('dr_id');
					$this->Index_model->update_table('drama','dr_id',$dr_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('drama', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/drama_list', 'refresh');
			}
			else{
				$data['main_content']="admin/drama/drama_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/drama/drama_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// serial ////////////////////////////////	 
	function serial_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="serial List | Raisingbd24";

			$data['serial_list'] = $this->Index_model->getAllItemTable('serial','','','','','sr_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['serialDetails'] = $this->Index_model->getAllItemTable('serial','sr_id',$details,'','','sr_id','desc');
				$data['main_content']="admin/serial/serial_details";
			}
			else{
				$data['main_content']="admin/serial/serial_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function serial_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['serialUpdate'] = $this->Index_model->getAllItemTable('serial','sr_id',$artiId,'','','sr_id','desc');
			$data['title']="serial Update | Raisingbd24";
			$this->form_validation->set_rules('sr_name', 'serial Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/serial/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['sr_cover_photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['sr_cover_photo']	= $upload_data;	
						}
					}
					
                $expval=explode(' ',$this->input->post('sr_name'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				
				$save['sr_name']=$this->input->post('sr_name');
				$save['sr_subtitle']=$this->input->post('sr_subtitle');
				$save['sr_producer']=$this->input->post('sr_producer');
				$save['sr_director']=$this->input->post('sr_director');
				$save['sr_main_actor']=$this->input->post('sr_main_actor');
				$save['sr_actor']=$this->input->post('sr_actor');
				$save['sr_episode_budgets']=$this->input->post('sr_episode_budgets');
				$save['sr_telecast']=$this->input->post('sr_telecast');
				$save['sr_realese_date']=$this->input->post('sr_realese_date');
				$save['sr_realese_channel']=$this->input->post('sr_realese_channel');
				$save['sr_details']=$this->input->post('sr_details');
				$save['popular']=1;
				
				
				if($this->input->post('sr_id')!=""){
					$sr_id=$this->input->post('sr_id');
					$this->Index_model->update_table('serial','sr_id',$sr_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('serial', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/serial_list', 'refresh');
			}
			else{
				$data['main_content']="admin/serial/serial_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/serial/serial_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	/////////////////////// music ////////////////////////////////	 
	function music_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="music List | Raisingbd24";

			$data['music_list'] = $this->Index_model->getAllItemTable('music','','','','','ms_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['musicDetails'] = $this->Index_model->getAllItemTable('music','ms_id',$details,'','','ms_id','desc');
				$data['main_content']="admin/music/music_details";
			}
			else{
				$data['main_content']="admin/music/music_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function music_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['allcategory']		= $this->Index_model->getDataById('category','','','cat_name','asc','');
			$data['musicUpdate'] = $this->Index_model->getAllItemTable('music','ms_id',$artiId,'','','ms_id','desc');
			$data['title']="music Update | Raisingbd24";
			$this->form_validation->set_rules('ms_name', 'music Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/music/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['ms_cover_photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['ms_cover_photo']	= $upload_data;	
						}
					}
					
				$config2['allowed_types'] = '*';
				$config2['remove_spaces'] = true;
				$config2['max_size'] = '1000000';
				$config2['upload_path'] = './asset/uploads/music/file/';
				$config2['charset'] = "UTF-8";
				$new_name2 = "music_".time();
				$config2['file_name'] = $new_name2;
				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
					if (isset($_FILES['ms_file']['name']))
					{
						if($this->upload->do_upload('ms_file')){
							$upload_data	= $this->upload->data();
							$save['ms_file']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillmsFile');
							$save['ms_file']	= $upload_data;	
						}
					}
					
                $expval=explode(' ',$this->input->post('ms_name'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['category']=$this->input->post('cat_id');
				$save['ms_name']=$this->input->post('ms_name');
				$save['ms_subtitle']=$this->input->post('ms_subtitle');
				$save['ms_singer']=$this->input->post('ms_singer');
				$save['ms_realese_date']=$this->input->post('ms_realese_date');
				$save['ms_details']=$this->input->post('ms_details');
				
				
				if($this->input->post('ms_id')!=""){
					$ms_id=$this->input->post('ms_id');
					$this->Index_model->update_table('music','ms_id',$ms_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('music', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/music_list', 'refresh');
			}
			else{
				$data['main_content']="admin/music/music_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/music/music_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	/////////////////////// singer ////////////////////////////////	 
	function singer_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="singer List | Raisingbd24";

			$data['singer_list'] = $this->Index_model->getAllItemTable('singer','','','','','user_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['singerDetails'] = $this->Index_model->getAllItemTable('singer','user_id',$details,'','','user_id','desc');
				$data['main_content']="admin/singer/singer_details";
			}
			else{
				$data['main_content']="admin/singer/singer_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function singer_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['singerUpdate'] = $this->Index_model->getAllItemTable('singer','user_id',$artiId,'','','user_id','desc');
			$data['title']="singer Update | Raisingbd24";
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/singer/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
					
				$save['firstname']=$this->input->post('firstname');
				$save['lastname']=$this->input->post('lastname');
				$save['email']=$this->input->post('email');
				$save['mobile']=$this->input->post('mobile');
				$save['profile']=$this->input->post('profile');
				$save['about_details']=$this->input->post('about_details');
				
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('singer','user_id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('singer', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/singer_list', 'refresh');
			}
			else{
				$data['main_content']="admin/singer/singer_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/singer/singer_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	/////////////////////// actor ////////////////////////////////	 
	function actor_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="actor List | Raisingbd24";

			$data['actor_list'] = $this->Index_model->getAllItemTable('actor','','','','','user_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['actorDetails'] = $this->Index_model->getAllItemTable('actor','user_id',$details,'','','user_id','desc');
				$data['main_content']="admin/actor/actor_details";
			}
			else{
				$data['main_content']="admin/actor/actor_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function actor_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['actorUpdate'] = $this->Index_model->getAllItemTable('actor','user_id',$artiId,'','','user_id','desc');
			$data['title']="actor Update | Raisingbd24";
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/actor/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
					
				$config2['allowed_types'] = '*';
				$config2['remove_spaces'] = true;
				$config2['max_size'] = '1000000';
				$config2['upload_path'] = './asset/uploads/actor/banner/';
				$config2['charset'] = "UTF-8";
				$new_name2 = "banner_photo_".time();
				$config2['file_name'] = $new_name2;
				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
					if (isset($_FILES['bannr_photo']['name']))
					{
						if($this->upload->do_upload('bannr_photo')){
							$upload_data	= $this->upload->data();
							$save['bannr_photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImgB');
							$save['bannr_photo']	= $upload_data;	
						}
					}	
				$save['firstname']=$this->input->post('firstname');
				$save['lastname']=$this->input->post('lastname');
				$save['email']=$this->input->post('email');
				$save['mobile']=$this->input->post('mobile');
				$save['profile']=$this->input->post('profile');
				$save['about_details']=$this->input->post('about_details');
				$save['ratingVal']=$this->input->post('ratingVal');
				$save['ranking']=$this->input->post('ranking');
				$save['facebook']=$this->input->post('facebook');
				$save['twitter']=$this->input->post('twitter');
				$save['googleplus']=$this->input->post('googleplus');
				$save['linkedin']=$this->input->post('linkedin');
				
				
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$save['created_date']=date('Y-m-d H:i:s');
					$save['modify_date']=date('Y-m-d H:i:s');
					$this->Index_model->update_table('actor','user_id',$user_id,$save);
					$s='Updated';
				}
				else{
					$save['created_date']=date('Y-m-d H:i:s');
					$query = $this->Index_model->inertTable('actor', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/actor_list', 'refresh');
			}
			else{
				$data['main_content']="admin/actor/actor_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/actor/actor_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	///////////////////////theatre_person ////////////////////////////////	 
	function theatre_person_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="theatre_person List | Raisingbd24";

			$data['theatre_person_list'] = $this->Index_model->getAllItemTable('theatre_person','','','','','user_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['theatre_personDetails'] = $this->Index_model->getAllItemTable('theatre_person','user_id',$details,'','','user_id','desc');
				$data['main_content']="admin/theatre_person/theatre_person_details";
			}
			else{
				$data['main_content']="admin/theatre_person/theatre_person_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function theatre_person_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['theatre_personUpdate'] = $this->Index_model->getAllItemTable('theatre_person','user_id',$artiId,'','','user_id','desc');
			$data['title']="theatre_person Update | Raisingbd24";
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/theatre_person/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
					
				$config2['allowed_types'] = '*';
				$config2['remove_spaces'] = true;
				$config2['max_size'] = '1000000';
				$config2['upload_path'] = './asset/uploads/theatre_person/banner/';
				$config2['charset'] = "UTF-8";
				$new_name2 = "banner_photo_".time();
				$config2['file_name'] = $new_name2;
				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
					if (isset($_FILES['bannr_photo']['name']))
					{
						if($this->upload->do_upload('bannr_photo')){
							$upload_data	= $this->upload->data();
							$save['bannr_photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImgB');
							$save['bannr_photo']	= $upload_data;	
						}
					}	
				$save['firstname']=$this->input->post('firstname');
				$save['lastname']=$this->input->post('lastname');
				$save['email']=$this->input->post('email');
				$save['mobile']=$this->input->post('mobile');
				$save['profile']=$this->input->post('profile');
				$save['about_details']=$this->input->post('about_details');
				
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('theatre_person','user_id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('theatre_person', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/theatre_person_list', 'refresh');
			}
			else{
				$data['main_content']="admin/theatre_person/theatre_person_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/theatre_person/theatre_person_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	/////////////////////// players ////////////////////////////////	 
	function players_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="players List | Raisingbd24";

			$data['players_list'] = $this->Index_model->getAllItemTable('players','','','','','user_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['playersDetails'] = $this->Index_model->getAllItemTable('players','user_id',$details,'','','user_id','desc');
				$data['main_content']="admin/players/players_details";
			}
			else{
				$data['main_content']="admin/players/players_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function players_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['playersUpdate'] = $this->Index_model->getAllItemTable('players','user_id',$artiId,'','','user_id','desc');
			$data['title']="players Update | Raisingbd24";
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/players/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
					
				$save['firstname']=$this->input->post('firstname');
				$save['lastname']=$this->input->post('lastname');
				$save['email']=$this->input->post('email');
				$save['mobile']=$this->input->post('mobile');
				$save['profile']=$this->input->post('profile');
				$save['about_details']=$this->input->post('about_details');
				
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('players','user_id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('players', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/players_list', 'refresh');
			}
			else{
				$data['main_content']="admin/players/players_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/players/players_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
/////////////////////// books ////////////////////////////////	 
function books_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="books List | Raisingbd24";

				$data['books_list'] = $this->Index_model->getAllItemTable('books','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['booksDetails'] = $this->Index_model->getAllItemTable('books','bid',$details,'','','bid','desc');
					$data['main_content']="admin/books/books_details";
				}
				else{
					$data['main_content']="admin/books/books_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function books_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['booksUpdate'] = $this->Index_model->getAllItemTable('books','bid',$artiId,'','','bid','desc');
			
			$data['title']="books Update | Raisingbd24";
			$this->form_validation->set_rules('books_name', 'Book Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/books/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
                    
				$save['type']=$this->input->post('type');
				$save['books_name']=$this->input->post('books_name');
				$save['author']=$this->input->post('author');
				$save['publisher']=$this->input->post('publisher');	
				$save['details']=$this->input->post('details');			
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('books','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('books', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/books_list', 'refresh');
			}
			else{
				$data['main_content']="admin/books/books_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/books/books_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
///////////////////////theatre ////////////////////////////////	 
function theatre_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="theatre List | Raisingbd24";

				$data['theatre_list'] = $this->Index_model->getAllItemTable('theatre','','','','','t_id','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['theatreDetails'] = $this->Index_model->getAllItemTable('theatre','t_id',$details,'','','t_id','desc');
					$data['main_content']="admin/theatre/theatre_details";
				}
				else{
					$data['main_content']="admin/theatre/theatre_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function theatre_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['theatreUpdate'] = $this->Index_model->getAllItemTable('theatre','t_id',$artiId,'','','t_id','desc');
			
			$data['title']="theatre Update | Raisingbd24";
			$this->form_validation->set_rules('t_name', 'Theatre Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/theatre/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['coverphoto']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['coverphoto']	= $upload_data;	
						}
					}
                    
				$save['t_name']=$this->input->post('t_name');
				$save['location']=$this->input->post('location');
				$save['date_time']=date('Y-m-d H:i:s');			
				
				if($this->input->post('t_id')!=""){
					$t_id=$this->input->post('t_id');
					$this->Index_model->update_table('theatre','t_id',$t_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('theatre', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/theatre_list', 'refresh');
			}
			else{
				$data['main_content']="admin/theatre/theatre_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/theatre/theatre_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	///////////////////////upcomming_album ////////////////////////////////	 
function upcomming_album_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="upcomming_album List | Raisingbd24";

				$data['upcomming_album_list'] = $this->Index_model->getAllItemTable('upcomming_album','','','','','t_id','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['upcomming_albumDetails'] = $this->Index_model->getAllItemTable('upcomming_album','t_id',$details,'','','t_id','desc');
					$data['main_content']="admin/upcomming_album/upcomming_album_details";
				}
				else{
					$data['main_content']="admin/upcomming_album/upcomming_album_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function upcomming_album_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['upcomming_albumUpdate'] = $this->Index_model->getAllItemTable('upcomming_album','t_id',$artiId,'','','t_id','desc');
			
			$data['title']="upcomming_album Update | Raisingbd24";
			$this->form_validation->set_rules('name', 'upcomming_album Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/upcomming_album/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['coverphoto']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['coverphoto']	= $upload_data;	
						}
					}
                    
				$save['name']=$this->input->post('name');
				$save['details']=$this->input->post('details');
				$save['date_time']=date('Y-m-d H:i:s');			
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['author']	= $autherName;
				}
				else{
					$save['author']	= $auther_name;
				}		
				
				if($this->input->post('t_id')!=""){
					$t_id=$this->input->post('t_id');
					$this->Index_model->update_table('upcomming_album','t_id',$t_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('upcomming_album', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/upcomming_album_list', 'refresh');
			}
			else{
				$data['main_content']="admin/upcomming_album/upcomming_album_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/upcomming_album/upcomming_album_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	///////////////////////upcomming_track ////////////////////////////////	 
function upcomming_track_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="upcomming_track List | Raisingbd24";

				$data['upcomming_track_list'] = $this->Index_model->getAllItemTable('upcomming_track','','','','','t_id','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['upcomming_trackDetails'] = $this->Index_model->getAllItemTable('upcomming_track','t_id',$details,'','','t_id','desc');
					$data['main_content']="admin/upcomming_track/upcomming_track_details";
				}
				else{
					$data['main_content']="admin/upcomming_track/upcomming_track_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function upcomming_track_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['upcomming_trackUpdate'] = $this->Index_model->getAllItemTable('upcomming_track','t_id',$artiId,'','','t_id','desc');
			
			$data['title']="upcomming_track Update | Raisingbd24";
			$this->form_validation->set_rules('name', 'upcomming_track Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/upcomming_track/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cover_photo']['name']))
					{
						if($this->upload->do_upload('cover_photo')){
							$upload_data	= $this->upload->data();
							$save['coverphoto']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['coverphoto']	= $upload_data;	
						}
					}
                    
				$save['name']=$this->input->post('name');
				$save['details']=$this->input->post('details');
				$save['date_time']=date('Y-m-d H:i:s');			
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['author']	= $autherName;
				}
				else{
					$save['author']	= $auther_name;
				}		
				
				if($this->input->post('t_id')!=""){
					$t_id=$this->input->post('t_id');
					$this->Index_model->update_table('upcomming_track','t_id',$t_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('upcomming_track', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/upcomming_track_list', 'refresh');
			}
			else{
				$data['main_content']="admin/upcomming_track/upcomming_track_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/upcomming_track/upcomming_track_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	///////////////////////sports ////////////////////////////////	 
function sports_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="sports List | Raisingbd24";

				$data['sports_list'] = $this->Index_model->getAllItemTable('sports','','','','','sport_id','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['sportsDetails'] = $this->Index_model->getAllItemTable('sports','sport_id',$details,'','','sport_id','desc');
					$data['main_content']="admin/sports/sports_details";
				}
				else{
					$data['main_content']="admin/sports/sports_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function sports_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
		$data['sportsUpdate'] = $this->Index_model->getAllItemTable('sports','sport_id',$artiId,'','','sport_id','desc');
		$data['title']="sports Update | Raisingbd24";

		if($this->input->post('registration') && $this->input->post('registration')!=""){

 				$save['category']=$this->input->post('category');
				$save['sport_venue']=$this->input->post('sport_venue');
				$save['time']=$this->input->post('time');
				$save['team1']=$this->input->post('team1');
				$save['team2']=$this->input->post('team2');
				$save['date_time']=$this->input->post('date_time');
				
				if($this->input->post('sport_id')!=""){
					$sport_id=$this->input->post('sport_id');
					$this->Index_model->update_table('sports','sport_id',$sport_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('sports', $save);
					$s='Inserted';
				}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/sports_list', 'refresh');
		}
		else{
			$data['main_content']="admin/sports/sports_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	
	
/////////////////////// articles ////////////////////////////////	 
function articles_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="articles List | Raisingbd24";

				$data['articles_list'] = $this->Index_model->getAllItemTable('articles','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['articlesDetails'] = $this->Index_model->getAllItemTable('articles','bid',$details,'','','bid','desc');
					$data['main_content']="admin/articles/articles_details";
				}
				else{
					$data['main_content']="admin/articles/articles_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function articles_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['articlesUpdate'] = $this->Index_model->getAllItemTable('articles','bid',$artiId,'','','bid','desc');
			
			$data['title']="articles Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/articles/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['photo']	= $upload_data;	
						}
					}
                    
				$save['headline']=$this->input->post('headline');
				$save['details']=$this->input->post('details');	
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['author']	= $autherName;
				}
				else{
					$save['author']	= $auther_name;
				}		
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('articles','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('articles', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/articles_list', 'refresh');
			}
			else{
				$data['main_content']="admin/articles/articles_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/articles/articles_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// story ////////////////////////////////	 
function story_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="story List | Raisingbd24";

				$data['story_list'] = $this->Index_model->getAllItemTable('story','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['storyDetails'] = $this->Index_model->getAllItemTable('story','bid',$details,'','','bid','desc');
					$data['main_content']="admin/story/story_details";
				}
				else{
					$data['main_content']="admin/story/story_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function story_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['storyUpdate'] = $this->Index_model->getAllItemTable('story','bid',$artiId,'','','bid','desc');
			
			$data['title']="story Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/story/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['photo']	= $upload_data;	
						}
					}
                    
				$save['headline']=$this->input->post('headline');
				$save['details']=$this->input->post('details');			
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['author']	= $autherName;
				}
				else{
					$save['author']	= $auther_name;
				}		
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('story','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('story', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/story_list', 'refresh');
			}
			else{
				$data['main_content']="admin/story/story_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/story/story_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// interview ////////////////////////////////	 
function interview_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="interview List | Raisingbd24";

				$data['interview_list'] = $this->Index_model->getAllItemTable('interview','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['interviewDetails'] = $this->Index_model->getAllItemTable('interview','bid',$details,'','','bid','desc');
					$data['main_content']="admin/interview/interview_details";
				}
				else{
					$data['main_content']="admin/interview/interview_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function interview_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['interviewUpdate'] = $this->Index_model->getAllItemTable('interview','bid',$artiId,'','','bid','desc');
			
			$data['title']="interview Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/interview/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['photo']	= $upload_data;	
						}
					}
                    
				$save['headline']=$this->input->post('headline');
				$save['details']=$this->input->post('details');			
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['author']	= $autherName;
				}
				else{
					$save['author']	= $auther_name;
				}		
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('interview','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('interview', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/interview_list', 'refresh');
			}
			else{
				$data['main_content']="admin/interview/interview_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/interview/interview_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	function verb_category_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="verb_category List | Raisingbd24";

				$data['verb_category_list'] = $this->Index_model->getAllItemTable('verb_category','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['verb_categoryDetails'] = $this->Index_model->getAllItemTable('verb_category','bid',$details,'','','bid','desc');
					$data['main_content']="admin/verb_category/verb_category_details";
				}
				else{
					$data['main_content']="admin/verb_category/verb_category_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function verb_category_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
			
			$data['verb_categoryUpdate'] = $this->Index_model->getAllItemTable('verb_category','bid',$artiId,'','','bid','desc');
			
			$data['title']="verb_category Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/verb_category/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['photo']	= $upload_data;	
						}
					}
                    
				$save['headline']=$this->input->post('headline');
				$save['details']=$this->input->post('details');			
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('verb_category','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('verb_category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/verb_category_list', 'refresh');
			}
			else{
				$data['main_content']="admin/verb_category/verb_category_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/verb_category/verb_category_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	function verb_details_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="verb_details List | Raisingbd24";

				$data['verb_details_list'] = $this->Index_model->getAllItemTable('verb_details','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['verb_detailsDetails'] = $this->Index_model->getAllItemTable('verb_details','bid',$details,'','','bid','desc');
					$data['main_content']="admin/verb_details/verb_details_details";
				}
				else{
					$data['main_content']="admin/verb_details/verb_details_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function verb_details_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
			$data['verb_category_list'] = $this->Index_model->getAllItemTable('verb_category','','','','','bid','desc');
			$data['verb_detailsUpdate'] = $this->Index_model->getAllItemTable('verb_details','bid',$artiId,'','','bid','desc');
			
			$data['title']="verb_details Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$save['headline']=$this->input->post('headline');
				$save['details']=$this->input->post('details');	
				$save['category']=$this->input->post('category');			
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('verb_details','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('verb_details', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/verb_details_list', 'refresh');
			}
			else{
				$data['main_content']="admin/verb_details/verb_details_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/verb_details/verb_details_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	/////////////////////// vocabulary ////////////////////////////////	 
function vocabulary_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="vocabulary List | Raisingbd24";

				$data['vocabulary_list'] = $this->Index_model->getAllItemTable('vocabulary','','','','','bid','desc');
				$details = $this->input->get('details');
				if(isset($details) && $details!=""){
					$data['vocabularyDetails'] = $this->Index_model->getAllItemTable('vocabulary','bid',$details,'','','bid','desc');
					$data['main_content']="admin/vocabulary/vocabulary_details";
				}
				else{
					$data['main_content']="admin/vocabulary/vocabulary_list";
				}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function vocabulary_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['vocabularyUpdate'] = $this->Index_model->getAllItemTable('vocabulary','bid',$artiId,'','','bid','desc');
			
			$data['title']="vocabulary Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/vocabulary/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['photo']	= $upload_data;	
						}
					}
                  
				  
				$config2['allowed_types'] = '*';
				$config2['remove_spaces'] = true;
				$config2['max_size'] = '1000000';
				$config2['upload_path'] = './asset/uploads/vocabulary/pdf/';
				$config2['charset'] = "UTF-8";
				$new_name2 = "pdffile".time();
				$config2['file_name'] = $new_name2;
				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
					if (isset($_FILES['pdffile']['name']))
					{
						if($this->upload->do_upload('pdffile')){
							$upload_data	= $this->upload->data();
							$save['pdffile']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['pdffile']	= $upload_data;	
						}
					}  
				$save['headline']=$this->input->post('headline');
				
				if($this->input->post('bid')!=""){
					$bid=$this->input->post('bid');
					$this->Index_model->update_table('vocabulary','bid',$bid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('vocabulary', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/vocabulary_list', 'refresh');
			}
			else{
				$data['main_content']="admin/vocabulary/vocabulary_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/vocabulary/vocabulary_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	/////////////////////// awards ////////////////////////////////	 
	function awards_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="awards List | Raisingbd24";

			$data['awards_list'] = $this->Index_model->getAllItemTable('awards','','','','','aid','desc');
			$details = $this->input->get('details');
			$data['main_content']="admin/awards/awards_list";
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function awards_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['awardsUpdate'] = $this->Index_model->getAllItemTable('awards','aid',$artiId,'','','aid','desc');
			
			$data['title']="awards Update | Raisingbd24";
			$this->form_validation->set_rules('type', 'Award Type', 'trim|required');
			$this->form_validation->set_rules('award', 'Award Title', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
				$save['type']=$this->input->post('type');
				$save['usertype']=$this->input->post('usertype');
				$save['userid']=$this->input->post('userid');
				$save['award']=$this->input->post('award');	
				$save['awardfor']=$this->input->post('awardfor');			
				
				if($this->input->post('aid')!=""){
					$aid=$this->input->post('aid');
					$this->Index_model->update_table('awards','aid',$aid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('awards', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/awards_list', 'refresh');
			}
			else{
				$data['main_content']="admin/awards/awards_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/awards/awards_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	
	
	
	/////////////////////// healthtips ////////////////////////////////	 
	function healthtips_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="healthtips List | Raisingbd24";

			$data['healthtips_list'] = $this->Index_model->getAllItemTable('healthtips','','','','','bid','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['healthtipsDetails'] = $this->Index_model->getAllItemTable('healthtips','bid',$details,'','','bid','desc');
				$data['main_content']="admin/healthtips/healthtips_details";
			}
			else{
				$data['main_content']="admin/healthtips/healthtips_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function healthtips_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['healthtipsUpdate'] = $this->Index_model->getAllItemTable('healthtips','bid',$artiId,'','','bid','desc');
			$data['title']="healthtips Update | Raisingbd24";
			$this->form_validation->set_rules('headline', 'Headline', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/healthtips/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
					
				$save['headline']=$this->input->post('headline');
				$save['created_date']=date('Y-n-d H:i:s');
				$save['about_details']=$this->input->post('about_details');
				$save['suggest_doctor']=$this->input->post('suggest_doctor');
				$auther_name=$this->input->post('auther_name');
				$autherName=$this->input->post('authername');
				if($auther_name=='others'){
					$save['author']	= $autherName;
				}
				else{
					$save['author']	= $auther_name;
				}		
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('healthtips','bid',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('healthtips', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/healthtips_list', 'refresh');
			}
			else{
				$data['main_content']="admin/healthtips/healthtips_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/healthtips/healthtips_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	/////////////////////// photographer ////////////////////////////////	 
	function photographer_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="photographer List | Raisingbd24";

			$data['photographer_list'] = $this->Index_model->getAllItemTable('photographer','','','','','user_id','desc');
			$details = $this->input->get('details');
			if(isset($details) && $details!=""){
				$data['photographerDetails'] = $this->Index_model->getAllItemTable('photographer','user_id',$details,'','','user_id','desc');
				$data['main_content']="admin/photographer/photographer_details";
			}
			else{
				$data['main_content']="admin/photographer/photographer_list";
			}
			
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function photographer_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['photographerUpdate'] = $this->Index_model->getAllItemTable('photographer','user_id',$artiId,'','','user_id','desc');
			$data['title']="photographer Update | Raisingbd24";
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/photographer/';
				$config['charset'] = "UTF-8";
				$new_name = "cover_photo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillImg');
							$save['photo']	= $upload_data;	
						}
					}
					
				$save['firstname']=$this->input->post('firstname');
				$save['lastname']=$this->input->post('lastname');
				$save['email']=$this->input->post('email');
				$save['mobile']=$this->input->post('mobile');
				$save['profile']=$this->input->post('profile');
				$save['about_details']=$this->input->post('about_details');
				
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('photographer','user_id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('photographer', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/photographer_list', 'refresh');
			}
			else{
				$data['main_content']="admin/photographer/photographer_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/photographer/photographer_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
		
	/////////////////////// photogallery ////////////////////////////////	 
	function photogallery_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="photogallery List | GEE 24 News";
		$data['photogallery_list'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['main_content']="admin/photogallery/photogallery_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function photogallery_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="photogallery Registration | GEE 24 News";
		}
		else{
			$data['title']="photogallery Update | GEE 24 News";
		}
		$data['allcategory']		= $this->Index_model->getDataById('category','','','cat_name','asc','');
		$data['photogalleryUpdate'] = $this->Index_model->getAllItemTable('photogallery','b_id',$artiId,'','','b_id','desc');
		$data['photographer_list'] = $this->Index_model->getAllItemTable('photographer','','','','','user_id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('photogallery_name', 'photogallery name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/photogallery/';
			$config['charset'] = "UTF-8";
			$new_name = "photogallery_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['photogalleryPhoto']['name']))
				{
					if($this->upload->do_upload('photogalleryPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['photogallery_name']	    = $this->input->post('photogallery_name');
				$save['category']	    = $this->input->post('cat_id');
				$save['usertype']	    = $this->input->post('usertype');
				$save['userid']	    = $this->input->post('userid');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('photogallery','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('photogallery', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/photogallery_list', 'refresh');
			}
			else{
				$data['main_content']="admin/photogallery/photogallery_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/photogallery/photogallery_action";
        $this->load->view('admin_template', $data);
	}
	
	

	
	/////////////////////// Video ////////////////////////////////	 
	function video_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Video List | GEE Bangladesh";
		$data['video_list'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		$data['main_content']="admin/video/video_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function video_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$bouid=$this->input->post('journalist');
		$data['videoUpdate'] = $this->Index_model->getAllItemTable('vedio_gallery','photo_album_id',$artiId,'','','photo_album_id','desc');
		$data['allcategory']		= $this->Index_model->getDataById('category','','','cat_name','asc','');
		$data['title']="Video Gallery";
		$this->form_validation->set_rules('video_name', 'video name', 'trim|required');
		$this->form_validation->set_rules('video_link', 'video Url', 'trim|required');
		//$this->form_validation->set_rules('coverimages', 'Cover images', 'trim|required');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/vedio/';
				$config['charset'] = "UTF-8";
				$new_name = "coverimages_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['coverimages']['name']))
					{
						if($this->upload->do_upload('coverimages')){
							$upload_data	= $this->upload->data();
							$save['album_ima']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['album_ima']	= $upload_data;	
						}
					}

				$expval=explode(' ',$this->input->post('video_name'));
				$impval=implode('-',$expval);
				$save['category']	    	= $this->input->post('cat_id');
				$save['usertype']	    = $this->input->post('usertype');
				$save['userid']	    = $this->input->post('userid');
				$save['photo_album_name']	= addslashes($this->input->post('video_name'));
				$save['vedio_link']	    	= addslashes($this->input->post('video_link'));
				$save['date']	    		= date('Y-m-d');
				$save['status']	    		= $this->input->post('status');
				
				if($this->input->post('photo_album_id')!=""){
					$cid=$this->input->post('photo_album_id');
					$this->Index_model->update_table('vedio_gallery','photo_album_id',$cid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('vedio_gallery', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/video_list', 'refresh');
			}
			else{
				$data['main_content']="admin/video/video_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/video/video_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	function home_video()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);

		$data['videoUpdate'] = $this->Index_model->getAllItemTable('home_video','','','','','photo_album_id','desc');
		$data['title']="Video Gallery";
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$save['photo_album_name']	= addslashes($this->input->post('photo_album_name'));
			$save['vedio_link']	    	= addslashes($this->input->post('video_link'));
			
			if($data['videoUpdate']->num_rows() > 0){
				$rowval = $data['videoUpdate']->row_array();
				$vid = $rowval['photo_album_id'];
				$this->Index_model->update_table('home_video','photo_album_id',$vid,$save);
				$s='Updated';
			}
			else{
				$query = $this->Index_model->inertTable('home_video', $save);
				$s='Inserted';
			}
			$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			$data['main_content']="admin/video/home_video_action";
			$this->load->view('admin_template', $data);
		}
	}
	
//////////////////////Extra////////////////
	
	
function approve()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$approve_val[]=$this->input->get('approve_val');
		$tablename=$this->input->get('tablename');
		$id=$this->input->get('id');
		$status=$this->input->get('status');
		$this->Index_model->get_approve($approve_val,$tablename,$id,$status);   
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
	
	function deapprove()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$approve_val[]=$this->input->get('approve_val');
		$tablename=$this->input->get('tablename');
		$id=$this->input->get('id');
		$status=$this->input->get('status');
		$this->Index_model->get_deapprove($approve_val,$tablename,$id,$status);   
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
	
///////////  All  Delete///////////////////////
public function deleteData($tableName,$colId){
	if(!$this->session->userdata('userAccessMail')) redirect("index");
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
		redirect($_SERVER['HTTP_REFERER'],'refresh');
}

	public function deleteAllData($tableName,$colId,$cID){
	if(!$this->session->userdata('userAccessMail')) redirect("index");
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
/*public function deleteData($tableName,$colId){
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
	}*/
	
	 function update_sequence()
	{
		$seqence=$this->input->get('sequence');
		$id=$this->input->get('id');
		$colid=$this->input->get('colid');
		$table=$this->input->get('table');
		$this->Index_model->update_squnce($table,$seqence,$colid,$id);     
		redirect($_SERVER['HTTP_REFERER'], '');
	}
	
	
function sequenceManage()
	{
		$tbl=$this->input->get('tbl');
		$tid=$this->input->get('tid');
		$seqence=$this->input->get('sequence');
		$id=$this->input->get('id');
		
		$query = $this->db->query("select * from ".$tbl." where sequence='".$seqence."'");
			foreach($query->result() as $row);
			$sequenceVal=$row->sequence;
			$nid=$row->$tid;
			
			if($seqence!=$sequenceVal){
				$update=$this->db->query("update ".$tbl." set sequence='".$seqence."' where ".$tid."='".$id."'");
			}
			else{
				$query1 = "select * from ".$tbl." where ".$tid."='".$id."'";
				$results1 = $this->db->query($query1);
				foreach($results1->result() as $row1);
				$sequenceVal1=$row1->sequence;
				$nid1=$row1->$tid;
			
				$update=$this->db->query("update ".$tbl." set sequence='".$sequenceVal1."' where ".$tid."='".$nid."'");
				$update1=$this->db->query("update ".$tbl." set sequence='".$seqence."' where ".$tid."='".$id."'");
			}
		redirect($_SERVER['HTTP_REFERER']);
	}
		
	function _CreatePageThumbnail($filename, $dir,$w,$h) {
        $config['image_library']    = "gd2";      
        $config['source_image']     = $dir.$filename; 
		$config['new_image']		= $dir.'thumnail';
        $config['create_thumb']     = TRUE;      
        $config['maintain_ratio']   = TRUE;      
        $config['width'] = $w;      
        $config['height'] = $h;
        $this->load->library('image_lib',$config);
        if(!$this->image_lib->resize()):
            echo $this->image_lib->display_errors();
       	endif;   
    }

}

?>