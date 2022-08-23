<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Start Cache Removal

		$this->cachecontroll();

		// End Cache Removal

		$this->load->model('admin_model');

		$data = array();
	}

		// Start Cache Removal
	public function cachecontroll(){
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0, false');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0, false');
		$this->output->set_header('Pragma: no-cache');

	}
		// End Cache Removal


// Start Login Page er Jonno....
	public function login(){

	


		$this->load->view('login');
	}

// Start 


		// $username = $data['username'];
		// $pass  = $data['pass'];

public function loginFrom(){
		$data = array();
		$data['username']  =  $this->input->post('username');
		$data['pass']   =  $this->input->post('pass');
		$check = $this->admin_model->checkUser($data);

		if ($check) {
			$sdata = array();
			$sdata['userid'] = $check->userid;
			$sdata['userlogin'] = TRUE;
			$this->session->set_userdata($sdata);
			redirect('Library');
		}else{
			$sdata = array();
			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Username Or Password Is Wrong </span>';

			$this->session->set_flashdata($sdata);
			redirect('admin/login');
		}


}


	public function logout(){
		$this->session->unset_userdata($userid);
		$this->session->set_userdata('userlogin', FALSE);
		$this->session->sess_destroy();
		redirect('admin/login');

	}

}