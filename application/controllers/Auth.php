<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function register()
	{
		
			$this->form_validation->set_rules('email','Email', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password','password','required');
			$this->form_validation->set_rules('conf_password','confirm password','required|matches[password]');
			$this->form_validation->set_rules('fullname', 'Full name', 'required');

			if($this->form_validation->run())
			{
				$dataEmail = $this->input->post('email');
				$dataUsername = $this->input->post('username');
				$checkEmail = $this->AuthModel->checkEmailStatus($dataEmail);
				$checkUsername = $this->AuthModel->checkUsernameStatus($dataUsername);

				if($checkEmail == false)
				{
					$this->session->set_flashdata('emailErr','Email already used');
				}
				if($checkUsername == false)
				{
					$this->session->set_flashdata('usernameErr','username already used');
				}
				if($checkEmail != false && $checkUsername != false)
				{
					$userData = array
					(
						'username' => $this->input->post('username'),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'full_name' => $this->input->post('fullname'),
						'email' => $this->input->post('email'),
						'created_at' => date("Y-m-d H:i:s"),
						'modified' => date("Y-m-d H:i:s")
					);

					$insert = $this->AuthModel->insert($userData);	
						
					if($insert)
					{
						$this->session->set_flashdata('success_msg','Registration complete. Please try to login.');
						redirect('login');
					}
					else
					{
						$this->session->set_flashdata('error','Some problems occured, please try again.');
						
					}
				}else{
					redirect('register');
				}
				
			}else{
				$actv = "register";
				$data['actv'] = $actv;
				$this->load->view('layouts/top');
				$this->load->view('items/guestnav', $data);
				$this->load->view('pages/auth/register');
				$this->load->view('layouts/bottom');
			}
		
	}

	public function login(){
		$config = array(
        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must fill the username!',
                ),
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must fill the password!',
                ),
        )
);


		$this->form_validation->set_rules($config);

		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$checklogin = $this->AuthModel->checkLogin($username, $password);
			if($checklogin){
				$data = $checklogin;
				$user = array(
					'user_id' =>$data[0]['user_id'],
					'username' => $data[0]['username'],
					'full_name' => $data[0]['full_name'],
					'email' => $data[0]['email']
				);
				$this->session->set_userdata('user' , $user);
				redirect('home');
			}
		}else{
			$actv = "login";
			$data['actv'] = $actv;
			$this->load->view('layouts/top');
			$this->load->view('items/guestnav', $data);
			$this->load->view('pages/auth/login');
			$this->load->view('layouts/bottom');
		}
	}

}
