<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    // Migrate The DB.
	public function index()
	{
		$this->load->library('migration');

		if ( ! $this->migration->latest())
		{
			show_error($this->migration->error_string());
		} else {
			redirect(base_url());
		}
	}
}
