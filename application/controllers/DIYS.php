<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DIYS extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index() {
		$this->view->load('index');
	}

	public function browse() {
		$this->load->view('browse');
	}
}

//end of main controller