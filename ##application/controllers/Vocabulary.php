<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vocabulary extends CI_Controller {

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
	
	
	function details()
	{
		$vid=$this->uri->segment(3);
		$data['title']	='Vocabulary';
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['vocabulary']		= $this->Index_model->getDataById('verb_details','category',$vid,'bid','desc','');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');	
		
		$data['main_content']="frontend/vocabulary";
        $this->load->view('template', $data);
	}
	
	function vocabulary_pdf()
	{
		$vid=$this->uri->segment(3);
		$data['title']	='Vocabulary';
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');	
		
		$config = array();
        $config['base_url'] = base_url('vocabulary/vocabulary_pdf');
        $config["per_page"] = 1;
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$total_row = $this->Index_model->getDataById('vocabulary','','','bid','desc','');
        $config["total_rows"] = $total_row->num_rows();
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
		$config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$data['paginationdata']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		
		
		$data['vocabulary']		= $this->Index_model->getDataByIdWithPagination('vocabulary','','','bid','desc',$config["per_page"],$page);
		
		
		$data['main_content']="frontend/vocabulary_pdf";
        $this->load->view('template', $data);
	}
	
	
	
}

?>
