<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Start Cache Removal

		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0, false');
		$this->output->set_header('Pragma: no-cache');

		// End Cache Removal

		$this->load->model('author_model');

		//$this->load->model('dep_model');


		$data = array();

		// Start User / Admin Login Validation Check
		if (!$this->session->userdata('userlogin')) {
			redirect('admin/login');
		}
// End User / Admin Login Validation Check

	}


	public function addauthor(){


		$data['title'] = 'Add New Author';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		//$data['departmentdata'] = $this->dep_model->getAllDepartmentData();

		$data['content'] = $this->load->view('inc/authoradd',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);
	
	}

	// Start Author Add Section


		public function addAuthorForm(){
		$data['autname']  =  $this->input->post('autname');


		$autname = $data['autname'];


		if (empty($autname) ) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("author/addauthor");
		}else{

				$this->author_model->saveAuthor($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("author/addauthor");

// End msg
		}
	}


	// End Author Add Section





// Start Author List

	public function authorlist(){
		$data['title'] = 'Author List';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['authordata'] = $this->author_model->getAllAuthorData();
		
		$data['content'] = $this->load->view('inc/listauthor',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End Author List



// Start Author Edit Section

	public function editauthor($autid){
		$data['title'] = 'Edit Student Info';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		//$data['studentdata'] = $this->student_model->getAllStudentData();

		$data['authorById'] = $this->author_model->getauthorById($autid);
		
		$data['content'] = $this->load->view('inc/authoredit',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End  Author Edit Section


	// Start Update Author

	public function updateAuthor(){
		$data['autid']  =  $this->input->post('autid');
		$data['autname']  =  $this->input->post('autname');

		$autid = $data['autid'];
		$autname = $data['autname'];

		if (empty($autname)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("author/editauthor/".$autid);
		}else{

				$this->author_model->updateAuthorData($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("author/editauthor/".$autid);

// End msg
		}
	}
	// End Update Author
	


	// Start Delete Author From List

	public function delauthor($autid){

		$this->author_model->delauthorById($autid);

		$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Deleted Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("author/authorlist");

	}

	// End Delete Author From List



}

?>