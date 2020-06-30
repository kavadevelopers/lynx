<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }

    public function index()
	{	
		$data['page_title']			= 	'Manage Client';
		$data['clients']			=	$this->general_model->get_clients();
		$this->load->template('client/index',$data);
	}

	public function add()
	{
		$data['page_title']			= 	'Add Client';
		$this->load->template('client/add',$data);	
	}

	public function save()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('business_name', 'Business Name', 'trim|required');
		$this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_uniqueEmail');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']			= 	'Add Client';
			$this->load->template('client/add',$data);	
		}
		else{

			$data = [
				'name'			=> $this->input->post('client_name'),
				'email'			=> $this->input->post('email'),
				'mobile'		=> $this->input->post('mobile'),
				'password'		=> md5($this->input->post('password')),
				'created_at'	=> date('Y-m-d H:i:s'),
				'created_by'	=> $this->session->userdata('id'),
				'role'			=> '1'
			];
			$this->db->insert('user',$data);
			$user_id = $this->db->insert_id();
			$data = [
				'bname'			=> $this->input->post('business_name'),
				'cname'			=> $this->input->post('client_name'),	
				'email'			=> $this->input->post('email'),	
				'mobile'		=> $this->input->post('mobile'),	
				'country'		=> $this->input->post('country'),	
				'state'			=> $this->input->post('state'),	
				'city'			=> $this->input->post('city'),	
				'zip'			=> $this->input->post('zip'),	
				'address'		=> $this->input->post('address'),	
				'user'			=> $user_id
			];
			$this->db->insert('client',$data);

			$this->session->set_flashdata('msg', 'Client Added');
	        redirect(base_url('client'));
		}
	}

	public function edit($id = false)
	{
		if($id){
			if($this->general_model->get_client($id)){
				$data['page_title']			= 	'Edit Client';
				$data['client']				= 	$this->general_model->get_client($id);
				$this->load->template('client/edit',$data);
			}else{
				redirect(base_url('client'));		
			}
		}else{
			redirect(base_url('client'));	
		}
	}

	public function update()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
		$this->form_validation->set_rules('business_name', 'Business Name', 'trim|required');
		$this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_uniqueEmailEdit');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']			= 	'Edit Client';
			$data['client']				= 	$this->general_model->get_client($this->input->post('id'));
			$this->load->template('client/edit',$data);
		}
		else{

			$data = [
				'name'			=> $this->input->post('client_name'),
				'email'			=> $this->input->post('email'),
				'mobile'		=> $this->input->post('mobile')
			];

			$this->db->where('id',$this->input->post('user_id'));
			$this->db->update('user',$data);

			$data = [
				'bname'			=> $this->input->post('business_name'),
				'cname'			=> $this->input->post('client_name'),	
				'email'			=> $this->input->post('email'),	
				'mobile'		=> $this->input->post('mobile'),	
				'country'		=> $this->input->post('country'),	
				'state'			=> $this->input->post('state'),	
				'city'			=> $this->input->post('city'),	
				'zip'			=> $this->input->post('zip'),	
				'address'		=> $this->input->post('address')
			];
			
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('client',$data);

			$this->session->set_flashdata('msg', 'Client Saved');
	        redirect(base_url('client'));
		}
	}

	public function delete($id = false)
	{
		if($id){
			if($this->general_model->get_client($id)){
				
				$user_id = $this->general_model->get_client($id)['user'];

				$this->db->where('id',$id);
				$this->db->update('client',['df'  => 'deleted']);

				$this->db->where('id',$user_id);
				$this->db->update('user',['df'  => 'deleted']);

				$this->session->set_flashdata('msg', 'Client Deleted');
	        	redirect(base_url('client'));

			}else{
				redirect(base_url('client'));		
			}
		}else{
			redirect(base_url('client'));	
		}
	}

	public function uniqueEmail()
	{
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('df','');
		if($this->db->get('user')->num_rows() > 0){
			$this->form_validation->set_message(__FUNCTION__, 'This Email Already Exists');
		    return false;
		}
		else
		{
			return true;
		}
	}

	public function uniqueEmailEdit()
	{
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('df','');
		$this->db->where('id !=',$this->input->post('id'));
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