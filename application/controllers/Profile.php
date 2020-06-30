<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }

    public function index()
	{	
		$data['page_title']			= 	'Profile';
		$this->load->template('profile/index',$data);
	}
	
	public function save()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_uniqueEmail');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[10]');
		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']			= 	'Profile';
			$this->load->template('profile/index',$data);
		}else{
			$data = [
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'mobile'	=> $this->input->post('mobile')
			]; 

			$this->db->where('id',$this->session->userdata('id'));
			$this->db->update('user',$data);

			if(!empty($this->input->post('password'))){
				$this->db->where('id',$this->session->userdata('id'));
				$this->db->update('user',['password' => md5($this->input->post('password'))]);
			}

			$this->session->set_flashdata('msg', 'Profile Updated');
	        redirect(base_url().'profile');
		}
	}

	public function uniqueEmail()
	{
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('df','');
		$this->db->where('id !=',$this->session->userdata('id'));
		if($this->db->get('user')->num_rows() > 0){
			$this->form_validation->set_message(__FUNCTION__, 'This Email Already Exists');
		    return false;
		}
		else
		{
			return true;
		}
	}
}
?>