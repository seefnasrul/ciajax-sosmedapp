<?php

class AuthModel extends CI_Model{
  
  	public function insert($data)
	{
		//insert user data to user table
		$insert = $this->db->insert('users',$data);

		//return the status
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}

	}
	public function checkEmailStatus($email){
		$this->db->where('email',$email);
		$q = $this->db->get('users');
		$result = $q->num_rows();
		if($result){
			return false;
		}else{
			return true;
		}
	}
	public function checkUsernameStatus($username){
		$this->db->where('username',$username);
		$q = $this->db->get('users');
		$result = $q->num_rows();
		if($result){
			return false;
		}else{
			return true;
		}
	}

	public function checkLogin($usr, $pass){

		 $q = $this->db->query('SELECT * FROM users where username="'.$usr.'"');
		$result = $q->result_array();

		if($result){
			if(password_verify($pass, $result[0]['password'])){
				return $result;
			}
		}else{
				return false;
		}
	}
}