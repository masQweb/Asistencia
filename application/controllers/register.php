<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    }

	public function index()
	{

		$this->form_validation->set_rules('user_name', 'Username', 'strip_tags|trim|valid_email|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'strip_tags|trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirm', 'strip_tags|trim|required|md5');

		$data['title'] = "register page";
		$data['view']  = "register";
		//$this->load->view('template',$data);

		if ($this->form_validation->run() === false){

			$data['error_message'] = "";
			$this->load->view('template', $data);

		} else {

			$name      = $this->input->post('user_name');
			$password  = $this->input->post('password');
			
			$this->load->model('register_model');
			$result = $this->register_model->insert_user($name, $password);

			if ($result === true){
				redirect(base_url().'login');
			}

		}

	}

}