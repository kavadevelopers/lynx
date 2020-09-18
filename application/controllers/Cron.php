<?php
class Cron extends CI_Controller {

	function __construct(){
        parent::__construct();
    }



    public function index()
    {
    	if(daysBeetweenDates(getSetting()['access_token_expired']) < 15 && daysBeetweenDates(getSetting()['access_token_expired']) > 0){
    		

    		sendMail(getSetting()['alert_email'],'Facebook Access token expire notification',$this->load->view('mail/expire',['days' => daysBeetweenDates(getSetting()['access_token_expired'])],true));


    	}
    }
}
?>