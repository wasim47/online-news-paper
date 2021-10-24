<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

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
		$data['title']="GEE24 News | News and Entertainment Based Largest Online News Media ";
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		$data['popular_news']		= $this->Index_model->commonAllData('news_manage','popular_news','1','n_id','desc','6');
		$data['latest_news']		= $this->Index_model->commonAllData('news_manage','latest_news','1','n_id','desc','6');
		
		$data['home_video']		= $this->Index_model->getDataById('home_video','','','photo_album_id','desc','1');
		$data['usercontent']		= $this->Index_model->getDataById('user_content','content_type','journalism','id','desc','20');
		$data['newscategory_disable']		= $this->Index_model->getDataById('category','status','0','sequence','asc','');
		
		$homepaenews		= $this->Index_model->getDataById('homepage_news','','','id','desc','1');
		$homepageRow = $homepaenews->row_array();
		$zRow =  $homepageRow['row1'];		
		//$fRow =  $homepageRow['row2'];
		//$sRow =  $homepageRow['row3'];

		$fex = explode(',',$zRow);
		 //$sex = explode(',',$sRow);
		 $data['zeroRowNews'] = $this->Index_model->getDataByIdArray('news_manage','n_id',$fex,'n_id','desc','8');
		// $data['firstRowNews'] = $this->Index_model->getDataByIdArray('news_manage','n_id',$fex,'n_id','desc','4');
		 //$data['secondRowNews'] = $this->Index_model->getDataByIdArray('news_manage','n_id',$sex,'n_id','desc','3');
		
		
		 $arrayCat = array('1','9','6','3','7');
		 $farray = join(',',$arrayCat);
		 $data['showCategory'] =  $this->db->query("SELECT * FROM category WHERE cid IN($farray) ORDER BY FIELD (cid, '1','9','6','3','7') ASC LIMIT 6");
		 //$this->Index_model->getDataByIdArray('category','cid',$arrayCat,'cid','desc','');
		 
		
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','asc','15');
		
		$bphoto=$this->Index_model->getDataById('photogallery','','','b_id','asc','1');
		$data['bigphoto'] = $bphoto->row_array();
		$photgr=$this->Index_model->getDataById('photographer','','','user_id','asc','1');
		$data['dpg'] = $photgr->row_array();
		
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');
		
		$data['main_content']="frontend/index";
		$this->load->view('template',$data);
		//$this->load->view('frontend/index',$data);
	}
	
	
	
