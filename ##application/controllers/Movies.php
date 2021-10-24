<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller {

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
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');
		$data['upcomming_list']		= $this->Index_model->getDataById('movies','category','Upcomming','mv_id','desc','15');
		$data['theatre_list']		= $this->Index_model->getDataById('movies','category','Theatres','mv_id','desc','15');
		$data['recentrel_list']		= $this->Index_model->getDataById('movies','category','Recent Realese','mv_id','desc','15');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		$data['popularnews']		= $this->Index_model->getDataByIdArrayRank('movies','category','popular','mv_id','asc','15');
		$data['featurecontent']		= $this->Index_model->getDataById('user_content','content_type','movie','id','desc','20');
		
		$category = $this->uri->segment(2);
		
		if(isset($category) && !is_numeric($category)){
			$seg = 3;
			$urlseg = base_url('movies/'.$category);
		}
		else{
			$seg = 2;
			$urlseg = base_url('movies');
		}
		
		if(isset($category) && $category=='all'){
			$pagename = 'movies_all';
		}
		else{
			$pagename = 'movies';
		}
		
		
		$config = array();
        $config['base_url'] = base_url('movies');
        $config["per_page"] = 16;
		$page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 0;
		$total_row = $this->Index_model->get_movies_count();
        $config["total_rows"] = $total_row->num_rows();
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
		$config["uri_segment"] = $seg;
        $this->pagination->initialize($config);
		$data['paginationdata']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		//echo $total_row->num_rows();
		
		
		
		$data['moviesgallery']	= $this->Index_model->get_movies_gallery($config["per_page"],$page);
		$data['main_content']="frontend/".$pagename;
		$this->load->view('template',$data);
	}
	
	function details()
	{
		$ntitle=$this->uri->segment(3);
		$newstitle = urldecode($ntitle);
		$data['title']	="Movies";
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');
		
		
		$data['movies_details']	= $this->Index_model->get_movies_details($newstitle);
		$data['main_content']="frontend/movies_details";
        $this->load->view('template', $data);
	}
	
	
	
	
}

?>
