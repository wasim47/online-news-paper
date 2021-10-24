<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Livetv extends CI_Controller {

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
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');

		$data['main_content']="frontend/underconstruciton";
		$this->load->view('template',$data);
	}
	
	
	
}

?>
