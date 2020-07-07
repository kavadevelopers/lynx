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


		

		$access_token = 'EAAEaTqnj3PYBAHK6ZCtp92uUFUfNPy2lcoAw9dBPbJAKSF66lZAGXy1ltVGTH1QaEzIkwZCXlH8mJwbdvdUC8kWuovc9cucA8z9EdLeXZBy2xygxSoqCFPEJ2jSVDar6MpCq8KqgDb2Ee1ZBI1aXK7yTCT7ktlZAe0IJouITfqHthlekHoBeSq6oN223ZARekMZD';
		$ad_account_id = 'act_302577207450548';
		$app_secret = 'fa21210a70e153cdfd435f349d1afa38';
		$app_id = '310400136764662';

		$api = Api::init($app_id, $app_secret, $access_token);
		$api->setLogger(new CurlLogger());

		$fields = array(
		  'impressions',
		  'frequency',
		  'reach',
		  'quality_score_organic',
		  'quality_score_ectr',
		  'quality_score_ecvr',
		  'cpp',
		  'cpm',
		);
		$params = array(
		  'time_range' => array('since' => '2020-06-08','until' => '2020-07-08'),
		  'filtering' => array(),
		  'level' => 'campaign',
		  'breakdowns' => array(),
		);
		echo json_encode((new AdAccount($ad_account_id))->getInsights(
		  $fields,
		  $params
		)->getResponse()->getContent(), JSON_PRETTY_PRINT);
	}


}
?>