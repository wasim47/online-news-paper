<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Players extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$config['charset'] = "UTF-8";
	}
	function index()
	{
		$config['charset'] = "UTF-8";
		$data['title']="News | Raising News 24";
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		$data['playerslist']		= $this->Index_model->getDataById('players','','','ranking','asc','20');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');

		$data['main_content']="frontend/players";
		$this->load->view('template',$data);
	}
	
	function details()
	{
		//$playersname = $this->uri->segment(3);
		$userid = $this->input->get('i');
		if(isset($userid) && $userid!=""){
			$userfinal_id = base64_decode($userid);
			$checkUserId = $this->Index_model->getDataById('players','user_id',$userfinal_id,'user_id','asc','1');
			if($checkUserId->num_rows() > 0){
				$playersdetails = $checkUserId->row_array();
				$config['charset'] = "UTF-8";
				$pageencode = $this->input->get('p');
				$pagename = base64_decode($pageencode);
				$pagelist = array('biography','photos','videos','awards');		
				if(isset($pagename) && in_array($pagename,$pagelist)){
					$pagedisplay = $pagename;
				}
				else{
					$pagedisplay = 'biography';
				}
				$pagetitle = ucfirst($pagedisplay);
				$data['pagetitle'] = $pagetitle;
				$data['title']=$playersdetails['firstname'].' '.$playersdetails['lastname'].' | '.$pagetitle;
				$data['playersid'] = $userfinal_id;
				$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
				$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
				$data['ac_det']		= $playersdetails;
		
				$data['photogallery']	= $this->Index_model->getAllItemTable('photogallery','usertype','players','userid',$userfinal_id,'b_id','desc');	
				$data['videogallery']	= $this->Index_model->getAllItemTable('vedio_gallery','usertype','players','userid',$userfinal_id,'photo_album_id','desc');
				
				$sqlaw = "SELECT * FROM awards WHERE usertype = ? AND type = ? AND userid = ? ORDER BY aid ASC";
				$data['awards_winner']	= $this->db->query($sqlaw,array('players','Winner',$userfinal_id));
				$data['awards_nominated']	= $this->db->query($sqlaw,array('players','Nominated',$userfinal_id));
		
				$data['main_content']="frontend/players/".$pagedisplay;
				$this->load->view('template',$data);
			}
			else{
				show_404();
			}
		}
		else{
			show_404();
		}
	}
	
	
}

?>
