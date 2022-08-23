<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

		public function index(){
		

$this->home();

		// Start User / Admin Login Validation Check
		if (!$this->session->userdata('userlogin')) {
			redirect('admin/login');

		}
// End User / Admin Login Validation Check

	}
	public function home(){
		$data = array();
		$data['title'] = 'Library Managment System';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);
		$data['content'] = $this->load->view('inc/content','',TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);
	}
		
	
}
