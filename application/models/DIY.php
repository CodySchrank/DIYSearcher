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

		if(!empty($errors)) {
			$this->session->set_flashdata('errors', $errors);
			return FALSE;
		} else {
			$query = "SELECT * FROM users WHERE email='{$post['email']}'";
			$result = $this->db->query($query)->result_array();
			if(count($result) == 0) {
				$query = "INSERT INTO users (first_name,last_name,email,password,created_at) VALUES (?,?,?,?,NOW())";
				$values = array("$first_name", "$last_name", "$email", "$password");
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
				return TRUE;
			} else {
				$this->session->set_flashdata('unique_login_errors', "Email or Password Incorrect");
			}
		}		
		return FALSE;
	}
}