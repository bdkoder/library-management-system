<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Start Cache Removal

		$this->cachecontroll();

		// End Cache Removal

		$this->load->model('student_model');

		$this->load->model('dep_model');
		$data = array();

		
// Start User / Admin Login Validation Check
		if (!$this->session->userdata('userlogin')) {
			redirect('admin/login');
		}
// End User / Admin Login Validation Check


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

	public function addstudent(){

		$data['title'] = 'Add New Student';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();

		$data['content'] = $this->load->view('inc/studentadd',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);
	}

// Start Add Student Form


	public function addStudentForm(){
		$data['name']  =  $this->input->post('name');
		$data['dep']   =  $this->input->post('dep');
		$data['roll']  =  $this->input->post('roll');
		$data['reg']   =  $this->input->post('reg');
		$data['phone']   =  $this->input->post('phone');

		$name = $data['name'];
		$dep  = $data['dep'];
		$roll = $data['roll'];
		$reg  = $data['reg'];
		$phone  = $data['phone'];

		if (empty($name) && empty($dep) && empty($roll) && empty($reg) &&empty($phone)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("student/addstudent");
		}else{

				$this->student_model->saveStudent($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("student/addstudent");

// End msg
		}
	}



// End Add Student Form



	

	// Start Student List

	public function studentlist(){
		$data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['studentdata'] = $this->student_model->getAllStudentData();
		
		$data['content'] = $this->load->view('inc/liststudent',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End Student List


	// Start Student Edit Section

	public function editstudent($sid){
		$data['title'] = 'Edit Student Info';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		//$data['studentdata'] = $this->student_model->getAllStudentData();
		// Start Dept Data Edit from er jonno
		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();
		// End Dept Data Edit from er jonno

		$data['stuById'] = $this->student_model->getStudentById($sid);
		
		$data['content'] = $this->load->view('inc/studentedit',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End  Student Edit Section
	


	// Start Update Student

	public function updateStudent(){
		$data['sid']  =  $this->input->post('sid');
		$data['name']  =  $this->input->post('name');
		$data['dep']   =  $this->input->post('dep');
		$data['roll']  =  $this->input->post('roll');
		$data['reg']   =  $this->input->post('reg');
		$data['phone']   =  $this->input->post('phone');

		$sid = $data['sid'];
		$name = $data['name'];
		$dep  = $data['dep'];
		$roll = $data['roll'];
		$reg  = $data['reg'];
		$phone  = $data['phone'];

		if (empty($name) && empty($dep) && empty($roll) && empty($reg) &&empty($phone)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("student/editstudent/".$sid);
		}else{

				$this->student_model->updateStudentData($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("student/editstudent/".$sid);

// End msg
		}
	}
	// End Update Student


	// Start Delete Student From List

	public function delstudent($sid){

		$this->student_model->delStudentById($sid);

		$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Deleted Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("student/studentlist");

	}

	// End Delete Student From List

}










