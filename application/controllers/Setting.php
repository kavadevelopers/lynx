<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }

    public function index()
	{	
		$data['page_title']			= 	'Setting';
		$this->load->template('setting/index',$data);
	}


	public function save()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('web_address', 'Company Website Link', 'trim|required');

		$this->form_validation->set_rules('mhost', 'Email Host', 'trim|required');
		$this->form_validation->set_rules('mport', 'Email Port', 'trim|required');
		$this->form_validation->set_rules('muser', 'Email User', 'trim|required');
		$this->form_validation->set_rules('mpass', 'Email Password', 'trim|required');
		$this->form_validation->set_rules('access_token', 'Access Token', 'trim|required');
		$this->form_validation->set_rules('alert_email', 'Alerts Email', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']			= 	'Setting';
			$this->load->template('setting/index',$data);
		}
		else{

			if(getSetting()['access_token'] != $this->input->post('access_token')){
				$this->db->where('id','1');
				$this->db->update('setting',['access_token_expired' => date('Y-m-d',strtotime('+55 days'))]);				
			}

			$data = [
				'project_name'			=> $this->input->post('name'),
				'alert_email'			=> $this->input->post('alert_email'),
				'company_web_link'		=> $this->input->post('web_address'),
				'mhost'					=> $this->input->post('mhost'),
				'mport'					=> $this->input->post('mport'),
				'muser'					=> $this->input->post('muser'),
				'mpass'					=> $this->input->post('mpass'),
				'access_token'			=> $this->input->post('access_token')
			]; 

			$this->db->where('id','1');
			$this->db->update('setting',$data);

			$this->session->set_flashdata('msg', 'Setting Saved');
	        redirect(base_url('setting'));
		}
	}

}