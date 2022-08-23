<?php 

class dep_model extends CI_Model{

	public function saveDepartment($data){
		$this->db->insert('db_p_ciproject_dep',$data);
	}
	

	public function getAllDepartmentData(){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_dep');
		$this->db->order_by('depid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

	public function getdepById($depid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_dep');
		$this->db->where('depid',$depid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result;
	}

	public function updateDepartmentData($data){
		// first var= db table name --- second var = form name
		$this->db->set('depname', $data['depname']);
		$this->db->where('depid', $data['depid']);
		$this->db->update('db_p_ciproject_dep');
	}

	public function deldepartmentById($depid){
		$this->db->where('depid',$depid);
		$this->db->delete('db_p_ciproject_dep');

	}
// Start liststudent.php   er jonno...
	public function getDepartment($depid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_dep');
		$this->db->where('depid',$depid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result; 

	}

}

?>