<?php


class General_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_clients()
	{
		return $this->db->order_by('id','desc')->get_where('client',['df' => ''])->result_array();
	}

	public function get_client($id)
	{
		return $this->db->get_where('client',['id' => $id,'df' => ''])->row_array();
	}

	public function _get_client($id)
	{
		return $this->db->get_where('client',['id' => $id])->row_array();
	}

	public function get_projects()
	{
		if($this->session->userdata('id') == '1'){
			return $this->db->order_by('id','desc')->get_where('project',['df' => ''])->result_array();
		}else{
			return $this->db->order_by('id','desc')->get_where('project',['df' => '','client' => $this->session->userdata('client')])->result_array();
		}
	}

	public function get_project($id)
	{
		return $this->db->get_where('project',['id' => $id,'df' => ''])->row_array();
	}

	public function _get_project($id)
	{
		return $this->db->get_where('project',['id' => $id])->row_array();
	}

	


	public function count_client()
	{
		return $this->db->get_where('client',['df' => ''])->num_rows();
	}

	public function count_project()
	{
		if($this->session->userdata('id') == '1'){
			return $this->db->get_where('project',['df' => ''])->num_rows();
		}else{
			return $this->db->get_where('project',['df' => '','client' => $this->session->userdata('client')])->num_rows();
		}
	}
}