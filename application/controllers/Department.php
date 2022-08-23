<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Start Cache Removal

		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0, false');
		$this->output->set_header('Pragma: no-cache');

		// End Cache Removal

		$this->load->model('dep_model');
		$data = array();


		// Start User / Admin Login Validation Check
		if (!$this->session->userdata('userlogin')) {
			redirect('admin/login');
		}
// End User / Admin Login Validation Check


	}

		public function adddepartment(){

		$data['title'] = 'Add New Department';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);
		$data['content'] = $this->load->view('inc/departmentadd','',TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);
	}

		public function addDepartmentForm(){
		$data['depname']  =  $this->input->post('depname');


		$depname = $data['depname'];


		if (empty($depname) ) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("department/adddepartment");
		}else{

				$this->dep_model->saveDepartment($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("department/adddepartment");

// End msg
		}
	}


// Start Department List

	public function departmentlist(){
		$data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/h2',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();
		
		$data['content'] = $this->load->view('inc/listdepartment',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End Department List



// Start Department Edit Section

	public function editdepartment($depid){
		$data['title'] = 'Edit Student Info';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		//$data['studentdata'] = $this->student_model->getAllStudentData();

		$data['depById'] = $this->dep_model->getdepById($depid);
		
		$data['content'] = $this->load->view('inc/departmentedit',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End  Department Edit Section\


	// Start Update Student

	public function updateDepartment(){
		$data['depid']  =  $this->input->post('depid');
		$data['depname']  =  $this->input->post('depname');

		$depid = $data['depid'];
		$depname = $data['depname'];

		if (empty($depname)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("department/editdepartment/".$depid);
		}else{

				$this->dep_model->updateDepartmentData($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("department/editdepartment/".$depid);

// End msg
		}
	}
	// End Update Student
	

	// Start Delete Department From List

	public function deldepartment($depid){

		$this->dep_model->deldepartmentById($depid);

		$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Deleted Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("department/departmentlist");

	}

	// End Delete Department From List



}


?>