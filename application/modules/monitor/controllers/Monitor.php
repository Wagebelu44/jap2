<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('monitor_model');	

	}
	public function index()
	{
// 		$data['cards'] = $this->home_model->get_gift_cards();
		$url = "https://justanotherpanel.com/api/v2?key=d4135d2aca972c052cee4abe3c4afcee&action=services";
		//  Initiate curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		curl_close($ch);
		var_dump(json_decode($result, true)); exit;

		// $this->load->view('monitor');
	}
}