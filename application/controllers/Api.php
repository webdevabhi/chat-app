<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('Json_output');
        $this->load->model('UserModel');
    }

    // Save user
	public function saveUser()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method != 'POST') {
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			if ($_REQUEST['name'] == "") {
				$respStatus = 400;
				$response = array('status' => 400,'message' =>  'Name can\'t be empty');
			} else {
				$respStatus = 200;
				$param = [ 'name' => $_REQUEST['name'] ];
				$response = $this->UserModel->store($param);
			}
			json_output($respStatus,$response);
		}
	}

	//Get All Active Users
	public function getActiveUsers()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method != 'GET') {
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$response = $this->UserModel->activeUsers();
			json_output(200, $response);
		}
	}
}
