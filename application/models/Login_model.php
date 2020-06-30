<?php


class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login_Ath($user,$pass)
	{
		$user = $this->db->escape($user);
		$select = $this->db->query("SELECT * FROM `user` WHERE `email` = ".$user." AND `df` = ''" );

		if($select->num_rows() > 0)
		{
			$data = $select->result_object();
			if($data[0]->password === md5($pass))
			{
				if($data[0]->id != '1'){
					$client = $this->db->get_where('client',['user' => $data[0]->id])->row_array();
					$client_id = $client['id'];
				}else{
					$client_id = '';
				}
				return array(0,'Login Successfull...','dashboard',$data[0]->id,$client_id);
			}
			else
			{
				return array(1,'Email And Password Not Match','');
			}
		}
		else
		{
			return array(1,'Email Not Registered','');
		}
	}
}
?>