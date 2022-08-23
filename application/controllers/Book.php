<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Start Cache Removal

		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0, false');
		$this->output->set_header('Pragma: no-cache');

		// End Cache Removal

		$this->load->model('book_model');


		$this->load->model('student_model');

		$this->load->model('dep_model');

		$this->load->model('author_model');


		$data = array();

		// Start User / Admin Login Validation Check
		if (!$this->session->userdata('userlogin')) {
			redirect('admin/login');
		}
// End User / Admin Login Validation Check

	}


	public function addbook(){

		$data['title'] = 'Add New Book';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();
		$data['authordata'] = $this->author_model->getAllAuthorData();

		$data['content'] = $this->load->view('inc/bookadd',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);
	}

	
	// Start Add Book Form


	public function addBookForm(){
		$data['bookname']  =  $this->input->post('bookname');
		$data['dep']   =  $this->input->post('dep');
		$data['author']  =  $this->input->post('author');
		$data['stock']  =  $this->input->post('stock');
		
		$bookname = $data['bookname'];
		$dep  = $data['dep'];
		$author = $data['author'];
		$stock = $data['stock'];
		

		if (empty($bookname) && empty($dep) && empty($author)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("book/addbook");
		}else{

				$this->book_model->saveBook($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("book/addbook");

// End msg
		}
	}



// End Add Book Form





	// Start Book List

	public function booklist(){
		$data['title'] = 'Book List';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		$data['bookdata'] = $this->book_model->getAllBookData();


		
		$data['content'] = $this->load->view('inc/listbook',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}
 
 
	// End Book List



	
	// Start Book Edit Section

	public function editbook($bookid){
		$data['title'] = 'Edit Student Info';
		$data['header'] = $this->load->view('inc/header',$data,TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar','',TRUE);

		//$data['studentdata'] = $this->student_model->getAllStudentData();
		// Start Dept Data Edit from er jonno
		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();
		$data['authordata'] = $this->author_model->getAllAuthorData();
		// End Dept Data Edit from er jonno

		$data['bookById'] = $this->book_model->getBookById($bookid);
		
		$data['content'] = $this->load->view('inc/bookedit',$data,TRUE);
		$data['footer'] = $this->load->view('inc/footer','',TRUE);

		$this->load->view('home',$data);

	}


	// End  Book Edit Section




	// Start Update Book

	public function updatebook(){
		$data['bookid']  =  $this->input->post('bookid');
		$data['bookname']  =  $this->input->post('bookname');
		$data['dep']   =  $this->input->post('dep');
		$data['author']  =  $this->input->post('author');
		$data['stock']  =  $this->input->post('stock');


		$bookid = $data['bookid'];
		$bookname = $data['bookname'];
		$dep  = $data['dep'];
		$author = $data['author'];
		$stock = $data['stock'];
		

		if (empty($bookname) && empty($dep) && empty($author)) {
			$sdata = array();

			$sdata['msg'] = '<span style="color:red;font-size:16px;"> Field Must Not Be Empty.. </span>';

			$this->session->set_flashdata($sdata);

			redirect("book/editbook/".$bookid);
		}else{

				$this->book_model->updateBookData($data);
// For msg
				$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Saved Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("book/editbook/".$bookid);

// End msg
		}
	}
	// End Update Book





 //Start Delete Book From List

	public function delbook($bookid){

		$this->book_model->delBookById($bookid);

		$sdata = array();

			$sdata['msg'] = '<span style="color:green;font-size:16px;"> Data Deleted Succesfully.</span>';

			$this->session->set_flashdata($sdata);

			redirect("book/booklist");

	}

	// End Delete Book From List

}