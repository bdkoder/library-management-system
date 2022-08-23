<?php 

class Student_Model extends CI_Model{
	public function saveStudent($data){
		$this->db->insert('db_p_ciproject',$data);
	}
	public function getAllStudentData(){
		$this->db->select('*');
		$this->db->from('db_p_ciproject');
		$this->db->order_by('sid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

	public function getStudentById($sid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject');
		$this->db->where('sid',$sid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result;
	}

	public function updateStudentData($data){
		// first var= db table name --- second var = form name
		$this->db->set('name', $data['name']);
		$this->db->set('dep', $data['dep']);
		$this->db->set('roll', $data['roll']);
		$this->db->set('reg', $data['reg']);
		$this->db->set('phone', $data['phone']);
		$this->db->where('sid', $data['sid']);
		$this->db->update('db_p_ciproject');
	}

	public function delStudentById($sid){
		$this->db->where('sid',$sid);
		$this->db->delete('db_p_ciproject');

	}
}

 ?>