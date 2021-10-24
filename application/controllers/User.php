<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$config['charset'] = "UTF-8";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	}
	
	function registration()
	{
		$data['title']="user Account | Rising News24";
		$data['branchmark']='user Account';

			$this->form_validation->set_rules("email", "Email", "trim|required|min_length[6]|valid_email|is_unique[user.email]");
			$this->form_validation->set_rules('username', 'Username', 'trim|required');

			if($this->form_validation->run() != false){


				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/jobseeker_cv/';
				$config['charset'] = "UTF-8";
				$new_name = "cv_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cv']['name']))
					{
						if($this->upload->do_upload('cv')){
							$upload_data	= $this->upload->data();
							$save['cv_upload']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['cv_upload']	= $upload_data;	
						}
					}
					
					
				$save['fullname']		=$this->input->post('fullname');
				$save['email']	=$this->input->post('email');
				$save['phone']		=$this->input->post('phone');
				$save['username']			=$this->input->post('username');
				$save['password']			=md5(sha1(md5($this->input->post('password'))));
				$save['password_hints']		=$this->input->post('password');
				$save['date']	   		 = date('Y-m-d');
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('user','user_id',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('user', $save);
					$s='Inserted';
					}
					$this->session->set_flashdata('usersuccessMsg', '<h2 class="alert alert-success" style="text-align:center">Successfully '.$s.'</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			else{
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}	
					
					
				
			
		
	}
	
	
	
	public function userLogin()
     {
	 
	 	if($this->session->userdata('userAccessMail')) redirect("user/dashboard");
		
	 	$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
	 	if($this->session->userdata('userAccessMail')) redirect("user/dashboard");
	 	$data['title']="user Login | Rising News24";
		$data['branchmark']='user Login';
	 	
		if($this->input->post('login') && $this->input->post('login')!=""){
			  $username = $this->input->post("username");
			  $password = $this->input->post("password");
			  $this->form_validation->set_rules("username", "Username", "trim|required|min_length[6]");
			  $this->form_validation->set_rules("password", "Password", "trim|required");
	
			 if($this->form_validation->run() != false)
			  {			
				$result_log = $this->Index_model->get_memberLogin($username, $password);
				//echo $result_log->num_rows();
				if($result_log->num_rows() > 0) //active user record is present
				{
				 $usr_result = $result_log->row_array();
				  $sessiondata = array(
					'userAccessMail'=>$username,
					'userAccessName'=> $usr_result['fullname'],
					'userAccessId' => $usr_result['user_id'],
					'password' => TRUE
				   );
					$this->session->set_userdata($sessiondata);
					redirect("user/dashboard/");
				}
				else
				{
				 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">
				 Invalid Email and password!</div>');
				 redirect('user/userLogin');
				}
			  }
			  else{
				$data['main_content']="frontend/user/user_login";
				$this->load->view('template', $data);
			}
		 }
		else{
			$data['main_content']="frontend/user/user_login";
			$this->load->view('template', $data);
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
    redirect('user/userLogin', 'refresh');
  }
  
 function dashboard()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("user/userLogin");
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
		$data['title']="User Dashboard Rising News24";
		$data['branchmark']='user Login';
		//$data['totalinst'] = $this->Index_model->getTable('jobpost','job_id','desc');
		//$data['totalstd'] = $this->Index_model->getTable('category','scid','desc');
		//$data['totalphoto'] = $this->Index_model->getTable('photogallery','b_id','desc');
		//$data['totalvideo'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		
		$data['main_content']="frontend/user/dashboard";
        $this->load->view('template',$data);
	}
	
	
	function myprofile()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("user/userLogin");
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
		$userid = $this->session->userdata('userAccessId');
		
		$data['title']="user Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$getpagetype = $this->input->get('pages');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			$data['update'] = $this->Index_model->getOneItemTable('user','user_id',$userid,'user_id','desc');
			$data['main_content']="frontend/user/".$pagetype;
			$this->load->view('template',$data);
		}
		else{
			show_error();
		}
	}
	
	
	function myprofile_action()
	{	
		if(!$this->session->userdata('userAccessMail')) redirect("user/userLogin");
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
		$userid = $this->session->userdata('userAccessId');
		$data['title']="user Account | Rising News24";
		$data['branchmark']='user Account';

		$getpagetype = $this->input->get('action');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			if($pagetype=='editprofile'){				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/user/';
				$config['charset'] = "UTF-8";
				$new_name = "cv_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cv_upload']['name']))
					{
						if($this->upload->do_upload('cv_upload')){
							$upload_data	= $this->upload->data();
							$save['cv_upload']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['cv_upload']	= $upload_data;	
						}
					}
					
					
				$save['username']=$this->input->post('username');
				$save['mobile']=$this->input->post('phone');
				$save['email']=$this->input->post('email');
				$save['created_date']	    = date('Y-m-d H:i:s');
		
				$this->Index_model->update_table('user','user_id',$userid,$save);
				$s='Updated';
				$this->session->set_flashdata('usersuccessMsg', '<h2 class="alert alert-success" style="text-align:center">Successfully '.$s.'</h2>');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
			elseif($pagetype=='changepassword'){
				$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$usId = $this->session->userdata('userAccessId');
					$sesionmail = $this->session->userdata('userAccessMail');
					$old_password = sha1($this->input->post('oldpassword'));
					$queryCheck = $this->Index_model->checkOldPass('user','email',$sesionmail,'password',$old_password,'user_id',$usId);
					$queryCheck->num_rows();
					if($queryCheck->num_rows() >0 ){
						if($this->form_validation->run() != false){
							$password =sha1($this->input->post('password'));
							$passwordHints =$this->input->post('password');
							$dataUpdate = array(
								'password'		=> $password,
								'passwordHints'	=> $passwordHints,
								'active'		=> 1,
								'modify_date'	=> date('Y-m-d H:i:s')
							);
							
							$query = $this->Index_model->updateTable('user','user_id',$usId,$dataUpdate);
							if($query){
								$this->session->set_flashdata('globalMsg','<div class="alert alert-success">Password Change Successfully </div>');
								redirect($_SERVER['HTTP_REFERER'],'refresh');
							}
						}
						else{
							$data['main_content']="frontend/user/changepassword";
							$this->load->view('template',$data);
						}
					}
					else{
						$this->session->set_flashdata('globalMsg', '<div class="alert alert-danger">Old Password not match </div>');
						redirect($_SERVER['HTTP_REFERER'],'refresh');
					}
			}
			
			
		}
		else{
			show_error();
		}
	}	
		
	function content_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("user/userLogin");
		$getpagetype = $this->input->get('c');		
		$userid = $this->session->userdata('userAccessId');
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			if($pagetype=='feature'){
				$retpagename = 'ফিচার';
			}
			elseif($pagetype=='story'){
				$retpagename = 'ভুতের গল্প';
			}
			elseif($pagetype=='comment'){
				$retpagename = 'মতামত';
			}
			elseif($pagetype=='health'){
				$retpagename = 'স্বাস্থ্য';
			}
			elseif($pagetype=='journalism'){
				$retpagename = 'সাংবাদিকতা';
			}
			else{
				$retpagename = ' ';
			}
			
			$data['originptype'] = $pagetype;
			$data['retpagt'] = $retpagename;
			$array = array('feature','story','comment','health','journalism');
			if(in_array($pagetype,$array)){
			
				$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
				$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
				$data['title']="user Dashboard Jobster BD | Bangladesh Leargest Online Job";
				$data['branchmark']='user Login';
				
				$data['contentUpdate']		= 
				$this->Index_model->getAllItemTable('user_content','user_id',$userid,'content_type',$pagetype,'id','desc');
				
				$data['main_content']="frontend/user/content_list";
				$this->load->view('template',$data);
			}
			else{
				show_error();
			}
		}
		else{
			show_error();
		}
	}
	
		
	function new_content()
	{	
		if(!$this->session->userdata('userAccessMail')) redirect("user/userLogin");
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
		$userid = $this->session->userdata('userAccessId');
		$data['title']="user Account | Rising News24";
		$data['branchmark']='user Account';

		$getpagetype = $this->input->get('c');
		$getid = $this->input->get('id');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			$getfinalid = base64_decode($getid);
			$data['contentUpdate'] = $this->Index_model->getAllItemTable('user_content','id',$getfinalid,'content_type',$pagetype,'id','desc');
			if($pagetype=='feature'){
				$retpagename = 'ফিচার';
			}
			elseif($pagetype=='story'){
				$retpagename = 'ভুতের গল্প';
			}
			elseif($pagetype=='comment'){
				$retpagename = 'মতামত';
			}
			elseif($pagetype=='health'){
				$retpagename = 'স্বাস্থ্য';
			}
			elseif($pagetype=='journalism'){
				$retpagename = 'সাংবাদিকতা';
			}
			else{
				$retpagename = ' ';
			}
			
			$data['originptype'] = $pagetype;
			$data['retpagt'] = $retpagename;
			$array = array('feature','story','comment','health','journalism');
			if(in_array($pagetype,$array)){
				if($this->input->post('newentry')){
					$config['allowed_types'] = '*';
					$config['remove_spaces'] = true;
					$config['max_size'] = '1000000';
					$config['upload_path'] = './asset/uploads/user/'.$pagetype;
					$config['charset'] = "UTF-8";
					$new_name = $pagetype."_".time();
					$config['file_name'] = $new_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
						if (isset($_FILES['photo']['name']))
						{
							if($this->upload->do_upload('photo')){
								$upload_data	= $this->upload->data();
								$save['image']	= $upload_data['file_name'];
							}
							else{
								$upload_data	= $this->input->post('stillimg');
								$save['image']	= $upload_data;	
							}
						}
						
						
					$save['headline']=$this->input->post('headline');
					$save['user_id']=$userid;
					$save['message']=$this->input->post('message');
					$save['content_type']=$pagetype;
			
					if($this->input->post('user_id')!=""){
						$user_id=$this->input->post('user_id');
						$this->Index_model->update_table('user_content','id',$user_id,$save);
						$s='Updated';
					}
					else{
						$query = $this->Index_model->inertTable('user_content', $save);
						$s='Inserted';
					}
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');						
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				else{
					$data['main_content']="frontend/user/new_content";
					$this->load->view('template',$data);
				}
			}
			else{
				show_error();
			}
		}
		else{
			show_error();
		}
	}
	
	
	function new_content_home()
	{	
		if(!$this->session->userdata('userAccessMail')) redirect("user/userLogin");
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','','','n_id','desc','20');
		$userid = $this->session->userdata('userAccessId');
		$data['title']="user Account | Rising News24";
		$data['branchmark']='user Account';
		$pagetype = $this->input->post('pagetype');
				if($this->input->post('newentry')){
					$config['allowed_types'] = '*';
					$config['remove_spaces'] = true;
					$config['max_size'] = '1000000';
					$config['upload_path'] = './asset/uploads/user/'.$pagetype;
					$config['charset'] = "UTF-8";
					$new_name = $pagetype."_".time();
					$config['file_name'] = $new_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
						if (isset($_FILES['photo']['name']))
						{
							if($this->upload->do_upload('photo')){
								$upload_data	= $this->upload->data();
								$save['image']	= $upload_data['file_name'];
							}
							else{
								$upload_data	= $this->input->post('stillimg');
								$save['image']	= $upload_data;	
							}
						}
						
						
					$save['headline']=$this->input->post('headline');
					$save['user_id']=$userid;
					$save['message']=$this->input->post('message');
					$save['content_type']=$pagetype;
			
						$query = $this->Index_model->inertTable('user_content', $save);
						$s='Inserted';
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');						
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
		}
}
?>
