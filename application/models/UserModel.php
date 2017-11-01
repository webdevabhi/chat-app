<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function store($data)
	{
		$token = crypt(substr( md5(rand()), 0, 7), 'st');
		$data['token'] = $token;
		$data['status'] = 'ACTIVE';
		$data['created_at'] = date('Y-m-d H:i:s');
		$user = $this->db->insert('users', $data);

		return array('status' => 201,'message' => 'User saved.', 'token' => $token, 'userName' => $data['name']);
	}

	public function activeUsers()
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where('status','ACTIVE');
		$query = $this->db->get();
		return $query->result_array();
	}
}