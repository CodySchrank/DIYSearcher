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

	public function BUY()
	{
		
		// $this->session->unset_userdata("cart_total");
		// die();
		if(empty($this->session->userdata("cart_total")))
		{
			$this->session->set_userdata("cart_total", $this->input->post("quantity"));
		}
		else
		{
			$cart_update = $this->session->userdata("cart_total");
			$cart_update += $this->input->post("quantity");
			$this->session->set_userdata("cart_total" , $cart_update);
		}

		if(empty($this->session->userdata("cart")))
		{
			$purchase = array();
			$purchase[] = $this->input->post();
			$this->session->set_userdata("cart", $purchase);
		}
		else
		{
			foreach ($this->session->userdata("cart") as $key => $value) 
			{
				if($value["kit_id"] == $this->input->post("kit_id"))
				{
					$purchase_array = $this->session->userdata("cart");
					$purchase_array[$key]["quantity"] += $this->input->post("quantity");
					$this->session->set_userdata("cart", $purchase_array);
					redirect("/DIYS/project");
				}
			}
					$purchase_array = $this->session->userdata("cart");
					$purchase_array [] = $this->input->post();
					$this->session->set_userdata("cart", $purchase_array);
		}
		redirect("/DIYS/project");
	}

	public function cart()
	{
		// $this->session->unset_userdata("cart");
		// $this->session->unset_userdata("cart_total");
		$this->load->view("cart");
	}

	public function remove_from_cart($kid)
	{
		$temp_cart = $this->session->userdata("cart_total");
		$quantity_delete = $this->session->userdata("cart")[$kid]["quantity"];
		$new_total_cart = $temp_cart - $quantity_delete;
		$this->session->set_userdata("cart_total", $new_total_cart);
		$temp = $this->session->userdata("cart");
		unset($temp[$kid]);
		$this->session->set_userdata("cart", $temp);
		redirect("/DIYS/cart");
	}

	public function edit_cart_quantity()
	{
		// var_dump($this->input->post());
		// die();
		$kit = $this->input->post("kit_id");
		$updated_quantity = $this->input->post("quantity_updated");
		foreach ($this->session->userdata("cart") as $key => $value) 
			{
				if($value["kit_id"] == $kit)
				{
					$purchase_array = $this->session->userdata("cart");
					// if($purchase_array[$key]["quantity"] > $updated_quantity) 
					// {
					// 	// SUBTRACT FROM TOTLA
					// 	$temp_cart = $this->session->userdata("cart_total");
					// 	$quantity_delete = $purchase_array[$key]["quantity"] - $updated_quantity;
					// 	$new_total_cart = $temp_cart - $quantity_delete;
					// 	$this->session->set_userdata("cart_total", $new_total_cart);
					// }
					// elseif($purchase_array[$key]["quantity"] < $updated_quantity) 
					// {
					// 	// ADD TO TOAL
					// 	$temp_cart = $this->session->userdata("cart_total");
					// 	$quantity_add = $purchase_array[$key]["quantity"] - $updated_quantity;
					// 	$new_total_cart = $temp_cart + $quantity_add;
					// 	$this->session->set_userdata("cart_total", $new_total_cart);
					// }
					$purchase_array[$key]["quantity"] = $updated_quantity;
					$this->session->set_userdata("cart", $purchase_array);
					$total = 0;
					foreach ($this->session->userdata("cart") as $key => $value)
					{ 
						$total += $purchase_array[$key]["quantity"];
					}
					$this->session->set_userdata("cart_total", $total);

					// redirect("/DIYS/project");
				}
		// $updated_quantity
		// $this->session->set_userdata("cart_total", 'katkat');
		// redirect("/DIYS/cart");
			}
	}

	// public function add_project1()
	// { 
	// 	$this->load->view("add_project1");
	// }
	// 	public function add_basicproject()
	// 	{
	// 		$this->DIY->projectbasicinfo($this->input->post());
	// 		redirect("/DIYS/add_project2");
	// 	}

	// public function add_project2()
	// { 
	// 	$this->load->view("add_project2");
	// }
	// 	public function add_step_partial()
	// 	{
	// 		$this->load->view("/partials/add_step");
	// 	}
	// 	public function add_basicsteps()
	// 	{
	// 		$this->DIY->add_basicsteps($this->input->post());
	// 	}
	// public function add_project3()
	// { 
	// 	$this->load->view("add_project3");
	// }

	public function login_page() {
		$this->load->view('login');
	}

	public function register_page() {
		$this->load->view('register');
	}

	public function admin_dashboard() {
		$this->load->view('admin_dashboard');
	}

	public function add_kit_page() {
		$this->load->view('add_kit');
	}

	public function add_kit() {
		if($this->input->post()) {
			if($this->DIY->add_kit($this->input->post())) {
				redirect('/dashboard');
			} else {
				redirect('/add_kit');
			}
		} else {
			redirect('/add_kit');
		}
	}

	public function dashboard_info($location) {
		if($location == "orders") {
			$data['orders'] = $this->DIY->get_all_orders();
			return $this->load->view('partials/admin/p-orders.php', $data);
		} else if($location == "kits") {
			$data['kits'] = $this->DIY->get_all_kits();
			return $this->load->view('partials/admin/p-kits.php', $data);
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