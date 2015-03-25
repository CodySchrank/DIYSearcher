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

	public function add_project1()
	{ 
		$this->load->view("add_project1");
	}

	public function add_project2()
	{ 
		$this->load->view("add_project2");
	}

	public function login_page() {
		$this->load->view('login');
	}

	public function register_page() {
		$this->load->view('register');
	}

	public function admin_dashboard() {
		$this->load->view('admin_dashboard');
	}

	public function dashboard_info($location) {
		if($location == "orders") {
			return $this->load->view('partials/admin/p-orders.php');
		} else if($location == "kits") {
			return $this->load->view('partials/admin/p-kits.php');
		} else if($location == "projects") {
			return $this->load->view('partials/admin/p-projects.php');
		} else {
			die('SOMETHING WENT WRONG');
		}
	}

	public function register() {
		if($this->input->post()) {
			if($this->DIY->register($this->input->post())) {
				redirect('/login');
			} else {
				redirect('/register');
			}
		} else {
			redirect('/register');
		}
	}

	public function login(){
		if($this->input->post()) {
			if($this->DIY->login($this->input->post())) {
				redirect('/browse');
			} else {
				redirect('/login');
			}
		} else {
			redirect('/login');
		}
	}

	public function logoff(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logged_in');
		redirect('/');
	}
}

//end of main controller