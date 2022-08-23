<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Start Cache Removal

		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0, false');
		$this->output->set_header('Pragma: no-cache');

		// End Cache Removal

		//$this->load->model('student_model');

		$this->load->model('dep_model');
		$this->load->model('manage_model');
		$this->load->model('student_model');
		$this->load->model('book_model');
		$this->load->model('author_model');


		$data = array();

		// Start User / Admin Login Validation Check
		if (!$this->session->userdata('userlogin')) {
			redirect('admin/login');
		}
// End User / Admin Login Validation Check

	}


		public function addissuebook(){

		$data['title'] = 'Add Student Issu';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();

		$data['content'] = $this->load->view('inc/issustudentadd',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);
	}

	public function getBookByDepId($dep){

		$getAllBook = $this->manage_model->getBookByDep($dep);
		$output = null;
		$output.='<option value="0">Select One</option>';
		foreach ($getAllBook as $book) {
			$output.='<option value="'.$book->bookid.'">'.$book->bookname.'</option>';
		}
		echo $output;
	}




// Start Add Student  Issu  Form


	public function addIssuForm(){
		$data['studentname']  =  $this->input->post('studentname');
		$data['studentreg']   =  $this->input->post('studentreg');
		$data['dep']  =  $this->input->post('dep');
		$data['book']   =  $this->input->post('book');
		$data['return']   =  $this->input->post('return');

		$studentname = $data['studentname'];
		$studentreg  = $data['studentreg'];
		$dep = $data['dep'];
		$book  = $data['book'];
		$return  = $data['return'];

		if (empty($studentname) && empty($studentreg) && empty($dep) && empty($book) &&empty($return)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("manage/addissuebook");
		}else{

				$this->manage_model->saveStudentIssuData($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("manage/addissuebook");

// End msg
		}
	}



// End Add Student Issu Form


	// Start Student List

	public function issuebooklist(){
		$data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['issudata'] = $this->manage_model->getAllIssuData();
		
		$data['content'] = $this->load->view('inc/listissustudentadd',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End Student List


	// Start Delete Student From List

	public function delissudata($sid){

		$this->manage_model->delissudataById($sid);

		$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Deleted Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("manage/issuebooklist");

	}

	// End Delete Student From List






	// Start View Student List

	public function ViewstudentDeails($studentreg){
		$data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['issuStudentdata'] = $this->manage_model->getStudentByReg($studentreg);
		
		$data['content'] = $this->load->view('inc/ViewstudentDeails',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End View Student List

	// Start View Book Qty

	public function viewbook($bookid){
		$data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['bookById'] = $this->book_model->getBookById($bookid);
		
		$data['content'] = $this->load->view('inc/viewBook',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End View Book Qty
























}

?>