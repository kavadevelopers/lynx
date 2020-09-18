<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_auth extends CI_Controller {
	public function __construct(){
      
      parent::__construct();	
	 	
	 	$this->load->model('login_model');  
 	}
	
 	// public function index()
 	// {
 	// 	sendMail("mehul9921@gmail.com","123456");
 	// }


	public function login()
	{
		
		$this->load->helper('cookie');

		$user = trim($this->input->post("user"));
		
		$pass = trim($this->input->post("pass"));
		
		
		$return = $this->login_model->login_Ath( $user , $pass);
 
		if($return[0] == 0){
			
			$this->session->set_userdata( array( 'id' => $return[3]) );
			$this->session->set_userdata( array( 'client' => $return[4]) );
			if($this->input->post("check") == '1'){

	    		$this->input->set_cookie(array("name" => "username", "value" => $user, "expire" => time()+(60*60*24*30))); 
	    		$this->input->set_cookie(array("name" => "password", "value" => $pass, "expire" => time()+(60*60*24*30)));

	    	}
	    	else
	    	{
	    		delete_cookie("username");
	    		delete_cookie("password");
	    	}
		}
		echo json_encode($return);
	}
	public function forgot_password()
	{	

		$data['page_title']			= 	'Forgot Password';
		$data['error'] = "";
		$this->load->view('forgot_password',$data);

	}

	public function find_email()
    {	
	   	$this->db->where('email',$this->input->post('email'));
	   	$user = $this->db->get('user');
	   	if($user->num_rows() > 0){
	   		setcookie("forget", 1, time() + (60 * 10));
	   		redirect(base_url().'login_auth/otp_view/'.$user->result_array()[0]['id']);
	   	}
	   	else{
	   		$data['page_title']			= 	'Forgot password';
	   		$data['error'] = "please enter valid email";
	   		$this->load->view('forgot_password',$data);
	   	}
	}

   	public function otp_view($id){
   		$this->db->where('id',$id);
	   	$user = $this->db->get('user')->result_array();
   		if($user){
   			if(isset($_COOKIE['forget']) && $_COOKIE['forget'] == '1'){
	   			$data['otp'] = mt_rand(100000,999999);
	   			$this->db->where('id',$id);
	   			$this->db->update('user',['otp' => $data['otp']]);
	   			sendMail($user[0]['email'],'Reset Password',$this->load->view('mail/otp',['otp' => $data['otp']],true));
	   			$data['page_title']			= 	'Otp';
	   			$data['id']					= 	$id;
	   			$data['error']				= 	'';
		   		$this->load->view('otp_view',$data);
		   	}
		   	else{
	   			redirect(base_url().'login_auth/forgot_password');
	   		}
   		}
   		else{
   			redirect(base_url().'login_auth/forgot_password');
   		}
   	}
	
	public function otp_check()
	{
		$this->db->where('id',$this->input->post('main_id'));
	   	$user = $this->db->get('user')->result_array()[0];
	   	if($this->input->post('otp') == $user['otp']){
	   		setcookie("forget", 2, time() + (60 * 10));
	   		redirect(base_url().'login_auth/reset_password/'.$this->input->post('main_id'));
	   	}
	   	else{
	   		$data['page_title']		= 	'Otp';
   			$data['id']				= 	$this->input->post('main_id');
   			$data['error']			= 	'please enter valid otp';
	   		$this->load->view('otp_view',$data);
	   	}
	}

	public function reset_password($id)
	{
		$this->db->where('id',$id);
	   	$user = $this->db->get('user')->result_array();
   		if($user){
   			if(isset($_COOKIE['forget']) && $_COOKIE['forget'] == '2'){
	   			$data['page_title']		= 	'Reset Password';
	   			$data['id']				= 	$id;
		   		$this->load->view('nresetpass',$data);
		   	}
		   	else{
		   		redirect(base_url().'login_auth/forgot_password');
		   	}
   		}
   		else{
   			redirect(base_url().'login_auth/forgot_password');
   		}
	}

	public function update_pass()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
		$this->form_validation->set_rules('new', 'New Password', 'trim|required');
		$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[new]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']		= 	'Reset Password';
   			$data['id']				= 	$this->input->post('main_id');
	   		$this->load->view('nresetpass',$data);
		}
		else
		{ 
			$data	=	['password'	=>	md5($this->input->post('new')) ];
			$this->db->where('id',$this->input->post('main_id'));
		 	if($this->db->update('user',$data))
			{
				setcookie("forget", '', time() + (60 * 10));
				$this->session->set_flashdata('msg', 'password Successfully Updated');
	        	redirect(base_url());
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Reset Password Try Again');
	        	redirect(base_url());
			}
		}
	}
}
?>
