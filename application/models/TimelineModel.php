<?php

class TimelineModel extends CI_Model{
  
  	function index()
	{
		$this->db->order_by('status_id','desc');

		$q = $this->db->get('status')->result_array();
		foreach ($q as $i => $status) {
			$this->db->where('status_id', $status['status_id']);
			$comment_query = $this->db->get('comments')->result_array();

			foreach ($comment_query as $cqIDX => $cq) {
				$this->db->select('username');
				$this->db->where('user_id', $cq['comment_by']);
				$cqUsername = $this->db->get('users')->result_array();
				$comment_query[$cqIDX]['username'] = $cqUsername[0]['username'];
			}

			$q[$i]['comments']=$comment_query;

			$this->db->select('username');
			$this->db->where('user_id', $status['user_id']);
			$usernameQ = $this->db->get('users')->result_array();
			$q[$i]['username']=$usernameQ[0]['username'];
		}
		return $q;
	}
	function create()
	{
		$timestamp = time()+date("Z");
		$currdt = gmdate("Y/m/d H:i:s",$timestamp);
		$data = array(
			'status_body' => $this->input->post('body'),
			'user_id' => $_SESSION['user']['user_id'],
			'created_at' => $currdt,
			'modified_at' => $currdt
		);

		return $this->db->insert('status',$data);
	}
	function delete($id)
	{
		$this->db->delete('status', array('status_id'=> $id ));
		$this->db->delete('comments', array('status_id' => $id));
	}
	function addComment($id)
	{
		$data= array(
			'comment_by' => $_SESSION['user']['user_id'],
			'comment_body' => $this->input->post('comment'),
			'created_at' => date('Y-m-d H:i:s'),
			'status_id' => $id
		);

		$this->db->insert('comments',$data);
	}

}