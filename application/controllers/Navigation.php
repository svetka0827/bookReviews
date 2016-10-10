<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));

	}


	public function top_nav()
	{
		$this->load->view('partials/navigation');
	}
	

}