<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \FacebookAds\Object\AdAccount;
use \FacebookAds\Object\AdsInsights;
use \FacebookAds\Api;
use \FacebookAds\Logger\CurlLogger;
class Sample extends CI_Controller {



	function __construct(){
        parent::__construct();
    }

    public function index()
	{	
		$access_token = 'EAANa6hvXPVcBAPZCCLAIu4sPuz08TLhlEtrDWNNQZBRXf3CZCipg511MkTQn8ZCkO04rbncXdQb9pFJZCyxHu0sEyyHFL96S3OYZB0AtfIf9Qn6DrCX8cAuDhF0Q1Wm6ID8dZBkV1FUybV3LZAYBO5EivOuBNvZAhIzKnmN1XgIYC7wZDZD';

		$ad_account_id = 'act_327147421252626';
		$app_secret = '4f3cf68a4c6176076f4e596ebec61887';
		$app_id = '944386466069847';

		$api = Api::init($app_id, $app_secret, $access_token);
		$api->setLogger(new CurlLogger());

		$fields = array(
		  
		);
		$params = array(
		  'time_range' => array('since' => '2020-06-08','until' => '2020-07-08'),
		  'filtering' => array(),
		  'level' => 'ad',
		  'breakdowns' => array(),
		);
		echo json_encode((new AdAccount($ad_account_id))->getInsights(
		  $fields,
		  $params
		)->getResponse()->getContent(), JSON_PRETTY_PRINT);
	}

	public function curl()
	{
		$api_url  = "https://graph.facebook.com/v8.0/me?fields=adaccounts{insights{impressions,clicks,spend}}&access_token=EAANa6hvXPVcBAPZCCLAIu4sPuz08TLhlEtrDWNNQZBRXf3CZCipg511MkTQn8ZCkO04rbncXdQb9pFJZCyxHu0sEyyHFL96S3OYZB0AtfIf9Qn6DrCX8cAuDhF0Q1Wm6ID8dZBkV1FUybV3LZAYBO5EivOuBNvZAhIzKnmN1XgIYC7wZDZD";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$api_url);
        $result=curl_exec($ch);
        curl_close($ch);
        $new_resp = json_decode(json_encode(json_decode($result)), True);
        
        foreach ($new_resp['adaccounts']['data'] as $key => $value) {
        	if(array_key_exists('insights', $value)){
        		$insights = $value['insights'];
        		if(array_key_exists('data', $insights)){
        			if (array_key_exists('0', $insights['data'])) {
        				$data = $insights['data'][0];
        				
        				$impressions 	= $data['impressions'];
        				$clicks 		= $data['clicks'];
        				$spend 			= $data['spend'];
        				$date_start 	= $data['date_start'];
        				$date_stop 		= $data['date_stop'];


        			}
        		}
        	}
        }
	}


}
?>