<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		//
	}

	public function login(){
		$this->load->view('user/login');
	}

	public function login_user(){
		if(isset($_POST['btnlogin']))
		{	

			$email = $this->input->post("email");
			$password = sha1($this->input->post("password"));

			$user_data = $this->user_model->check_userLogin($email,$password);

			// print_r($user_data);die;
			if($user_data !== FALSE)
			{	
				$user_id = $user_data['id'];
				$user_name = $user_data['email'];
				$user_role = $user_data['user_role'];
				$status = $user_data['status'];

				// seting user info in session
				$this->session->set_userdata("user_id", $user_id);
				$this->session->set_userdata("user_name", $user_name);
				$this->session->set_userdata("status", $status);
				$this->session->set_userdata("user_role", $user_role);

				$this->session->set_userdata("islogin", 'Logged In');
				
				$this->session->set_flashdata('success', '<b>Login Success!! </b>Welcome '.$user_name.' ');
				redirect('dash');
				
			}else{
				$this->session->set_flashdata('error', '<b>Login Error!! </b>Username/Password not matched.');
				redirect(base_url());
			}
		
		}
	}

	public function register(){
		$this->load->view('user/register');
	}

	public function store_user(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[user_login.email]');
        $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
        	$data['title'] = 'User Details';
        	
        	$errors = [];

        	if ( form_error('email') ) {
        		$errors[] = 'This email address is already taken.';
        	}
        	if ( form_error('confirm_password') ) {
        		$errors[] = 'The password confirmation does not match. Please try again.';
        	}
        	
        	$this->session->set_flashdata('signup_error', $errors);
        	$this->load->view('user/register');
            // redirect('/register');
        }else{

		if(isset($_POST['btnsubmit'])){

			$full_name = $this->input->post('full_name', TRUE);
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password', TRUE);

			$log_data = array(
				'full_name'=>$full_name,
				'email'=>$email,
		        'password' => sha1($password),
		        'user_role' => 1,
		        'status' => 1,
		    );

			$d = $this->user_model->insertUser($log_data);
			}
			$this->session->set_flashdata('success', '<b>User Successfully Created!! </b> Please Sign In.');
			redirect('/login');
		}
	}

	public function logout(){
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');

		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("user_name");
		$this->session->unset_userdata("status");
		$this->session->sess_destroy();
		
		$this->session->set_flashdata('logout', '<b>You have Logged Out Successfully !!');
		redirect("/");
	}

}
