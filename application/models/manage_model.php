<?php 

class Manage_Model extends CI_Model{

	public function getBookByDep($dep){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_book');
		$this->db->where('dep',$dep);
		$qresult = $this->db->get();
		$result  = $qresult->result();
		return $result;
	}


	public function saveStudentIssuData($data){
		$this->db->insert('db_p_ciproject_addissua',$data);
	}

	// Get all Student Issu Data
	public function getAllIssuData(){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_addissua');
		$this->db->order_by('id','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

// Student Issu Data Delete Er Jonno
public function delissudataById($sid){
		$this->db->where('id',$sid);
		$this->db->delete('db_p_ciproject_addissua');

	}


	// View Student Details er jonno...
		public function getStudentByReg($studentreg){
		$this->db->select('*');
		$this->db->from('db_p_ciproject');
		$this->db->where('reg',$studentreg);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result;
		// ekta Data Niye asley Row Hobey......//R onek Data Holey Result hobey
	}
}


?>