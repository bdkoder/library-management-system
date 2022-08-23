<?php 

class Book_Model extends CI_Model{
	public function saveBook($data){
		$this->db->insert('db_p_ciproject_book',$data);
	}



	// Start All Book er list 

	public function getAllBookData(){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_book');
		$this->db->order_by('bookid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

	// End All Book er list 

public function getBookById($bookid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_book');
		$this->db->where('bookid',$bookid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result;
	}


	// Start Book Update Section
	public function updateBookData($data){
		// first var= db table name --- second var = form name
		$this->db->set('bookname', $data['bookname']);
		$this->db->set('dep', $data['dep']);
		$this->db->set('author', $data['author']);
		$this->db->set('stock', $data['stock']);
		
		$this->db->where('bookid', $data['bookid']);
		$this->db->update('db_p_ciproject_book');
	}


	// Start Delete Section

	public function delBookById($bookid){
		$this->db->where('bookid',$bookid);
		$this->db->delete('db_p_ciproject_book');

	}




// Start listIssu.php   er jonno...
	public function getBook($bookid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_book');
		$this->db->where('bookid',$bookid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result; 

	}


}