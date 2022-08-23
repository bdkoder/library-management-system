<?php 

class Author_Model extends CI_Model{

	public function saveAuthor($data){
		$this->db->insert('db_p_ciproject_author',$data);
	}


	public function getAllAuthorData(){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_author');
		$this->db->order_by('autid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

	public function getauthorById($autid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_author');
		$this->db->where('autid',$autid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result;
	}


	public function updateAuthorData($data){
		// first var= db table name --- second var = form name
		$this->db->set('autname', $data['autname']);
		$this->db->where('autid', $data['autid']);
		$this->db->update('db_p_ciproject_author');
	}

	public function delauthorById($autid){
		$this->db->where('autid',$autid);
		$this->db->delete('db_p_ciproject_author');

	}


	// Start liststudent.php   er jonno...
	public function getAuthor($autid){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_author');
		$this->db->where('autid',$autid);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result; 

	}





}

?>