function news_archive()
	{
		
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$date = $this->input->get('date');
		$data['archivedate']=$date;
		$catebycatTitle = $this->Index_model->getDataById('news_manage','date',$date,'date','asc','');
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		
		
		if($catebycatTitle->num_rows()>0){
			foreach($catebycatTitle->result() as $cattable);
			$cat_id=$cattable->category;
		}
		else {
			$cat_id="";
		}
			$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October',
			'November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','AM', 'PM');
			$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর',
			'অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার','এম', 'পিএম');
			$titledate = date('l d F Y',strtotime($date));
			$conDateBn = str_replace($engDATE, $bangDATE, $titledate);
						
						
		$data['slug']	= $date;
		$data['title']	= $conDateBn.' তারিখের সংবাদ';
		$config = array();
        $config['base_url'] = base_url('index/news_archive/');
        $config["per_page"] = 9;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$total_row = $this->Index_model->get_news_galleryCountArchive($date);
		$data['total_pages'] = $total_row->num_rows();
        $config["total_rows"] = $total_row->num_rows();
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
		$config["uri_segment"] = 4;
        $this->pagination->initialize($config);
		$data['paginationdata']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		$data['mostread_news']		= $this->Index_model->most_readnews();
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','desc','20');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','2');
		
		$date = $this->input->get('date');
		$data['newsgallery']=$this->Index_model->getDataByIdWithPagination('news_manage','date',$date,'date','desc',$config['per_page'], $page);

		$data['main_content']="frontend/news_archive";
        $this->load->view('template', $data);
	}
	
	
	function calajaxdata()
	{
        $this->load->view('frontend/calajax');
	}
	
	
	function details()
	{
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');
		
		$detailstype=$this->uri->segment(3);
		$did=$this->uri->segment(4);
		
		$data['fullurl'] = base_url('index/details/'.$detailstype.'/'.$did);
		
		if($detailstype=='books'){
			$detcont	= $this->Index_model->getOneItemTable($detailstype,'bid',$did,'bid','desc');
			$pHeadline  = $detcont['books_name'];
			$pSubHeadline = '<h5 style="font-family:Arial, Helvetica, sans-serif"> 
			Boots Type: '.$detcont['type'].' <br> Author: '.$detcont['author'].', Publisher: '.$detcont['author'].'</h5>';
			$pageDetails  = $detcont['details'];
			$pImage = '<img src="'.base_url('asset/uploads/'.$detailstype.'/'.$detcont['photo']).'" style="width:auto;height:auto; max-width:100%;"/>';
			$pAuthor  ='';
			$pImgUrl = base_url('asset/uploads/'.$detailstype.'/'.$detcont['photo']);
		}
		elseif($detailstype=='healthtips'){
			$detcont	= $this->Index_model->getOneItemTable($detailstype,'bid',$did,'bid','desc');
			$pHeadline = $detcont['headline'];
			$pSubHeadline = '';
			$pageDetails = $detcont['about_details'];
			$pImage = '<img src="'.base_url('asset/uploads/'.$detailstype.'/'.$detcont['photo']).'"  style="width:auto;height:auto; max-width:100%;"/>';
			$pAuthor  = $detcont['author'];
			$pImgUrl = base_url('asset/uploads/'.$detailstype.'/'.$detcont['photo']);
		}
		elseif($detailstype=='upcomming_track' || $detailstype=='upcomming_album'){
			$detcont	= $this->Index_model->getOneItemTable($detailstype,'t_id',$did,'t_id','desc');
			$pHeadline = $detcont['name'];
			$pSubHeadline = '';
			$pageDetails = $detcont['details'];
			$pImage = '<img src="'.base_url('asset/uploads/'.$detailstype.'/'.$detcont['coverphoto']).'"  style="width:auto;height:auto; max-width:100%;"/>';
			$pAuthor  = $detcont['author'];
			$pImgUrl = base_url('asset/uploads/'.$detailstype.'/'.$detcont['coverphoto']);
		}
		else{
			$detcont	= $this->Index_model->getOneItemTable($detailstype,'bid',$did,'bid','desc');
			$pHeadline = $detcont['headline'];
			$pSubHeadline = '';
			$pageDetails = $detcont['details'];
			$pImage = '<img src="'.base_url('asset/uploads/'.$detailstype.'/'.$detcont['photo']).'"  style="width:auto;height:auto; max-width:100%;"/>';
			$pAuthor  = $detcont['author'];
			$pImgUrl = base_url('asset/uploads/'.$detailstype.'/'.$detcont['photo']);
		}
		
		
		
		$data['pHeadline'] = $pHeadline;
		$data['pSubHeadline'] = $pSubHeadline;
		$data['pageDetails'] = $pageDetails;
		$data['pImage'] = $pImage;
		$data['pAuthor'] = $pAuthor;
		$data['pImgUrl'] = $pImgUrl;
		
		$data['title']	= $pHeadline;
		
		$data['main_content']="frontend/vutvutre_details";
        $this->load->view('template_vut', $data);
	}
	
	
	function content_details()
	{
		$did=$this->uri->segment(3);
		$data['title']	="Movies";
		$data['latest_news']		= $this->Index_model->getDataById('news_manage','latest_news','1','n_id','desc','20');
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','16');
		
		
		$data['cont_details']	= $this->Index_model->getOneItemTable('user_content','id',$did,'id','desc');
		$data['main_content']="frontend/content_details";
        $this->load->view('template', $data);
	}
	

}

?>