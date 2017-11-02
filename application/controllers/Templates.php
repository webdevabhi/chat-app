<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller {

	//View Source File in Angular.
	public function view($view)
	{
		$this->load->view('templates/'.$view);
	}
}