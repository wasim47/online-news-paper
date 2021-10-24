<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
		
		$cat = $this->uri->segment(3);
		$subcat = $this->uri->segment(4);
		if(isset($subcat) && !is_numeric($subcat)){
			$seg = 5;			
			$scattitle = urldecode($subcat);
			$cattitle = urldecode($cat);
			
			$catebycatTitle = $this->Index_model->getDataById('category','cat_slug',$cattitle,'','','');
			foreach($catebycatTitle->result() as $cattable);
			$cat_id=$cattable->cid;
			$categoryname=$cattable->cat_name;			
			
			$scatebycatTitle = $this->Index_model->getDataById('sub_category','sub_cat_slug',$scattitle,'','','');
			foreach($scatebycatTitle->result() as $scattable);
			$scat_id=$scattable->scid;
			$scategoryname=$scattable->sub_cat_name;
			
			$pagetitle = $categoryname.' > '.$scategoryname;
			$pageslug = $cattitle.' > '.$scattitle;
			
			$urlseg =  base_url('news/index/'.$cattitle.'/'.$scattitle);
			$psager = $scattitle;
			
		}
		else{
			$seg = 4;
			$cattitle = urldecode($cat);
			$catebycatTitle = $this->Index_model->getDataById('category','cat_slug',$cattitle,'','','');
			foreach($catebycatTitle->result() as $cattable);
			$cat_id=$cattable->cid;
			$categoryname=$cattable->cat_name;
			
			$pagetitle = $categoryname;
			$pageslug = $cattitle;
			$urlseg =  base_url('news/index/'.$cattitle);
			$scat_id='';
			$psager = $cattitle;
			
		}
		
		$pageview = $this->newspagedisplay($psager);
		
		$data['slug']	= $cattitle;
		$data['title']	= $pagetitle;
		
		$config = array();
        $config['base_url'] = $urlseg;
        $config["per_page"] = 8;
		$page = ($this->uri->segment($seg)) ? $this->uri->segment($seg) : 0;
		$total_row = $this->Index_model->get_news_galleryCount($cat_id,$scat_id);
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
		
		//National News
		$data['category_topnews']		= $this->Index_model->CategoryNews($cat_id,$scat_id,'2');
			foreach($data['category_topnews']->result() as $nat){
			$natId[] = $nat->n_id;
		}
		
		
		$data['newsgallery']	= $this->Index_model->get_news_gallery($natId,$cat_id,$scat_id,$config["per_page"],$page);
		$data['main_content']="frontend/".$pageview;
		$this->load->view('template',$data);
	}
	
	function details($slug)
	{
		$ntitle=$this->uri->segment(3);
		$newstitle = urldecode($ntitle);
		$catebycatTitle = $this->Index_model->getDataById('news_manage','slug',$newstitle,'','','');
		foreach($catebycatTitle->result() as $cattable);
		$newsheadline=$cattable->headline;
		$data['newsid']=$cattable->n_id;
		$data['slug']	=$newstitle;
		$data['title']	=$newsheadline;
		
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');
		$data['news_details']	= $this->Index_model->get_news_details($newstitle);
		$catid=$data['news_details']['category'];
		
		$data['rel_news']		= $this->Index_model->get_related_news($newstitle,$catid);
		$data['main_content']="frontend/news_details";
        $this->load->view('template_details', $data);
	}
	
	public function newspagedisplay($pagesluig){
		
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		if($pagesluig =="স্বাস্থ্য-তথ্য"){
			$pagename = 'health_tips';
		}
		
		return $pagename;
	}
	
}

?>
