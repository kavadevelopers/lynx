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
		$this->form_validation->set_rules('add_id', 'Ad campaign id', 'trim|required');

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
				'add_id'		=> $this->input->post('add_id'),
				'remarks'		=> $this->input->post('remarks')
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

	public function view($id = false)
	{
		if($id){
			if($this->general_model->get_project($id)){
				$data['page_title']			= 	'View Report';
				$data['project']				= 	$this->general_model->get_project($id);
				$this->load->template('project/view',$data);
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
		$this->form_validation->set_rules('add_id', 'Ad campaign id', 'trim|required');

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
				'add_id'		=> $this->input->post('add_id'),
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


	public function fetch_report()
	{
		if($this->input->post('add_id')){
			$add_id = trim($this->input->post('add_id'));
			$api_url  = "https://graph.facebook.com/v8.0/".$add_id."/insights?fields=impressions,clicks,spend&access_token=".getSetting()['access_token'];

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_URL,$api_url);
	        $result=curl_exec($ch);
	        curl_close($ch);
	        $new_resp = json_decode(json_encode(json_decode($result)), True);

	        // echo "<pre>";
	        // print_r($new_resp);
	        // exit;
	        if(array_key_exists("error", $new_resp)){
	        	$return = "false";
	        	$data = [];
	        }else{
	        	if(array_key_exists('data', $new_resp)){
	        		if (array_key_exists('0', $new_resp['data'])) {
	        			$data = $new_resp['data'][0];
	        			$impressions = 0; $clicks = 0; $spend = 0; $from = ""; $to = "";
	        			if(array_key_exists("impressions", $data)){
	        				$impressions = $data['impressions'];
	        			}
	        			if(array_key_exists("clicks", $data)){
	        				$clicks = $data['clicks'];
	        			}
	        			if(array_key_exists("spend", $data)){
	        				$spend = $data['spend'];
	        			}
	        			if(array_key_exists("date_start", $data)){
	        				$from = date('d M Y',strtotime($data['date_start']));
	        			}
	        			if(array_key_exists("date_stop", $data)){
	        				$to = date('d M Y',strtotime($data['date_stop']));
	        			}

	        			$return = "true";	
			        	$data = [
							'imp'		=> number_format($impressions),
							'clicks'	=> number_format($clicks),
							'spend'		=> "$".number_format($spend,2),
							'start'		=> $from,
							'end'		=> $to
						];

	        		}else{
	        			$return = "false";
	        			$data = [];		
	        		}
	        	}else{
	        		$return = "false";
	        		$data = [];	
	        	}
	        }
			echo json_encode(['_retun' => $return,'data' => $data]);
		}else{
			redirect(base_url());
		}
	}


	public function export()
	{
		$project 	= $this->general_model->_get_project($this->input->post('project'));
		$client 	= $this->general_model->_get_client($project['client']);
		$imp 		= $this->input->post('imp');
		$click 		= $this->input->post('click');
		$spend 		= $this->input->post('spend');
		$start 		= $this->input->post('start');
		$end 		= $this->input->post('end');

		header( 'Content-Type: application/csv' );
	    header( 'Content-Disposition: attachment; filename="'.$client['bname'].'.csv";' );
	    ob_end_clean();
	    $handle = fopen( 'php://output', 'w' );
		
		fputcsv( $handle, ['Lable','Value'] , "," );
		fputcsv( $handle, ['Client Name',$client['bname'].'('.$client['cname'].')'] , "," );
		fputcsv( $handle, ['Project Name',$project['name']] , "," );
		fputcsv( $handle, ['Impressions',$imp] , "," );
		fputcsv( $handle, ['Clicks',$click] , "," );
		fputcsv( $handle, ['Amount Spent',$spend] , "," );
		fputcsv( $handle, ['Start',$start] , "," );
		fputcsv( $handle, ['End',$end] , "," );

	    fclose( $handle );
	    exit();
	}	
}