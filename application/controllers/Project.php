<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }

    public function index()
	{	
		if($this->session->userdata('id') == '1'){
			$data['page_title']			= 	'Manage Project';
		}else{
			$data['page_title']			= 	'My Projects';
		}
		$data['projects']			=	$this->general_model->get_projects();
		$this->load->template('project/index',$data);
	}

	public function add()
	{
		$data['page_title']			= 	'Add Project';
		$this->load->template('project/add',$data);	
	}

	public function save()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('project_name', 'Project Code/Name', 'trim|required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('client', 'Client', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']			= 	'Add Project';
			$this->load->template('project/add',$data);		
		}
		else{

			$data = [
				'name'			=> $this->input->post('project_name'),
				'start_date'	=> _ddate($this->input->post('start_date')),
				'client'		=> $this->input->post('client'),
				'remarks'		=> $this->input->post('remarks'),
			];
			$this->db->insert('project',$data);

			$this->session->set_flashdata('msg', 'Project Added');
	        redirect(base_url('project'));
		}
	}

	public function edit($id = false)
	{
		if($id){
			if($this->general_model->get_project($id)){
				$data['page_title']			= 	'Edit Project';
				$data['project']				= 	$this->general_model->get_project($id);
				$this->load->template('project/edit',$data);
			}else{
				redirect(base_url('project'));		
			}
		}else{
			redirect(base_url('project'));	
		}
	}

	public function update()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('project_name', 'Project Code/Name', 'trim|required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('client', 'Client', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']			= 	'Edit Project';
			$data['project']			= 	$this->general_model->get_project($this->input->post('id'));
			$this->load->template('project/edit',$data);
		}
		else{


			$data = [
				'name'			=> $this->input->post('project_name'),
				'start_date'	=> _ddate($this->input->post('start_date')),
				'client'		=> $this->input->post('client'),
				'remarks'		=> $this->input->post('remarks'),
			];
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('project',$data);

			$this->session->set_flashdata('msg', 'Project Saved');
	        redirect(base_url('project'));

		}
	}

	public function delete($id = false)
	{
		if($id){
			if($this->general_model->get_project($id)){
				
				$this->db->where('id',$id);
				$this->db->update('project',['df' => 'deleted']);

				$this->session->set_flashdata('msg', 'Project Deleted');
	        	redirect(base_url('project'));				

			}else{
				redirect(base_url('project'));		
			}
		}else{
			redirect(base_url('project'));	
		}
	}
}