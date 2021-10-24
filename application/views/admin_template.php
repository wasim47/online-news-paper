<?php 
if($this->session->userdata('userAdminType')!="" && $this->session->userdata('userAdminType')=="Super Admin"){
	$this->load->view('includes/admin_header');
}
elseif($this->session->userdata('userAdminType')!="" && $this->session->userdata('userAdminType')=="SubAdmin"){
	$this->load->view('includes/sub_admin_header');
}
else{
	$this->load->view('includes/admin_header');
}
?>
<?php $this->load->view($main_content);?>
<?php $this->load->view('includes/admin_footer');?>
