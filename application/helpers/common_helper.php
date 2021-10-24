<?php
if (!function_exists('company_information'))
{
    function company_information(){
		 $ci=& get_instance();
	     $ci->load->database();
         $cominfo = $ci->db->query("select * from company_info");
	     return $cominfo; 
    }
}