<?php
Class Index_model extends CI_Model
{
	
	function get_userLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('admin_users', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
		 return $reader;
     }
	 
	 function get_memberLogin($usr, $pwd)
     {
		$this->db->where('email',$usr);
		$this->db->where('password',sha1($pwd));
		$query = $this->db->get('user');
		return $query;
     }
	
	
	function get_all_news() 
	{
	  $result	= $this
	  ->db
	  ->order_by('n_id', 'desc')
	  ->limit(30)
	  ->get('news_manage');
	  $result	= $result->result();
	  return $result;
	}
	
	function get_movies_count()
	{
		$this->db->order_by('mv_id', 'desc');
		$query = $this->db->get('movies');
		return $query;
	}
	
	
	function get_movies_gallery($start,$limit)
	{
		$this->db->order_by('mv_id', 'desc');
		if($start!="" && $limit!=""){
			$this->db->limit($start,$limit);
		}
		elseif($start=="" && $limit!=""){
			$this->db->limit($limit);
		}
		$query = $this->db->get('movies');
		return $query;
	}
	
	
	
	function get_movies_details($slug)
	{
		$query = $this
				->db
				->where('slug', $slug)
				->get('movies');
			$row = $query->row_array();		
			return $row;
	}
	
	
	
	
	function get_sports($notv,$type,$category,$limit)
	{
		if($type!=""){
			if($type=="today"){
				$this->db->where('date_time', date('Y-m-d'));
			}
			else{
				$this->db->where('sportstype', $type);
			}
		}
		if($category!=""){
			$this->db->where('category', $category);
		}
		if($notv!=""){
			$this->db->where_not_in('sportstype', $notv);
		}
		$this->db->order_by('sport_id', 'desc');
		if($limit!=""){
			$this->db->limit($limit);
		}
		$query = $this->db->get('sports');
		return $query;
	}
	
	
	function get_photo_gallery($n_id,$start,$limit)
	{
		if($n_id!=""){
			$this->db->where_not_in('b_id', $n_id);
		}
		$this->db->order_by('b_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get('photogallery');
		return $query;
	}
	function get_videos_gallery($n_id,$start,$limit)
	{
		if($n_id!=""){
			$this->db->where_not_in('photo_album_id', $n_id);
		}
		$this->db->order_by('photo_album_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get('vedio_gallery');
		return $query;
	}
	
	
	
	function get_voting_index() 
	{
		$pdate=date('j M Y');
		$query = $this
		->db
		->where('end_date <=', $pdate)
		->where('status ', '1')
		->order_by('voting_id', 'desc')
		->limit(1)
		->get('voting');
		$row = $query->row_array();		
		return $row;
	}
	
	function get_vot_insert($vot_arry)
	{
			$pdate=date('j M Y');
			$this->db->where('end_date', $pdate);
			$this->db->update('voting', $vot_arry);
			return false;
	}
	
	function get_votvalue() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('voting');
		    return $result->result();
	}
	
	
	
	 function get_news_galleryCountArchive($date)
	{
		$this->db->where('date', $date);
		$this->db->order_by('n_id', 'desc');
		$query = $this->db->get('news_manage');
		return $query;
	}
	


	function get_news_galleryCount($cat_id,$scat_id)
	{
		$this->db->where('category', $cat_id);
		if($scat_id!=""){
			$this->db->where('sub_category', $scat_id);
		}
		$this->db->group_by('news_id');
		$this->db->order_by('n_id', 'desc');
		$query = $this->db->get('news_manage');
		return $query;
	}
	
	function get_news_gallery($n_id,$cat_id,$scat_id,$start,$limit)
	{
		$this->db->where('category', $cat_id);
		if($scat_id!=""){
			$this->db->where('sub_category', $scat_id);
		}
		if($n_id!=""){
			$this->db->where_not_in('n_id', $n_id);
		}
		$this->db->where('status', 1);
		$this->db->group_by('news_id');
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get('news_manage');
		return $query;
	}
	
	
	
	
	function CategoryNewsWs($catId,$limit)
	{
		$this->db->where('category', $catId);
		$this->db->where('sub_category', '');
		$this->db->where('status', '1');
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($limit);
		$result=$this->db->get('news_manage');
		return $result;
	}
	
	
	function get_news_galleryCountws($cat_id)
	{
		$this->db->where('category', $cat_id);
		$this->db->where('sub_category', '');
		$this->db->group_by('news_id');
		$this->db->order_by('n_id', 'desc');
		$query = $this->db->get('news_manage');
		return $query;
	}
	
	

	function get_news_galleryws($n_id,$cat_id,$start,$limit)
	{
		$this->db->where('category', $cat_id);
		$this->db->where('sub_category', '');
		if($n_id!=""){
			$this->db->where_not_in('n_id', $n_id);
		}
		$this->db->where('status', 1);
		$this->db->group_by('news_id');
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get('news_manage');
		return $query;
	}
	
	
	
	
	
	
	
	
	
	
	function get_colum_newsCount($table,$cat_id)
	{
		$this->db->where('auther_name', $cat_id);
		$this->db->order_by('n_id', 'desc');
		$query = $this->db->get($table);
		return $query;
	}
	
	function get_colum_news($table,$cat_id,$start,$limit)
	{
		$this->db->where('auther_name', $cat_id);
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get($table);
		return $query;
	}
	
	
	
	function get_news_details($slug)
	{
		$query = $this
				->db
				->where('slug', $slug)
				->get('news_manage');
			$row = $query->row_array();		
			return $row;
	}
	
	
	function get_related_news($table,$id,$cat_id)
	{
		$result = $this
				->db
				->where('slug NOT IN ("$id")',NULL, FALSE)
				->where('category',$cat_id)
				->order_by('n_id', 'desc')
                ->limit('8')
				->get($table);
		return $result;
	}
	
	
	function get_newsId() 
	{
	  $result	= $this
	  ->db
	  ->order_by('news_id', 'desc')
	   ->limit(1)
	  ->get('news_manage');
	  $result	= $result->result();
	  return $result;
	}
	
	
	function most_readnews()
	{
		$this->db->select('*');
		$this->db->from('news_manage');
		/*$datetwo=date('Y-m-d', strtotime("-3 days"));
		$dateone=date('Y-m-d');
		$this->db->where('count_date >=', $datetwo);
		$this->db->where('count_date <=', $dateone);*/
		$this->db->where('read_count !=', '0');
		$this->db->order_by('read_count', 'desc');
		$this->db->limit(15);
		$query = $this->db->get();
		return $query;
	}
	
	
	function getDataByIdWithPagination($table,$colId,$id,$orderId,$order,$start,$limit) 
	{
		if($colId!=""){
			$this->db->where($colId, $id);
		}
		$this->db->order_by($orderId, $order);
		$this->db->limit($start,$limit);
		$result=$this->db->get($table);
		return $result;
	}
	
	
	function searchdata($keyword,$start,$limit) 
	{
		$this->db->select('*');
		$this->db->from('news_manage');
		$this->db->like('headline', $keyword);
		$this->db->or_like('full_description', $keyword);
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$result=$this->db->get();
		return $result;
	}
	
	function searchuserdata($enteId,$keyword,$start,$limit) 
	{
		$this->db->select('*');
		$this->db->from('news_manage');
		$this->db->where('journalist', $enteId);
		$this->db->like('headline', $keyword);
		$this->db->or_like('full_description', $keyword);
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$result=$this->db->get();
		return $result;
	}
	
	
	 function menu_exist($key)
		{
			$this->db->where('menu_name',$key);
			$query = $this->db->get('menu');
			return $query;
		}
	  function category_exist($key)
		{
			$this->db->where('cat_name',$key);
			$query = $this->db->get('category');
			return $query;
		}
		function subcategory_exist($key,$catid)
		{
			$this->db->where('sub_cat_name',$key);
			$this->db->where('cat_id',$catid);
			$query = $this->db->get('sub_category');
			return $query;
		}
	
	function allCategoryNews($table,$catId,$notId,$limit)
	{
		$this->db->where('status', '1');
		//$this->db->where('top_news', '1');
		$this->db->where('category', $catId);
		//$this->db->where('image !=', ' ');
		if($notId!=""){
			//$this->db->where('top_news', '1');
			$this->db->where_not_in('n_id', $notId);
		}
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($limit);
		$result=$this->db->get($table);
		return $result;
	}
	
	function CategoryNews($catId,$scat_id,$limit)
	{
		
		if($scat_id!=""){
			$this->db->where('category', $catId);
			$this->db->where('sub_category', $scat_id);
		}
		else{
			$this->db->where('category', $catId);
		}
		$this->db->where('status', '1');
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($limit);
		$result=$this->db->get('news_manage');
		return $result;
	}
	
	
	function commonAllData($table,$colId,$matchId,$orderId,$order,$limit)
	{
		// For Match with id
		if($colId!=""){
			$this->db->where($colId, $matchId);
		}
		$this->db->order_by($orderId, $order);
		// For Limit
		if($limit!=""){
			$this->db->limit($limit);
		}
		$result=$this->db->get($table);
		return $result;
	}
	 function update_squnce($table,$seqence,$colid,$id)
		{
	
			$query=$this->db->query("select * from ".$table." where sequence='".$seqence."'");
			$results=$query->result();
			foreach($results as $row);
			$sequenceVal=$row->sequence;
			$nid=$row->$colid;
								
			if($seqence!=$sequenceVal){
				$update=$this->db->query("update ".$table." set sequence='".$seqence."' where ".$colid."='".$id."'");
			}
			else{
				$query1=$this->db->query("select * from ".$table." where ".$colid."='".$id."'");
				$results1=$query1->result();
				foreach($results1 as $row1);
				$sequenceVal1=$row1->sequence;
				$nid1=$row1->$colid;
			
				$update=$this->db->query("update ".$table." set sequence='".$sequenceVal1."' where ".$colid."='".$nid."'");
				$update1=$this->db->query("update ".$table." set sequence='".$seqence."' where ".$colid."='".$id."'");
			}
	}
	
	
			function get_approve($approve_val,$table,$id,$status)
			{
			   $setval = array(
				   $status => 1,
				);
				$array=join(',',$approve_val);
				$this->db->where($id.' IN ('.$array.')',NULL, FALSE);
				$this->db->update($table, $setval);
				return false;
			}
			
			function get_deapprove($approve_val,$table,$id,$status)
			{
				 $setval = array(
				   $status => 0,
				);
				$array=join(',',$approve_val);
				$this->db->where($id.' IN ('.$array.')',NULL, FALSE);
				$this->db->update($table, $setval);
				return false;
			}
	
		
// Menu 		
function getDataById($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($colId!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
		
function getSearch0Data($table,$colId,$id,$colId2,$id2,$colId3,$id3,$orderId,$order,$limit) 
	{
	  		 $this->db->where($colId, $id);
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
				 if($colId3!=""){
				$this->db->where($colId3, $id3);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	function getArticleDataById($table,$colId,$id,$colId2,$id2,$orderId,$order,$limit) 
	{
				if($colId!=""){
				$this->db->where($colId, $id);
				}
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	function getDataByIdArray($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	
	function getDataByIdArrayRank($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
			$this->db->where('ranking!=',0);
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	function getTable($table,$column,$order){
		$query =   $this->db
						->order_by($column, $order)
						->get($table);
		return $query;	
	}

function getOneItemTable($table,$tableColum,$userColum,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->get($table);
		return $query->row_array();	
	}
	
function getOneItemTableFromInstitute($table,$tableColum,$userColum,$instid,$instval,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->where($instid,$instval)
						->get($table);
		return $query->row_array();	
	}
// Display All data with id
function getAllItemTable($table,$colum,$id,$statusColum,$status,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}

function getAllMember($keyword,$searchkey){
	  if($keyword!=""){
		  $this->db->like('company_name', $keyword);
		  $this->db->or_like('head_organization', $keyword);
		  $this->db->or_like('contact_person', $keyword);
		  $this->db->or_like('contact', $keyword);
		  $this->db->or_like('email', $keyword);
	  }
	  if($searchkey!=""){
		  $this->db->like('company_name', $searchkey, 'after');
	  }
	  $this->db->order_by('company_name','asc');
	  $query = $this->db->get('member');
	 return $query;
}





/////////////////////////////////////////All Insert, Update, Select, Delete and login Area/////////////////////////////////////////////////////////
	
/*----- Insert Table and Get ID -------- */
	
	function inertTable($table, $insertData){
		if($this->db->insert($table, $insertData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	 
	function update_table($table, $colid,$idval, $uvalue){
		$this->db->where($colid,$idval);
		$dbquery = $this->db->update($table, $uvalue); 
		if($dbquery)
			return true;
		else
			return false;
	}
	
	function updateTable($tablename, $tableprimary_idname,$tableprimary_idvalue, $updated_array){
		$modified_date = time();
		$this->db->where($tableprimary_idname,$tableprimary_idvalue);
		$dbquery = $this->db->update($tablename, $updated_array); 

		if($dbquery)
			return true;
		else
			return false;
	}
	 function checkOldPass($table,$dbuser,$sesionmail,$dbpass,$old_password,$dbid,$cid)
		{
			$this->db->where($dbuser, $sesionmail);
			$this->db->where($dbid, $cid);
			$this->db->where($dbpass, $old_password);
			$query = $this->db->get($table);
			return $query;
			/*if($query->num_rows() > 0)
				return 1;
			else
				return 0;*/
		}
/*----- Delete Table Row -------- */
	function deletetable_row($tablename, $tableidname, $tableidvalue){
		if($this->db->where($tableidname, $tableidvalue)->delete($tablename)) return true;
		return false;
	}
}

?>