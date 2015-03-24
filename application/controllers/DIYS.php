<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DIYS extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DIY');
		// $this->output->enable_profiler();
	}

	public function index() {
		$this->load->view('index');
	}

	public function browse() 
	{
		$this->load->view('browse');
	}

	public function project() 
	{
		$this->load->view('project');
	}

	public function login_page() {
		$this->load->view('login');
	}

	public function register_page() {
		$this->load->view('register');
	}

	public function register() {
		if($this->input->post()) {

		}
	}
}

//end of main controller