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

function daysBeetweenDates($date){
    $now = time();
    $your_date = strtotime($date);
    $datediff = $your_date - $now;
    return round($datediff / (60 * 60 * 24)) - 1;
}

function sendMail($mail,$subject,$template)
{
    $CI =& get_instance();
    $CI->load->library('email');
    $config = array(
        'protocol'      => 'smtp',
        'smtp_host'     => getSetting()['mhost'],
        'smtp_port'     => getSetting()['mport'],
        'smtp_user'     => getSetting()['muser'],
        'smtp_pass'     => getSetting()['mpass'],
        'mailtype'      => 'html',
        'charset'       => 'utf-8'
    );
    $CI->email->initialize($config);
    $CI->email->set_mailtype("html");
    $CI->email->set_newline("\r\n");

    $CI->email->to($mail);
    $CI->email->from(getSetting()['muser'],getSetting()['project_name']);
    $CI->email->subject($subject);
    $CI->email->message($template);
    if($CI->email->send()){
        //echo "ok";
    }else{
        //echo $CI->email->print_debugger();
    }

}

function getBase64FromUrl($url)
{
	$image = file_get_contents($url);
	if ($image !== false){
	    return 'data:image/jpg;base64,'.base64_encode($image);
	}
}


function thousandsCurrencyFormat($num) {

  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}
?>