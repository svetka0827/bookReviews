<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Book');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));

	}


	public function user_reviews()
	{
		$user_id=$this->session->userdata('user_id');
		$user_reviews=$this->Book->user_reviews($user_id);

		$data=array(
				'user_reviews'=>$user_reviews
				);
		$this->load->view('view_user',$data);
	}
	

	public function register()
	{
        $this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata("registration_errors", validation_errors());
			//redirect('/Users/index');
        }
        else
        {
        	$post=$this->input->post();
        	$data=array(
				'name'=>$post['name'],
				'email'=>$post['email'],
				'password'=>$post['password'],
				'confirm_password'=>$post['confirm_password']
				);

			$this->User->add_user($data);

			//$this->session->set_flashdata("success","You have officially registered, Now you can login");

            redirect('/');
        }
    }


		

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email is not valid', 'trim|required');
		$this->form_validation->set_rules('password', 'Password doesnt match', 'trim|required');


		$data = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);

		$result = $this->User->log_in($data);
		if ($result) 
		{
			$session_data = array(
							'name' => $result['name'],
							'email' => $result['email'],
							'user_id' => $result['id'],
							'logged_in'=>true				
						);
					
			// Add user data in session
			$this->session->set_userdata($session_data);
			redirect('/');
					
		} 
		else
		{
			$this->session->set_flashdata("login_errors", "Invalid User Id and Password combination");
			redirect('/');
		}
	}



	public function logout()
	{
		$user_session_data = $this->session->all_userdata();
		foreach($user_session_data as $key)
		{
			$this->session->unset_userdata($key);
		}
		$this->session->sess_destroy();
		redirect(base_url());
	}




}	
	
	







