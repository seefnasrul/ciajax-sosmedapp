<?php

class TimelineModel extends CI_Model{
  
  	function index()
	{
		$this->db->order_by('status_id','desc');

		$q = $this->db->get('status')->result_array();
		foreach ($q as $i => $status) {
			$this->db->where('status_id', $status['status_id']);
			$comment_query = $this->db->get('comments')->result_array();
			$q[$i]['comments']=$comment_query;
		}
		return $q;
	}
	function create()
	{
		$data = array(
			'status_body' => $this->input->post('body')
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
			'comment_by' => 'Seef',
			'comment_body' => $this->input->post('comment'),
			'created_at' => date('Y-m-d H:i:s'),
			'status_id' => $id
		);

		$this->db->insert('comments',$data);
	}

}