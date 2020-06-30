<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function pre_print($array)
{   
    echo count($array);
    echo "<pre>";
    print_r($array);
}

function _vdate($date){
    return date('d-m-Y',strtotime($date));
}

function _ddate($date){
    return date('Y-m-d',strtotime($date));
}

function _vdt($datetime)
{
	return date('d-m-Y  h:i a',strtotime($datetime));
}

function getSetting()
{
	$CI =& get_instance();
	return $CI->db->get_where('setting',['id' => '1'])->row_array();
}

function profile_image()
{
	return "f3.png";
}

function _profile()
{
	$CI =& get_instance();
	return $CI->db->get_where('user',['id' => $CI->session->userdata('id')])->row_array();	
}

function sendMail($mail,$otp)
{
	$CI =& get_instance();
    $config = Array(
		'protocol' 		=> 'smtp',
		'smtp_host' 	=> getSetting()['mhost'],
		'smtp_port' 	=> getSetting()['mport'],
		'smtp_user' 	=> getSetting()['muser'],
		'smtp_pass' 	=> getSetting()['mpass'],
		'mailtype' 		=> 'html',
		'charset' 		=> 'iso-8859-1',
		'wordwrap' 		=> TRUE
	);
    $CI->load->library('email', $config);
	$CI->email->set_newline("\r\n");
  	$CI->email->from(getSetting()['muser']);
  	$CI->email->to($mail);
  	$CI->email->subject('OTP');
 	$CI->email->message('Your OTP For reset password is :- '.$otp);
  	$CI->email->send();
  	//echo $CI->email->print_debugger();
}

function getBase64FromUrl($url)
{
	$image = file_get_contents($url);
	if ($image !== false){
	    return 'data:image/jpg;base64,'.base64_encode($image);
	}
}
?>