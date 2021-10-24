<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $cname;
	private $cmob;
	private $cem;
	private $cadd;
	private $clogo;
	private $webtitle;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('Xml_writer');
		$this->load->library("pagination");
		$this->load->helper('Xml');
		$this->load->helper('url');
		$config['charset'] = "UTF-8";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$this->load->helper('common_helper');
		
		$userTable = company_information();
		if($userTable->num_rows() >0 ){
			foreach($userTable->result() as $user);
			$this->cname=$user->company_name;
			$this->cmob=$user->contact;
			$this->cem=$user->email;
			$this->cadd=$user->address;
			$this->clogo=$user->logo;
			$this->webtitle=$user->webtitle;
		}
		else{
			$this->cname='';
			$this->cmob='';
			$this->cem='';
			$this->cadd='';
			$this->clogo='';
			$this->webtitle='';
		}	
	}


/////////////////////// Admin Login Part ////////////////////////////////	 
	
	
	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		
		$data['title']="GEEBD | Bangladesh Leargest Online Job";
        $this->load->view('admin/index',$data);
	}
	
	
function configuration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		if($this->session->userdata('userAdminType')!='Super Admin') redirect("admin");
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		$data['title']="Admin Registration | CMSN Networks";
		$userId=$this->uri->segment(3);
		$data['configurationUpdate'] = $this->Index_model->getAllItemTable('company_info','','','','','id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('username', 'User Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Login Email', 'trim|required');
			
			if($this->form_validation->run() != false){
				$config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
				$config['remove_spaces'] = true;
				$config['upload_path'] = './asset/uploads/company/';
				$config['charset'] = "UTF-8";
				$new_name = "cmsn_".time();
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
						$upload_data	= $this->input->post('mainImg');
						$save['logo']	= $upload_data;	
					}
				}	
						
				$save['fcontact']		= $this->input->post('fcontact');
				$save['bkash']			= $this->input->post('bkash');
				$save['company_name']	= $this->input->post('username');
				$save['contact']	    = $this->input->post('contactno');
				$save['email']	    	= $this->input->post('email');
				$save['address']	    = $this->input->post('address');
				$save['webtitle']		= $this->input->post('webtitle');
				$save['editor'] 		= $this->input->post('editor');
				$save['subeditor'] 		= $this->input->post('subeditor');
				$save['facebook'] 		= $this->input->post('facebook');
				$save['twitter'] 		= $this->input->post('twitter');
				$save['linkedin'] 		= $this->input->post('linkedin');
				$save['googleplus'] 	= $this->input->post('googleplus');
				$save['instagram'] 		= $this->input->post('instagram');
				$save['youtube'] 		= $this->input->post('youtube');
	
				$save['create_on']	    = date('Y-m-d');
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('company_info','id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('company_info', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/configuration', 'refresh');
				
				
			}
			else{
				$data['main_content']="admin/configuration/general_setting";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/configuration/general_setting";
        $this->load->view('admin_template', $data);
	}
	
	
	
	
	
	
	public function passwordChange()
	{
			$data['title'] =  'Passwored Change | Raisingbd24';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
				if($this->input->post('changePassword')){
					$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$old_password = sha1($this->input->post('oldpassword'));
					$usId = $this->session->userdata('userAccessId');
					
					$sesemail = $this->session->userdata('userAccessMail');
					$queryCheck = $this->Index_model->checkOldPass('admin_users','email',$sesemail,'password',$old_password,'id',$usId);
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
	
	
	
/////////////////////// Admin Modification Part ////////////////////////////////	 
	
	function administration_list()
	{
			$data['title'] =  'Admin List | Raisingbd24';

		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		if($this->session->userdata('userAdminType')!='Super Admin') redirect("admin");
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
				$data['title']="Admin List | Raisingbd24";
				$data['admin_list'] = $this->Index_model->getAllItemTable('admin_users','','','','','id','desc');
				
				$data['main_content']="admin/administration/admin_list";
				$this->load->view('admin_template',$data);
	} 
	
	function administration_registration()
	{
		
		$data['title'] =  'Admin Registration | Raisingbd24';
		//if($this->session->userdata('userAdminType')!='Super Admin') redirect("admin");
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		//$data['categorys']		= $this->Index_model->getAllItemTable('category','','','','','cid','desc');
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
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
	


	public function userLogin()
     {
	 	$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		
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
                    $getUserData = $this->Index_model->get_userLogin($username, $password);
                    if($getUserData->num_rows() > 0) //active user record is present
                    {
					  $usr_result = $getUserData->row_array();
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAdminType'=> $usr_result['admin_type'],
						'userAccess'=> $usr_result['admin_access'],
						'userAccessPhoto'=> $usr_result['photo'],
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
				'userAccess'=> '',
				'userAdminType'=> '',
				'userAccessPhoto'=> '',
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
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		
		$data['title']="Dashboard GEEBD | Bangladesh Leargest Online Job";
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
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
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
	
	
	
	
	
	

	
/////////////////////// menu ////////////////////////////////	 
	function menu_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="Menu List | GEEBD";
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
			$data['title']="menu Registration | GEEBD";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required');
		}
		else{
			$data['title']="menu Update | GEEBD";
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
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="content List | GEEBD";
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
			$data['title']="content Registration | GEEBD";
		}
		else{
			$data['title']="content Update | GEEBD";
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
	

/////////////////////// advertisement ////////////////////////////////	 
	function advertisement_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="advertisement List | GEEBD";
		$data['advertisement_list'] = $this->Index_model->getTable('advertisement','b_id','desc');
		$data['main_content']="admin/advertisement/advertisement_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function advertisement_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="advertisement Registration | GEEBD";
		}
		else{
			$data['title']="advertisement Update | GEEBD";
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
	
	
	
	
	
	/////////////////////// Category ////////////////////////////////	 
	function category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="Category List | Geenews24";
		$data['category_list'] = $this->Index_model->getTable('category','cid','desc');
		$data['main_content']="admin/product_category/category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function category_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
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
				
				
				$expval=explode(' ',rtrim($this->input->post('category_name')));
				$impval=implode('-',$expval);
				$save['cat_name']	    = addslashes(urldecode(rtrim($this->input->post('category_name'))));
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
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="sub_category List | Geenews24";
		$data['sub_category_list'] = $this->Index_model->getTable('sub_category','scid','desc');
		$data['main_content']="admin/product_category/sub_category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function sub_category_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
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
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="last_category List | Geenews24";
		$data['last_category_list'] = $this->Index_model->getTable('last_category','id','desc');
		$data['main_content']="admin/product_category/last_category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function last_category_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
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
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="News List | Raising News24";
		$data['adminnews_list'] = $this->Index_model->getDataById('news_manage','','','n_id','desc','');
		
		$data['main_content']="admin/news/news_list";
        $this->load->view('admin_template',$data);
	} 
	 
	function homepage_news()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$data['title']="News List | Raising News24";
		$data['news_list'] = $this->Index_model->getAllItemTable('homepage_news','','','','','id','desc');
		$data['main_content']="admin/news/homepage_top_news";
        $this->load->view('admin_template',$data);
	} 
	
function home_news_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="Homepage News Insert | GEE24 News";
		}
		else{
			$data['title']="Homepage News Update | GEE24 News";
		}
		$data['newsUpdate'] = $this->Index_model->getAllItemTable('homepage_news','id',$artiId,'','','id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			
			$save['row1']	= $this->input->post('row1');
			$save['row2']	= $this->input->post('row2');
			$save['row3']	= $this->input->post('row3');
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
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
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
				}
				else{
					$upload_data	= $this->input->post('mainImg');
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
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Updated</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				else{
					$query = $this->Index_model->inertTable('news_manage', $save);
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
	
	
	///////////////////////sports ////////////////////////////////	 
function sports_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		if($this->session->userdata('userAdminType')=='SubAdmin' && $this->session->userdata('userAccess')!=""){
		$userAccess=explode(',',$this->session->userdata('userAccess'));
			if(!in_array('sports',$userAccess)){			
				redirect("admin");				
			}
		}
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
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
		if($this->session->userdata('userAdminType')=='SubAdmin' && $this->session->userdata('userAccess')!=""){
		$userAccess=explode(',',$this->session->userdata('userAccess'));
			if(!in_array('sports',$userAccess)){			
				redirect("admin");				
			}
		}
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		$artiId=$this->uri->segment(3);
		
		$data['sportsUpdate'] = $this->Index_model->getAllItemTable('sports','sport_id',$artiId,'','','sport_id','desc');
		$data['title']="sports Update | Raisingbd24";

		if($this->input->post('registration') && $this->input->post('registration')!=""){

 				$save['category']=$this->input->post('category');
				$save['sportstype']=$this->input->post('sportstype');
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
	
	
	
	
	/////////////////////// photogallery ////////////////////////////////	 
	function photogallery_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		$data['title']="photogallery List | GEEBD";
		$data['photogallery_list'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['main_content']="admin/photogallery/photogallery_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function photogallery_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="photogallery Registration | GEEBD";
		}
		else{
			$data['title']="photogallery Update | GEEBD";
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
	
	

	
/////////////////////// homephoto ////////////////////////////////	 
	function homephoto_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		if($this->session->userdata('userAdminType')=='SubAdmin' && $this->session->userdata('userAccess')!=""){
		$userAccess=explode(',',$this->session->userdata('userAccess'));
			if(!in_array('homephoto',$userAccess)){			
				redirect("admin");				
			}
		}
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		$data['title']="homephoto List | Rising News24";
		$data['homephoto_list'] = $this->Index_model->getTable('homephoto','b_id','desc');
		$data['main_content']="admin/homephoto/homephoto_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function homephoto_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		if($this->session->userdata('userAdminType')=='SubAdmin' && $this->session->userdata('userAccess')!=""){
		$userAccess=explode(',',$this->session->userdata('userAccess'));
			if(!in_array('homephoto',$userAccess)){			
				redirect("admin");				
			}
		}
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="homephoto Registration | Rising News24";
		}
		else{
			$data['title']="homephoto Update | Rising News24";
		}
		$data['homephotoUpdate'] = $this->Index_model->getAllItemTable('homephoto','b_id',$artiId,'','','b_id','desc');
		$data['photographer_list'] = $this->Index_model->getAllItemTable('photographer','','','','','user_id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('homephoto_name', 'homephoto name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/homephoto/';
			$config['charset'] = "UTF-8";
			$new_name = "homephoto_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['homephotoPhoto']['name']))
				{
					if($this->upload->do_upload('homephotoPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['homephoto_name']	    = $this->input->post('homephoto_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('homephoto','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('homephoto', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/homephoto_list', 'refresh');
			}
			else{
				$data['main_content']="admin/homephoto/homephoto_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/homephoto/homephoto_action";
        $this->load->view('admin_template', $data);
	}
	
	
	
	/////////////////////// Video ////////////////////////////////	 
	function video_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
		$data['title']="Video List | GEE Bangladesh";
		$data['video_list'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		$data['main_content']="admin/video/video_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function video_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
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
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
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
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
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
		$data['cname'] = $this->cname;
		$data['cmob'] = $this->cmob;
		$data['cem'] = $this->cem;
		$data['cadd'] = $this->cadd;
		$data['clogo'] = $this->clogo;
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
		
	

}

?>
