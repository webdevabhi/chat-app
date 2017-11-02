<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	//Store A user.
	public function store($data)
	{
		$token = crypt(substr( md5(rand()), 0, 7), 'st');
		$data['token'] = $token;
		$data['created_at'] = date('Y-m-d H:i:s');
		$user = $this->db->insert('users', $data);

		return array('status' => 201,'message' => 'User saved.', 'token' => $token, 'userName' => $data['name']);
	}

	// Return Active Users
	public function activeUsers()
	{
		$this->db->select("*");
		$this->db->from("active_connections")->join('users', 'active_connections.user_id = users.id');;
		$query = $this->db->get();
		return $query->result_array();
	}
}