<?

Class DIY extends CI_Model {

	public function register($post) {
		if(!empty($post['first_name']) && !strpbrk($post['first_name'], "~!@#$%^&*()_+-=[]{};:<>/?")) {
			$first_name = $post['first_name'];
		} else {
			$errors[] = "first_name";
		}

		if(!empty($post['last_name']) && !strpbrk($post['last_name'], "~!@#$%^&*()_+-=[]{};:<>/?")) {
			$last_name = $post['last_name'];
		} else {
			$errors[] = "last_name";
		}

		if(!empty($post['email']) && filter_var($post['email'], FILTER_VALIDATE_EMAIL) == TRUE) {
			$email = $post['email'];
		} else {
			$errors[] = "email";
		}	

		if(!empty($post['password'])) {
			$password = md5($post['password']);
		} else {
			$errors[] = "password";
		}

		if(!empty($post['confirm']) && $post['password'] == $post['confirm']) {
			// DO NOTHING
		} else {
			$errors[] = "confirm";
		}

		// FOR PROFLE IMAGE
		$config = array(
			'upload_path' => "./assets/pics/uploads/",
			'allowed_types' => "gif|jpg|png",
			'overwrite' => TRUE,
			'max_size' => "2048000" // in bytes
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload()) {
			$data = array('upload_data' => $this->upload->data());
			// -------- MIGHT BREAK IN DEVELOPMENT BCUZ PERMISSIONS --------
			$image = "/assets/pics/uploads/";
			$image .= $data['upload_data']['file_name'];
		} else {
			if(empty($_FILES['userfile']['name'])) {
				$image = "/assets/pics/uploads/default-profile.png";
			} else {
				$errors[] = array('error' => $this->upload->display_errors());
			}
		}

		if(!empty($errors)) {
			$this->session->set_flashdata('errors', $errors);
			return FALSE;
		} else {
			$query = "SELECT * FROM users WHERE email='{$post['email']}'";
			$result = $this->db->query($query)->result_array();
			if(count($result) == 0) {
				$query = "INSERT INTO users (first_name,last_name,image,email,password,created_at) VALUES (?,?,?,?,?,NOW())";
				$values = array("$first_name", "$last_name", "$image", "$email", "$password");
				return $this->db->query($query, $values);
			} else {
				$this->session->set_flashdata('unique_registration_errors', "A User already exists with that email");
				return FALSE;
			}
		}
	}

	public function login($post) {

		if(!empty($post['email'])) {
			$email = $post['email'];
		} else {
			$errors[] = "email";
		}

		if(!empty($post['password'])) {
			$password = md5($post['password']);
		} else {
			$errors[] = "password";
		}

		if(!empty($errors)) {
			$this->session->set_flashdata('errors', $errors);
		} else {
			$query = "SELECT * FROM users where email='{$email}' AND password='{$password}'";
			$user = $this->db->query($query)->row_array();
			if(!empty($user)) {
				$this->session->set_userdata('user', $user);
				$this->session->set_userdata('logged_in', TRUE);
				return TRUE;
			} else {
				$this->session->set_flashdata('unique_login_errors', "Email or Password Incorrect");
			}
		}		
		return FALSE;
	}

	// public function projectbasicinfo($post)
	// {
	// 		$config1 = array(
	// 		'upload_path' => "./assets/pics/uploads/",
	// 		'allowed_types' => "gif|jpg|png",
	// 		'overwrite' => TRUE,
	// 		'max_size' => "2048000" // in bytes
	// 	);

	// 	// INSERT LOGIC FOR IF THINGS DON"T EXIST

	// 	$this->load->library('upload', $config1);

	// 	if($this->upload->do_upload()) 
	// 	{
	// 		$data = array('upload_data' => $this->upload->data());
	// 		// -------- MIGHT BREAK IN DEVELOPMENT BCUZ PERMISSIONS --------
	// 		$image = "/assets/pics/uploads/";
	// 		$image .= $data['upload_data']['file_name'];
	// 	}
	// 	else 
	// 	{
	// 		if(empty($_FILES['userfile']['name']))
	// 		{
	// 			$image = "/assets/pics/uploads/home-improvement.jpg";
	// 		} 
	// 	// 	else 
	// 	// 	{
	// 	// 		//DO THIS EVENTUALLY $errors[] = array('error' => $this->upload->display_errors());
	// 	// }
	// 	}
	// 	$query = "INSERT INTO projects (title, description, ratings, expensive, difficulty, image, video, created_at, user_id) VALUES (?,?,?,?,?,?,?,?,?)" ;
	// 	$values = array($post["title"], $post["description"], $post["ratings"], $post["expensive"], $post["difficulty"], $image, $post["video"], date("Y-m-d H:i:s"), $post["user_id"]);
	// 	$this->db->query($query, $values);

	// }

	// public function add_basicsteps($post)
	// {
	// 		$config2 = array(
	// 		'upload_path' => "./assets/pics/uploads/step/",
	// 		'allowed_types' => "gif|jpg|png",
	// 		'overwrite' => TRUE,
	// 		'max_size' => "2048000" // in bytes
	// 	);

	// 	// INSERT LOGIC FOR IF THINGS DON"T EXIST

	// 	$this->load->library('upload', $config2);

	// 	if($this->upload->do_upload()) 
	// 	{
	// 		$data = array('upload_data' => $this->upload->data());
	// 		// -------- MIGHT BREAK IN DEVELOPMENT BCUZ PERMISSIONS --------
	// 		$image = "/assets/pics/uploads/step/";
	// 		$image .= $data['upload_data']['file_name'];
	// 	}
		// else 
		// {
		// 	if(empty($_FILES['userfile']['name']))
		// 	{
		// 		$image = "/assets/pics/uploads/step/home-improvement.jpg";
		// 	} 


		// 	else 
		// 	{
		// 		//DO THIS EVENTUALLY $errors[] = array('error' => $this->upload->display_errors());
	

	public function add_kit($post) {
		if(!empty($post['name'])) {
			$name = $post['name'];
		} else {
			$errors[] = "name";
		}

		if(!empty($post['description'])) {
			$description = $post['description'];
		} else {
			$errors[] = "description";
		}

		if(!empty($post['price'])) {
			$price = $post['price'];
		} else {
			$errors[] = "price";
		}		

		if(!empty($errors)) {
			$this->session->set_flashdata('errors', $errors);
			return FALSE;
		} else {
			$query = "INSERT INTO kits (name,price,description,created_at) VALUES (?,?,?,NOW())";
			$values = array("$name", "$price", "$description");
			return $this->db->query($query, $values);
		}

	}


	public function get_all_orders(){
		$query =   "SELECT cart.id, users.first_name, users.last_name, users.email, kits.name, 
					kits.price, cart.quantity, shipping_addresses.street,shipping_addresses.city, 
					shipping_addresses.zip_code, shipping_addresses.state, orders.created_at, orders.status
					FROM cart
					LEFT JOIN orders ON cart.order_id = orders.id
					LEFT JOIN users ON orders.user_id = users.id
					LEFT JOIN kits ON cart.kit_id = kits.id
					LEFT JOIN shipping_addresses ON orders.address_id = shipping_addresses.id";
		return $this->db->query($query)->result_array();
	}

	public function get_all_kits() {
		$query = "SELECT id,name,price,description,created_at FROM kits";
		return $this->db->query($query)->result_array();
	}

	public function get_kitinfo($data)
	{
		$results =  $this->db->query("SELECT * FROM kits WHERE id = $data")->result_array();
		return $results;
	}

	public function projectbasicinfo($post)
	{
			$config1 = array(
			'upload_path' => "./assets/pics/uploads/",
			'allowed_types' => "gif|jpg|png",
			'overwrite' => TRUE,
			'max_size' => "2048000" // in bytes
		);

		// INSERT LOGIC FOR IF THINGS DON"T EXIST

		$this->load->library('upload', $config1);

		if($this->upload->do_upload()) {
			$data = array('upload_data' => $this->upload->data());
			// -------- MIGHT BREAK IN DEVELOPMENT BCUZ PERMISSIONS --------
			$image = "/assets/pics/uploads/";
			$image .= $data['upload_data']['file_name'];
		}
	}

	public function add_order($data)
	{
		$query = 'INSERT INTO addresses (street, city, zip_code, state) VALUES (?,?,?,?)';
		$values = array($data["address"], $data["city"], $data["zip"], $data["state"]);
		$this->db->query($query, $values);
		$address = $data['address'];
		$city = $data["city"];
		$zip = $data["zip"];
	$get_address_id = $this->db->query("SELECT id FROM addresses WHERE street = '$address' AND city = '$city' AND zip_code = '$zip'")->result_array();
		$query2 = "INSERT INTO orders (user_id, address_id, created_at) VALUES (?,?,?)";
		$values2 = array($this->session->userdata("user")["id"], $get_address_id[0]["id"], date("Y-m-d H:i:s"));
		$this->db->query($query2, $values2);
		$address_id_is = $get_address_id[0]["id"];
		$user_query = $this->session->userdata("user")["id"];
	$get_order_id = $this->db->query("SELECT id FROM orders WHERE address_id = '$address_id_is' AND user_id = '$user_query '")->result_array();
		$order_id_is = $get_order_id[0]["id"];
		foreach ($this->session->userdata("cart") as $key => $value) 
		{
			$query3 = "INSERT INTO carts (order_id, kit_id, quantity) VALUES (?,?,?)";
			$values3 = array($order_id_is, $value["kit_id"], $value["quantity"]);
			$this->db->query($query3, $values3);
		}
		
		// $query1 = 'INSERT INTO '
		// $data[]
		// var_dump($data);
		// var_dump($this->session->userdata("cart"));
		// var_dump($this->session->userdata("user")["id"]);
		// die();
	}
		// DO THIS LOGIC 
		// else {
		// 	if(empty($_FILES['userfile']['name'])) {
		// 		$image = "/assets/pics/uploads/default-profile.png";
		// 	} else {
		// 		$errors[] = array('error' => $this->upload->display_errors());
		// 	}
		// }
		// }	
	// }
}