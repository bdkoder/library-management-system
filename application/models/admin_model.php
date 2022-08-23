<?php 

class admin_Model extends CI_Model{

	public function checkUser($data){
		$this->db->select('*');
		$this->db->from('db_p_ciproject_admin');
		$this->db->where('username', $data['username']);
		$this->db->where('pass', 	 md5($data['pass']));
		$qresult = $this->db->get();
		$has  = $qresult->num_rows();
		if ($has === 1) {
			$result = $qresult->row();
			return $result;
		}
	}
}

?>