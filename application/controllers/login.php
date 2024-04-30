<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('facebook');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('login/login');
	}
	public function do_login()
	{
		$email = $this->input->post('email');
		$title = $this->input->post('title');
		$is_valid = $this->login_model->validate_credentials($email, $title);
		if ($is_valid) {
			$_SESSION["loggedin"] = true;
			$_SESSION["email"] = $email;
			$_SESSION["title"] = $title;
			$this->session->set_flashdata('message', '<div class="alert alert-success">Loggged In!</div>');
			redirect('post');
		} else {
			if (empty($email || $title)) {
				$_SESSION["loggedin"] = false;
				$this->session->set_flashdata('message', '<div class="alert alert-danger">email & title is missing</div>');
				redirect('login?error=1');
			} else if (empty($email)) {
				$_SESSION["loggedin"] = false;
				$this->session->set_flashdata('message', '<div class="alert alert-danger">email is missing</div>');
				redirect('login?error=1');
			} else if (empty($title)) {
				$_SESSION["loggedin"] = false;
				$this->session->set_flashdata('message', '<div class="alert alert-danger">title is missing</div>');
				redirect('login?error=1');
			} else {
				$_SESSION["loggedin"] = false;
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Invalid email or title.</div>');
				redirect('login?error=1');
			}
		}
	}
	public function do_logout()
	{
		$this->session->sess_destroy();
		redirect('login/do_logout2');
	}
	public function do_logout2()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logged Out!</div>');
		redirect('login');
	}
	public function fblogin()
	{
		if ($this->facebook->is_authenticated()) {
			$data['user'] = array();
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error'])) {
				$data['user'] = $user;
				$this->load->view('newpage', $data);
			}

		} else {
			redirect('login/index/');
		}
	}
	public function fblogout()
	{
		$this->facebook->destroy_session();
		// Remove user data from session 
		$this->session->unset_userdata('user');
		// Redirect to login page 
		redirect('login/fblogin/');

	}
}
