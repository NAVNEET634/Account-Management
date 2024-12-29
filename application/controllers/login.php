<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
	 * Login Page for this controller.
	 *
	 * Verify user credential to access application.
	
	 */
	 
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('loginmodel');
		$this->load->helper('app_function');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('loginUserData');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
		die;
	}
	
	public function index()
	{
		if($this->session->userdata("loginUserData"))
		{
			redirect(base_url().'eriden/CSRList', 'refresh');
			die;
		}
		$this->load->loginTemplate('login/login');
	}
	
	
	public function PayPal()
	{
		$this->load->loginTemplate('login/PayPal');
	}
	
	public function validate()
	{
		$userData=$this->loginmodel->validate($_POST);
		if($userData=='Invalid')
		{
			echo "Invalid";	
		}
		else
		{
			$this->session->set_userdata("loginUserData",$userData);	
			redirect(base_url(), 'refresh');  
		}
	}
	
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */