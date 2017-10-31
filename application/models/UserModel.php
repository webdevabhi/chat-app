<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function store($data)
	{
		$token = crypt(substr( md5(rand()), 0, 7), 'st');
		$expireAt = date("Y-m-d H:i:s", strtotime('+12 hours'));
		$data['token'] = $token;
		$data['expire_at'] = $expireAt;
		$data['created_at'] = date('Y-m-d H:i:s');
		$q = $this->db->insert('users', $data);
		return array('status' => 201,'message' => 'User saved.', 'expire_at' => $expireAt, 'token' => $token);
	}
}